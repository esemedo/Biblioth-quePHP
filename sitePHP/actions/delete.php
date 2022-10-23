
<?php 
    include_once('../config/database.php');
    $id= $_GET['id'];
  
    $delete = $db->prepare("DELETE FROM Livre WHERE id =:id  ");
    $delete->execute([
        'id' => $id,
    ]);
   

    header('Location: ../home.php');
    die();
?>