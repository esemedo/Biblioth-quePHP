
<?php 
require_once('../config/database.php');
    $title = htmlspecialchars(trim(strip_tags($_POST['title'])));
    $synopsis = htmlspecialchars(trim(strip_tags($_POST['synopsis'])));
    $listAuthor = htmlspecialchars(trim(strip_tags($_POST['listAuthor'])));
    
    $request = "SELECT id FROM Auteur WHERE nom = :nom";
    $get = $db->prepare($request);
    $get->execute([
        'nom' => $listAuthor,
    ]);
    $getAuthor = $get->fetch();

        if (isset($title) && !empty($title) && isset($synopsis) && !empty($synopsis) && isset($listAuthor) && !empty($listAuthor) ) {
            $request = "INSERT INTO Livre(titre, Synopsis , id_auteur) VALUES (:title, :synopsis, :id_auteur)";
            $insert = $db->prepare($request);
            $insert->execute([
                'title' => $title,
                'synopsis' => $synopsis,
                'id_auteur' => $getAuthor['id'],
            ]); 
         
            header('Location: ../home.php');
            die();
        }
    
    header('Location: ../newBook.php?msg=Tous les champs n\'ont pas été rempli.');
    die();
?>