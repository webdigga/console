<?php
session_start();
include('dbconnect.php');
require_once('tcpdf/config/lang/eng.php');
require_once('tcpdf/tcpdf.php');

//print_r($_POST);

//get the dates
$dateFrom = $_POST['dateFrom'];
$dateTo = $_POST['dateTo'];

// transform the dates - 2012-04-10 20:45:34
$dateFrom =  new DateTime($dateFrom);	
$dateFromTrans = date_format($dateFrom, 'Y-m-d 00:00:01');
$dateTo =  new DateTime($dateTo);	
$dateToTrans = date_format($dateTo, 'Y-m-d 23:59:59');

// get readable dates for the report title
$dateFromRead = date_format($dateFrom, 'M j, Y');
$dateToRead = date_format($dateTo, 'M j, Y');

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
$accidents = mysql_query("SELECT SQL_CALC_FOUND_ROWS *, tp.id as tpid, dr.name as drivername, tp.name as tpname, acc.vehiclelicenseplate, acc.thirdpartylicenseplate, acc.location, acc.description, acc.companyid, acc.driverid, acc.date, acc.id FROM accident acc INNER JOIN driver dr ON acc.driverid = dr.id INNER JOIN thirdparty tp ON acc.thirdpartyid = tp.id WHERE acc.companyid = $companyid $dateSql ORDER BY acc.date DESC");
$total = mysql_num_rows($accidents);

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('David White');
$pdf->SetTitle('Appcident Report');
$pdf->SetSubject('Appcident Report');
$pdf->SetKeywords('Appcident Report');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $companyNameValue ." ". PDF_HEADER_TITLE ." / From ". $dateFromRead .", To ". $dateToRead, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusans', '', 10);
// add a page
$pdf->AddPage();

$tbl_header = '<table border="1" width="750px" style="text-align:center; padding:5px; font-size:0.9em;"><thead><tr><th><b>Date</b></th><th scope="col" width="60px"><b>Images</b></th><th scope="col"><b>Driver Name</b></th><th scope="col"><b>TP Name</b></th><th scope="col"><b>License Plate</b></th><th scope="col"><b>TP License Plate</b></th><th scope="col" width="65px"><b>Location</b></th></tr></thead><tbody>';
$tbl_footer = '</tbody></table>';
$html = '';

// create some HTML content
while($accidentrow = mysql_fetch_array($accidents)) {			
	$dateTime =  new DateTime($accidentrow['date']);	
	$dateTimeFormatted = date_format($dateTime, 'M j, Y h:i A');
	
	$html.= "<tr><td>".$dateTimeFormatted."</td><td width=\"60px\" class=\"camera\"><a href=\"http://console.app-cident.com/images.php?nav=accidents&accidentid=".$accidentrow['id']."\"><img src=\"/img/camera_go.png\" /></a></td><td>". $accidentrow['drivername'] ."</td><td><a href=\"http://console.app-cident.com/third-parties.php?nav=accidents&tpid=".$accidentrow['tpid']."\">". $accidentrow['tpname'] ."</a></td><td>". $accidentrow['vehiclelicenseplate'] ."</td><td>". $accidentrow['thirdpartylicenseplate'] ."</td><td width=\"65px\" class=\"map\"><a href=\"http://console.app-cident.com/map.php?nav=accidents&longlat=".$accidentrow['location']."\"><img src=\"/img/map_magnify.png\" /></a></td></tr>";
}

// output the HTML content
if ($total === 0) {
	$html = "Sorry, your query has returned no results";
	$pdf->writeHTML($html, true, false, true, false, '');
} else {
	$pdf->writeHTML($tbl_header . $html . $tbl_footer, true, false, true, false, '');
}


//Close and output PDF document
$pdf->Output('appcident.pdf', 'I');

//============================================================+
// END OF FILE                                                
//============================================================+
?>