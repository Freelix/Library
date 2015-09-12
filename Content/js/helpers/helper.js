function setImageEmplacement()
{
	var index = $("#emplacementDropDown")[0].selectedIndex;
	var emp = $('ul#ulEmplacement li[value="' + index + '"]').html();

    if (emp != "") {
        var relativePath = ".." + emp.split("Library")[1];
		$('#imgEmplacement').attr('src', relativePath);
	}
	else
		$('#imgEmplacement').attr('src', "");
}

var pageNumber = 0;
var totalRows = $("#hiddenNumberOfRows").html();

function leftArrow(table, file)
{
	// Make a new request
    pageNumber = pageNumber - 20;

    if (pageNumber >= 0) {
    	$("#"+ table + " > tbody").empty();

    	var customQuery = $("#customQuery").html();

	    ajaxRequest = $.ajax({
            url: "/Library/elements/show/" + file + ".php",
            type: "POST",
            dataType: "html",
            data: { data: pageNumber, cq: customQuery }
        });

        ajaxRequest.done(function(response, textStatus, jqXHR) {
        	$('#' + tableLivre + ' tbody').append(response);
        });

        ajaxRequest.fail(function(jqXHR, textStatus) {
        });
	}
	else
		pageNumber = 0;
}

function rightArrow(table, file)
{
	// Make a new request
    var tempPageNumber = pageNumber;
    pageNumber = pageNumber + 20;

    if (totalRows > pageNumber) {
    	$("#"+ table + " > tbody").empty();

	    var customQuery = $("#customQuery").html();

	    ajaxRequest = $.ajax({
            url: "/Library/elements/show/" + file + ".php",
            type: "POST",
            dataType: "html",
            data: { data: pageNumber, cq: customQuery }
        });

        ajaxRequest.done(function(response, textStatus, jqXHR) {
        	$('#' + tableLivre + ' tbody').append(response);
        });

        ajaxRequest.fail(function(jqXHR, textStatus) {
        });
    }
    else
    	pageNumber = tempPageNumber;
}

function emplacementDropDown()
{
	$("#emplacementDropDown").change(function() {
		setImageEmplacement();
	});

    $("#emplacementDropDown").mouseover(function(){
	    $("#popupEmplacement").show();
	});

	$("#emplacementDropDown").mouseout(function(){
        $("#popupEmplacement").hide();
    });
}