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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['user']?> <b class="caret"></b></a>
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
                        <a href="corporateDashboard.php"><i class="fa fa-fw fa-table"></i> Dashboard</a>
                    </li >
                    <li>
                        <a href="corporateDashboard2.php"><i class="fa fa-fw fa-table"></i> Placement Requests</a>
                    </li>
                    <li>
                        <a href="KAMaddcustomer.php"><i class="fa fa-fw fa-plus"></i> Add a new customer</a>
                    </li>
                    <li  class="active">
                        <a href="KAMviewcustomer.php"><i class="fa fa-fw fa-list"></i> Customer's list</a>
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
                            Customer's List
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="corporateDashboard.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-list"></i> Customer's list
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

				

                      
						


                     
         



		  <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="requests">
                                <thead>
                                    <tr>
                                        <th>Customer ID:</th>
                                        <th>Customer email:</th>
                                        <th>Customer Name:</th>
                                        <th>Company:</th>
                                    </tr>
                                </thead>
                                <tbody id="tablebody">
                                    <?php
                                        $Name = $_SESSION["user"];
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
                                        echo("Connection Successful");
                                        echo($_SESSION['user']);
                                        $sql = "SELECT id, email, Name, company FROM users WHERE addedby = '".$Name."'";
                                        $result = $conn->query($sql);

                                        if($result->num_rows > 0){
                                            while($row = $result->fetch_assoc()){ ?>
                                                    <tr>
                                                        <td><?php echo $row["id"] ?></td>
                                                        <td><?php echo $row["email"] ?></td>
                                                        <td><?php echo $row["Name"] ?></td>
                                                        <td><?php echo $row["company"] ?></td>
                                                    </tr>
                                            <?php
                                            }
                                        }
                                            ?>
                                </tbody>
                            </table>
                        </div>
                        
                         <div class="col-md-12 text-center">
                      <ul class="pagination pagination-lg pager" id="myPager"></ul>
                      </div>
      
      
                    </div>
                </div>
                <!-- /.row -->
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
