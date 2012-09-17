<?

include('includes.php');

// image details
$imageresult = mysql_query("SELECT * FROM images WHERE accidentid = ".$_GET['accidentid']);
$total = mysql_num_rows($imageresult);


if(isset($_SESSION["username"])) {

?>

<div id="container">
	<header>
		<h1>App-cident Console</h1>
		<? include('nav.php'); ?>
	</header>
	<div id="main" role="main" class="images">
		<div class="back"><a href="/accidents.php?nav=accidents">Back</a></div>
		<h2>Images <span class="num-rows">(<?=$total;?> image<? if ($total > 1) {echo "s";}?>)</span></h2>
		
		<ul>
		
		<?
		while($image = mysql_fetch_array($imageresult)) {			
		
			$image_path = $image['imagelocation'];
			list($width, $height, $type, $attr)= getimagesize("http://appcident.diggascookbook.com/".$image_path); 
			
			/*
			echo "Image width " .$width;
			echo "<BR>";
			echo "Image height " .$height;
			echo "<BR>";
			echo "Image type " .$type;
			echo "<BR>";
			echo "Attribute " .$attr;
			*/			
			
			//specify what percentage you are resizing to
			
			/*
			$percent_resizing = 25;
			$new_width = round((($percent_resizing/100)*$width));
			$new_height = round((($percent_resizing/100)*$height));
			*/
			
			$mywidth="200px";
			$myheight="150px";
			
			
			echo '<li><a href="http://appcident.diggascookbook.com/'.$image_path.'"><img src="http://appcident.diggascookbook.com/'.$image_path.'" height="'.$myheight.'" width="'.$mywidth.'" /></a></li>';
		
		}
		?>
		
		</ul>
	</div>
</div>

<?
}

include('foot.html');

?>