<?php

$id=$_POST['postid'];

				
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
                                    
                                        $sql = "DELETE FROM customerrequest WHERE id=".$id;
                                        $result = $conn->query($sql);

				
										
?>
