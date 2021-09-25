<?php
session_start();
include_once("dbConfig.php");
if(isset($_POST['submit'])) 
{
  
        $email=$_POST['email'];
        $password=$_POST['password']  ;
        $sql="SELECT email, password FROM citizendetails WHERE email='$email'";
        $result = mysqli_query($mysqli,$sql);
        if(mysqli_num_rows($result)>0)
        { 
            $row=mysqli_fetch_assoc($result);
            $e=$row["email"];
            $p=$row["password"];
            if($email==$e)
            {
                if($password==$p)
                {                  
                    $_SESSION['a']=10;
                    $_SESSION['email'] = $email;
                    header('location:myvaccines.php');
                }
                else 
                {
                  echo'<script> alert("Invalid password")</script>';
                 
                }                    
            }
            else
            echo'<script> alert("Invalid username")</script>';
           
        }
}
?>


<html>   
   <head>


   <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">


  <title>Login Page</title>
            
      
   </head>
   
   <body >
	

   <main>
    <div class="container-fluid">
        
      <div class="row">
        <div class="col-sm-6 login-section-wrapper my-col">
          <div class="brand-wrapper my-col" style="align-self: start;" >
            <img src="assets/images/loginicon.png" style="height: 100px; width:100px;" id="log" alt="logo" class="logo">
          </div>
          <div class="login-wrapper my-auto" style="padding-top: 0px;">
            <h1 class="login-title">Log in</h1>


            <form action = "" method = "post">
              <div class="form-group">
                <label style="color:black;" for="email" >Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your Email ">
              </div>
              <div class="form-group mb-4" >
                <label style="color:black;" for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your passsword">
              </div>
              <input name="submit" id="login" class="btn btn-block login-btn" type="submit" value="Login">
            </form>


            <a href="#!" class="forgot-password-link">Forgot password?</a>
            <p class="login-wrapper-footer-text">Don't have an account? <a href="http://localhost/vacchistory/citizen/signup.php" class="text-reset">Register here</a></p>
          </div>
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="assets/images/citizenlogin.jpg" alt="login image" class="login-img">
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


   </body>
</html>