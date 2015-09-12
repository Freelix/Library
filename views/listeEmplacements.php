<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
  <?php include("../elements/views/sections/header.php"); ?>
    <title>Gérer les emplacements</title>
    <script type='text/javascript' src="/Library/Content/js/views/listeEmplacements.js"></script>
</head>

<body>

  <div id="templatemo_wrapper">

    <!-- ===================================================== -->
    <?php include("../elements/views/sections/menu.php"); ?>
      <!-- ===================================================== -->
      <div id="templatemo_main">

        <!-- ===================================================== -->
        <div id="about" class="main_box">
          <div id="contact_form">
            <h4>Gérer les emplacements</h4>
            <form method="post" name="delete" action="../elements/delete/supprimerEmplacement.php">
              <label for="author">Nom de l'emplacement : </label>
              <?php include("../elements/show/afficherEmplacement.php") ?>

                </br>
                <input type="submit" value="Supprimer" class="submit_btn float_l" />
            </form>

            <form method="post" enctype="multipart/form-data" name="ajout" action="../elements/add/ajouterEmplacement.php">
              <label>Ajouter un emplacement : </label>
              <input id="inputEmplacement" type="text" name="nomEmplacement" class="required input_field" />

              <img id="imgEmplacement" class="imgEmplacement" src="" alt="" />

              <br/>
              <input id="btnSubmitEmplacement" type="submit" value="Ajouter" class="submit_btn float_l" />
              <br/>
              <input id="btnUploadImage" name="image" type='file' onchange="readURL(this);" />
            </form>
          </div>
        </div>
        <!-- END of about -->

        <?php include("../elements/show/afficherMessageEmplacement.php"); ?>
          <!-- ===================================================== -->
      </div>
      <!-- END of -->

      <!-- ===================================================== -->
      <?php include("../elements/views/sections/footer.php"); ?>
        <!-- ===================================================== -->

  </div>

</body>

</html>