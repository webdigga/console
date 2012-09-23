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
			<label for "username">Username: <span>(between 6 and 15 characters)</span> </label>
			<input type="text" name="username"/>
			<label for "password">Password: <span>(between 6 and 15 characters)</span> </label>
			<input type="password" name="password"/>
			<label for "retype-password">Retype Password: </label>
			<input type="password" name="retype-password"/>
			
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
				$errorMsg = "Username already exists.";
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
			case 5:
				$errorMsg = "The two passwords don`t match.";
				break;		
			case 6:
				$errorMsg = "Username is too long - must be no more than 15 characters.";
				break;
			case 7:
				$errorMsg = "Username is too short - must be at least 6 characters.";
				break;
			case 8:
				$errorMsg = "Password is too long - must be no more than 15 characters.";
				break;
			case 9:
				$errorMsg = "Password is too short - must be at least 6 characters.";
				break;
			case 10:
				$errorMsg = "Invalid characters in username.";
				break;
			case 11:
				$errorMsg = "Invalid characters in password.";
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