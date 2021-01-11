<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
<body>

<!-- Ajout d'un article dans la BD à partir du formulaire  -->

<div class="container ">
    <?php
        if($_GET){
            try{
                require_once("db.php");
                $cnx->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $cnx->exec("SET NAMES 'utf8';");

                $title = $_GET["title"];
                $description = $_GET["description"];
                $date = $_GET["date"];
                $sql = "INSERT INTO posts (post_title, description, post_at) VALUES (:title, :description, :date)";
                $stmt = $cnx->prepare($sql);
                $stmt-> bindParam(':title', $title);
                $stmt-> bindParam(':description', $description);
                $stmt-> bindParam(':date', $date);
                $stmt-> execute();
                header('location:index.php');
            }catch (Exception $ex) {
                        die('Erreur : '.$ex->getMessage());
            }
        }
    ?>
</div>

<a class="btn btn-primary pull-right" href="index.php" role="button"> BACK TO LIST </a>
<br>
<br>
<br>
<div class="container ">
    <div class="row">
        <form method="get" action="" class="col-12 col-md-6">
            <div class="form-group">
                <label for="title">Saisir le titre :</label>
                <input type="text" minlenght="5" maxlenght="25" required class="form-control" id="title" name="title" placeholder="Entrer le titre">
            </div>
            <div class="form-group">
                <label for="description">Saisir la description :</label>
                <textarea class="form-control" id="description" name="description" required rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="date">Saisir une date :</label>
                <input type="date" min="1970-01-01" max="<?php echo date('Y-m-d'); ?>" required class="form-control" id="date" name="date" placeholder="Entrer une date">
            </div>
            <button type="submit" class="btn btn-primary" name="button">Valider</button>
        </form>
    </div>
</div>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
    
