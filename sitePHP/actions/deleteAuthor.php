
<?php 
    include_once('../config/database.php');
    $id= $_GET['id'];
  
    $delete = $db->prepare("DELETE FROM Auteur WHERE id =:id  ");
    $delete->execute([
        'id' => $id,
    ]);
   

    header('Location: ../auteur.php');
    die();
?>