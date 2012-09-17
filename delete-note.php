<?

include('dbconnect.php');

//print_r($_POST);

// insert the note for the relevant accident
mysql_query("DELETE FROM actionentry WHERE id = '".$_POST['noteid']."'");

?>