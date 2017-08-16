<?php
    session_start();
    if($_SESSION['user']=="" || $_SESSION['role'] != 1 && $_SESSION['role'] != 2 && $_SESSION['role'] != 3 && $_SESSION['role'] != 4){
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
$title = $DC =  "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
$title = $_POST['title'];
if($_SESSION['role'] == 1){
                                            $DC="Commercial Data Center Lahore";
                                        }else if ($_SESSION['role'] == 2){  
                                                $DC="IT Data Center Islamabad";
                                              }else if($_SESSION['role'] == 3){
                                                  $DC="Commercial Data Center Karachi";
                                                    }else if($_SESSION['role'] == 4){
                                                        $DC="IT Data Center Karachi";
                                                            }

$target_dir = "uploadsinternal/";
$target_file = $target_dir. $_SESSION['role']."_".basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


date_default_timezone_set("Asia/Karachi");

$requestDate = date("Y/m/d");

$actualname=basename( $_FILES["fileToUpload"]["name"]);
$actualname=$_SESSION['role']."_".$actualname;
        
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {

        $uploadOk = 1;
   
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "pdf"  ) {
    echo "Sorry, PDF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        
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
        $sql = "SELECT * FROM users WHERE id='".$_SESSION['id']."'";
                                        $result = $conn->query($sql);
                                        
                                        if(!empty($result)){
                                            
                                            if($result->num_rows > 0 ){

                                                while($row = $result->fetch_assoc()){ 
                                                        $sql = "INSERT INTO internaldocuments (dcid, date , file , title) VALUES('".$DC."', '".$requestDate."', '".$actualname."' , '".$title."')";
                                                            if($conn->query($sql)===TRUE){
                                                                 echo "
                                                                <script type=\"text/javascript\">
                                                                alert(\"Request Generated Successfully\");
                                                                </script>
                                                            ";
                                                
                                                }
                                                else{
                                                     echo "
                                                                <script type=\"text/javascript\">
                                                                alert(\"Failed\");
                                                                </script>
                                                            ";
                                                }
                                            }
                                        }    
        
        
        // header("Location: dcinternaldocuments.php");
        // exit();
        
        }
        else {
            print_r( "Error: " . $sql . "<br>" . $conn->error); exit();
        }

        $conn -> close();
        
        
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
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
                      <li >
                        <a href="dcDashboard.php"><i class="fa fa-fw fa-table"></i> Dashboard</a>
                    </li >
                    
                    <li>
                        <a href="img/<?php echo  $_SESSION['role']?>.jpg"><i class="fa fa-fw fa-building-o"></i> Space Utilized</a>
                    </li>
                    <li>
                        <a href="dcdocuments.php"><i class="fa fa-fw fa-newspaper-o"></i> Shared Documents</a>
                    </li>
                    <li  class="active">
                        <a href="dcinternaldocuments.php"><i class="fa fa-fw fa-newspaper-o"></i> Internal Documents</a>
                    </li>
                    <li>
                        <a href="cost.php"><i class="fa fa-fw fa-usd"></i> Cost</a>
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
                                <i class="fa fa-dashboard"></i>  <a href="dcDashboard.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Status Report
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

				<div class="row">
				
						<div class="col-lg-12">
						
						<form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
								  <div class="form-group" >
									<input type="text" class="form-control" name="title" id="filename" placeholder="Enter File Name" required>
								  </div>
								  
								  <div class="form-group">
									<input type="file" name="fileToUpload" id="fileToUpload">
								  </div>
								
								  <input type="submit" value="Upload File" name="submit">
						</form>
						
											
						</div>
				</div>
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Documents</h2>
					
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="requests">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Data Center</th>
                                        <th>Submission Date</th>
                                        <th>File</th>
                                        <th>Title</th>
										<th>comments</th>
                                        <th>View</th>
										<th>Delete</th>
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
										 echo $_SESSION['id'] ;
                                        $sql = "SELECT * FROM internaldocuments";
                                        $result = $conn->query($sql);
										
										if(!empty($result)){
											if($result->num_rows > 0 ){
												while($row = $result->fetch_assoc()){ ?>
														<tr>
															<td><?php echo $row["id"] ?></td>
                                                            <td><?php echo $row["dcid"] ?></td>
                                                            <td><?php echo $row["date"] ?></td>
                                                            <td><?php echo $row["file"] ?></td>
                                                            <td><?php echo $row["title"] ?></td>
															<td><?php echo $row["comments"] ?></td>
                                                           
                                                            <td><a class="btn btn-default btn-sm" href="<?php echo "uploads/".$row["file"] ?> ">View</a></td>
															<td><a href="javascript:removeRow(' <?php echo $row["id"] ?> ', '<?php echo $row["file"] ?>  ');" class="btn btn-default btn-sm">Delete</a></td>
                                                    
														</tr>
												<?php
												}
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
			function removeRow(id,file) {
			
				$.post('deletedoc.php',{postid:id, filename:file}, function(data){
					
					$( "#requests" ).load( "documents.php #requests" );
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
