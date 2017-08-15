<?php
    session_start();
    if($_SESSION['user']=="" || $_SESSION['role'] != 5){
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

    $email = $pass = $company = $name = $cname =  "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $company = $_POST["company"];
        $id = $_SESSION['id'];
        $cname = $_POST['cname'];
        $role = 0;
		

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

        $sql = "SELECT Name FROM users where id = '".$id."'";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            while ($row = $result -> fetch_assoc()) {
            	$name = $row["Name"];
            }


		$sql2 = "INSERT INTO users (email, pwd, role, Name, company, addedby) VALUES ('".$email."', '".$pass."', '".$role."', '".$cname."', '".$company."', '".$name."')";
		if($conn->query($sql2) == TRUE){

			echo "New row added";

            //Mail function
            
            //End Mail
            header("Location: KAMaddcustomer.php"); //to the customer dashboard
	    	exit();
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
             <img src="img/ptcl.png" class="img-responsive navbar-brand" >
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
                    <li class="active">
                        <a href="customerDashboardRequest.php"><i class="fa fa-fw fa-location-arrow"></i> Add a new customer</a>
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
                            Add a new customer
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="customerDashboard.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Add a new customer
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
                                <label>Customer Name: </label>
                                <input class="form-control" name="cname" id='cname' required>
								</div>
							</div>

						<div class='col-md-12'>
	
								<div class="form-group">
                                <label>Email ID: </label>
                                <input class="form-control" name="email" id='email' required>
								</div>
							</div>

							<div class='col-md-12'>
                            <div class="form-group">
                                <label>Password: </label>
                                <input type="Password" class="form-control" name="pass" id='pass' placeholder="Enter a password to share with the customer" required>
                            </div>
							
							</div>	

					
							
							
						<div class='col-md-12'>
     
							   <div class="form-group">
                                <label>Company</label>
                                <input class="form-control" name="company" required>
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
