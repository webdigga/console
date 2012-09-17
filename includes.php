<?

include('/head.html');
include('/admin.php');

if(isset($_SESSION["username"])) {
	$sessuser = $_SESSION['username'];

	/* companyid */
	$companyidresult = mysql_query("SELECT companyid FROM users WHERE username = '$sessuser'");
	while($row = mysql_fetch_array($companyidresult)) {
		$companyid = $row['companyid'];
	}
}

?>