<?php session_start(); ?>
  <!DOCTYPE html>
  <html>

  <head>
    <?php include("../elements/views/sections/header.php"); ?>
      <title>Liste des films</title>
      <link rel="stylesheet" href="/Library/Content/css/popupFilm.css" type="text/css" />
      <script type='text/javascript' src="/Library/Content/js/views/listeFilms.js"></script>
  </head>

  <body>

    <?php include("../elements/views/popup/overlayFormFilms.php"); ?>

      <div id="templatemo_wrapper">

        <!-- ===================================================== -->
        <?php include("../elements/views/sections/menu.php"); ?>
          <!-- ===================================================== -->

          <div id="templatemo_main">
            <!-- ===================================================== -->
            <div id="contact_form">
              <h4>Effectuer une recherche</h4>
              <form method="post" name="recherche" action="../elements/search/rechercheFilm.php">
                <label>Nom du film : </label>
                <input type="text" name="nomFilm" class="required input_field" />
                <label for="author">Réalisateur du film : </label>
                <input type="text" name="realisateurFilm" class="required input_field" />
                <label for="author">Emplacement du film : </label>
                <input type="text" name="emplacementFilm" class="required input_field" />
                </br>
                <input type="submit" value="Rechercher" class="submit_btn float_l" />
              </form>

            </div>

            <label id="numberOfRows"></label>

            <div id="home" class="tableau">
              <div class="CSS_Table_Example">
                <table id="tableFilm">
                  <tr>
                    <th>Titre du film</th>
                    <th>Réalisateur du film</th>
                    <th>Emplacement</th>
                  </tr>
                  <?php include("../elements/show/afficherFilm.php"); ?>
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