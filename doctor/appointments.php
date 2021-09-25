<?php 
	include_once("dbconfig.php");
	session_start();
	require "includes/functions.php";
	require "includes/db.php";
    if(!isset($_SESSION['email'])) {
        header("location: logout.php");
    }
    $e=$_SESSION['email'];
    echo "$e";
    $result=$mysqli->query("select * from appointments where demail='$e'");

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Doctor's Panel</title>

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
    <div class="sidebar" data-color="#000" data-image="assets/images/sidebar.jpg">

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
                    <a class="navbar-brand" href="#" style="color: #fff;">Appointments</a>
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



        <div class="container-fluid">
                                <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scopr="col">Email</th>
                                        <th scope="col">Vaccine</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Time</th>
                                        <th colspan="2">Approve</th>
                                        </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                <!----begin loop to display result-->
                                <?php
                                            while ($row= $result->fetch_assoc()): ?>
                                        <tr>
                                        <td><?php echo $row['cname'] ?></td>                                        
                                        <td><?php echo $row['cemail'] ?></td>
                                        <td><?php echo $row['vaccname'] ?></td>
                                        <td><input type="hidden" value="<?php echo $row['date'] ?>">
                                            <?php echo $row['date'] ?></td>
                                        <td><?php echo $row['time'] ?></td>
                                        <td>
                                                <button name="book" class="btn btn-success" value="<?php echo $row['demail']?>">Approve</button>
                                        </td>
                                        <td>
                                                <button name="book" class="btn btn-danger" value="<?php echo $row['demail']?>">Reject</button>
                                        </td>
                                        </tr>
                                        <?php endwhile; ?>
                                <!--------------------loop ends-------------->
                                </tbody>
                                </table>
                            </div>


      

        <footer class="footer">
            <div class="container-fluid">
                
                <p class="copyright pull-right">
                    &copy; 2021 <a href="dashboard.php" style="color: #000;">Doctor</a>
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
