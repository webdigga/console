<?

include('includes.php');

if(isset($_SESSION["username"])) {

?>

<div id="container">
	<header>
		<h1>Appcident Console</h1>
		<? include('nav.php'); ?>
	</header>
	<div id="main" role="main" class="add-driver">
		<div class="back"><a href="/drivers.php?nav=drivers">Back</a></div>
		<h2>Add Driver</h2>		
		<form name="adddriver" method="post" action="/add-driver-action.php">
			<label for "name">Name: </label>
			<input type="text" name="name"/>
			<label for "phonenumber">Phone Number: </label>
			<input type="text" name="phonenumber"/>
			
			<div class="buttons">
				<button type="submit" class="positive" name="save" value="Add Driver">
					<img src="/img/apply2.png" alt=""/>
					Add
				</button>
			</div>
			
			<div class="error-message">
			<?
			$errorMsg="";

			switch($_GET['error']) {
			case 1:
				$errorMsg = "Drivers name already exists.";
				break;			
			case 2:
				$errorMsg = "Please enter drivers name.";
				break;
			case 3:
				$errorMsg = "Please enter a valid phone number.";
				break;
			case 4:
				$errorMsg = "Driver has been added.";
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