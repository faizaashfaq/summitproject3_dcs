<?php

$id=$_POST['postid'];
$reason=$_POST['postreason'];

		$servername = "localhost";
        $user = "root";
        $pass = "";
        $dbname = "datacenter";

        $conn = new mysqli($servername, $user, $pass, $dbname);

        if($conn -> connect_error){
            die("Connection Failed: " . $conn->connect_error);
        }
        echo "Connection Successful";
        $sql = "UPDATE customerrequest SET status= 'Rejected by DC' WHERE id = '".$id."' ";
        $conn->query($sql);
		$sql = "UPDATE customerrequest SET reason= '".$reason."' WHERE id = '".$id."' ";
        $conn->query($sql);
        $conn->close();
				
										
?>
