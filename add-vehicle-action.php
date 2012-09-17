<?

include('dbconnect.php');
session_start();
$sessuser = $_SESSION['username'];

/* companyid */
$companyidresult = mysql_query("SELECT companyid FROM users WHERE username = '$sessuser'");
while($row = mysql_fetch_array($companyidresult)) {
	$companyid = $row['companyid'];
}

if(mysql_num_rows(mysql_query("SELECT * from vehicle WHERE licenseplate='" . $_POST['licenseplate'] . "'")) == 1){
   header("location:add-vehicle.php?nav=vehicles&error=1");   
} else if(strlen($_POST['licenseplate']) < 1) {
   header("location:add-vehicle.php?nav=vehicles&error=2");  
} else if(strlen($_POST['make']) < 1) {
   header("location:add-vehicle.php?nav=vehicles&error=3");
}else if(strlen($_POST['model']) < 1) {
   header("location:add-vehicle.php?nav=vehicles&error=4");
}else if(strlen($_POST['mot-date']) < 1) {
   header("location:add-vehicle.php?nav=vehicles&error=6");
}else if(strlen($_POST['service-date']) < 1) {
   header("location:add-vehicle.php?nav=vehicles&error=7");   
} else {
	// insert vehicle details
	mysql_query("INSERT INTO vehicle (licenseplate, make, model, status, companyid, motduedate, serviceduedate, knownissues) VALUES ('".$_POST['licenseplate']."', '".$_POST['make']."', '".$_POST['model']."', 'Active','$companyid', '".$_POST['mot-date']."', '".$_POST['service-date']."', '".$_POST['knownissues']."')") or die(mysql_error());	
	header("location:add-vehicle.php?nav=vehicles&error=5");
}
?>