<?
// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=appcident-report.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('ID', 'Date / Time', 'Driver Name', 'Third Party Name', 'License Plate', 'Third Party License Plate'), ';');

session_start();
include 'dbconnect.php';

//get the dates
$dateFrom = $_POST['dateFrom'];
$dateTo = $_POST['dateTo'];

// transform the dates - 2012-04-10 20:45:34
$dateFrom =  new DateTime($dateFrom);	
$dateFromTrans = date_format($dateFrom, 'Y-m-d 00:00:01');
$dateTo =  new DateTime($dateTo);	
$dateToTrans = date_format($dateTo, 'Y-m-d 23:59:59');

// make sql
$dateSql = "AND date BETWEEN '".$dateFromTrans."' AND '".$dateToTrans."'";

// get the company which the current user is tied to
$sessuser = $_SESSION['username'];
$companyidresult = mysql_query("SELECT companyid FROM users WHERE username = '$sessuser'");

// get the company id
while($row = mysql_fetch_array($companyidresult)) {
	$companyid = $row['companyid'];
}

$getCompanyName = mysql_query("SELECT name FROM company WHERE id = '".$companyid."'");
while ($companyName = mysql_fetch_array($getCompanyName)) {
	$companyNameValue = $companyName['name'];
}

// get accident details
$accidents = mysql_query("SELECT acc.id as id, acc.date as date, dr.name as drivername, tp.name as tpname, acc.vehiclelicenseplate as vehicleplate, acc.thirdpartylicenseplate as tpdate FROM accident acc INNER JOIN driver dr ON acc.driverid = dr.id INNER JOIN thirdparty tp ON acc.thirdpartyid = tp.id WHERE acc.companyid = $companyid $dateSql ORDER BY acc.date DESC");
$total = mysql_num_rows($accidents);

// loop over the rows, outputting them
while ($row = mysql_fetch_assoc($accidents)) fputcsv($output, $row, ';');








?>