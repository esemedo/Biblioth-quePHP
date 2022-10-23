<?php

require_once('../config/database.php');
$postData = $_POST; 

if ($postData['newAuthor'] != "Selection") {
   
    if (isset($postData['id']) &&  ! empty($postData['id']) && isset($postData['title']) && ! empty($postData['title']) 
        && isset($postData['synopsis']) && ! empty($postData['synopsis']) && isset($postData['newAuthor']) && ! empty($postData['newAuthor'])){ 

            $idAuthor = $db->prepare("SELECT id FROM auteur WHERE nom = :nom");
            $idAuthor->execute([
            'nom' => $postData['newAuthor'],
            ]);
            $getIdAuthor = $idAuthor->fetch();

            $updateLivre = $db->prepare("UPDATE Livre SET titre = :title, synopsis = :synopsis, id_auteur = :id_auteur WHERE id = :id");
            $updateLivre->execute([
            'title' => $postData['title'],
            'synopsis' => $postData['synopsis'],
            'id_auteur' => $getIdAuthor['id'],
            'id' => $postData['id']
            ]);
            
            header('Location: ../home.php');
            die();
        }

}?>	
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/update.css">
    <title>Bibliothèque - Erreur</title>
</head>
<body>
  
    <?php if ($postData['newAuthor'] == "Selection") { ?>
    <h1 class="titre">❌ Tous les champs n'ont pas été rempli ❌</h1>
    
    <div class="lien">
        <img src="../assets/images/giphy3.webp" alt="GIF" class="gif">
        <a class="edition" href="../Modification.php?id=<?= $postData['id'];?>">Retourner à la page d'édition</a>
    </div>
    
<?php } ?>
</body>
</html>









