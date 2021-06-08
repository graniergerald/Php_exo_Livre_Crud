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

    
    <div class="FormInscription">
      <h1>S'incrire</h1>
      <form class="CreateUser" method="post" action="php/TraitementInscription.php">
        <p>
          <label for="PseudoUser">Pseudo</label>
          <input type="text" name="PseudoUser" id="PseudoUser" maxlength="100" size="20" required="">
        </p>
        
        <p>
          <label for="PasswordUser">Mot de passe</label>
          <input type="password" name="PasswordUser" id="PasswordUser" maxlength="100" size="15" required="">
        </p>

        <p>
          <label for="RôleUser">Rôle</label>
          <input type="text" name="RôleUser" id="RôleUser" maxlength="50" size="22" required="">
        </p>

        <p>
          <label for="AdresseMailUser">Adresse Mail</label>
          <input type="email" name="AdresseMailUser" id="AdresseMailUser" maxlength="20" size="15" required="">
        </p>

        <input type="submit" value="S'enregistrer">

      </form>
    </div>

  </body>