<?php

// Suppression d'un article dans la BD à partir du formulaire

$id=$_GET['id']; 
$title=$_GET['title'];

try {
    require_once("db.php");
    $cnx->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $cnx->exec("SET NAMES 'UTF8';");
    if($cnx) echo "CONNEXION OK<br>";
    $sql = "DELETE FROM posts WHERE Id = :id ";
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    echo "Titre ".$title." effacé. <br>";
    header('location:index.php');
}   catch (Exception $ex) {
        die ('Erreur : ' .$ex->getMessage());
}


?>