<?

include('dbconnect.php');


$newstatus = $_POST["status"];
$accidentid = $_POST["fa"];

//echo $newstatus;
//echo $accidentid;

// insert the note for the relevant accident
mysql_query("UPDATE furtheraction SET statusid = ".$newstatus." WHERE accidentid = ".$accidentid);


?>