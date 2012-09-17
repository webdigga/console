<?

include('includes.php');

// get the long and lat from the url
$longLat = $_GET['longlat'];
$longLatSplit = split(',', $longLat);

if(isset($_SESSION["username"])) {

?>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">


	var getLat = '<?=$longLatSplit['0'];?>'
	var getLong = '<?=$longLatSplit['1'];?>';
	var geocoder;
	var map;
	var infowindow = new google.maps.InfoWindow();
	var marker;
	function initialize() {
		geocoder = new google.maps.Geocoder();
		var latlng = new google.maps.LatLng(getLat,getLong);
		var myOptions = {
			zoom: 17,
			center: latlng,
			mapTypeId: 'roadmap'
		}
		map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
	}

	function codeLatLng() {	
	
		var latlng = new google.maps.LatLng(getLat, getLong);
		
		geocoder.geocode({'latLng': latlng}, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) {
			if (results[1]) {				
				marker = new google.maps.Marker({
					position: latlng, 
					map: map
				}); 
				infowindow.setContent(results[1].formatted_address);
				infowindow.open(map, marker);
				} else {
			alert("No results found");
			}
		} else {
			alert("Geocoder failed due to: " + status);
		}
		});
	}

	$(document).ready(function(){
		initialize();
		codeLatLng();	
	});
	
</script>

<div id="container">
	<header>
		<h1>App-cident Console</h1>
		<? include('nav.php'); ?>
	</header>
	<div id="main" role="main" class="map">
		<div class="back"><a href="/accidents.php?nav=accidents">Back</a></div>
		<h2>Map</h2>	
		<div id="map_canvas"></div>
		
	</div>
</div>

<?
}

include('foot.html');

?>