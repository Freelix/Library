$(document).ready(function(){
	// Open popup
	$(".pop").click(function(){
		$("#overlay_form").fadeIn(1000);
		positionPopup();

		// Show the appropriate values
		var idNoLivre = $(this).find(':first-child').text();
		$('#idNoLiv').val(idNoLivre);
		
		var titreLivre = $(this).children().eq(1).text();
		$('#titreLiv').val(titreLivre);
		
		var auteurLivre = $(this).children().eq(2).text();
		$('#auteurLiv').val(auteurLivre);
		
		var emplacementLivre = $(this).children().eq(7).text();
		$('#emplacementDropDown').val(emplacementLivre);
		
		var editeurLivre = $(this).children().eq(4).text();
		$('#editeurLiv').val(editeurLivre);
		
		var sommaireLivre = $(this).children().eq(5).text();
		$('#sommaireLiv').val(sommaireLivre);
		
		var noteLivre = $(this).children().eq(6).text();
		$('#noteLiv').val(noteLivre);

		$("#supprimerPop").attr("href", "../elements/supprimerLivre.php?id=" + idNoLivre);
	});
	 
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
		top: ($(window).width() - $('#overlay_form').width()) / 7,
		position:'fixed'
	});
}
 
// Maintain the popup at center of the page when browser resized
$(window).bind('resize',positionPopup);