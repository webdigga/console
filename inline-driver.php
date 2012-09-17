<?

include('dbconnect.php');

//print_r($_POST);

// update the database for the relevant vehicle
mysql_query("UPDATE driver SET name = '".$_POST['name']."', phonenumber = '".$_POST['phonenumber']."', status = '".$_POST['status']."' WHERE id = '".$_POST['driverid']."'") or die(mysql_error());


?>