<?

include('includes.php');

if(isset($_SESSION["username"])) {

?>

<div id="container">
	<header>
		<h1>App-cident Console</h1>
		<? include('nav.php'); ?>
	</header>
	<div id="main" role="main" class="add-driver">
		<div class="back"><a href="/vehicles.php?nav=vehicles">Back</a></div>
		<h2>Add Vehicle</h2>		
		<form name="addvehicle" method="post" action="/add-vehicle-action.php">
			<label for "licenseplate">License Plate: * </label>
			<input type="text" name="licenseplate"/>
			<label for "make">Make: * </label>
			<input type="text" name="make"/>
			<label for "model">Model: * </label>
			<input type="text" name="model"/>
			
			<label for "mot" class="date">M.O.T Due date: * </label>
			<input type="text" id="mot-date" name="mot-date">
			
			<label for "service" class="date">Serivce Due Date: * </label>
			<input type="text" id="service-date" name="service-date">
			
			<label for "knownissues" class="known-issues">Known Issues: </label>
			<textarea rows="10" cols="50" name="knownissues" placeholder="Please enter any known issues this vehicle may have..."></textarea>
			
			<div class="buttons">
				<button type="submit" class="positive" name="save" value="Add Vehicle">
					<img src="/img/apply2.png" alt=""/>
					Add
				</button>
			</div>
			
			<div class="error-message">
			<?
			$errorMsg="";

			switch($_GET['error']) {
			case 1:
				$errorMsg = "License plate already exists.";
				break;
			case 2:
				$errorMsg = "Please enter a valid license plate.";
				break;
			case 3:
				$errorMsg = "Please enter a valid make.";
				break;
			case 4:
				$errorMsg = "Please enter a valid model.";
				break;
			case 5:
				$errorMsg = "Vehicle has been added.";
				break;
			case 6:
				$errorMsg = "You have not selected a M.O.T due date.";
				break;
			case 7:
				$errorMsg = "You have not selected a service due date.";
				break;
			}		
				
			echo $errorMsg;
			
			?>
			</div>
			
		</form>		
	</div>
</div>

<?
}

include('foot.html');

?>