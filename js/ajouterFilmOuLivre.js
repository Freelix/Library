$(document).ready(function() {
    $("#filmOuLivre").change(function() {
        if ($("#filmOuLivre").val() == "Film") {
            $(".infosLivre").fadeOut("slow");
        } else {
            $(".infosLivre").fadeIn("slow");
        }
    });

    // Initialize the plugin
    $('#my_popup').popup({
        color: 'white',
        opacity: 1,
        transition: '0.8s',
        scrolllock: true
    });

    $("#my_popup_modify").click(function() {
        $('#my_popup').popup('hide');

        $('html, body').animate({
            scrollTop: 0
        }, 'slow', function() {});

        // Workaround to focus with Chrome
        setTimeout(function() {
            $("#nomLivre").focus();
        }, 1);
    });

    $("#my_popup_ok").click(function() {
        $('#my_popup').popup('hide');

        $.post('../elements/ajouterLivreFilm.php', $('#addForm').serialize());

        ClearTextBox();
        $("#isbn").val("");

        $("html, body").animate({
            scrollTop: $(document).height() - $(window).height()
        });

        // Workaround to focus with Chrome
        setTimeout(function() {
            $("#isbn").focus();
            $("#result").css("color", "green");
		    $("#result").html("L'item a bien été ajouté");
        }, 1);
    });

    $('#researchForm').on('submit', function(e) {
        e.preventDefault();

        var ajaxRequest;

        ClearTextBox();

        /* Get from elements values */
        var value = $("#isbn").val();

        ajaxRequest = $.ajax({
            url: "../XMLParser.php",
            dataType: "JSON",
            type: "POST",
            data: { data: value }
        });

        ajaxRequest.done(function(response, textStatus, jqXHR) {
            FillFields(response);
        });

        ajaxRequest.fail(function(jqXHR, textStatus) {
            $("#result").css("color", "red");
            $("#result").html('There is error while submit');
            console.log("request failed " + textStatus);
        });

        return false;
    });

    function ClearTextBox() {
        $("#nomLivre").val("");
        $("#auteurLivre").val("");
        $("#editLivre").val("");
        $("#sommLivre").val("");
        $("#notLivre").val("");

        $("#result").html("");
    }

    function FillFields(response) {
        // Fields
        $("#nomLivre").val(response[0].nomLivre);
        $("#auteurLivre").val(response[0].auteurLivre);
        $("#editLivre").val(response[0].editeurLivre);
        $("#sommLivre").val(response[0].sommaireLivre);
        $("#notLivre").val(response[0].noteLivre);

        // Popup
        $("#scannerNomLivre").html(response[0].nomLivre);
        $("#scannerAuteurLivre").html(response[0].auteurLivre);
        $("#scannerEditeurLivre").html(response[0].editeurLivre);
        $("#scannerSommaireLivre").html(response[0].sommaireLivre);
        $("#scannerNotesLivre").html(response[0].noteLivre);

        $('#my_popup').popup('show');
    }
});