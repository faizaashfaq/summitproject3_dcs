<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>PTCL Data Center</title>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
		
		<!-- custome css -->
		<link rel="stylesheet" href="css/login.css">
		<!-- bootstrap css -->
		<link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		
			<style>
    select:invalid { color: gray; }
</style>    
		<style>
		.panel-login {
	border-color: #ccc;
	-webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	-moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
}
.panel-login>.panel-heading {
	color: #00415d;
	background-color: #fff;
	border-color: #fff;
	text-align:center;
}
.panel-login>.panel-heading a{
	text-decoration: none;
	color: #666;
	font-weight: bold;
	font-size: 15px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login>.panel-heading a.active{
	color: #029f5b;
	font-size: 18px;
}
.panel-login>.panel-heading hr{
	margin-top: 10px;
	margin-bottom: 0px;
	clear: both;
	border: 0;
	height: 1px;
	background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
	background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
}
.panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
	height: 45px;
	border: 1px solid #ddd;
	font-size: 16px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login input:hover{
	outline:none;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
	border-color: #ccc;
}
.panel-login input:focus {
	outline:none;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
	border-color: #66afe9;
}
.btn-login {
	background-color: #006b3e;
	outline: none;
	color: #fff;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 14px 0;
	text-transform: uppercase;
	border-color: #006b3e;
}
.btn-login:hover,
.btn-login:focus {
	color: #fff;
	background-color: #048c53;
	border-color: #048c53;
}
.forgot-password {
	text-decoration: underline;
	color: #888;
}
.forgot-password:hover,
.forgot-password:focus {
	text-decoration: underline;
	color: #666;
}
</style>
    </head>
    <body>


    <?php 
    	$username = $password =  ""; //initializing variable

    	if($_SERVER["REQUEST_METHOD"] == "POST"){
    		session_start();
    		$_SESSION['user'] = "";
    		$username = $_POST["username"]; //inserting values into variable from form
    		$password = $_POST["password"]; //inserting values into variable from form

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

	    	$sql = "SELECT ID, email, pwd, Name , role FROM users"; //query
	    	$result = $conn->query($sql);

	    	if($result->num_rows > 0){
	    		while ($row = $result->fetch_assoc()) {
	    			// echo "id:". $row["ID"]. "-Username: ".$row["username"]. "-Password: ".$row["password"]. "-Name: ".$row["name"];
	    			if($username == $row["email"]){
	    				echo "Username Successful";
						echo $row["pwd"];
						echo $password;
	    				if ($password == $row["pwd"]) {
							if($row["role"]==0){
	    					$_SESSION['user'] = $row["Name"];
	    					header("Location: customerDashboard.php"); //to the customer dashboard
	    					exit();
							}
							
							else if ($row["role"]==1 || $row["role"]==2 || $row["role"]==3  ||$row["role"]==4 ){
	    					$_SESSION['user'] = $row["Name"];
	    					header("Location: dcDashboard.php"); //to the datacenter dashboard
	    					exit();
							}
							else if($row["role"]==5){
	    					$_SESSION['user'] = $row["Name"];
	    					header("Location: corporateDashboard.php"); //to the KAM dashboard
	    					exit();
							}
							
	    				}
	    				else{
	    					echo "Password Incorrect";
	    				}
	    			}
	    			else {
	    				echo "Username Incorrect";
	    			}
	    		}
	    	}
	    	else{
	    		echo "0 results";
	    	}
	    	$conn->close();
	    }
     ?>
	

	<div class="container">
	<!-- logo -->
	<div class="col-md-2 col-xs-3 col-sm-3" >
    <img src="img/ptcllogo.png" class="img-responsive" >
	</div>
	<!-- logo End -->
	
	<!-- Heading -->
	<div class="col-md-8 col-xs-8 col-sm-8">
	<h1 style="text-align: -webkit-center;" class="h1font"> PTCL Data Centers </h1>
	</div>
	
	
	<!-- Heading End -->
	
	
	<!-- signup-->
	
		<div class="row">
			<div class="col-md-6 col-md-offset-1">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-12">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
						
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form"  method="post" role="form" style="display: block;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>";">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="" required>
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required>
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	<!-- signup end-->
	
	
	
	 </div>
	 <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	 
	 <script type="text/javascript" src="js/login.js"></script>

    </body>
</html>