/* Author: David White */
$(document).ready(function() {


  // when the report button is clicked, make sure we have a from date
	$('form[name="dateRange"] input[type="image"]').click(function(){
		if ($('#datepickerFrom').val()==='') {
			$('.date-warning').show();
			return false;
		} else {
		// submit the form
		var action;
		var classVal = $(this).val();
		if (classVal === 'pdf') {
			action = 'generate-report.php';
		} else {
			action = 'csv.php';
		}		
		$("#report-form").attr("action", action);
		}
	});
	

	
	// filter	
	$('.accidents .filter').click(function() {		
		/* accident filter */	
		if ($('#filter').is(":hidden")) {
			$('.not-selected').hide();
			$('#filter, #filter-arrow').slideDown("slow");	
		}
	});	
	var vehArray=[], driArray=[];
	$('.filter-submit .submit').live('click', function() {
		//show the loading bar
		var ref = $(this);
		showLoader();		
		$(".pages li").css({'background-color' : '', 'color' : '#A3A3A3'});
		$(this).css({'background-color' : '#C8C8C8', 'color' : '#fff'}); 
		vehArray=[];
		driArray=[];
		$('.filter-option input:checked').each(function() {
			var checked = ($(this).val());
			if( $(this).attr('class') == 'driver') {
				driArray.push("'"+checked.replace('driver','')+"'");
			}
			else {
				vehArray.push("'"+checked+"'");
			}			
		});
		refPage = 1;
		$("#accidents-table").load("data-accidents.php?driver=" + driArray + "&vehicle=" + vehArray, hideLoader);			
	});	
	$('.filter-submit .close').live('click', function(){
		$('#filter, #filter-arrow').slideUp("slow");		
	});
	
	//lightbox
	$(function() {	
		$('.images ul li a').lightBox();		
	});	
	
	// raphael charts
	$(function() {
		var values = [], labels = [];
		$("#driver-stats tbody tr").each(function () {
			values.push(parseInt($("td:eq(1)", this).text(), 10));
			labels.push($("td:eq(0)", this).text()+" "+$("td:eq(1)", this).text());
		});
		Raphael("driver-stats-holder", 460, 480).pieChart(230, 150, 100, values, labels, "#fff");		
		var values = [], labels = [];		
		$("#weather-stats tbody tr").each(function () {
			values.push(parseInt($("td:eq(1)", this).text(), 10));
			labels.push($("td:eq(0)", this).text()+" "+$("td:eq(1)", this).text());
		});		
		Raphael("weather-stats-holder", 460, 480).pieChart(230, 150, 100, values, labels, "#fff");
	});	
	
	// inline editing vehicles	
	$('#vehicles-table td img.edit').live("click", function() {
		// get the vehicle id
		var vehicleId = ($(this).parent().parent().attr('class'));		
		// activate the input fields
		$(this).parent().parent().children().each(function() {
			// check if it's the edit button
			if ($(this).children().hasClass('edit')==false) {
				// grab the value
				var inputValue = $(this).children().val();				
				// insert date picker
				$( ".inline-mot-date" ).datepicker({
					dateFormat: "M d, yy"
				});
				$( ".inline-service-date" ).datepicker({
					dateFormat: "M d, yy"
				});
				// put the values back	
				$(this).children().val(inputValue).removeAttr('disabled');	
				// alter the css to change the input fields
				$(this).children().css({
					'border-color' : '#ccc',
					'border-width' : '3px'
				});
			}		
		});
		// change the edit button to a save button / change the class
		$(this).attr('src','/img/disk.png');
		$(this).parent().append('<img class="cancel" src="/img/cancel.png" title="cancel" alt="cancel">');
		$(this).attr('class','save');	
	});		
	$('#vehicles-table td img.save').live("click", function() {
		// when click save, data values are sent to a php page via ajax and sql is updated for that record and save button becomes edit again and text changes back		
		//get the accident id
		var accidentid = $(this).parent().parent().attr('class');
		// get all of the values ready to post
		var licenseplate = $('tr.' + accidentid + ' .licenseplate input').val();
		var make = $('tr.' + accidentid + ' .make input').val();
		var model = $('tr.' + accidentid + ' .model input').val();
		var motdue = $('tr.' + accidentid + ' .mot-date input').val();
		var servicedue = $('tr.' + accidentid + ' .service-date input').val();
		var knownissues = $('tr.' + accidentid + ' .knownissues input').val();
		var status = $('tr.' + accidentid + ' .status input').val();
		$.post("/inline-vehicle.php", { licenseplate: licenseplate, make: make, model: model, status: status, motduedate: motdue, serviceduedate: servicedue, knownissues: knownissues, accidentid: accidentid },
		function(data) {
			//alert("Data Loaded: " + data);		
		});		
		// change the image and class
		$(this).attr('src','/img/folder_edit.png');
		$(this).attr('class','edit');
		// alter the css to change the input fields
		$(this).parents().parents().children().each(function(){
			$(this).find('input').attr('disabled','disabled').css({
				'border-color' : '#fff',
				'border-width' : '3px'
			});				
		});
		$(this).siblings('.cancel').remove();
	});
	
	// inline editing drivers
	$('#drivers-table td img.edit').live("click", function() {	
		// get the driver id
		var driverId = ($(this).parent().parent().attr('class'));		
		// activate the input fields
		$(this).parent().parent().children().each(function() {
			// check if it's the edit button
			if ($(this).children().hasClass('edit')==false) {
				// grab the value
				var inputValue = $(this).children().val();
				// put the values back	
				$(this).children().val(inputValue).removeAttr('disabled');	
				// alter the css to change the input fields
				$(this).children().css({
					'border-color' : '#ccc',
					'border-width' : '3px'
				});
			}		
		});
		// change the edit button to a save button / change the class
		$(this).attr('src','/img/disk.png');
		$(this).parent().append('<img class="cancel" src="/img/cancel.png" title="cancel" alt="cancel">');
		$(this).attr('class','save');	
	});	
	$('#drivers-table td img.save').live("click", function() {
		// when click save, data values are sent to a php page via ajax and sql is updated for that record and save button becomes edit again and text changes back		
		//get the accident id
		var driverId = $(this).parent().parent().attr('class');
		// get all of the values ready to post		
		var name = $('tr.' + driverId + ' .name input').val();
		var phonenumber = $('tr.' + driverId + ' .phonenumber input').val();
		var status = $('tr.' + driverId + ' .status input').val();	
		$.post("/inline-driver.php", { name: name, phonenumber: phonenumber, status: status, driverid: driverId },
		function(data) {
			//alert("Data Loaded: " + data);		
		});
		// change the image and class
		$(this).attr('src','/img/folder_edit.png');
		$(this).attr('class','edit');
		// alter the css to change the input fields
		$(this).parents().parents().children().each(function(){
			$(this).find('input').attr('disabled','disabled').css({
				'border-color' : '#fff',
				'border-width' : '3px'
			});				
		});
		$(this).siblings('.cancel').remove();
	});	
	/* cancel puts things back to normal */	
	$('#main .cancel').live("click", function() {		
		$(this).siblings('.save').attr('class','edit');
		$(this).siblings().attr('src','/img/folder_edit.png');
		$(this).siblings().attr('class','edit');
		// alter the css to change the input fields
		$(this).siblings().parents().parents().children().each(function(){
			$(this).find('input').attr('disabled','disabled').css({
				'border-color' : '#fff',
				'border-width' : '3px'
			});				
		});
		$(this).remove();
	});
	
	/* date pickers */
	$( "#mot-date" ).datepicker({
		showOn: "button",
		buttonImage: "/img/calendar_add.png",
		buttonImageOnly: true,
		dateFormat: "yy-mm-dd"
	});
	$( "#service-date" ).datepicker({
		showOn: "button",
		buttonImage: "/img/calendar_add.png",
		buttonImageOnly: true,
		dateFormat: "yy-mm-dd"
	});
	$( "#datepickerFrom" ).datepicker();
	$( "#datepickerTo" ).datepicker();
	$( "#note-date" ).datepicker();
	
	// pagination
	//show loading bar
	function showLoader(){
		$('.search-background').fadeIn(200);
	}
	//hide loading bar
	function hideLoader(){
		$('.search-background').fadeOut(200);
		// initialise accidents table sort
		$("#accidents-table").tablesorter();
		var numRows = $('#accidents-table thead').attr('class');
		$('.num-rows').text("(" + numRows + " records)");
				
		var ipp =10;//items per page
		var totalpages = Math.ceil(numRows/ipp);
		var content = "<div id='pages'><ul class='pages'>";
		for( i=1; i<=totalpages; i++) {
			content+="<li class='"+i+"'>"+i+"</li>";
		}
		content+="</ul></div>";
		$("#pages").replaceWith(content);		
		$('#pages li:eq('+(refPage-1)+')').css({'background-color':'#c8c8c8','color':'#fff'});
		initPagination();
	}

	// hide drivers loader	
	function hideDriverLoader(){
		$('.search-background').fadeOut(200);
		// initialise driver table sort
		$("#drivers-table").tablesorter();
		var numRows = $('#drivers-table thead').attr('class');
		$('.num-rows').text("(" + numRows + " records)");				
		var ipp =10;//items per page
		var totalpages = Math.ceil(numRows/ipp);
		var content = "<div id='pages'><ul class='pages'>";
		for( i=1; i<=totalpages; i++) {
			content+="<li class='"+i+"'>"+i+"</li>";
		}
		content+="</ul></div>";
		$("#pages").replaceWith(content);		
		$('#pages li:eq('+(refPage-1)+')').css({'background-color':'#c8c8c8','color':'#fff'});
		initDriverPagination();
	}

	// hide vehicles loader	
	function hideVehicleLoader() {		
		$('.search-background').fadeOut(200);		
		// initialise vehicle table sort
		$("#vehicles-table").tablesorter();
		var numRows = $('#vehicles-table thead').attr('class');
		$('.num-rows').text("(" + numRows + " records)");				
		var ipp =10;//items per page
		var totalpages = Math.ceil(numRows/ipp);
		var content = "<div id='pages'><ul class='pages'>";
		for( i=1; i<=totalpages; i++) {
			content+="<li class='"+i+"'>"+i+"</li>";
		}
		content+="</ul></div>";
		$("#pages").replaceWith(content);		
		$('#pages li:eq('+(refPage-1)+')').css({'background-color':'#c8c8c8','color':'#fff'});
		initVehiclePagination();
	}
	
	var refPage = 1;
	function initPagination() {
		$(".pages li").click(function(){
			//show the loading bar
			var ref = $(this);
			refPage = $(this).attr('class');
			showLoader();		
			$(".pages li").css({'background-color' : '', 'color' : '#A3A3A3'});
			$(this).css({'background-color' : '#C8C8C8', 'color' : '#fff'});                
			$("#accidents-table").load("data-accidents.php?page=" + ref.attr('class')+"&driver=" + driArray + "&vehicle=" + vehArray, hideLoader);		
		});
	}
	function initDriverPagination() {
		$(".pages li").click(function(){
			//show the loading bar
			var ref = $(this);
			refPage = $(this).attr('class');
			showLoader();		
			$(".pages li").css({'background-color' : '', 'color' : '#A3A3A3'});
			$(this).css({'background-color' : '#C8C8C8', 'color' : '#fff'});                
			$("#drivers-table").load("data-drivers.php?page=" + ref.attr('class'), hideDriverLoader);		
		});
	}	
	function initVehiclePagination() {
		$(".pages li").click(function(){
			//show the loading bar
			var ref = $(this);
			refPage = $(this).attr('class');
			showLoader();		
			$(".pages li").css({'background-color' : '', 'color' : '#A3A3A3'});
			$(this).css({'background-color' : '#C8C8C8', 'color' : '#fff'});                
			$("#vehicles-table").load("data-vehicles.php?page=" + ref.attr('class'), hideVehicleLoader);		
		});
	}		
	showLoader();	
	$("#accidents-table").load("data-accidents.php?page=1",hideLoader);
	$("#drivers-table").load("data-drivers.php?page=1",hideDriverLoader);
	$("#vehicles-table").load("data-vehicles.php?page=1",hideVehicleLoader);
		
	// initialise driver stats table sort
	$("#driver-stats").tablesorter();
	// initialise weather stats table sort
	$("#weather-stats").tablesorter();
	
	// event for when a further action add is clicked
	$('.further-action .add-note a').click(function(){	
		var textarea = $('.fa-notes textarea').val();
		var postdate = $('.fa-notes #note-date').val();	
		// grab the accident id
		var accidentid = $('#fa-accidentid').text();
		// check that both note and date have val
		if (textarea !="" && postdate !="") {			
			$('.add-note .error').hide();			
			// get the date then get it in the correct format
			postdate = Date.parseExact(postdate, ["M/d/yyyy", "MMMM d, yyyy"]);
			postdate = postdate.toString('MMM d, yyyy');			
			// submit takes the data and passes it (ajax) to add-note page where it will enter it in db and pass the data back			
			$.ajax({
				type: "POST",
				url: "/add-note.php",
				data: { note: textarea, notedate: postdate, accidentid: accidentid }
			}).done(function( data ) {
				//alert( "Data Saved: " + data );
				$('<div class="add-note-controls ' + data + '"><div class="edit"><img src="/img/comment_edit.png" alt="edit" title="edit" /></div><div class="delete"><img src="/img/cross.png" alt="delete" title="delete" /></div><div class="fa-date">' + postdate + '</div></div><div class="fa-container"><textarea disabled="disabled" class="fa-notes tx tx".$count."">' + textarea + '</textarea></div>').insertAfter('.fa-container.add').hide().slideDown('slow');
				$('.fa-notes textarea').val('');
				$('.fa-notes #note-date').val('');
				$('#no-notes').hide();				
			});			
		} else {
			$('.add-note .error').show();
		}	
	});	
	
	// on status change 
	$('.further-action #action-status').change(function(){
		var newStatus = $(this).val();
		var fa = $('#fa-accidentid').text();
		// update status		
		$.post("/update-status.php", {status: newStatus, fa: fa}, function(data){
			//alert(data);
		});
	});
	
	// edit note
	$('.add-note-controls .edit img').live("click", function() {		
		// enable the textarea
		$(this).parent().parent().next().children().removeAttr('disabled');		
		// change edit icon to a save button and the class to add
		$(this).attr('src','/img/comments_add.png');
		$(this).parent().attr('class','inline-add-note');	
	});
	
	// edit note action
	$('.inline-add-note img').live("click", function() {
		// on click of save button, send data to edit-note.php
		var newNote = $(this).parent().parent().next().children().val();		
		var noteid = $(this).parent().parent().attr('class').split(" ");		
		$.post("/edit-note.php", {note: newNote, noteid: noteid[1]}, function(data){});
		// on success change save button back to edit and disable the textarea
		$(this).parent().parent().next().children().attr('disabled','disabled');
		$(this).parent().attr('class','edit');
		$(this).attr('src','/img/comment_edit.png');
	});
	
	// delete note confirmation
	// a workaround for a flaw in the demo system (http://dev.jqueryui.com/ticket/4375), ignore!
	$('.delete img').live("click", function(){
		var noteId = $(this).parent().parent().attr('class').split(" ");
		$( "#dialog:ui-dialog" ).dialog( "destroy" );
		$( "#dialog-confirm" ).dialog({
			resizable: false,
			width:400,
			modal: true,
			buttons: {
				"Delete note": function() {
					// when delete is selected pass the relevant id and delete the note								
					$.post("/delete-note.php", {noteid: noteId[1]}, function(data){			
						//alert(data);
					});					
					// close the dialog
					$( this ).dialog( "close" );
					// fade out the content to look seamless					
					$("."+ noteId[1]).fadeOut('slow');
					$("."+ noteId[1]).next().fadeOut('slow');					
				},
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			}
		});
	});
});