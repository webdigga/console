<?

include('includes.php');
if(isset($_SESSION["username"])) {

?>

<div id="container">
	<header>
		<h1>App-cident Console</h1>
		<? include('nav.php'); ?>
	</header>
	<div id="main" role="main" class="vehicles">
		<h2>Vehicles <span class="num-rows">(<? echo $num_rows; ?> records)</span></h2>
		<div class="add-container">			
			<a href="add-vehicle.php?nav=vehicles" class="add-record"><img src="img/add.png" width="16px" height="16px" /></a>
			<span class="add-record-label"><a href="add-vehicle.php?nav=vehicles">Add new vehicle</a></span>
		</div>
		<table id="vehicles-table" caption="Vehicles Table" summary="This is a list of all vehicles at the company" class="tablesorter">				
		</table>
		<div id="pages">
			<ul class='pages'></ul>
		</div>
		<div class="search-background"><?=$num_rows;?><label><img src="/img/load.gif" alt="" />
	</div>
</div>

<?
}

include('foot.html');

?>