<?

session_start();
include('dbconnect.php');

if(isset($_SESSION["username"])) {
	echo '<div id="welcome-container"><div class="welcome">Welcome ' . $_SESSION["username"] . '</div><div class="logout"><a href="logout.php">Log out</a></div></div>';	
} else {	
	include('login.php');	
}

?>