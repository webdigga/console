<?

include('dbconnect.php');

//print_r($_POST);

// format dates
$newMotDate = date("Y-m-d", strtotime($_POST['motduedate'])); 
$newServiceDate = date("Y-m-d", strtotime($_POST['serviceduedate']));

// update the database for the relevant vehicle
mysql_query("UPDATE vehicle SET licenseplate = '".$_POST['licenseplate']."', make = '".$_POST['make']."', model = '".$_POST['model']."', status = '".$_POST['status']."', motduedate = '".$newMotDate."', serviceduedate = '".$newServiceDate."', knownissues = '".$_POST['knownissues']."' WHERE id = '".$_POST['accidentid']."'") or die(mysql_error());


?>