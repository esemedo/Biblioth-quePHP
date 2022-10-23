<?php 
    require_once('config/database.php');

$id = $_GET['id']; 

 
if (isset($id)) {
    $livre = $db->prepare("SELECT titre, synopsis FROM Livre WHERE Livre.id = :id");
    $livre->execute([
        'id' => $id,
    ]);
    $livres = $livre->fetch();

    $auteur = $db->prepare("SELECT id, nom FROM Auteur ");
    $auteur->execute();
    $auteurs = $auteur->fetchAll();
   
    strip_tags($livres['synopsis']);
   
}
?>

<!DOCTYPE html>
<html>
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/modif.css">
    <link rel="stylesheet" href="assets/css/footer.css">

    <title>Bibliothèque - Edition de livre</title>
</head>
<body >
    <?php include_once('view/header.php'); ?>
    <div class="big_container">
        <h1>Mettre à jour <?php echo($livres['titre']); ?></h1>
        <form action="actions/update.php" method="POST">
            <p>
                <input type="hidden"  id="id" name="id" value="<?= $id; ?>">
            </p>
            <p class="champ">
                <label for="title">Titre du livre : </label>                
                <input type="text" id="title" name="title" value="<?php echo($livres['titre']); ?>">
            </p>
            <p>
            
                <textarea  id="synopsis" name="synopsis" cols=60 rows=20>
                    <?php echo $livres['synopsis']; ?>
                </textarea>
            </p>
            <p >
                <select name="newAuthor" id="listAuteur" >
                    <?php if (isset($auteurs)) {?>
                        <option value="Selection">-- Sélectionner un Auteur --</option>
                    <?php foreach ($auteurs as $listAuteur) {?>   
                        <option value="<?= $listAuteur['nom'] ?>"><?= $listAuteur['nom'] ?></option>
                    <?php }  }?> 
                </select>
            </p>
                <button type="submit" class="button" >Envoyer</button>
        </form>
    </div>
    <br />
    <?php include_once('view/footer.php');?>
</body>
</html>