<?php 
	include_once("dbConfig.php");
	session_start();
	require "includes/functions.php";
	require "includes/db.php";
    if(!isset($_SESSION['username'])) {
        header("location: logout.php");
    }

    if(isset($_POST['submit'])) 
    {
        $vaccname=$_POST['vaccname'];
        $age =$_POST['age'];
        $insertquery="INSERT INTO vaccinedetails(vaccname,age)
        VALUES ('$vaccname','$age');";
        if(mysqli_query($mysqli,$insertquery))
        echo"success.";
        else
        echo"Not Success";
    }
	
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Admin's Panel</title>

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

<div class="wrapper">
    <div class="sidebar" data-color="#000" data-image="assets/img/sidebar-5.jpg">
    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->
    	<?php require "includes/side_wrapper.php"; ?>
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed" style="background: #000;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar" style="background: #fff;"></span>
                        <span class="icon-bar" style="background: #fff;"></span>
                        <span class="icon-bar" style="background: #fff;"></span>
                    </button>
                    <a class="navbar-brand" href="#" style="color: #fff;">DASHBOARD</a>
                </div>

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="logout.php" style="color: #fff;">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>




        <div class="container " style="margin-top: 5rem;">
        <form action="" method="post">
    <div class="form-group ">
    
  
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Vaccine name</label>
      <input type="phno" name="vaccname" class="form-control" id="inputEmail4" placeholder="Vaccine name">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Age</label>
      <input type="pincode" name="age" class="form-control" id="inputPassword4" placeholder="Age">
      <small id="passwordHelpInline" class="text-muted">Enter the age in months(Optional)</small>
    </div>
  </div>
  
  <button type="submit" name="submit" class="btn btn-secondary">Submit</button>

</form>
</div>
      

        <footer class="footer">
            <div class="container-fluid">                
                <p class="copyright pull-right">
                    &copy; 2021 <a href="dashboard.php" style="color: #000;">Admin</a>
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>
	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>
    <!--  Google Maps Plugin    -->

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    	<script src="assets/js/light-bootstrap-dashboard.js"></script>
	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>
	
	<script type="text/javascript">
    	$(document).ready(function(){			
			/*notice = $("#notify").val();			
			//alert(notice);			
        	demo.initChartist();
        	$.notify({
            	icon: 'pe-7s-gift',
            	message: notice
            },{
                type: 'danger',
                timer: 7000
            });
    	});*/
	</script>
</html>
