<?

include('dbconnect.php');
session_start();
$sessuser = $_SESSION['username'];

/* companyid */
$companyidresult = mysql_query("SELECT companyid FROM users WHERE username = '$sessuser'");
while($row = mysql_fetch_array($companyidresult)) {
	$companyid = $row['companyid'];
}

if(mysql_num_rows(mysql_query("SELECT * from driver WHERE username ='" . $_POST['username'] . "'")) == 1){
   header("location:add-driver.php?nav=drivers&error=1");   
} else if(strlen($_POST['name']) < 1) {
   header("location:add-driver.php?nav=drivers&error=2");  
} else if(strlen($_POST['phonenumber']) < 11) {
   header("location:add-driver.php?nav=drivers&error=3");
} else if($_POST['password'] != $_POST['retype-password']){
   header("location:add-driver.php?nav=drivers&error=5");
} else if(strlen($_POST['username']) > 15){
   header("location:add-driver.php?nav=drivers&error=6");
} else if(strlen($_POST['username']) < 6){
   header("location:add-driver.php?nav=drivers&error=7");
} else if(strlen($_POST['password']) > 15){
   header("location:add-driver.php?nav=drivers&error=8");
} else if(strlen($_POST['password']) < 6){
   header("location:add-driver.php?nav=drivers&error=9");
} else if(preg_match('/[^0-9A-Za-z]/',$_POST['username'])){
   header("location:add-driver.php?nav=drivers&error=10");
} else if(preg_match('/[^0-9A-Za-z]/',$_POST['password'])){
   header("location:add-driver.php?nav=drivers&error=11");
} else {
	// insert driver details
	mysql_query("INSERT INTO driver (name, phonenumber, status, companyid, username, password) VALUES ('".$_POST['name']."', '".$_POST['phonenumber']."', 'Active', '$companyid', '".$_POST['username']."', '".$_POST['password']."')") or die(mysql_error());	
	header("location:add-driver.php?nav=drivers&error=4");
}
?>