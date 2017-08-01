<?php
		$id=$_POST['postid'];
		$comment=$_POST['postcomment'];
		$servername = "localhost";
        $user = "root";
        $pass = "";
        $dbname = "datacenter";
        $conn = new mysqli($servername, $user, $pass, $dbname);
        if($conn -> connect_error){
            die("Connection Failed: " . $conn->connect_error);
        }
        echo "Connection Successful";
        $sql = "UPDATE documents SET comments= '".$comment."' WHERE id = '".$id."' ";
        $conn->query($sql);
        $conn->close();
				
										
?>