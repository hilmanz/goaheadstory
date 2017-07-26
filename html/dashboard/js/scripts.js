$(document).ready(function() { 	
	$('a.hoverslide').hover_transitions({
		background_color_two: "#CC0000",
		show_method: "sliding_doors_horizontal",
		hide_method: "sliding_doors_horizontal",
		cols: 2,
		rows: 1,
		pattern_speed: 0
		
	});
// accordion code
	$(".accordion").accordion({
    	collapsible: true,
        autoHeight: false
	});
// date picker
	$(function() {
		$( "#from" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 1,
		onClose: function( selectedDate ) {
		$( "#to" ).datepicker( "option", "minDate", selectedDate );
		}
	});
	$( "#to" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 1,
		onClose: function( selectedDate ) {
		$( "#from" ).datepicker( "option", "maxDate", selectedDate );
		}
		});
	});
	//picker2
		$(function() {
		$( "#from2" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 1,
		onClose: function( selectedDate ) {
		$( "#to2" ).datepicker( "option", "minDate", selectedDate );
		}
	});
	$( "#to2" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 1,
		onClose: function( selectedDate ) {
		$( "#from2" ).datepicker( "option", "maxDate", selectedDate );
		}
		});
	});

});


//tabs
$(function() {
	$("#tabs").organicTabs({
		"speed": 200
	});

});	

$(document).ready(function() {
	$('.showPopup').fancybox();

});

//scrollpanescript
/*$(document).ready(function() {
	$(".popup-Bagdes").click(function(event) {
		$('.scroll-pane').jScrollPane();
	});
});*/
// date picker
	$(function() {
		$("#from3").datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 1,
		onClose: function( selectedDate ) {
		$( "#to3" ).datepicker( "option", "minDate", selectedDate );
		}
	});
	$("#to3").datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 1,
		onClose: function( selectedDate ) {
		$("#from3").datepicker( "option", "maxDate", selectedDate );
		}
		});
	});
	
	
// date picker
	$(function() {
		$(".fromBa1").datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 1,
		onClose: function( selectedDate ) {
		$( ".toBa1" ).datepicker( "option", "minDate", selectedDate );
		}
	});
	$(".toBa1").datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 1,
		onClose: function( selectedDate ) {
		$(".fromBa1").datepicker( "option", "maxDate", selectedDate );
		}
		});
	});
	
// date picker
	$(function() {
		$(".fromBa2").datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 1,
		onClose: function( selectedDate ) {
		$( ".toBa2" ).datepicker( "option", "minDate", selectedDate );
		}
	});
	$(".toBa2").datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 1,
		onClose: function( selectedDate ) {
		$(".fromBa2").datepicker( "option", "maxDate", selectedDate );
		}
		});
	});
	
// date picker
	$(function() {
		$(".fromBa3").datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 1,
		onClose: function( selectedDate ) {
		$( ".toBa3" ).datepicker( "option", "minDate", selectedDate );
		}
	});
	$(".toBa3").datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 1,
		onClose: function( selectedDate ) {
		$(".fromBa3").datepicker( "option", "maxDate", selectedDate );
		}
		});
	});