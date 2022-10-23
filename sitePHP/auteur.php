<?php
require_once('config/database.php');
   $request = "SELECT nom, id, biographie FROM Auteur ";
   $get = $db->prepare($request);
   $get->execute();
   $getAuthor = $get->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/css/barreDeRecherche.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <title>Bibliothèque - Auteurs</title>
</head>
<body>
    <?php include_once('view/header.php');?>
  

    <form action="searchAuthor.php" method="POST" class="formulaire">
        <input type="search" name="rechercheAuteur" id="recherche">
        <button type="submit" value="Rechercher" class="button">Rechercher</button>
    </form>
    
    <div class="big_container">
    <?php if (isset($getAuthor)) {
        foreach ($getAuthor as $author) { ?>
        <section class="container">
            <ul class = "livre">
                <li class = "titre"><?= $author['nom']?></li>
                <li class = "auteur"><?= $author['biographie']?></li>
            </ul>
            <div class="edition">
                <div class="modification">
                <a href="modificationAuteur.php?id=<?php echo $author['id'];?> " class="mod">Modifier </a>
                </div>
                <div class ="supression">    
                    <a href="actions/deleteAuthor.php?id=<?php echo $author['id'];?>" class="sup">Supprimer </a>
                </div>
            </div> 
        </section>
        <div class="separateur"></div>
    </div>
   <?php } }?>
     
   <?php include_once('view/footer.php');?>
</body>
</html>