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

if(isset($_GET['driver']) && ($_GET['driver']!='')) {
    $driver = $_GET['driver'];
	$driver_sql = "dr.id IN(".$driver.")";	
} else {
	$driver_sql = "";
}

if(isset($_GET['vehicle']) && ($_GET['vehicle']!='')) {
    $vehicle = $_GET['vehicle'];
	$vehicle_sql = "acc.vehiclelicenseplate IN(".$vehicle.")";	
} else {
	$vehicle_sql = "";
}

$limit_sql = " LIMIT ".$start.",".$per_page;

if( $driver_sql === "" && $vehicle_sql !== "") {
	$print_sql = " AND ".$vehicle_sql;
} else if ($driver_sql !== "" && $vehicle_sql === "") {
	$print_sql = " AND ".$driver_sql;
} else if ($driver_sql !== "" && $vehicle_sql !== "") {
	$print_sql = " AND (".$driver_sql." OR ".$vehicle_sql." )";
} else {
	$print_sql = "";	
}

// get accident details
$accidents = mysql_query("SELECT SQL_CALC_FOUND_ROWS *, tp.id as tpid, dr.name as drivername, tp.name as tpname, acc.vehiclelicenseplate, acc.thirdpartylicenseplate, acc.location, acc.description, acc.companyid, acc.driverid, acc.date, acc.id, fa.accidentid as faaccid, fa.statusid as statusid, fa.id as faid FROM accident acc INNER JOIN driver dr ON acc.driverid = dr.id INNER JOIN thirdparty tp ON acc.thirdpartyid = tp.id INNER JOIN furtheraction fa ON fa.accidentid = acc.id  WHERE acc.companyid = $companyid $print_sql ORDER BY acc.id DESC $limit_sql");

$accidentsCount = mysql_query("SELECT SQL_CALC_FOUND_ROWS *, tp.id as tpid, dr.name as drivername, tp.name as tpname, acc.vehiclelicenseplate, acc.thirdpartylicenseplate, acc.location, acc.description, acc.companyid, acc.driverid, acc.date, acc.id FROM accident acc INNER JOIN driver dr ON acc.driverid = dr.id INNER JOIN thirdparty tp ON acc.thirdpartyid = tp.id WHERE acc.companyid = $companyid $print_sql ORDER BY acc.id");

$total = mysql_num_rows($accidentsCount);





echo "<thead class=\"$total\"><tr><th scope=\"col\">Id</th><th class=\"{sorter: 'date'}\">Date</th><th scope=\"col\">Images</th><th scope=\"col\">Driver Name</th><th scope=\"col\">TP Name</th><th scope=\"col\">License Plate</th><th scope=\"col\">TP License Plate</th><th scope=\"col\">Location</th><th scope=\"col\">Description</th><th scope=\"col\">Further Action</th></tr></thead><tbody>";

while($accidentrow = mysql_fetch_array($accidents)) {			
	$dateTime =  new DateTime($accidentrow['date']);
	$dateTimeFormatted = date_format($dateTime, 'M j, Y h:i A');
	
	// get image for furtheraction
	switch ($accidentrow['statusid']) {		
		case "1":
			$entryCountCheckSql = mysql_query("SELECT * FROM actionentry WHERE '".$accidentrow['faid']."' = furtheractionid");
			$count = mysql_num_rows($entryCountCheckSql);
			
			if($count===0) {
				$faImg = "<img src=\"/img/note_add.png\" />";
			} else {
				$faImg = "<img src=\"/img/exclamation.png\" />";
			}
		break;
		
		case "2":		
			$faImg = "<img src=\"/img/lock.png\" />";
		break;
		default:
			$faImg = "<img src=\"/img/note_add.png\" />";
		break;	
	}	
	
	echo "<tr class=\"accident-row driver".$accidentrow['driverid']." ".$accidentrow['vehiclelicenseplate']."\"><td>".$accidentrow['id']."</td><td>".$dateTimeFormatted."</td><td class=\"camera\"><a href=\"/images.php?nav=accidents&accidentid=".$accidentrow['id']."\"><img src=\"/img/camera_go.png\" /></a></td><td>". $accidentrow['drivername'] ."</td><td><a href=\"/third-parties.php?nav=accidents&tpid=".$accidentrow['tpid']."\">". $accidentrow['tpname'] ."</a></td><td>". $accidentrow['vehiclelicenseplate'] ."</td><td>". $accidentrow['thirdpartylicenseplate'] ."</td><td class=\"map\"><a href=\"/map.php?nav=accidents&longlat=".$accidentrow['location']."\"><img src=\"/img/map_magnify.png\" /></a></td><td class=\"description\">". $accidentrow['description'] ."</td><td class=\"fa-img\"><a href=\"/further-action.php?nav=accidents&fa=".$accidentrow['faaccid']."\">". $faImg ."</a></td></tr>";
}
echo "</tbody>";