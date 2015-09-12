$(document).ready(function() {
	$('#arrowRight').click(function() {
        rightArrow("tableFilm", "afficherFilm");
    });

    $('#arrowLeft').click(function() {
        leftArrow("tableFilm", "afficherFilm");
    });
});