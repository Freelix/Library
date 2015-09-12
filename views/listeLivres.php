<?php session_start(); ?>
  <!DOCTYPE html>
  <html>

  <head>
    <?php include("../elements/views/sections/header.php"); ?>
      <title>Liste des livres</title>
      <link rel="stylesheet" href="/Library/Content/css/popupLivre.css" type="text/css" />
      <script type='text/javascript' src="/Library/Content/js/views/listeLivres.js"></script>
  </head>

  <body>

    <?php include("../elements/views/popup/overlayFormLivres.php"); ?>

      <div id="templatemo_wrapper">

        <!-- ===================================================== -->
        <?php include("../elements/views/sections/menu.php"); ?>
          <!-- ===================================================== -->

          <div id="templatemo_main">
            <!-- ===================================================== -->
            <div id="contact_form">
              <h4>Effectuer une recherche</h4>
              <form method="post" name="recherche" action="../elements/search/rechercheLivre.php">
                <label>Nom du livre : </label>
                <input type="text" name="nomLivre" class="required input_field" />
                <label for="author">Auteur du livre : </label>
                <input type="text" name="auteurLivre" class="required input_field" />
                <label for="author">Emplacement du livre : </label>
                <input type="text" name="emplacementLivre" class="required input_field" />
                </br>
                <input type="submit" value="Rechercher" class="submit_btn float_l" />
              </form>
            </div>

            <label id="numberOfRows"></label>

            <div id="home" class="tableau">
              <div class="CSS_Table_Example">
                <table id="tableLivre">
                  <thead>
                    <tr>
                      <th class="hide"></th>
                      <th>Titre du livre</th>
                      <th>Auteur du livre</th>
                      <th>Emplacement</th>
                      <th class="hide"></th>
                      <th class="hide"></th>
                      <th class="hide"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php include("../elements/show/afficherLivre.php"); ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- END of home -->

            <?php include("../elements/views/sections/arrows.php"); ?>
              <!-- ===================================================== -->
          </div>
          <!-- END of -->

          <!-- ===================================================== -->
          <?php include("../elements/views/sections/footer.php"); ?>
            <!-- ===================================================== -->

      </div>

      <?php include("../elements/views/popup/popupEmplacements.php"); ?>

  </body>

  </html>