<?php
    session_start();
    if($_SESSION['user']==""){
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
		$kam = $_POST["KAM"];
        $timein = $_POST["timein"];
        $timeout = $_POST["timeout"];
        $workdetails = $_POST["workdetails"];
        $equipments = $_POST["equipments"];
        $workedon = $_POST["workedon"];
        $shutdown = $_POST["shutdown"];
        $software = $_POST["software"];
        $hardware = $_POST["hardware"];
        $maintanence = $_POST["maintanence"];
        $requestfor = $_POST["requestfor"];
		$permission = $_POST["permission"];
		$enviornment = $_POST["enviornment"];
		
        $status = "Awaiting approval from KAM";

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

        $sql = "INSERT INTO customerrequest (requestfor, requesttime, requestdate, name, nic, company, timein, timeout, workdetails, equipments, workedon, shutdown, software, hardware, maintanence, status , KAM) VALUES ('".$requestfor."','".$requestTime."', '".$requestDate."', '".$name."', '".$nic."', '".$company."', '".$timein."', '".$timeout."', '".$workdetails."', '".$equipments."', '".$workedon."', '".$shutdown."', '".$software."', '".$hardware."', '".$maintanence."', '".$status."', '".$kam."')";
        if($conn->query($sql)===TRUE){
            echo "New Row added Successfully";
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
                <a class="navbar-brand" href="index.html">PTCL Data Center</a>
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
                        <a href="tables.html"><i class="fa fa-fw fa-table"></i> Dashboard</a>
                    </li >
                    <li class="active">
                        <a href="customerDashboardRequest.php"><i class="fa fa-fw fa-location-arrow"></i> New Request</a>
                    </li>
					<li>
                        <a href="#"><i class="fa fa-fw fa-location-arrow"></i> History</a>
                    </li>
					<li>
                        <a href="#"><i class="fa fa-fw fa-location-arrow"></i> Registered Visitors</a>
                    </li>
					<li>
                        <a href="#"><i class="fa fa-fw fa-location-arrow"></i> Space Utilized</a>
                    </li>
					<li>
                        <a href="#"><i class="fa fa-fw fa-location-arrow"></i> Shared Documents</a>
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
                                <i class="fa fa-edit"></i> Routine Activity Form
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
                                    <option value="Commecial Data Center Karachi">Commercial Data Center Karachi</option>
                                    <option value="IT Data Center Karachi">IT Data Center Karachi</option>
                                    <option value="Commecial Data Center Lahore">Commercial Data Center Lahore</option>
									 <option value="Commecial Data Center Lahore">IT Data Center Islamabad</option>
                                </select>
                            </div>
							</div>
							
							<div class='col-md-12'>
     
							   <div class="form-group">
                                <label>Name of the KAM</label>
                                <input class="form-control" name="KAM">
                            </div>
						</div>

                             <div class='col-md-6'>
							<div class="form-group">
							<label> Start date & time of Visit </label>
								<div class='input-group date' id='datetimepicker6' >
								
									<input type='text' class="form-control" name="timein"/>
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
								
									<input type='text' class="form-control" name="timeout" />
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</div>
						</div>

						<div class='col-md-6'>
	
								<div class="form-group">
                                <label>Name of the visitor</label>
                                <input class="form-control" name="name" id='name'>
                               
								</div>
							</div>
							<div class='col-md-6'>
                            <div class="form-group">
                                <label>CNIC</label>
                                <input class="form-control" name="nic" id='cnic'>
                               
                            </div>
							
							</div>	

							<div class='col-md-12'>
							<div class="form-group">
                               
								<input type='button' value='add' id='addpeople' style="margin-top:10px"/>
								</br>
								
								
								
								
								<label style="margin-top:10px"> People visiting </label>
								<ul name="list" id='listofnames' style="margin-top:5px;padding-top:35px ;     border: 1px solid #ccc;border-radius: 4px;">
								
								</ul>
								
                            </div>
							</div>
							
							
						<div class='col-md-12'>
     
							   <div class="form-group">
                                <label>Company</label>
                                <input class="form-control" name="company">
                            </div>
						</div>

							
							
							
							
						<div class='col-md-12'>
     
							<div class="form-group">
                                <label>Work Details</label>
                                <textarea class="form-control" rows="3" name="workdetails"></textarea>
                            </div>
						</div>


						<div class='col-md-12'>
     
							<div class="form-group">
                                <label>Equipment Accompanying</label>
                                <input type='text' class="form-control" id='idea' />
								<input type='button' value='add to list' id='add' style="margin-top:10px"/>
								</br>
								<label style="margin-top:10px"> Equipments </label>
								<ul id='equip' name="equipments" style="margin-top:5px;padding-top:35px ;     border: 1px solid #ccc;border-radius: 4px;">
								
								</ul>
								
                            </div>
						</div>
						
						<div class='col-md-12'>
     
							<div class="form-group">
                                <label>Servers/Equipments/AC Units to be worked on</label>
                                <input type='text' class="form-control" id='idea1' />
								<input type='button' value='add to list' id='add1' style="margin-top:10px"/>
								</br>
								
								<ul name="workedon" id='equip1' style="margin-top:5px;padding-top:35px ;     border: 1px solid #ccc;border-radius: 4px;" >
								
								</ul>
								
                            </div>
						</div>
                           

                          
                    <div class="col-lg-12">
                         <div class="form-group">
                                <label>Server Shutdown Required</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="shutdown" value="Yes" checked>Yes
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="shutdown" value="No">No
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Software Installation</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="software" value="Yes" checked>Yes
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="software" value="No">No
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Hardware Installation/Replacement</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="hardware" value="Yes" checked>Yes
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="hardware" value="No">No
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Servers/Equipment Maintanence Activity</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="maintanence" value="Yes" checked>Yes
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="maintanence" value="No">No
                                    </label>
                                </div>
                            </div>
                    </div>
               
                            

                          	<div class='col-md-12'>
     
						 <div class="form-group">
                                <label>Permission from DC Shift Personnel </label>
                                <label class="radio-inline">
                                    <input type="radio" name="permission" id="permissiony" value="option1" checked>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="permission" id="permissionn" value="option2">No
                                </label>
                               
                            </div>
						</div>
						
						 	<div class='col-md-12'>
     
						 <div class="form-group">
                                <label>Satisfied from DC enviornment</label>
                                <label class="radio-inline">
                                    <input type="radio" name="enviornment" id="satisfies" value="option1" checked>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="enviornment" id="not-satisfied" value="option2">No
                                </label>
                               
                            </div>
						</div>
						
						<div class='col-md-12'>
     
							<div class="form-group">
                                <label>Remarks (if any)</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
						</div>
                          
						  
						  	<div class='col-md-12' style="text-align: center;">
								<?PHP
	 
									$a="hello";
									 
									?>
     
							<div class="form-group">
                                <button type="submit" class="btn btn-default" >Submit Button</button>
                            <button type="reset" class="btn btn-default">Reset Button</button>
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
