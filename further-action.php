<?

include('includes.php');
// get further action details for relevant accident
$furtheraction = mysql_query("SELECT ae.id as actionid, ae.date, ae.notes, acs.status FROM actionentry ae INNER JOIN furtheraction fa ON ae.furtheractionid = fa.id INNER JOIN actionstatus acs ON acs.id = fa.statusid WHERE fa.accidentid = '".$_GET['fa']."' ORDER BY date DESC");
$total = mysql_num_rows($furtheraction);

// get action status options
$actionstatus = mysql_query("SELECT status, id as acsid FROM actionstatus");

// get action status for this record
$actionstatusrecord = mysql_query("SELECT statusid FROM furtheraction WHERE accidentid = '".$_GET['fa']."'");
while ($actionstatusresult = mysql_fetch_array($actionstatusrecord)) {
	$actionsStatusResult = $actionstatusresult['statusid'];
}



if(isset($_SESSION["username"])) {

?>

<div id="container">
	<header>
		<h1>App-cident Console</h1>
		<? include('nav.php'); ?>
	</header>
	<div id="main" role="main" class="further-action">
		<div class="back"><a href="/accidents.php?nav=accidents">Back</a></div>
		<h2>Further Action Overview
		<? if ($total > 0) {?>
			<div class="action-status">
				<div>Status</div>				
				<select id="action-status" name="action-status">
					<?
					while ($actionstatusResults = mysql_fetch_array($actionstatus)) {
						if ($actionstatusResults['acsid']===$actionsStatusResult) {
							$selected = 'selected = "selected"';
						} else {
							$selected = '';
						}
					
						echo "<option ".$selected." name='".$actionstatusResults['status']."' value='".$actionstatusResults['acsid']."'>".$actionstatusResults['status']."</option>";
					}
					?>
				</select>				
			</div>
			<?}?>
		</h2>
		
		<?
		if ($total === 0) {
			echo "<div id=\"no-notes\">No notes have been added about this accident yet, please add one using the form below</div>";
		}	
		?>
		
		<div class="fa-container add"><div class="fa-notes"><textarea class="invalid" placeholder="Please enter your note about the accident here..."></textarea><p>Date: <input class="invalid" type="text" id="note-date"></p><div class="add-note"><a href="#">Add a note about this accident</a><a href="#"><img src="/img/add.png" alt="add note" title="add note" /></a><br /><div class="error">* Enter both fields</div></div></div></div>
		
		<? 
		if ($total > 0) {
			$count = 0;
			while ($furtherActionResults = mysql_fetch_array($furtheraction)) {
				$dateTime =  new DateTime($furtherActionResults['date']);
				$dateTimeFormatted = date_format($dateTime, 'M j, Y');
				echo "<div class=\"add-note-controls ".$furtherActionResults['actionid']."\"><div class=\"edit\"><img src=\"/img/comment_edit.png\" alt=\"edit\" title=\"edit\" /></div><div class=\"delete\"><img src=\"/img/cross.png\" alt=\"delete\" title=\"delete\" /></div><div class=\"fa-date\">".$dateTimeFormatted."</div></div><div class=\"fa-container\"><textarea disabled=\"disabled\" class=\"fa-notes tx tx".$count."\">".$furtherActionResults['notes']."</textarea></div>";
				$count ++;
			}
		}	
		?>	
		
		<div style="display:none;" id="fa-accidentid"><?=$_GET['fa'];?></div>
		
		<div id="dialog-confirm" title="Delete Note?" style="display:none">
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>This note will be permanently deleted and cannot be recovered. Are you sure?</p>
</div>
		
		
	</div>
</div>

<script>
// here we need to get the height of all the textarea content and set the height accordingly
$('.fa-container').children().each(function(){
	var tx = $(this);
	tx.height(tx.prop('scrollHeight'));
});
</script>

<?
}
include('foot.html');
?>