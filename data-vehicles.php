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


/* vehicles */
$vehicles = mysql_query("SELECT * FROM vehicle WHERE companyid = $companyid ORDER BY licenseplate ASC $limit_sql");
$vehiclesTotal = mysql_query("SELECT * FROM vehicle WHERE companyid = $companyid ORDER BY licenseplate ASC");
$total = mysql_num_rows($vehiclesTotal);
			
echo "<thead class=\"$total\"><tr><th scope=\"col\">License Plate</th><th scope=\"col\">Make</th><th scope=\"col\">Model</th><th scope=\"col\">M.O.T Due</th><th scope=\"col\">Service Due</th><th scope=\"col\">Known Issues</th><th scope=\"col\">Status</th><th scope=\"col\" class=\"edit-header\">Edit</th></tr></thead><tbody>";		
			
while($row = mysql_fetch_array($vehicles)) {
	
	//format the mot date
	$motdate =  new DateTime($row['motduedate']);			
	$motdateformatted = date_format($motdate, 'M j, Y');
	
	// format the service date
	$servicedate =  new DateTime($row['serviceduedate']);			
	$servicedateformatted = date_format($servicedate, 'M j, Y');

	echo "<tr class=". $row['id'] .">";
	echo "<td class=\"licenseplate\"><input class=\"disabled\" disabled=\"disabled\" type=\"text\" name=\"licenseplate\" value='". $row['licenseplate'] ."' /></td>";
	echo "<td class=\"make\"><input class=\"disabled\" disabled=\"disabled\" type=\"text\" name=\"make\" value='". $row['make'] ."' /></td>";
	echo "<td class=\"model\"><input class=\"disabled\" disabled=\"disabled\" type=\"text\" name=\"model\" value='". $row['model'] ."' /></td>";
	echo "<td class=\"mot-date\"><input class=\"disabled inline-mot-date\" disabled=\"disabled\" name=\"motduedate\" value='". $motdateformatted ."' /></td>";
	echo "<td class=\"service-date\"><input class=\"disabled inline-service-date\" disabled=\"disabled\" name=\"serviceduedate\" value='". $servicedateformatted ."' /></td>";
	echo "<td class=\"knownissues\"><input class=\"disabled\" disabled=\"disabled\" type=\"text\" name=\"knownissues\" value='". $row['knownissues'] ."' /></td>";
	echo "<td class=\"status\"><input class=\"disabled\" disabled=\"disabled\" type=\"text\" name=\"status\" value='". $row['status'] ."' /></td>";
	echo "<td class=\"edit\"><img class=\"edit\" src=\"/img/folder_edit.png\" title=\"edit\" alt=\"edit\" /></td>";
	echo "</tr>";
}		


echo "</tbody>";
			
			
?>