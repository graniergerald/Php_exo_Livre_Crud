<link rel="stylesheet" href="../css/normalize.css">
<link rel="stylesheet" href="../css/style.css">

<?php include "main.php"; ?>
<?php
    if(isset($_POST['PseudoUserConnect']) && isset($_POST['PasswordUserConnect']) && !empty($_POST['PseudoUserConnect']) && !empty($_POST['PasswordUserConnect'])) {


            
        $PseudoUserConnectChars = valid_data($_POST['PseudoUserConnect']);

        
        $PseudoUserConnect = SelectUser($PseudoUserConnectChars);

        $PasswordUserConnect = $PseudoUserConnect['Password'];

        echo $PasswordUserConnect ;
        echo '</br>';
        echo '</br>';
        echo $_POST['PasswordUserConnect'];
        echo '</br>';
        echo '</br>';

        $hash = password_hash('test4', PASSWORD_DEFAULT);
        echo '</br>';
        echo '</br>';
    

        /// VERIFIER Si le hash du mdp taper correspon au hash du mdp du user de l
        if(password_verify($_POST['PasswordUserConnect'], $PasswordUserConnect)) {
            session_start();

            echo 'Session validé :)';
            $_SESSION['user'] = $user['pseudo']; 
        } else {
            echo 'L\'identifiant ou le mot de passe est invalide.';
        };

    } else {
    echo 'Il manque des infos';
    };


    function SelectUser($PseudoUserConnect) {

        $dbco;
        
        Connexion($dbco);
    
        try {
            $sth = $dbco->prepare("SELECT Pseudo, Password, Role, Adresse_Mail FROM user WHERE Pseudo = :Pseudo ") ;
            $sth->bindValue(':Pseudo', $PseudoUserConnect, PDO::PARAM_INT);
            $sth->execute();
            $dataReadUser = $sth->fetch(PDO::FETCH_ASSOC);
            
                
            return $dataReadUser;
                
        }
    
        catch(PDOException $e){
            echo '</br>';
            echo "Erreur :" .$e->getMessage();
    
        }
    };
    

?>


<?php 

if(isset($_POST['PseudoUser']) && isset($_POST['PasswordUser']) && isset($_POST['RôleUser']) && isset($_POST['AdresseMailUser']) && !empty($_POST['PseudoUser']) && !empty($_POST['PasswordUser']) && !empty($_POST['RôleUser']) && !empty($_POST['AdresseMailUser'])) {


            
    $PseudoUserChars = valid_data($_POST['PseudoUser']);
    $RôleUserChars = valid_data($_POST['RôleUser']);
    $AdresseMailUserChars = valid_data($_POST['AdresseMailUser']);

    $PasswordUserHash = password_hash($_POST['PasswordUser'], PASSWORD_DEFAULT);




    

} else {
echo 'Il manque des infos';
};

?>