<?php 
require_once('config/database.php');

$requete = "SELECT Livre.id, titre, Synopsis, Auteur.nom FROM Livre INNER JOIN Auteur ON Livre.id_auteur = Auteur.id";
$livre = $db->prepare($requete);
$livre->execute();
$livreRecupere = $livre->fetchAll();

 
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
    <title>Bibliothèque</title>
</head>
<body>
    <?php include_once('view/header.php');?>
  

   <div class = "big_container"> 
        <form action="search.php" method="POST" class="formulaire">
        <input type="search" name="recherche" id="recherche">
        <button type="submit" value="Rechercher" class="button">Rechercher</button>
        </form>
    
    <?php if (isset($livreRecupere)) {
        foreach ($livreRecupere as $livres) { 
            ?>
    
        <section class="container">
            <ul class = "livre">
                <li class= "titre"><?= $livres['titre']?></li>
                <li class ="resume"><?= $livres['Synopsis']?></li>
                <li class = "auteur"><?= $livres['nom']?></li>
            </ul>
            <div class ="edition">
                <div class ="modification">
                    <a href="Modification.php?id=<?php echo $livres['id'];?>" class="mod">Modifier le livre</a>
                </div>
                <div class ="supression">
                    <a href="actions/delete.php?id=<?php echo $livres['id'];?>" class="sup">Supprimer le livre</a>
                </div>
            </div>
        </section>
        <div class = "separateur"></div>
    </div>
    <?php } }?>
     
    <?php include_once('view/footer.php');?>
</body>
</html>