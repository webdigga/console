<?

include('includes.php');

if(isset($_SESSION["username"])) {

?>

<div id="container">
	<header>
		<h1>App-cident Console</h1>
		<? include('nav.php'); ?>
	</header>
	<div id="main" role="main" class="register">
		<form action="/authregister.php" method="post">
		<h2>Register a new user</h2>
		<label for "username">Username: <span>(between 6 and 15 characters)</span> </label>
		<input type="text" name="username"/>
		<label for "password">Password: <span>(between 6 and 15 characters)</span> </label>
		<input type="password" name="password"/>
		<label for "retype-password">Retype Password: </label>
		<input type="password" name="retype-password"/>		
		
		<div class="buttons">
			<button type="submit" class="positive" name="save" value="Register">
				<img src="/img/apply2.png" alt=""/>
				Add
			</button>
		</div>
		
		<div class="error-message">
		
		<?
		
		$errorMsg="";

		switch($_GET['error']) {
		case 1:
			$errorMsg = "Sorry, this username is already taken.";
			break;
		case 2:
			$errorMsg = "The two passwords don`t match.";
			break;		
		case 3:
			$errorMsg = "Username is too long - must be no more than 15 characters.";
			break;
		case 4:
			$errorMsg = "Username is too short - must be at least 6 characters.";
			break;
		case 5:
			$errorMsg = "Password is too long - must be no more than 15 characters.";
			break;
		case 6:
			$errorMsg = "Password is too short - must be at least 6 characters.";
			break;
		case 7:
			$errorMsg = "Invalid characters in username.";
			break;
		case 8:
			$errorMsg = "Invalid characters in password.";
			break;
		case 9:
			$errorMsg = "User successfully created.";
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