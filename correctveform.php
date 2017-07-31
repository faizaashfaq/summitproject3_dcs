<?php
    session_start();
    if($_SESSION['user']=="" || $_SESSION['role'] != 0){
        header("Location: index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome <?php echo $_SESSION['user']?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

	


<!-- Optional theme -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />



<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>





    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>



<?php

    $name = $nic = $company = $timein = $timeout = $workdetails = $equipments = $workedon = $requestDate = $requestTime = $requestfor = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST["name"];
        $nic = $_POST["nic"];
        $company = $_POST["company"];
		$officer = $_POST["officer"];
        $timein = $_POST["timein"];
        $timeout = $_POST["timeout"];
        $workdetails = $_POST["workdetails"];
        $equipments = $_POST["equipments"];
        $workedon = $_POST["workedon"];
        $maintanence = $_POST["maintanence"];
        $requestfor = $_POST["requestfor"];
		$wstatus = $_POST["remarks"];
		$riskfactor=$_POST["riskfactor"];
		$wprogress = $_POST["workinprogress"];
		$impact = $_POST["impact"];
		$clientid=$_SESSION['id'];
        $status = "Awaiting approval from DC";

        date_default_timezone_set("Asia/Karachi");
        $requestDate = date("Y/m/d");
        $requestTime = date("h:i:sa");

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

        $sql = "INSERT INTO corrective (clientid, requesttime, requestdate,	requestfor, name, nic, vendor, timein, timeout, officer, maintenance, tools, workedon, impact, riskfactor, equipmentmarked, mainbreaker, workcompletion, status) VALUES
								('".$clientid."','".$requestTime."', '".$requestDate."', '".$requestfor."', '".$name."', '".$nic."', '".$company."', '".$timein."', '".$timeout."', '".$officer."', '".$workdetails."', '".$equipments."', '".$workedon."', '".$impact."', '".$riskfactor."', '".$wprogress."', '".$maintanence."', '".$wstatus."',  '".$status."')";
        if($conn->query($sql)===TRUE){
             echo "
            <script type=\"text/javascript\">
            alert(\"Request Generated Successfully\");
            </script>
        ";
		
		
		
        }
        else {
            print_r( "Error: " . $sql . "<br>" . $conn->error); exit();
        }

        $conn -> close();
    }

?>












    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">PTCL Data Center</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Customer Name <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                 <ul class="nav navbar-nav side-nav">
                    <li >
                        <a href="customerDashboard.php"><i class="fa fa-fw fa-table"></i> Dashboard</a>
                    </li >
                    <li >
                        <a href="customerDashboardRequest.php"><i class="fa fa-fw fa-location-arrow"></i> New Request</a>
                    </li>
					 <li class="active">
                        <a href="correctveform.php"><i class="fa fa-fw fa-location-arrow"></i> Corrective Form</a>
                    </li>
					
					<li>
                        <a href="#"><i class="fa fa-fw fa-building-o"></i> Space Utilized</a>
                    </li>
					<li>
                        <a href="#"><i class="fa fa-fw fa-newspaper-o"></i> Shared Documents</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Request Visit
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="customerDashboard.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Maintanence Activity
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

				

                      
						


                     
         



		  <div class="row">
                    <div >

                        <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						
						
						
						<div class='col-md-12'>
						  <div class="form-group">
                                <label>Request for</label>
                                <select class="form-control" name="requestfor">
                                    <option value="Commercial Data Center Karachi">Commercial Data Center Karachi</option>
                                    <option value="IT Data Center Karachi">IT Data Center Karachi</option>
                                    <option value="Commercial Data Center Lahore">Commercial Data Center Lahore</option>
									 <option value="IT Data Center Lahore">IT Data Center Islamabad</option>
                                </select>
                            </div>
							</div>
							
							<div class='col-md-12'>
     
							   <div class="form-group">
                                <label>PTCL Officer(Name & Designation)</label>
                                <input class="form-control" name="officer" id='officer' required>
                            </div>
						</div>

                             <div class='col-md-6'>
							<div class="form-group">
							<label> Start date & time of Visit </label>
								<div class='input-group date' id='datetimepicker6' >
								
									<input type='text' class="form-control" name="timein" placeholder="mm/dd/yyyy 00:00 AM" required />
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</div>
						</div>
						<div class='col-md-6'>
							<div class="form-group">
							<label> End date & time of Visit </label>
								<div class='input-group date' id='datetimepicker7' >
								
									<input type='text' class="form-control" name="timeout" placeholder="mm/dd/yyyy 00:00 AM" required />
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</div>
						</div>

						<div class='col-md-12'>
	
								<div class="form-group">
                                <label>Name of the visitor</label>
                                <input class="form-control" name="name" id='name' required>
                               <p class="help-block">In case of more than one name, kindly use commas.</p>
								</div>
							</div>
							<div class='col-md-12'>
                            <div class="form-group">
                                <label>CNIC</label>
                                <input type="text" pattern=".{13,13}"   class="form-control" name="nic" id='cnic' placeholder="Enter digits without '-'" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
                               <p class="help-block">In case of more than one CNICs, kindly use commas.</p>
                            </div>
							
							</div>	

					
							
							
						<div class='col-md-12'>
     
							   <div class="form-group">
                                <label>Name of the Vendor</label>
                                <input class="form-control" name="company" required>
                            </div>
						</div>

							
							
							
							
						<div class='col-md-12'>
     
							<div class="form-group">
                                <label>Maintenance / Corrective measures required (Detail) with Location:</label>
                                <textarea class="form-control" rows=5"" name="workdetails"></textarea>
                            </div>
						</div>


						<div class='col-md-12'>
     
							<div class="form-group">
                                <label>Tools accompanying:</label>
                                 <textarea class="form-control" rows="3" name="equipments"></textarea>
                            </div>
						</div>
						
						<div class='col-md-12'>
     
							<div class="form-group">
                                <label>CRAC Unit / UPS / etc.,  to be worked on :</label>
                               
								  <textarea class="form-control" rows="3" name="workedon"></textarea>
                            </div>
						</div>
                           

                          
                    <div class="col-lg-12">
                         <div class="form-group">
                                <label>Any Impact to DC Services</label>
                                 <label class="radio-inline">
                                    <input type="radio" name="impact" id="impacty" value="Yes" checked>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="impact" id="impactn" value="No">No
                                </label>
                            </div>
					
     
							<div class="form-group">
                                <label>Please mention risk factor:</label>
                               
								  <textarea class="form-control" rows="3" name="riskfactor"></textarea>
                            </div>
						

                            <div class="form-group">
                                <label>Safeties to be checked by Activity Supervisor (Mandatory)</label>
                           
                            </div>

                            <div class="form-group">
                                <label>Equipment Marked ‘Do not Operate /  Work in Progress’</label>
                           <label class="radio-inline">
                                    <input type="radio" name="workinprogress" id="progressy" value="Yes" checked>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="workinprogress" id="progressn" value="No">No
                                </label>
                            </div>

                            <div class="form-group">
                                <label>Main breaker at MCC/LT Panel Off</label>
                                
                                    <label class="radio-inline">
                                        <input type="radio" name="maintanence" value="Yes" checked>Yes
                                    </label>
                              
                                    <label class="radio-inline">
                                        <input type="radio" name="maintanence" value="No">No
                                    </label>
                               
                            </div>
                    </div>
               
                            

                          	
						
						
						
						<div class='col-md-12'>
     
							<div class="form-group">
                                <label>Work completion Status in Detail:</label>
                                <textarea class="form-control" rows="3" name="remarks" required></textarea>
                            </div>
						</div>
                          
						  
						  	<div class='col-md-12' style="text-align: center;">
								<?PHP
	 
									$a="hello";
									 
									?>
     
							<div class="form-group">
                            <button type="submit" class="btn btn-default" >Submit</button>
                          
                            </div>
						</div>

                           

                        </form>

                    </div>
                   
                
		 
		 
		 
		 
		 
		 

                
				
				
            
               

           

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
   
	
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	<script type="text/javascript">
$(document).ready(function() {
        $(function () {
            $('#datetimepicker6').datetimepicker();
            $('#datetimepicker7').datetimepicker({
                useCurrent: false //Important! See issue #1075
            });
            $("#datetimepicker6").on("dp.change", function (e) {
                $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
            });
            $("#datetimepicker7").on("dp.change", function (e) {
                $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
            });
        });
    });
</script>

	<script type="text/javascript">
$(document).ready(function() {
        $(function () {
            $('#datetimepicker1').datetimepicker();
            $('#datetimepicker2').datetimepicker({
                useCurrent: false //Important! See issue #1075
            });
            $("#datetimepicker1").on("dp.change", function (e) {
                $('#datetimepicker2').data("DateTimePicker").minDate(e.date);
            });
            $("#datetimepicker2").on("dp.change", function (e) {
                $('#datetimepicker1').data("DateTimePicker").maxDate(e.date);
            });
        });
    });
</script>

<script>

//Defining a listener for our button, specifically, an onclick handler
document.getElementById("add").onclick = function() {
    //First things first, we need our text:
    var text = document.getElementById("idea").value; //.value gets input values

    //Now construct a quick list element
	var ite = document.createElement('li');
    
	ite.textContent = text;
 
	
    //Now use appendChild and add it to the list!
    document.getElementById("equip").appendChild(ite);
	
	$("#equip").append(ite);
}

</script>


<script>

//Defining a listener for our button, specifically, an onclick handler
document.getElementById("add1").onclick = function() {
    //First things first, we need our text:
    var text = document.getElementById("idea1").value; //.value gets input values

    //Now construct a quick list element
	var ite = document.createElement('li');
    
	ite.textContent = text;
 
	
    //Now use appendChild and add it to the list!
    document.getElementById("equip1").appendChild(ite);
	
	$("#equip1").append(ite);
}

</script>



<script>

//Defining a listener for our button, specifically, an onclick handler
document.getElementById("addpeople").onclick = function() {
    //First things first, we need our text:
    var name = document.getElementById("name").value; //.value gets input values
	var cnin = document.getElementById("cnic").value; //.value gets input values
	
    //Now construct a quick list element
	var ite = document.createElement('li');
    
	ite.textContent = name+","+cnin;
	
    //Now use appendChild and add it to the list!
    document.getElementById("listofnames").appendChild(ite);
	
	$("#listofnames").append(ite);
}

</script>




</body>

</html>
