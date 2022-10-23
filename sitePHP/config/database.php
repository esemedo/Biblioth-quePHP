<?php
 include_once('db.php');
    try {
        $db = new PDO ('mysql:host=' .$conf['hostname'].';dbname='.$conf['nameBDD'].';charset=utf8', $conf['username'] , $conf['password'],[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } 
    catch (PDOException $e) {
        die('Erreur : ' . $e -> getMessage());
    }
?>