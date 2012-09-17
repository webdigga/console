<?

include('includes.php');

$thirdparties = mysql_query("SELECT * FROM thirdparty tp INNER JOIN thirdpartyvehicle tpv ON tp.id = tpv .id WHERE tp.id = ".$_GET['tpid']." ORDER BY tp.id ASC");
$num_rows = mysql_num_rows($thirdparties);

if(isset($_SESSION["username"])) {

?>

<div id="container">
	<header>
		<h1>App-cident Console</h1>
		<? include('nav.php'); ?>
	</header>
	<div id="main" role="main" class="third-party">
		<div class="back"><a href="/accidents.php?nav=accidents">Back</a></div>
		<h2>Third Parties</h2>
		<table id="tp-table" caption="Third Party Table" summary="This is a list of all third part drivers involved in accidents" class="tablesorter">	
			<thead>
				<tr>
					<th scope="col">Third Party Name</th>
					<th scope="col">Third Party Phone Number</th>
					<th scope="col">Third Party License Plate</th>
					<th scope="col">Third Party Make</th>
					<th scope="col">Third Party Model</th>
				</tr>
			</thead>
			<tbody>		
			<?
			while($row = mysql_fetch_array($thirdparties)) {					
			
				echo "<tr><td>". $row['name'] ."</td><td>". $row['phonenumber'] ."</td><td>". $row['licenseplate'] ."</td><td>". $row['make'] ."</td><td>". $row['model'] ."</td></tr>";
			}		
			?>
			</tbody>	
		</table>
	</div>
</div>

<?
}

include('foot.html');

?>