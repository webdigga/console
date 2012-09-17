<?

include('dbconnect.php');

//print_r($_POST);

// insert the note for the relevant accident
mysql_query("UPDATE actionentry SET notes = '".$_POST['note']."' WHERE id = '".$_POST['noteid']."'");

?>