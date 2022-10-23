<?php

require_once('../config/database.php');
$postData = $_POST; 

if (isset($postData['id']) &&  ! empty($postData['id']) && isset($postData['nom']) && ! empty($postData['nom']) 
        && isset($postData['bio']) && ! empty($postData['bio'])){ 

    $updateAuthor = $db->prepare("UPDATE Auteur SET nom = :nom, biographie = :bio WHERE id = :id");
    $updateAuthor->execute([
        'nom' => $postData['nom'],
        'bio' => $postData['bio'],
        'id' => $postData['id'],
    ]);    
    header('Location: ../auteur.php');
    die();
}


else { ?>
    <p>Tous les champs n'ont pas été rempli.</p>
    <a href="../modificationAuteur.php?id=<?= $postData['id'];?>">Retourner à la page d'édition</a>
<?php } ?>