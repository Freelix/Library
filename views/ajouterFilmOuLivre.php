<?php session_start(); ?>
  <!DOCTYPE>
  <html>

  <head>
    <?php include("../elements/views/sections/header.php"); ?>
      <title>Ajouter des films ou des livres</title>
      <script type='text/javascript' src="/Library/Content/js/views/ajouterFilmOuLivre.js"></script>

      <!-- Include jQuery Popup Overlay -->
      <script src="https://cdn.rawgit.com/vast-engineering/jquery-popup-overlay/1.7.10/jquery.popupoverlay.js"></script>
  </head>

  <body>
    <?php include("../elements/views/popup/popupAddItem.php"); ?>

      <div id="templatemo_wrapper">

        <!-- ===================================================== -->
        <?php include("../elements/views/sections/menu.php"); ?>
          <!-- ===================================================== -->
          <div id="templatemo_main">

            <!-- ===================================================== -->
            <div id="about" class="main_box">
              <div id="contact_form">
                <h4>Ajouter un livre ou un film</h4>
                <form method="post" id="addForm" name="ajout" action="../elements/add/ajouterLivreFilm.php">
                  <label>Nom du livre/film : </label>
                  <input type="text" name="nomLivre" id="nomLivre" value="<?php if(isset($_SESSION['nomLivre'])) echo utf8_encode($_SESSION['nomLivre']); ?>" class="required input_field" />

                  <label for="author">Auteur/Réalisateur : </label>
                  <input type="text" name="auteurLivre" id="auteurLivre" value="<?php if(isset($_SESSION['nomAuteur'])) echo utf8_encode($_SESSION['nomAuteur']); ?>" class="required input_field" />

                  <div class="infosLivre">
                    <label for="author">Éditeur : </label>
                    <input type="text" name="editeurLivre" id="editLivre" value="<?php if(isset($_SESSION['editeur'])) echo utf8_encode($_SESSION['editeur']); ?>" class="required input_field" />
                  </div>

                  <label for="author">Sommaire : </label>
                  <textarea name="sommaireLivre" id="sommLivre" class="required input_large_field">
                    <?php if(isset($_SESSION['sommaire'])) echo utf8_encode($_SESSION['sommaire']); ?>
                  </textarea>

                  <label for="author">Notes : </label>
                  <textarea name="noteLivre" id="notLivre" class="required input_large_field">
                    <?php if(isset($_SESSION['note'])) echo utf8_encode($_SESSION['note']); ?>
                  </textarea>

                  <div class="infosLivre">
                    <label>Date publiée : </label>
                    <input type="text" name="publishedDate" id="publishedDate" value="<?php if(isset($_SESSION['publishedDate'])) echo utf8_encode($_SESSION['publishedDate']); ?>" class="required input_field" />

                    <label>Nombre de pages : </label>
                    <input type="text" name="pageCount" id="pageCount" value="<?php if(isset($_SESSION['pageCount'])) echo utf8_encode($_SESSION['pageCount']); ?>" class="required input_field" />
                  </div>

                  <label for="author">Emplacement du livre/film : </label>
                  <?php include("../elements/show/afficherEmplacement.php") ?>

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
              <?php include("../elements/show/afficherMessage.php"); ?>
                <!-- ===================================================== -->
            </div>
            <!-- END of -->

            <!-- ===================================================== -->
            <?php include("../elements/views/sections/footer.php"); ?>
              <!-- ===================================================== -->

          </div>
      </div>

      <?php include("../elements/views/popup/popupEmplacements.php"); ?>

  </body>

  </html>