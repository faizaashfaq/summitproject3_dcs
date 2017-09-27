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
        $sql = "UPDATE customerrequest SET status= 'Rejected by KAM' WHERE id = '".$id."' ";
        $conn->query($sql);
		$sql = "UPDATE customerrequest SET reason= '".$reason."' WHERE id = '".$id."' ";
        $conn->query($sql);
<<<<<<< HEAD
=======
		//Mail function
        
										
			$sql = "SELECT clientid,KAM, requestfor FROM customerrequest where id='".$id."'";
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
			$kammsg="You Rejected request to visit Datacenter , ID=".$id.". Please visit the portal for details";
			echo $kammsg;
			mail($kamemail, "Request Rejected".$id, $kammsg,  "From: ptcldatacenters@ptcl.net.pk");
			
			$clientmsg="Your request to visit DC is Rejected by KAM. , ID=".$id.". Please visit the portal for details";
			echo $clientmsg;
			mail($clientemail, "Request Rejected".$id, $clientmsg,  "From: ptcldatacenters@ptcl.net.pk");
			
			
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
			$dcmsg="You have new request to visit DC. , ID=".$id.". Please visit the portal for details ";
			echo $dcmsg;
			//mail($dcemail, "Request appoved".$id, $dcmsg);
			
            //End Mail
>>>>>>> f6531dc4a0521bb5bee6fc9e8be83e988bee2288
        $conn->close();
				
										
?>
