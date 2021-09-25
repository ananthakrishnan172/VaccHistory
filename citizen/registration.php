<?php
session_start();
include_once("dbConfig.php");
if(isset($_POST['Submit'])) 
{
    $email=$_SESSION['email'];
    $aadhar=$_POST['aadhar'];
    $gender =$_POST['gender'];
    $dob=$_POST['dob'];
    $address =$_POST['address'];
    $area =$_POST['area'];
    $state =$_POST['state'];
    $district =$_POST['district'];   
    $pincode =$_POST['pincode'];
    $phno =$_POST['phno'];   
    $insertquery="UPDATE citizendetails SET aadhar='$aadhar' ,gender='$gender',area='$area',dob='$dob',address='$address',area='$area',state='$state',district='$district',pincode='$pincode',phno='$phno' WHERE email='$email'";
    if(mysqli_query($mysqli,$insertquery)){
    
    header("location:myvaccines");
    echo"success.";
    }
    else
    echo"error";
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="Saurav">
<link href="css/bootstrap.min.css" rel="stylesheet">
<title>Registration</title>
<!-- Aadhar Styling -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body class="bg-light">
 <div class="container">
  <div class="py-5 text-center">
    <img class="d-block mx-auto mb-4" src="assets/images/loginicon.png" alt="" width="72" height="72">
    <h2>Registration Form</h2>
  </div>
 </div>

 
<div class="container">
  <div class="row">
    <div class="col-md-12">
    <form action="registration.php" method="post" name="form1"> 


    <div class="form-group">
		    	<label for="exampleInputAadharCard">Aadhar Card No.</label>
		    	<input type="text" class="form-control" id="exampleInputAadharCard" placeholder="Enter Your Aadhar Card No." name="aadhar">
		    	<small id="message" class="form-text text-muted"></small>
		</div>
		  	<button type="button" class="btn btn-primary" onclick="verify()">Verify</button>


    <div class="form_group">
      <br><label>Gender </label>
      <br>
      <input type="radio" name="gender" value="male"> Male
      <input type="radio" name="gender" value="female"> Female
      <input type="radio" name="gender" value="other"> Other
    </div>

    
    <div class="form_group">					
					<br><label>Date Of Birth </label>		
          <input id="datefield" type='date' name="dob" class="form-control"  placeholder="Select date of birth" required></input>	
		</div>         


  <div class="form-group">
    <label for="exampleInputPassword1">Address </label>
    <input type="text" class="form-control" name="address" id="address" placeholder="Enter your address" required>
    <small class="form-text text-muted">Permanent Address</small>
  </div>


  <div class="form-group">
    <label for="exampleInputPassword1">Area/Locality </label>
    <input type="text" class="form-control" name="area"; id="address" placeholder="Enter your area/locality" required>    
  </div>


  <div class="row">
          <div class="col-md-5 mb-3">
            <label for="country">State</label>
            <select class="custom-select d-block w-100" name="state" id="country" required>
              <option value="">Choose...</option>
              <option>Kerala</option>
              <option>TamilNadu</option>
              <option>Goa</option>
              <option>Jammu</option>
            </select>
            <div class="invalid-feedback">
              Please select a valid country.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="state">Distict</label>
            <input type="text" class="form-control" name="district" id="firstName" placeholder="Enter your District" required>
          </div>
          <div class="col-md-3 mb-3">
            <label for="zip">Pincode</label>
            <input type="text" class="form-control" name="pincode" id="zip" placeholder="" required>
            <div class="invalid-feedback">
              Zip code required.
            </div>
          </div>
   </div>


  <div class="form-group">
    <label for="exampleInputEmail1" style="color:black">Phone </label>
    <input type="text" class="form-control" name="phno"; id="address" placeholder="Enter phone number" required>
  </div>    

      
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        I accept and agree all the terms and conditions hereby
      </label>
    </div>
  </div>
  
  
<hr class="mb-4">
  <button type="submit" name="Submit" class="btn btn-primary btn-lg btn-block">Submit</button>
  </form>
    </div>
  </div>
  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2020-2021 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
  </div>

  <script>
    var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("datefield").setAttribute("max", today);
    </script>

  <!-- Verhoeff algorithm  -->
  <script type="text/javascript">
	// multiplication table
	const d = [
	    [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
	    [1, 2, 3, 4, 0, 6, 7, 8, 9, 5],
	    [2, 3, 4, 0, 1, 7, 8, 9, 5, 6],
	    [3, 4, 0, 1, 2, 8, 9, 5, 6, 7],
	    [4, 0, 1, 2, 3, 9, 5, 6, 7, 8],
	    [5, 9, 8, 7, 6, 0, 4, 3, 2, 1],
	    [6, 5, 9, 8, 7, 1, 0, 4, 3, 2],
	    [7, 6, 5, 9, 8, 2, 1, 0, 4, 3],
	    [8, 7, 6, 5, 9, 3, 2, 1, 0, 4],
	    [9, 8, 7, 6, 5, 4, 3, 2, 1, 0]
	]

	// permutation table
	const p = [
	    [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
	    [1, 5, 7, 6, 2, 8, 3, 0, 9, 4],
	    [5, 8, 0, 3, 7, 9, 6, 1, 4, 2],
	    [8, 9, 1, 6, 0, 4, 3, 5, 2, 7],
	    [9, 4, 5, 3, 1, 2, 6, 8, 7, 0],
	    [4, 2, 8, 6, 5, 7, 3, 9, 0, 1],
	    [2, 7, 9, 3, 8, 0, 6, 4, 1, 5],
	    [7, 0, 4, 6, 9, 1, 3, 2, 5, 8]
	]

	// validates Aadhar number received as string
	function validate(aadharNumber) {
	    let c = 0
	    let invertedArray = aadharNumber.split('').map(Number).reverse()

	    invertedArray.forEach((val, i) => {
	        c = d[c][p[(i % 8)][val]]
	    })

	    return (c === 0)
	}

	function verify() {
		var message = document.getElementById("message");
		var aadharNo = document.getElementById("exampleInputAadharCard").value;
		if(validate(aadharNo)) {
			message.innerHTML = 'Your aadhar card no. valid';
		} else {
			message.innerHTML = 'Your aadhar card no. not valid';
		}
	}
	</script>


</body>
</html>
