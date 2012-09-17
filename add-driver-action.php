<?

include('dbconnect.php');
session_start();
$sessuser = $_SESSION['username'];

/* companyid */
$companyidresult = mysql_query("SELECT companyid FROM users WHERE username = '$sessuser'");
while($row = mysql_fetch_array($companyidresult)) {
	$companyid = $row['companyid'];
}

if(mysql_num_rows(mysql_query("SELECT * from driver WHERE name='" . $_POST['name'] . "'")) == 1){
   header("location:add-driver.php?nav=drivers&error=1");   
} else if(strlen($_POST['name']) < 1) {
   header("location:add-driver.php?nav=drivers&error=2");  
} else if(strlen($_POST['phonenumber']) < 11) {
   header("location:add-driver.php?nav=drivers&error=3");
} else {
	// insert driver details
	mysql_query("INSERT INTO driver (name, phonenumber, status, companyid) VALUES ('".$_POST['name']."', '".$_POST['phonenumber']."', 'Active', '$companyid')") or die(mysql_error());	
	header("location:add-driver.php?nav=drivers&error=4");
}
?>