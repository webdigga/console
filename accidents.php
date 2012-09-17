<?

include('includes.php');

// get driver ids
$driveridresult = mysql_query("SELECT DISTINCT acc.driverid, dr.name FROM accident acc INNER JOIN driver dr ON acc.driverid = dr.id WHERE acc.companyid = $companyid");

// get vehicle plate details
$vehicleplateresult = mysql_query("SELECT DISTINCT acc.vehiclelicenseplate FROM accident acc WHERE acc.companyid = $companyid");

if(isset($_SESSION["username"])) {

?>

<div id="container">
	<header>
		<h1>App-cident Console</h1>
		<? include('nav.php'); ?>
	</header>
	<div id="main" role="main" class="accidents">
		<h2>Accidents 
			<span class="num-rows"></span>
			<span class="report">
				<label for="dateRange">Generate Report &nbsp;&nbsp;|</label>  
				<form action="generate-report.php" name="dateRange" method="POST">
					<label for="dateFrom">From: </label>
					<input type="text" id="datepickerFrom" name="dateFrom" /> 
					<label for="dateTo">To: </label>
					<input type="text" id="datepickerTo" name="dateTo" />
					<input type="image" src="/img/report.png" />
				</form>
			</span>
		</h2>
		<div class="add-container">
			<span class="add-record-label"><a href="#" class="filter" onclick="return false">Filter</a></span>
			<a href="#" onclick="return false" class="add-record filter"><img src="/img/page_find.png" width="16px" height="16px" alt="filter" title="filter" /></a>
			<div id="filter-arrow"></div>
			<div id="filter">
				<?
				while($driverid = mysql_fetch_array($driveridresult)) {					
					echo "<div class=\"filter-option\"><input type=\"checkbox\" checked=\"checked\" class=\"driver\" value=\"driver".$driverid['driverid']."\" id=\"driver".$driverid['driverid']."\"><label for=\"driver".$driverid['driverid']."\">".$driverid['name']."</label></div>";
				}
				while($vehicleplate = mysql_fetch_array($vehicleplateresult)) {					
					echo "<div class=\"filter-option\"><input type=\"checkbox\" checked=\"checked\" class=\"vehicle\" value=".$vehicleplate['vehiclelicenseplate']." id=".$vehicleplate['vehiclelicenseplate']."><label for=".$vehicleplate['vehiclelicenseplate'].">".$vehicleplate['vehiclelicenseplate']."</label></div>";
				}
				?>
				
				<div class="filter-submit">
					<div class="submit">Submit</div>
					<div class="cancel">Close</div>
					<div class="not-selected" style="display: none;">* You have not selected a filter</div>
				</div>
			</div>
		</div>
		<table id="accidents-table" caption="Accidents Table" summary="This is a list of all accidents at the company" class="tablesorter">	
		</table>
		<div id="pages">
			<ul class='pages'></ul>
		</div>
		<div class="search-background"><label><img src="/img/load.gif" alt="" /></label></div>
	</div>
</div>

<?
}

include('foot.html');

?>