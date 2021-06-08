<?php



/////////////////////// REQUETE BDD CRUD CO BDD ETC ///


    

function Connexion(&$conn) {
    
    $servername= 'localhost';
    $bdname= 'livre';
    $username= 'root';
    $password='root';
    //on try de se connecter
    try {
        
        $conn = new PDO("mysql:host=$servername;dbname=$bdname",$username, $password);
        // on définit le mode d'erreur de PDO sur Exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // On met ceci en commentaire, on sais maintenant que le lien avec le base de donnée ce fait bien. echo "Connexion à la base de donnée reussi. ";
        // echo "Connexion reussi";
        
    }
    //On capture les exceptions si une exception est lancée et on affiche *les informations relatives à celle-ci*/
    
    catch(PDOException $e) {
        echo "Erreur :" .$e->getMessage();
        
    }
};

/////////////////////////////////////
// VALID DATA
function valid_data ($data) {
    $data = trim($data);
    $data = htmlspecialchars($data);
    return($data);
}

/////////////////////

function InsertBook($title, $description, $date, $auteur, $prix, $image) {

    $dbco;
    
    Connexion($dbco);

    try {
        $sth = $dbco->prepare("INSERT INTO livrelibrairie1(title, description, date, auteur, prix, image)
        VALUES(:title,:description,:date,:auteur, :prix, :image)");

        $sth->bindValue(':title', $title);   
        $sth->bindValue(':description', $description);   
        $sth->bindValue(':date', $date);   
        $sth->bindValue(':auteur', $auteur);   
        $sth->bindValue(':prix', $prix);   
        $sth->bindValue(':image', $image);   
        $sth->execute();

            echo 'Entrée ajoutée dans la table. ';
    }

    catch(PDOException $e){
        echo "Erreur :" .$e->getMessage();

    }
};


function FormInsertBook() {

    if(isset($_POST['TitleBook']) && isset($_POST['DescriptionBook']) && isset($_POST['DateBook']) && isset($_POST['AuteurBook']) && isset($_POST['PrixBook']) && isset($_POST['ImageBook']) && !empty($_POST['TitleBook']) && !empty($_POST['DescriptionBook']) && !empty($_POST['DateBook']) && !empty($_POST['AuteurBook']) && !empty($_POST['PrixBook']) && !empty($_POST['ImageBook'])) {


            
            $TitleBookChars = valid_data($_POST['TitleBook']);
            $DescriptionBookChars = valid_data($_POST['DescriptionBook']);
            $DateBookChars = valid_data($_POST['DateBook']);
            $AuteurBookChars = valid_data($_POST['AuteurBook']);
            $PrixBookChars = valid_data($_POST['PrixBook']);
            $ImageBookChars = valid_data($_POST['ImageBook']);
            
            
            
            
            echo 'Les infos stocké dans la BDD sont : ' .$TitleBookChars. ' / ' .$DescriptionBookChars. ' / ' .$DateBookChars. ' / ' .$DateBookChars. ' / ' .$PrixBookChars. ' / ' .$ImageBookChars. '. ';

            
            InsertBook($TitleBookChars, $DescriptionBookChars, $DateBookChars, $DateBookChars, $PrixBookChars, $ImageBookChars);

        

        

    } else {
        echo 'Il manque des infos';
    }
}


function ReadBookGlobal() {

    $dbco;
    
    Connexion($dbco);

    try {
        $sth = $dbco->prepare("SELECT title, description, date, auteur, prix, image FROM livrelibrairie1") ;
        $sth->execute();
        $dataReadBook = $sth->fetchAll(PDO::FETCH_ASSOC);
        
            
        return $dataReadBook;
            
    }

    catch(PDOException $e){
        echo "Erreur :" .$e->getMessage();

    }
};

$ReadBook =  ReadBookGlobal();


function ReadBookGlobalwithId() {

    $dbco;
    
    Connexion($dbco);

    try {
        $sth = $dbco->prepare("SELECT * FROM livrelibrairie1") ;
        $sth->execute();
        $dataReadBookWithId = $sth->fetchAll(PDO::FETCH_ASSOC);
        
            
        return $dataReadBookWithId;
            
    }

    catch(PDOException $e){
        echo "Erreur :" .$e->getMessage();

    }
};

$ReadBookGlobalWithId = ReadBookGlobalwithId();

function ReadBookById($id) {

    $dbco;
    
    Connexion($dbco);

    try {
        $sth = $dbco->prepare("SELECT * FROM livrelibrairie1 WHERE id=:id") ;
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $ReadBookById = $sth->fetch(PDO::FETCH_ASSOC);
        
            
        return $ReadBookById;
            
    }

    catch(PDOException $e){
        echo "Erreur :" .$e->getMessage();

    }
};

$ReadBookById = ReadBookById($id);

///////FUNCTION UPDATE
function UpdateBookGlobal($title, $description, $date, $auteur, $prix, $image, $id) {

    $dbco;
    
    Connexion($dbco);

    try {
        $sth = $dbco->prepare("UPDATE livrelibrairie1 
        SET title = :title, description = :description, date = :date, auteur = :auteur, prix = :prix, image = :image WHERE id = :id");

        $sth->bindValue(':title', $title, PDO::PARAM_STR);
        $sth->bindValue(':description', $description, PDO::PARAM_STR);
        $sth->bindValue(':date', $date, PDO::PARAM_STR);
        $sth->bindValue(':auteur', $auteur, PDO::PARAM_STR);
        $sth->bindValue(':prix', $prix, PDO::PARAM_INT);
        $sth->bindValue(':image', $image, PDO::PARAM_INT);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
            
    }

    catch(PDOException $e){
        echo "Erreur :" .$e->getMessage();

    }
};


function selectBDD ($NomArray) {
    
    // selectionner l'id ici pour inserer après dans value//
    foreach($NomArray as $key=>$value) {
        foreach($value as $keyb=>$valueb) {
            if ($keyb == "id") {
                // peut être à faire : global $idBook;
                $idBook = $valueb;
            }
            elseif ($keyb == "title") {

                echo '<option value="'.$idBook.'">'.$valueb.'</option>';
            }
        }
}

};

function ReadFormForUpdateAndDelete() {
   
    //On recup les données selectionné de : function selectBDD
    if(isset($_GET['BookSelect'])) {     //Modif le GET et reprendre la fonction pour lié un input select et afficher un form :)
        $id = $_GET['BookSelect'];
        $book = ReadBookById($id);

        echo '<form class="UpdateOrDeleteBook" method="post" action="php/UpdateOrDelete.php">';
        //on affiche le tableaux selectioné en fonction de ce qui est sélectionné ( id )
        foreach($book as $key=>$value) {

                    // Pour afficher l'id du livre mais empecher sa modification
                    if($key =='id'){
                        echo 'L\'id du livre est le numéro ' .$value ;

                        echo '
                        <p>
                        <label for="Update' .$key. 'Book_n°'.$id.'"></label>
                        <input type="hidden" name="Update' .$key. 'Book_n°'.$id.'" id="Update' .$key. 'Book_n°'.$id.'" maxlength="250" size="30" value="'.$value.'" required>
                        </p>';
                    }
    
                    elseif($key == 'date'){
                        echo '
                        <p>
                        <label for="Update' .$key. 'Book_n°'.$id.'">'.$key. '</label>
                        <input type="date" name="Update' .$key. 'Book_n°'.$id.'" id="Update' .$key. 'Book_n°'.$id.'" maxlength="250" size="30" value="'.$value.'" required>
                        </p>';   
                    }
                    //elseif pour faire un input de type number
                    elseif($key == 'prix'){
                        echo '
                        <p>
                        <label for="Update' .$key. 'Book_n°'.$id.'">'.$key. '</label>
                        <input type="number" name="Update' .$key. 'Book_n°'.$id.'" id="Update' .$key. 'Book_n°'.$id.'" maxlength="250" size="30" value="'.$value.'" required>
                        </p>';
                    }
                    //elseif pour faire un input de type file pour le fichier image :) . 
                    //Non fonctionnel à cause du Required au début puis après je me rend compte que la value de base n'est pas pris en compte lors du submit
                    // elseif($key == 'image'){
                    //     echo '
                    //     <p>
                    //     <label for="Update' .$key. 'Book_n°'.$id.'">'.$key. ': l\'image stocké est : ' .$value. '</label>
                    //     <input type="file" name="Update' .$key. 'Book_n°'.$id.'" id="Update' .$key. 'Book_n°'.$id.'" maxlength="250" size="30" value="'.$value.'">
                    //     </p>';
                    // }
                    //else pour faire un input classique de type text
                    else {    
                        echo '
                        <p>
                        <label for="Update' .$key. 'Book_n°'.$id.'">'.$key. '</label>
                        <input type="text" name="Update' .$key. 'Book_n°'.$id.'" id="Update' .$key. 'Book_n°'.$id.'" maxlength="250" size="30" value="'.$value.'" required>
                        </p>';
                    }
                }
                
                echo '<input type="submit" id="InputMAJ" name="InputMAJ" value="Mettre à jour">';
                echo '<input type="submit" id="InputDELETE" name="InputDELETE" value="Supprimer">';
                echo '</form>';
            }
            return 'miaou : '.$id ;
};

$essaireturn = ReadFormForUpdateAndDelete();

    



/////function CRUD DELETE

function DeleteBookGlobal() {

    $dbco;
    
    Connexion($dbco);

    try {
        $sth = $dbco->prepare("DELETE FROM livre WHERE id = :id");
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
            
    }

    catch(PDOException $e){
        echo "Erreur :" .$e->getMessage();

    }
};


//////////////// AFFICHAGE READ //////////////
function AffichageTableauAssoc ($NomArray){
    $i = 1;
    echo '
    <table>
    ';
    foreach($NomArray as $key=>$value) {
        echo '
        <tr> <th> Livre n°' .$i++. '</th></tr>';
        foreach($value as $keyb=>$valueb) {
            if($keyb == "image"){
                echo '<tr><td> <img src="img/'.$valueb.'" alt="'.$valueb.'" height="150px" width="150px"></td></tr> ';

            }

            else {

                echo '<tr><td>'  .$keyb. '</td><td>' .$valueb. '</td></tr> ';
            }
        }
        
    }

    echo '</table>';
}

function AffichageTableauAssocV2 ($NomArray) {
    $size = count($NomArray);
    echo '<table>';
    for($i=0; $i < $size; $i++) {
        echo '<tr>';
            foreach($NomArray[$i] as $key => $value) {
                echo '<td>' .$value. '</td>'; 
            }
        echo '</tr>';
    }
    echo '</table>';
}


function AffichageTableauAssocV3 ($NomArray){
    $i = 1;
    echo '<table>';
    foreach($NomArray as $key=>$value) {
        echo '<tr></tr>';
        foreach($value as $keyb=>$valueb) {
            if($keyb == "image"){
                echo '<td> <img src="img/Livre'.$i.'.jpg" alt="Livre'.$i++.'" height="150px" width="150px"></td> ';

            }

            else {

                echo '<td>' .$valueb. '</td> ';
            }
        }
        
    }

    echo '</table>';
}


function AffichageTableauAssocV4($NomArray){
    $i = 1;
    echo '
    <table>
    ';
    foreach($NomArray as $key=>$value) {
        echo '
        <thead> <th> Livre n°' .$i++. '</th></thead>';
        foreach($value as $keyb=>$valueb) {
            if($keyb == "image"){
                echo '<tr><td> <img src="img/'.$valueb.'" alt="'.$valueb.'" height="150px" width="150px"></td></tr> ';

            }

            else {

                echo '<tr><td>'  .$keyb. '</td><td>' .$valueb. '</td></tr> ';
            }
        }
        
    }

    echo '</table>';
}

////////////// MOT DE PASSE CONNEXION ////////////


?>