<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

$name=$_POST['filename'];

date_default_timezone_set("Asia/Karachi");

$requestDate = date("Y/m/d");

$actualname=basename( $_FILES["fileToUpload"]["name"]);
session_start();
$clientid=$_SESSION['id'];
$DC=$_POST["requestfor"];
		
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {

        $uploadOk = 1;
   
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "pdf"  ) {
    echo "Sorry, PDF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		
		 //database access
        $servername = "localhost";
        $user = "root";
        $pass = "";
        $dbname = "datacenter";

        //establishing connection
        $conn = new mysqli($servername, $user, $pass, $dbname);

        if($conn -> connect_error){
            die("Connection Failed: " . $conn->connect_error);
        }
        echo "Connection Successful";
		$sql = "SELECT * FROM users WHERE id='".$_SESSION['id']."'";
                                        $result = $conn->query($sql);
										
										if(!empty($result)){
											if($result->num_rows > 0 ){
												while($row = $result->fetch_assoc()){ 
												$company=$row["company"];
														$sql = "INSERT INTO documents (clientid, name , date , file , dc , company) VALUES('".$clientid."','".$name."', '".$requestDate."', '".$actualname."' , '".$DC."' , '".$company."')";
															if($conn->query($sql)===TRUE){
																 echo "
																<script type=\"text/javascript\">
																alert(\"Request Generated Successfully\");
																</script>
															";
												
												}
											}
										}    
        
		
		header("Location: documents.php");
        exit();
		
        }
        else {
            print_r( "Error: " . $sql . "<br>" . $conn->error); exit();
        }

        $conn -> close();
		
		
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>