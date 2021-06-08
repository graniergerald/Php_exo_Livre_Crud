<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../css/normalize.css">
      <link rel="stylesheet" href="../css/style.css">

      <title>Exo Livre CRUD</title>
  </head>
  <body>

<?php include "main.php"; ?>

<?php

function InsertUser($PseudoUserChars, $PasswordUserHash, $RôleUserChars, $AdresseMailUserChars) {

    $dbco;
    
    Connexion($dbco);

    try {
        $sth = $dbco->prepare("INSERT INTO user(Pseudo, Password, Role, Adresse_Mail)
        VALUES(:Pseudo,:Password,:Role, :Adresse_Mail)");

        $sth->bindValue(':Pseudo', $PseudoUserChars);   
        $sth->bindValue(':Password', $PasswordUserHash);   
        $sth->bindValue(':Role', $RôleUserChars);   
        $sth->bindValue(':Adresse_Mail', $AdresseMailUserChars);    
        $sth->execute();

            echo 'L\'utilisateur a bien été crée.';
            var_dump(password_verify('test5', $PasswordUserHash));
    }

    catch(PDOException $e){
        echo "Erreur :" .$e->getMessage();

    }
};

if(isset($_POST['PseudoUser']) && isset($_POST['PasswordUser']) && isset($_POST['RôleUser']) && isset($_POST['AdresseMailUser']) && !empty($_POST['PseudoUser']) && !empty($_POST['PasswordUser']) && !empty($_POST['RôleUser']) && !empty($_POST['AdresseMailUser'])) {


             
    $PseudoUserChars = valid_data($_POST['PseudoUser']);
    $RôleUserChars = valid_data($_POST['RôleUser']);
    $AdresseMailUserChars = valid_data($_POST['AdresseMailUser']);

    $PasswordUserHash = password_hash($_POST['PasswordUser'], PASSWORD_DEFAULT);




    

} else {
echo 'Il manque des infos';
};

InsertUser($PseudoUserChars, $PasswordUserHash, $RôleUserChars, $AdresseMailUserChars);
?>


<a href="../index.php">Voici un lien pour rediriger vers la page d'accueil</a>

</body>
</html>