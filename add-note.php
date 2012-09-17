<?

include('dbconnect.php');

//print_r($_POST);

// format date
$newNoteDate = date("Y-m-d", strtotime($_POST['notedate']));

// grab the further action id for the accident
$furtheractionidselect = mysql_query("SELECT id FROM furtheraction WHERE accidentid = ".$_POST['accidentid']);
while ($furtheractionid = mysql_fetch_array($furtheractionidselect)) {
	$faid = $furtheractionid['id'];
}

// insert the note for the relevant accident
mysql_query("INSERT INTO actionentry (furtheractionid, date, notes) VALUES ('".$faid."', '".$newNoteDate."', '".$_POST['note']."')");
$noteId = mysql_insert_id();

echo $noteId;


?>