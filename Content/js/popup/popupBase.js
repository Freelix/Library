$(document).ready(function(){
	// Close popup
	$("#closePop").click(function(){
		$("#overlay_form").fadeOut(500);
	});
});

// Position the popup at the center of the page
function positionPopup(){
	if(!$("#overlay_form").is(':visible')){
		return;
	}
	
	$("#overlay_form").css({
		left: ($(window).width() - $('#overlay_form').width()) / 2,
		top: ($(window).width() - $('#overlay_form').width()) / 12,
	});
}
 
// Maintain the popup at center of the page when browser resized
$(window).bind('resize',positionPopup);