
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
<!--  Modification d'un article dans la BD à partir du formulaire -->
<?php

date ('Y-m-d');

$oldTitle=$_GET['title'];

if ($_POST){
    try {
        require_once("db.php");
        $cnx->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $cnx->exec("SET NAMES 'UTF8';");
        $id=$_GET['id'];        
        $title=$_POST['title'];
        $description=$_POST['description'];
        $date=$_POST['date'];
        $resultat = $cnx->prepare('UPDATE posts SET post_title = :title, description = :description, post_at = :date WHERE Id = :id');
        $resultat->bindParam(':id', $id);
        $resultat->bindParam(':title', $title);
        $resultat->bindParam(':description', $description);
        $resultat->bindParam(':date', $date);
        $resultat->execute();

        if($cnx) echo "CONNEXION OK<br>";

        header('location:index.php');
            
    
    }   catch (Exception $ex) {
        die ('Erreur : ' .$ex->getMessage());
    }
}

?>


<a class="btn btn-primary pull-right" href="index.php" role="button"> BACK TO LIST </a>
<br>
<br>
<br>
<div class="container ">

<div class="row">
    <div class="col-12 col-md-6">
    <h4>Editer l'article : </h4>
        <form method="post" action="">
            <div class="form-group" >
                <label for="title"> Title : </label>
                <input type="text" id="title" aria-describedby="emailHelp" name="title" required class="form-control"
                 placeholder="Title" value="<?php echo $oldTitle ?>">
            </div>
            <div class="form-group">
                <label for="description">Description : </label>
                <textarea class="form-control" id="description" name="description"  rows="5" required></textarea>
            </div>
            <div class="form-date">
                <label for="date"> Date : </label>
                <input type="date" id="date" name="date" required max="<?php echo date('Y-m-d'); ?>" min="1970-01-01"  
                class="form-control">
            </div>
            <br>
            <button type="submit" class="btn btn-primary"> Modifier</button>
        </form>
    </div>
</div>
</div>





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
    


