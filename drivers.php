<?

include('includes.php');
if(isset($_SESSION["username"])) {

?>

<div id="container">
	<header>
		<h1>App-cident Console</h1>
		<? include('nav.php'); ?>
	</header>
	<div id="main" role="main" class="drivers">
		<h2>Drivers <span class="num-rows"></span></h2>
		<div class="add-container">
			<span class="add-record-label"><a href="/add-driver.php?nav=drivers">Add new driver</a></span>
			<a href="/add-driver.php?nav=drivers" class="add-record"><img src="/img/add.png" width="16px" height="16px" title="add" alt="add" /></a>
		</div>
		<table id="drivers-table" caption="Drivers Table" summary="This is a list of all drivers at the company" class="tablesorter">			
		</table>
		<div id="pages">
			<ul class='pages'></ul>
		</div>
		<div class="search-background"><?=$num_rows;?><label><img src="/img/load.gif" alt="" /></label></div>
	</div>
</div>
	
<?
}

include('foot.html');

?>