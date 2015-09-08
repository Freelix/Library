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