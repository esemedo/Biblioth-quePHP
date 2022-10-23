<?php
require_once('config/database.php');

$termeDeRecherche = htmlspecialchars(trim(strip_tags($_POST["recherche"])));
if (isset($termeDeRecherche)){
        $termeDeRecherche = strtolower($termeDeRecherche);
        $selection = $db->prepare("SELECT titre, synopsis FROM Livre WHERE titre LIKE :titre OR synopsis LIKE :synopsis");
        $selection->execute([
            'titre' =>"%".$termeDeRecherche."%", 
            'synopsis' => "%".$termeDeRecherche."%"]);
    }
    else{
        $msg = "Vous devez entrer votre requete dans la barre de recherche";
    }  
 
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/header.css">
        <link rel="stylesheet" href="assets/css/barreDeRecherche.css">
        <link rel="stylesheet" href="assets/css/footer.css">
    <title>Bibliothèque - résultats de recherche</title>
    </head>

    <body>
        <?php include_once('view/header.php');?>
       
        <?php
        if(isset($termeDeRecherche)){
            while($termeSelectionner = $selection->fetch()){
                echo "<div><h2>".$termeSelectionner['titre']."</h2><p> ".$termeSelectionner['synopsis']."</p>";
                    $selection->closeCursor();
            }}?>
            <?php include_once('view/footer.php');?>
    </body>
</html>