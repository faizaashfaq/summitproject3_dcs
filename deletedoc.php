<?php

$id=$_POST['postid'];
$file=$_POST['filename'];
$base_directory = 'uploads/';
if(unlink($base_directory.$file))
    echo "File Deleted.";
				
										//database access
                                        $servername = "localhost";
                                        $user = "root";
                                        $pass = "";
                                        $dbname = "datacenter";

                                        //establishing connection
                                        $conn = new mysqli($servername, $user, $pass, $dbname);

                                        if($conn -> connect_error){
                                            die("Connection Failed: ". $conn->connect_error);
                                        }
                                    
                                        $sql = "DELETE FROM documents WHERE id=".$id;
                                        $result = $conn->query($sql);

										
?>
