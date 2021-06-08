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

    <!-----------CREATE BOOKS ----------->
    <div class="CreateBooks">
      <form class="InsertBook" method="post" action="">
        <legend> <h1>Create Books dans BDD :</h1></legend>
        <p>
          <label for="TitleBook">Titre du livre</label>
          <input type="text" name="TitleBook" id="TitleBook" maxlength="100" size="20" required>
        </p>
        
        <p>
          <label for="DescriptionBook">Description du livre</label>
          <input type="text" name="DescriptionBook" id="DescriptionBook" maxlength="100" size="20" required>
        </p>

        <p>
          <label for="DateBook">Date du livre</label>
          <input type="date" name="DateBook" id="DateBook" maxlength="50" size="20" required>
        </p>

        <p>
          <label for="AuteurBook">Auteur du livre</label>
          <input type="text" name="AuteurBook" id="AuteurBook" maxlength="20" size="20" required>
        </p>

        <p>
          <label for="PrixBook">Prix du livre</label>
          <input type="number" name="PrixBook" id="PrixBook" maxlength="20" size="20" required>
        </p>

        <p>
          <label for="ImageBook">Image du livre</label>
          <input type="text" name="ImageBook" id="ImageBook" maxlength="20" size="20" required>
        </p>

        <input type="submit" value="Enregistrer">

      </form>
      <?php FormInsertBook() ?>
    </div>


    <!-- UPDATE AND DELETE BOOKS -->
    <div id="UpdateBooks"> 
      <h1>Update & Delete de la BDD</h1> 
      
      <form action="">
        <label for="Book-Select">Selectionner un livre à modifier:</label>
          <select name="BookSelect" id="book-select">
            <option value="">--Please choose a book to update--</option>
            <?php selectBDD($ReadBookGlobalWithId) ?>
            <input type="submit" id="SelectBook" value="Selectionner ce livre">
          </select>
      </form>

    
      <?php ReadFormForUpdateAndDelete() ?>
    </div>

    
    <script src="js/index.js"></script>
    </body>
</html>