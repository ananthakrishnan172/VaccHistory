<?php 
    // Include the database config file 
	include_once 'dbConfig.php';

	// Get country id through state name

    $district = $_POST['district'];

    if (!empty($district)) {
	// Fetch state name base on country id
	$query = "SELECT * FROM hospitaldetails WHERE district = '$district'";
	$result = $mysqli->query($query);
	if ($result->num_rows > 0) {
 	   while ($row = $result->fetch_assoc()) {
	        echo '<option value="'.$row['id'].'">'.$row['name'].'</option>'; 
 	    }
	}else{
	    echo '<option value="">Hospital not available</option>'; 
	}
	}
    ?>