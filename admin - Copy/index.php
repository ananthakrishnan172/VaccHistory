<?php 
	include_once("dbConfig.php");
	session_start();
	require "includes/db.php";
	require "includes/functions.php";
    // if(isset($_SESSION['user'])) {
    //     header("location: food_list.php");
    // }
	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		if(isset($_POST['submit'])){ 
			

	    $username=$_POST['username'];
        $password=$_POST['password'];
        $sql="SELECT username, password FROM adminauthentication WHERE username='$username'";
        $result = mysqli_query($mysqli,$sql);
        if(mysqli_num_rows($result)>0)
        { 
            $row=mysqli_fetch_assoc($result);
            $u=$row["username"];
            $p=$row["password"];
            if($username==$u)
            {
                if($password==$u)
                {
                  
                    $_SESSION['a']=10;
                    $_SESSION['username'] = $username;
                    header('location:dashboard.php');
                }
                else 
                {
                  echo'<script> alert("passw")</script>';
                  $invalid = 'Invalid password';
                }
                    
            }
            else
            $invalid = 'Invalid username';
        }

						
		}
		
	}
	
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Unique Restaurant</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
	
	<link href="assets/css/style.css" rel="stylesheet" />
	
</head>
<body>

<div class="login_wrapper">
	
	<div class="login_holder">
			
		<form method="post" action="index.php">
			
			<div class="header">
				<h4 style="border-bottom: 1px solid #FF5722;" class="title">Login Form</h4>
			</div>
			
			<div class="form-group" method="post" action="#">
				<label>Username</label>
				<input type="text" name="username" class="form-control" placeholder="Enter Username" autofocus>
			</div>
			
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control" placeholder="Enter your password">
			</div>
			
			<!--<p><a style="color: #FF5722;" href="register.php">No account yet! Click Here to register</a></p>-->
			
			<input type="submit" name="submit" value="Login" class="btn btn-info btn-fill pull-right" style="background: #FF5722; border-color: #FF5722;" />
			<div class="clearfix"></div>
			
		</form>
		
	</div>
	
</div>

</body>

</html>