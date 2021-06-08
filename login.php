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

    <?php include "Lien_header_redirection.php"; ?>

    <div class="FormSeConnecter">
      <h1>Se connecter</h1>
      <form class="ConnectUser" method="post" action="php/TraitementConnect.php">
        <p>
          <label for="PseudoUserConnect">Pseudo</label>
          <input type="text" name="PseudoUserConnect" id="PseudoUserConnect" maxlength="100" size="20" required="">
        </p>
        
        <p>
          <label for="PasswordUserConnect">Mot de passe</label>
          <input type="password" name="PasswordUserConnect" id="PasswordUserConnect" maxlength="100" size="15" required="">
        </p>

        <input type="submit" value="Se connecter">
      </form>
    </div>


    </body>