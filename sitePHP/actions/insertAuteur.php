<?php 
require_once('../config/database.php');

$authorInsere = htmlspecialchars(trim(strip_tags($_POST['authorInsere'])));
$bioInsere = htmlspecialchars(trim(strip_tags($_POST['Biographie'])));
$request = "SELECT nom FROM Auteur ";
$get = $db->prepare($request);
$get->execute();
$getAuthor = $get->fetchAll();

if (isset($authorInsere) && isset($bioInsere) && !empty($authorInsere) && !empty($bioInsere)){
    if($getAuthor){
       //insère l'auteur
        $requestAuthor = "INSERT INTO Auteur (nom, biographie) VALUES (:auteur, :bio)";
        $insert = $db->prepare($requestAuthor);
        $insert->execute([
            'auteur' => $authorInsere,
            'bio' => $bioInsere
        ]); 
        header('Location: ../newBook.php?msgAuteur=L\'auteur a bien été ajouté');
        die();
    }
    else{
        header('Location: ../newBook.php?msgAuteur=L\'auteur existe déjà');
        die();
    }
}
else{
    header('Location: ../newBook.php?msgAuteur=Tous les champs n\'ont pas été rempli.');
    die();
}


?>