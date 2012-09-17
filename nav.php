<?
$navSwitch = $_GET['nav'];
switch ($navSwitch) {
    case "stats":
        $statsSelected = "class=\"selected\"";
        break;
    case "accidents":
        $accidentsSelected = "class=\"selected\"";
        break;
    case "drivers":
        $driversSelected = "class=\"selected\"";
        break;
	case "vehicles":
        $vehiclesSelected = "class=\"selected\"";
        break;
	case "register":
        $registerSelected = "class=\"selected\"";
        break;
	default:
		$statsSelected = "class=\"selected\"";
        break;
}
?>

<nav>
	<ul>
		<li>
			<a href="/index.php?nav=stats" <?=$statsSelected;?>>Stats</a>
		</li>
		<li>
			<a href="/accidents.php?nav=accidents" <?=$accidentsSelected;?>>Accidents</a>
		</li>		
		<li>
			<a href="/drivers.php?nav=drivers" <?=$driversSelected;?>>Drivers</a>
		</li>
		<li>
			<a href="/vehicles.php?nav=vehicles" <?=$vehiclesSelected;?>>Vehicles</a>
		</li>		
		<li>
			<a href="/register.php?nav=register" <?=$registerSelected;?>>Registration</a>
		</li>
	</ul>
</nav>