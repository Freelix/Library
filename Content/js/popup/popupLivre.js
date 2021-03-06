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
		
		var emplacementLivre = $(this).children().eq(9).text();
		$('#emplacementDropDown').val(emplacementLivre);
		
		var editeurLivre = $(this).children().eq(4).text();
		$('#editeurLiv').val(editeurLivre);
		
		var sommaireLivre = $(this).children().eq(5).text();
		$('#sommaireLiv').val(sommaireLivre);
		
		var noteLivre = $(this).children().eq(6).text();
		$('#noteLiv').val(noteLivre);

		var publishedDate = $(this).children().eq(7).text();
		$('#publishedDateLiv').val(publishedDate);

		var pageCount = $(this).children().eq(8).text();
		$('#pageCountLiv').val(pageCount);

		$("#supprimerPop").attr("href", "/Library/elements/delete/supprimerLivre.php?id=" + idNoLivre);

		setImageEmplacement();
	});
});