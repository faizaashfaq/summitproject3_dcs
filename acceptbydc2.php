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
		
		
		//Mail function
        
										
			$sql = "SELECT clientid,KAM, requestfor FROM placement where id='".$id."'";
			$result = $conn->query($sql);
			 if($result->num_rows > 0){
                                            while($row = $result->fetch_assoc()){
                                                        $clientid= $row["clientid"];
														$kam= $row["KAM"];
														$dc=$=$row["requestfor"];
                                            }
                                        }
			$sql = "SELECT email FROM users where id='".$clientid."'";
			$result = $conn->query($sql);
			 if($result->num_rows > 0){
                                            while($row = $result->fetch_assoc()){
                                                        $clientemail= $row["email"];
                                            }
                                        }
			$sql = "SELECT email FROM users where Name='".$kam."'";
			$result = $conn->query($sql);
			 if($result->num_rows > 0){ 
                                            while($row = $result->fetch_assoc()){
                                                        $kamemail= $row["email"];
                                            }
                                        }
			$kammsg="Datacenter approved new placement request. , ID=".$id." Please visit the portal for details";
			echo $kammsg;
			mail($kamemail, "Request appoved".$id, $kammsg, "From: ptcldatacenters@ptcl.net.pk");
			
			$clientmsg="Your placement request is apporved by DC. , ID=".$id.". Please visit the portal for details";
			echo $clientmsg;
			mail($clientemail, "Request appoved".$id, $clientmsg,  "From: ptcldatacenters@ptcl.net.pk");
			
			
								if($dc == "Commercial Data Center Lahore"){
											$dcid=1;
										}else if ($dc == "IT Data Center Islamabad"){	
												$dcid=2;
											  }else if($dc == "Commercial Data Center Karachi"){
												  $dcid=3;
													}else if($dc == "IT Data Center Karachi"){
														$dcid=4;
															}
			
			$sql = "SELECT email FROM users where role='".$dcid."'";
			$result = $conn->query($sql);
			 if($result->num_rows > 0){ 
                                            while($row = $result->fetch_assoc()){
                                                        $dcemail= $row["email"];
                                            }
                                        }
			$dcmsg="New placement request is succesfully approved. , ID=".$id.". Please visit the portal for details ";
			echo $dcmsg;
			mail($dcemail, "Request appoved".$id, $dcmsg,  "From: ptcldatacenters@ptcl.net.pk");
			
            //End Mail
        $conn->close();
				
										
?>