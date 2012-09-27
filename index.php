<?

include('includes.php');

if (isset($companyid)) {

// get total accidents
$accidents = mysql_query("SELECT * FROM accident WHERE companyid = '".$companyid."' ");
$num_rows = mysql_num_rows($accidents);

// get number of accidents by driver
$accidents = mysql_query("SELECT acc.driverid, count(acc.id) as total, dr.name FROM accident acc INNER JOIN driver dr ON acc.driverid = dr.id WHERE acc.companyid = '".$companyid."' GROUP BY driverid ORDER BY total DESC LIMIT 5");

// get number of accidents by weather
$weather = mysql_query("SELECT count(wth.weather) as total, wth.weather FROM weather wth INNER JOIN accident acc ON acc.id = wth.id WHERE acc.companyid = '".$companyid."' GROUP BY weather ORDER BY total DESC LIMIT 5");


$currentDate = date("Y-m-d H:i:s");
$lastYear = date("Y")-1;
$lastYearDate = date($lastYear."-m-d H:i:s");

// get number of accidents by date
$dateresult = mysql_query("SELECT acc.date, count(acc.date) as total FROM accident acc WHERE acc.companyid = '".$companyid."' AND acc.date BETWEEN '".$lastYearDate."' AND '".$currentDate."' GROUP BY CAST(acc.date AS DATE) ORDER BY acc.date");

}

if(isset($_SESSION["username"])) {

?>

<div id="container">
	<header>
		<h1>App-cident Console</h1>
		<? include('nav.php'); ?>
	</header>
	<div id="main" role="main" class="stats">		
		<div class="date-warning">**Please select a from date</div>
		<h2>Stats
			<span class="report">
				<label for="dateRange">Generate Report &nbsp;&nbsp;|</label>  
				<form name="dateRange" action="" method="POST" id="report-form">
					<label for="dateFrom">From: </label>
					<input type="text" id="datepickerFrom" name="dateFrom" /> 
					<label for="dateTo">To: </label>
					<input type="text" id="datepickerTo" name="dateTo" />
					<input type="image" value="pdf" src="/img/page_white_acrobat.png" />
					<input type="image" class="csv" src="/img/page_white_excel.png" />
				</form>
			</span>		
		</h2>
		
		<div class="stats-holder">
			<caption>Top 5 accidents by driver</caption>
			<table id="driver-stats" class="tablesorter">
				<thead>
					<tr>
						<th scope="col">Name</th>
						<th scope="col">Percent</th>
						<th scope="col">Total</th>
					</tr>
				</thead>
				<tbody>		
				<?
				while($driverid = mysql_fetch_array($accidents)) {
					// work out percentages				
					$percent = round(($driverid['total'] / $num_rows) * 100);				
					echo "<tr><td>".$driverid['name']."</td><td>".$percent."%</td><td>".$driverid['total']."</td></tr>";
				}	
				?>  
				</tbody>
			</table>
			<div id="driver-stats-holder"></div>		
		</div>
		<div class="stats-holder shr">
			<caption>Top 5 accidents by weather</caption>
			<table id="weather-stats" class="tablesorter">
				<thead>
					<tr>
						<th scope="col">Weather</th>
						<th scope="col">Percent</th>
						<th scope="col">Total</th>
					</tr>
				</thead>
				<tbody>		
				<?
				while($weatherid = mysql_fetch_array($weather)) {
					// work out percentages				
					$percent = round(($weatherid['total'] / $num_rows) * 100);
					echo "<tr><td>".$weatherid['weather']."</td><td>".$percent."%</td><td>".$weatherid['total']."</td></tr>";
				}	
				?>  
				</tbody>
			</table>
			<div id="weather-stats-holder"></div>		
		</div>			
		<div class="date-data">
			<table id="date-data">				
				<?
				while($date = mysql_fetch_array($dateresult)) {				
					$dateTime =  new DateTime($date['date']);			
					$dateTimeFormatted = date_format($dateTime, 'M j, Y');
					echo "<tfoot><tr><th>".$dateTimeFormatted."</th></tr></tfoot>";
					echo "<tbody><tr><td>".$date['total']."</td></tr></tbody>";
				}	
				?>
			</table>
			<div id="holder"></div>
		</div>	
		<? include 'twitter.php';?>
	</div>	
</div>	

<?
}
include('foot.html');
?>