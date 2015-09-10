<?php session_start(); ?>

  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Ajouter des films ou des livres</title>
    <meta name="keywords" content="simple, grid, theme, free templates, web design, one page layout, slategray, steelblue, templatemo, CSS, HTML" />

    <link href="../css/templatemo_style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../css/menu_style.css" type="text/css" />
    <script type='text/javascript' src="../js/jquery-1.9.1.min.js"></script>
    <script type='text/javascript' src="../js/ajouterFilmOuLivre.js"></script>
    <script type='text/javascript' src="../js/helper.js"></script>

    <!-- Include jQuery Popup Overlay -->
    <script src="https://cdn.rawgit.com/vast-engineering/jquery-popup-overlay/1.7.10/jquery.popupoverlay.js"></script>
  </head>

  <body>
    <!-- Add content to the popup -->
    <div id="my_popup">

      <h1>------ Informations ------</h1>

      <label class="labelTitle">Nom du livre</label>
      <label id="scannerNomLivre" class="labelGeneral"></label>

      <label class="labelTitle">Auteur du livre</label>
      <label id="scannerAuteurLivre" class="labelGeneral"></label>

      <label class="labelTitle">Editeur du livre</label>
      <label id="scannerEditeurLivre" class="labelGeneral"></label>

      <label class="labelTitle">Sommaire du livre</label>
      <label id="scannerSommaireLivre" class="labelGeneral"></label>

      <label class="labelTitle">Notes reliées au livre</label>
      <label id="scannerNotesLivre" class="labelGeneral"></label>

      <label class="labelTitle">Date publiée</label>
      <label id="scannerPublishedDateLivre" class="labelGeneral"></label>

      <label class="labelTitle">Nombre de pages</label>
      <label id="scannerPageCountLivre" class="labelGeneral"></label>

      <div class="my_popup_bottom">
        <button id="my_popup_modify" class="my_popup_btn">Corriger</button>
        <button id="my_popup_ok" class="my_popup_btn">Ok</button>
      </div>

    </div>

    <div id="templatemo_wrapper">

      <!-- ===================================================== -->
      <?php include("../elements/header.php"); ?>
        <!-- ===================================================== -->

        <!-- ===================================================== -->
        <?php include("../elements/menu.php"); ?>
          <!-- ===================================================== -->
          <div id="templatemo_main">

            <!-- ===================================================== -->
            <div id="about" class="main_box">
              <div id="contact_form">
                <h4>Ajouter un livre ou un film</h4>
                <form method="post" id="addForm" name="ajout" action="../elements/ajouterLivreFilm.php">
                  <label>Nom du livre/film : </label>
                  <input type="text" name="nomLivre" id="nomLivre" value="<?php if(isset($_SESSION['nomLivre'])) echo utf8_encode($_SESSION['nomLivre']); ?>" class="required input_field" />

                  <label for="author">Auteur/Réalisateur : </label>
                  <input type="text" name="auteurLivre" id="auteurLivre" value="<?php if(isset($_SESSION['nomAuteur'])) echo utf8_encode($_SESSION['nomAuteur']); ?>" class="required input_field" />

                  <div class="infosLivre">
                    <label for="author">Éditeur : </label>
                    <input type="text" name="editeurLivre" id="editLivre" value="<?php if(isset($_SESSION['editeur'])) echo utf8_encode($_SESSION['editeur']); ?>" class="required input_field" />
                  </div>

                  <label for="author">Sommaire : </label>
                  <textarea name="sommaireLivre" id="sommLivre" class="required input_large_field"><?php if(isset($_SESSION['sommaire'])) echo utf8_encode($_SESSION['sommaire']); ?></textarea>

                  <label for="author">Notes : </label>
                  <textarea name="noteLivre" id="notLivre" class="required input_large_field"><?php if(isset($_SESSION['note'])) echo utf8_encode($_SESSION['note']); ?></textarea>

                  <div class="infosLivre">
                    <label>Date publiée : </label>
                    <input type="text" name="publishedDate" id="publishedDate" value="<?php if(isset($_SESSION['publishedDate'])) echo utf8_encode($_SESSION['publishedDate']); ?>" class="required input_field" />

                    <label>Nombre de pages : </label>
                    <input type="text" name="pageCount" id="pageCount" value="<?php if(isset($_SESSION['pageCount'])) echo utf8_encode($_SESSION['pageCount']); ?>" class="required input_field" />
                  </div>
                  
                  <label for="author">Emplacement du livre/film : </label>
                  <?php include("../elements/afficherEmplacement.php") ?>

                    <label for="author">Type : </label>
                    <select id="filmOuLivre" name="LivreOrFilm">
                      <option>Livre</option>
                      <option>Film</option>
                    </select>

                    </br>
                    <input type="submit" value="Ajouter" class="submit_btn float_l" />
                </form>

                <div class="infosLivre">
                  <h4>Faire une recherche avec le code barre</h4>
                  <h6>Sélectionner la zone de texte et scanner le livre:</h6>
                  </br>

                  <form id="researchForm" name="recherche">
                    <label for="author">Code barre : </label>
                    <input type="text" id="isbn" name="isbn" class="required input_field" />
                    </br>
                    <input id="btnSearchISBN" type="submit" value="Rechercher le code barre" class="submit_btn float_l" />
                  </form>
                </div>

                <div id="result" class="message"></div>
              </div>
              <!-- END of about -->
              <?php include("../elements/afficherMessage.php"); ?>
                <!-- ===================================================== -->
            </div>
            <!-- END of -->

            <!-- ===================================================== -->
            <?php include("../elements/footer.php"); ?>
              <!-- ===================================================== -->

          </div>

          <div>
            <span id="popupEmplacement">
              <img id="imgEmplacement" class="popupEmplacementImage" src="" alt="" />
            </span>
          </div>
          
  </body>

  </html>