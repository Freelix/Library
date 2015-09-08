$(document).ready(function(){
	// Open popup
	$(".pop").click(function(){
		$("#overlay_form").fadeIn(1000);
		positionPopup();
		
		// Show the appropriate values
		var idNoFilm = $(this).find(':first-child').text();
		$('#idNoMovie').val(idNoFilm);
		
		var titreFilm = $(this).children().eq(1).text();
		$('#titreMovie').val(titreFilm);
		
		var auteurFilm = $(this).children().eq(2).text();
		$('#realMovie').val(auteurFilm);
		
		var emplacementFilm = $(this).children().eq(6).text();
		$('#emplacementDropDown').val(emplacementFilm);
		
		var sommaireFilm = $(this).children().eq(4).text();
		$('#sommaireMovie').val(sommaireFilm);
		
		var noteFilm = $(this).children().eq(5).text();
		$('#noteMovie').val(noteFilm);

		$("#supprimerPop").attr("href", "../elements/supprimerFilm.php?id=" + idNoFilm);

		setImageEmplacement();
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
		top: ($(window).width() - $('#overlay_form').width()) / 12,
	});
}
 
// Maintain the popup at center of the page when browser resized
$(window).bind('resize',positionPopup);