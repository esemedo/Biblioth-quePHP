<?php 
require_once('config/database.php');
    if (isset($_GET['msg']) ){
        $msg = $_GET['msg'];
    }if (isset($_GET['msgAuteur'])) {
        $msgAuteur = $_GET['msgAuteur'];
    }
    $request = "SELECT nom FROM Auteur ";
    $get = $db->prepare($request);
    $get->execute();
    $getAuthor = $get->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/insert.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <title>Bibliothèque - Ajout de livres</title>
</head>
<body>
    <?php include_once('view/header.php'); ?>
   

    <main class="container">
    <section class="auteur">
        <h1>Ajouter un auteur</h1>
            <?php if (isset($msgAuteur)){?>
                <p class="message"> <?= $msgAuteur ?></p>
            <?php }?>
            <form action="actions/insertAuteur.php" method="post">
                <p class="champ">
                    <label for="champAuteur"> Auteur : </label>
                    <input type="text" name="authorInsere" id="champAuteur">
                </p>
                
                <p>
                    <textarea name="Biographie" id="Bio" cols = 40 rows=20 placeholder = "Biographie de l'auteur"></textarea>
                </p>
                <p class="valider">
                    <button type="submit" class="button" >Valider</button>
                </p>
            </form>
    </section>
    <section class ="livre">
        <h1>Ajouter un livre</h1>
        <?php if (isset($msg)){?>
            <p class="message"><?= $msg ?></p>
        <?php }?>
        <form action="actions/insertLivre.php" method="POST">
            <p class="champ">
                <label for="titre"> Titre : </label>
                <input type="text" name="title" id="titre">
            </p>

            <p>
                <textarea name="synopsis" id="resume" cols = 40 rows=20 placeholder = "Synopsis"></textarea>
            </p>
            <select name="listAuthor" id="listAuthor" >
                <?php if (isset($getAuthor)) {
                    foreach ($getAuthor as $author) {?>
                        <option value="<?= $author['nom'] ?>"id=list><?= $author['nom'] ?></option>
                    <?php } } ?>
            </select>
            <p class="valider">
               <button type="submit" class="button" >Valider</button>
            </p>
        </form>
    </section>
    </main>
    <?php include_once('view/footer.php');?>
</body>
</html>