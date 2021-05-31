<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="css/normalize.css">
      <link rel="stylesheet" href="css/style.css">

      <title>Exo Livre CRUD</title>
  </head>
  <body>
    <?php include "php/main.php"; ?>
    

    <!-- READBOOKS -->
    <div class="ReadBooks"> 
      <h1>Read de la BDD</h1> 
      <?php AffichageTableauAssoc($ReadBook) ?>
      <p>Une envie, un besoin de changer la carte des livres ? <a href="cud.php">C'est par ici</a></p>
    </div>

    
  </body>
</html>