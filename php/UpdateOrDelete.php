<link rel="stylesheet" href="../css/normalize.css">
<link rel="stylesheet" href="../css/style.css">

<?php
include "main.php";


if (isset($_POST['InputMAJ'])) {


        if(isset($_POST['TitleBook']) && isset($_POST['DescriptionBook']) && isset($_POST['DateBook']) && isset($_POST['AuteurBook']) && isset($_POST['PrixBook']) && isset($_POST['ImageBook']) && isset($_POST['id']) && !empty($_POST['TitleBook']) && !empty($_POST['DescriptionBook']) && !empty($_POST['DateBook']) && !empty($_POST['AuteurBook']) && !empty($_POST['PrixBook']) && !empty($_POST['ImageBook']) && !empty($_POST['id'])) {
    
    
                
                $TitleBookChars = valid_data($_POST['TitleBook']);
                $DescriptionBookChars = valid_data($_POST['DescriptionBook']);
                $DateBookChars = valid_data($_POST['DateBook']);
                $AuteurBookChars = valid_data($_POST['AuteurBook']);
                $PrixBookChars = valid_data($_POST['PrixBook']);
                $ImageBookChars = valid_data($_POST['ImageBook']);

                $id = ($_POST['id']);
                
                
                
                
                echo 'Les infos stocké dans la BDD sont : ' .$TitleBookChars. ' / ' .$DescriptionBookChars. ' / ' .$DateBookChars. ' / ' .$DateBookChars. ' / ' .$PrixBookChars. ' / ' .$ImageBookChars. '. ';
    
                
                UpdateBookGlobal($TitleBookChars, $DescriptionBookChars, $DateBookChars, $DateBookChars, $PrixBookChars, $ImageBookChars, $id);
    
            
    
            
    
        } else {
            echo 'Il manque des infos';
        }
    echo '<p>Ce livre a été mis à jour</p>';

};

if (isset($_POST['InputDELETE'])) {
    echo '<p>Ce Livre a été supprimer</p>';
    echo $essaireturn;

};




?>

<a href="../index.php">Voici un lien pour rediriger vers la page d'accueil</a>