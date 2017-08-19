<?php
$id=$_POST['postid'];
		$servername = "localhost";
        $user = "root";
        $pass = "";
        $dbname = "datacenter";
        $conn = new mysqli($servername, $user, $pass, $dbname);
        if($conn -> connect_error){
            die("Connection Failed: " . $conn->connect_error);
        }
        echo "Connection Successful";
        $sql = "UPDATE placement SET status= 'Accepted' WHERE id = '".$id."' ";
        $conn->query($sql);
        $conn->close();
				
										
?>