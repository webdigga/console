<?

session_start();
include('dbconnect.php');

$sessuser = $_SESSION['username'];
$companyidresult = mysql_query("SELECT companyid FROM users WHERE username = '$sessuser'");

while($row = mysql_fetch_array($companyidresult)) {
	$companyid = $row['companyid'];
}

$per_page = 10;
$page=1;
if(isset($_GET['page']))
    $page = $_GET['page'];
$start = ($page-1)*$per_page;

$limit_sql = " LIMIT ".$start.",".$per_page;


// get accident details
$drivers = mysql_query("SELECT * FROM driver WHERE companyid = $companyid ORDER BY name ASC $limit_sql");
$driversTotal = mysql_query("SELECT * FROM driver WHERE companyid = $companyid ORDER BY name ASC");
$total = mysql_num_rows($driversTotal);


echo "<thead class=\"$total\"><tr><th scope=\"col\">Name</th><th scope=\"col\">Phone Number</th><th scope=\"col\">Status</th><th scope=\"col\">Edit</th></tr></thead><tbody>";	
			
while($row = mysql_fetch_array($drivers)) {			
	echo "<tr class=". $row['id'] .">";
	echo "<td class=\"name\"><input class=\"disabled\" disabled=\"disabled\" type=\"text\" name=\"name\" value='". $row['name'] ."' /></td>";
	echo "<td class=\"phonenumber\"><input class=\"disabled\" disabled=\"disabled\" type=\"text\" name=\"phonenumber\" value='". $row['phonenumber'] ."' /></td>";
	echo "<td class=\"status\"><input class=\"disabled\" disabled=\"disabled\" type=\"text\" name=\"status\" value='". $row['status'] ."' /></td>";
	echo "<td class=\"edit\"><img class=\"edit\" src=\"/img/folder_edit.png\" title=\"edit\" alt=\"edit\" /></td>";			
	echo "</tr>";
}		

echo "</tbody>";
			
?>