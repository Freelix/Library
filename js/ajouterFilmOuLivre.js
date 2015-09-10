$(document).ready(function() {
    $("#filmOuLivre").change(function() {
        if ($("#filmOuLivre").val() == "Film") {
            $(".infosLivre").fadeOut("slow");
        } else {
            $(".infosLivre").fadeIn("slow");
        }
    });

    // Automatically send the form with the scanner
    $('#isbn').keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);

        if (keycode == 9834) // 9834 --> ♪ --> symbol used by my scanner
        {
            $("#btnSearchISBN").trigger("click");
        }
    });

    // Show locations in popup on mouseover
    $("#emplacementDropDown").change(function() {
        setImageEmplacement();
    });

    $("#emplacementDropDown").mouseover(function(){
        $("#popupEmplacement").show();
    });

    $("#emplacementDropDown").mouseout(function(){
        $("#popupEmplacement").hide();
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

        //$.post('../elements/ajouterLivreFilm.php', $('#addForm').serialize());

        ajaxRequest = $.ajax({
            url: "../elements/ajouterLivreFilm.php",
            dataType: "html",
            type: "POST",
            data: $("#addForm").serialize()
        });

        ajaxRequest.done(function(response, textStatus, jqXHR) {
            ClearTextBox();
            $("#isbn").val("");

            $("#result").css("color", "green");
            $("#result").html(response);

            $("html, body").animate({
                scrollTop: $(document).height() - $(window).height()
            });
        });

        ajaxRequest.fail(function(xhr, textStatus, error) {
            $("#result").css("color", "red");
            $("#result").html(xhr.responseText);

            $('html, body').animate({
                scrollTop: 0
            }, 'slow', function() {});

            // Workaround to focus with Chrome
            setTimeout(function() {
                $("#nomLivre").focus();
            }, 1);
        });
    });

    $('#researchForm').on('submit', function(e) {
        e.preventDefault();

        var ajaxRequest;

        ClearTextBox();

        /* Get from elements values */
        var value = $("#isbn").val();
        
        if (value != "" && value.match(/^\d+$/)) {        
            ajaxRequest = $.ajax({
                url: "../ISBNRequests/JSONParser.php",
                dataType: "JSON",
                type: "POST",
                data: { data: value }
            });

            ajaxRequest.done(function(response, textStatus, jqXHR) {
                $("#isbn").val("");
                FillFields(response);
            });

            ajaxRequest.fail(function(jqXHR, textStatus) {
                $("#isbn").val("");
                $("#result").css("color", "red");
                $("#result").html('Aucun résultat trouvé');
            });
        }
        else {
            $("#result").css("color", "red");
            $("#result").html('Vous devez inscrire un code numérique');
        }

        return false;
    });

    $('#addForm').on('submit', function(e) {
        e.preventDefault();

        ajaxRequest = $.ajax({
            url: "../elements/ajouterLivreFilm.php",
            dataType: "html",
            type: "POST",
            data: $(this).serialize()
        });

        ajaxRequest.done(function(response, textStatus, jqXHR) {
            ClearTextBox();
            $("#isbn").val("");

            $("#result").css("color", "green");
            $("#result").html(response);

            $("html, body").animate({
                scrollTop: $(document).height() - $(window).height()
            });
        });

        ajaxRequest.fail(function(xhr, textStatus, error) {
            $("#result").css("color", "red");
            $("#result").html(xhr.responseText);

            $("html, body").animate({
                scrollTop: $(document).height() - $(window).height()
            });
        });

        return false;
    });

    function ClearTextBox() {
        $("#nomLivre").val("");
        $("#auteurLivre").val("");
        $("#editLivre").val("");
        $("#sommLivre").val("");
        $("#notLivre").val("");
        $("#publishedDate").val("");
        $("#pageCount").val("");

        $("#result").html("");
    }

    function FillFields(response) {
        // Fields
        $("#nomLivre").val(response[0].nomLivre);
        $("#auteurLivre").val(response[0].auteurLivre);
        $("#editLivre").val(response[0].editeurLivre);
        $("#sommLivre").val(response[0].sommaireLivre);
        $("#notLivre").val(response[0].noteLivre);
        $("#publishedDate").val(response[0].publishedDate);
        $("#pageCount").val(response[0].pageCount);

        // Popup
        $("#scannerNomLivre").html(response[0].nomLivre);
        $("#scannerAuteurLivre").html(response[0].auteurLivre);
        $("#scannerEditeurLivre").html(response[0].editeurLivre);
        $("#scannerSommaireLivre").html(response[0].sommaireLivre);
        $("#scannerNotesLivre").html(response[0].noteLivre);
        $("#scannerPublishedDateLivre").html(response[0].publishedDate);
        $("#scannerPageCountLivre").html(response[0].pageCount);

        $('#my_popup').popup('show');
    }
});