<?php 
    require_once('config/database.php');

$id_auteur = $_GET['id']; 


 
if (isset($id_auteur)) {
    $auteur = $db->prepare("SELECT nom, biographie FROM Auteur WHERE id= :id");
    $auteur->execute([
        'id' => $id_auteur,
    ]);
    $auteurs = $auteur->fetch();
}
strip_tags($auteurs['biographie']);
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
    <title>Bibliothèque - Edition de l'Auteur</title>
</head>
<body>
    <?php include_once('view/header.php'); ?>

    <section class="big_container">
        <h1>Mettre à jour <?php echo($auteurs['nom']); ?></h1>
        <form action="actions/updateAuthor.php" method="POST">
            <p>
                <input type="hidden"  id="id_auteur" name="id" value="<?= $id_auteur; ?>">
            </p>
            <p class="champ">
                <label for="nom">Nom de l'auteur : </label>                
                <input type="text" id="nom" name="nom" value="<?php echo($auteurs['nom']); ?>">
            </p>
            <p>
                <textarea  id="biographie" name="bio" cols=60 rows=20>
                    <?php echo $auteurs['biographie']; ?>
                </textarea>
            </p>
                <button type="submit" class="button">Envoyer</button>
            </form>
    </section>
    <br />
    <?php include_once('view/footer.php');?>
</body>
</html>