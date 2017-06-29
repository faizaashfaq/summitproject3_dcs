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
    $id = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $servername = "localhost";
        $user = "root";
        $pass = "";
        $dbname = "datacenter";

        $conn = new mysqli($servername, $user, $pass, $dbname);

        if($conn -> connect_error){
            die("Connection Failed: " . $conn->connect_error);
        }
        echo "Connection Successful";
        $sql = "UPDATE customerrequest SET status= 'Awaiting approval from DC' WHERE id = '".$_POST["id"]."' ";

        if($conn->query($sql)===TRUE){
            echo "Record Updated Successfully";
        }
        else{
            echo "Record update failure";
        }
        $conn->close();
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
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="corporateDashboard.php"><i class="fa fa-fw fa-table"></i> Dashboard</a>
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
                            Dashboard
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="corporateDashboard.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Report View
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <h2>Report View</h2>
                        <div class="table-responsive">
                        <form method="post" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Request ID:</th>
                                        <th>Request generated for:</th>
                                        <th>Request generated on date:</th>
                                        <th>Request generated on time:</th>
                                        <th>Name:</th>
                                        <th>NIC:</th>
                                        <th>Company:</th>
                                        <th>Requested Date:</th>
                                        <th>Time in:</th>
                                        <th>Time out:</th>
                                        <th>Work Details:</th>
                                        <th>Equipments Accompanied:</th>
                                        <th>Servers/Equipments/ACs unit to be worked upon:</th>
                                        <th>Server shutdown required:</th>
                                        <th>Software Installation:</th>
                                        <th>Hardware Installation:</th>
                                        <th>Servers/Equipments Maintanence activity:</th>
                                        <th>Status:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
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
                                        $sql = "SELECT id, requestfor, requestdate, requesttime, name, nic, company, requesteddate, timein, timeout, workdetails, equipments, workedon, shutdown, software, hardware, maintanence, status FROM customerrequest LIMIT 10";
                                        $result = $conn->query($sql);

                                        if($result->num_rows > 0){
                                            while($row = $result->fetch_assoc()){
                                                $id = $row["id"];
                                             ?>
                                                    <tr>
                                                        <td><?php echo $row["id"] ?></td>
                                                        <td><?php echo $row["requestfor"] ?></td>
                                                        <td><?php echo $row["requestdate"] ?></td>
                                                        <td><?php echo $row["requesttime"] ?></td>
                                                        <td><?php echo $row["name"] ?></td>
                                                        <td><?php echo $row["nic"] ?></td>
                                                        <td><?php echo $row["company"] ?></td>
                                                        <td><?php echo $row["requesteddate"] ?></td>
                                                        <td><?php echo $row["timein"] ?></td>
                                                        <td><?php echo $row["timeout"] ?></td>
                                                        <td><?php echo $row["workdetails"] ?></td>
                                                        <td><?php echo $row["equipments"] ?></td>
                                                        <td><?php echo $row["workedon"] ?></td>
                                                        <td><?php echo $row["shutdown"] ?></td>
                                                        <td><?php echo $row["software"] ?></td>
                                                        <td><?php echo $row["hardware"] ?></td>
                                                        <td><?php echo $row["maintanence"] ?></td>
                                                        <td><?php echo $row["status"] ?></td>
                                                    </tr>
                                            <?php
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <div class="col-lg-2">
                            <div class="form-group">
                                <label>Enter ID to approve</label>
                                <input class="form-control" name="id">
                            </div>
                            <button type="submit" class="btn btn-default">Approve</button>
                            </div>
                            
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
