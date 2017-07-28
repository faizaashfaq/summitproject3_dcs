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
                <a class="navbar-brand" href="index.php">PTCL Data Center</a>
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
                        <a href="customerDashboard.php"><i class="fa fa-fw fa-table"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="customerDashboardRequest.php"><i class="fa fa-fw fa-location-arrow"></i> New Request</a>
                    </li>
					 <li >
                        <a href="correctveform.php"><i class="fa fa-fw fa-location-arrow"></i> Maintenance Form</a>
                    </li>
					<li>
                        <a href="#"><i class="fa fa-fw fa-building-o"></i> Space Utilized</a>
                    </li>
					<li>
                        <a href="documents.php"><i class="fa fa-fw fa-newspaper-o"></i> Shared Documents</a>
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
                        <h1 id="header" class="page-header">
                            Dashboard
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="customerDashboard.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Status Report
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

				<div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div style="font-size:large" >New </br>Requests</div>
                                       
                                    </div>
                                </div>
                            </div>
                            <a href="customerDashboard.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div style="font-size:large" >Maintenance Requests</div>
                                       
                                    </div>
                                </div>
                            </div>
                            <a href="customerDashboard2.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div style="font-size:large"> &nbsp;&nbsp;&nbsp;Pending Requests</div>
                                       
                                    </div>
                                </div>
                            </div>
                            <a href="customerDashboard3.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div style="font-size:large">&nbsp;&nbsp;&nbsp;Accepted Requests</div>
                                        
                                    </div>
                                </div>
                            </div>
                            <a href="customerDashboard4.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
				
				
				
				
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="requests">
                                <thead>
                                    <tr>
                                        <th>Request ID:</th>
                                        <th>Request generated for:</th>
                                        <th>Request generated on date:</th>
                                        <th>Request generated on time:</th>
                                        <th>Status:</th>
                                        <th>Report:</th>
										<th>Edit:</th>
                                    </tr>
                                </thead>
                                <tbody id="tablebody">
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
                                        echo($_SESSION['user']);
                                        $sql = "SELECT id, requestfor, requestdate, requesttime, status FROM customerrequest WHERE clientid=".$_SESSION['id'];
                                        $result = $conn->query($sql);

                                        if($result->num_rows > 0){
                                            while($row = $result->fetch_assoc()){ ?>
                                                    <tr>
                                                        <td><?php echo $row["id"] ?></td>
                                                        <td><?php echo $row["requestfor"] ?></td>
                                                        <td><?php echo $row["requestdate"] ?></td>
                                                        <td><?php echo $row["requesttime"] ?></td>
                                                        <td><?php echo $row["status"] ?></td>
                                                        <td><a class="btn btn-default btn-sm" href="customerRequestView.php?id=<?php echo $row['id'];?>">View</a></td>
														<td><a href="javascript:removeRow(' <?php echo $row["id"] ?> ');" class="btn btn-default btn-sm">Delete</a></td>
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

	<script>
	
	// Remove row
			function removeRow(id) {
				
	
				$.post('delete.php',{postid:id}, function(data){
					
					$( "#requests" ).load( "customerDashboard.php #requests" );
				});
			
			}
		</script>
		
		
		<script>
		
		$.fn.pageMe = function(opts){
    var $this = this,
        defaults = {
            perPage: 7,
            showPrevNext: false,
            hidePageNumbers: false
        },
        settings = $.extend(defaults, opts);
    
    var listElement = $this;
    var perPage = settings.perPage; 
    var children = listElement.children();
    var pager = $('.pager');
    
    if (typeof settings.childSelector!="undefined") {
        children = listElement.find(settings.childSelector);
    }
    
    if (typeof settings.pagerSelector!="undefined") {
        pager = $(settings.pagerSelector);
    }
    
    var numItems = children.size();
    var numPages = Math.ceil(numItems/perPage);

    pager.data("curr",0);
    
    if (settings.showPrevNext){
        $('<li><a href="#" class="prev_link">«</a></li>').appendTo(pager);
    }
    
    var curr = 0;
    while(numPages > curr && (settings.hidePageNumbers==false)){
        $('<li><a href="#" class="page_link">'+(curr+1)+'</a></li>').appendTo(pager);
        curr++;
    }
    
    if (settings.showPrevNext){
        $('<li><a href="#" class="next_link">»</a></li>').appendTo(pager);
    }
    
    pager.find('.page_link:first').addClass('active');
    pager.find('.prev_link').hide();
    if (numPages<=1) {
        pager.find('.next_link').hide();
    }
      pager.children().eq(1).addClass("active");
    
    children.hide();
    children.slice(0, perPage).show();
    
    pager.find('li .page_link').click(function(){
        var clickedPage = $(this).html().valueOf()-1;
        goTo(clickedPage,perPage);
        return false;
    });
    pager.find('li .prev_link').click(function(){
        previous();
        return false;
    });
    pager.find('li .next_link').click(function(){
        next();
        return false;
    });
    
    function previous(){
        var goToPage = parseInt(pager.data("curr")) - 1;
        goTo(goToPage);
    }
     
    function next(){
        goToPage = parseInt(pager.data("curr")) + 1;
        goTo(goToPage);
    }
    
    function goTo(page){
        var startAt = page * perPage,
            endOn = startAt + perPage;
        
        children.css('display','none').slice(startAt, endOn).show();
        
        if (page>=1) {
            pager.find('.prev_link').show();
        }
        else {
            pager.find('.prev_link').hide();
        }
        
        if (page<(numPages-1)) {
            pager.find('.next_link').show();
        }
        else {
            pager.find('.next_link').hide();
        }
        
        pager.data("curr",page);
      	pager.children().removeClass("active");
        pager.children().eq(page+1).addClass("active");
    
    }
};

$(document).ready(function(){
    
  $('#tablebody').pageMe({pagerSelector:'#myPager',showPrevNext:true,hidePageNumbers:false,perPage:7});
    
});
		
		
		</script>
		
		
</body>

</html>
