<?php

require_once "functions.php";
// require_once "database.php";
include "dbConn.php"; // Using database connection file  here

if(isset($_POST['submit']))
{
    $var1 = rand(1111,9999);  // generate random number in $var1 variable
    $var2 = rand(1111,9999);  // generate random number in $var2 variable
    
    $var3 = $var1.$var2;
    $var3 = md5($var3);

    $fnm = $_FILES["image"]["name"];    // get the image name in $fnm variable
    $dst = "./all_images/".$var3.$fnm;  // storing image path into the {all_images} folder with 32 characters hex number and file name
    $dst_db = "all_images/".$var3.$fnm; // storing image path into the database with 32 characters hex number and file name

	move_uploaded_file($_FILES["image"]["tmp_name"],$dst);  // move image into the {all_images} folder with 32 characters hex number and image name
    
    $titre = $_POST['titre'];
    $statut = $_POST['statut'];
    $auteur = $_POST['auteur'];
    $date_de_sortie = $_POST['date_de_sortie'];
    $genre = $_POST['genre'];
    $dernier_chapitre = $_POST['dernier_chapitre'];
    $lien = $_POST['lien'];

    $insert = mysqli_query($db,"INSERT INTO mangas (`images`,`titre`, `statut`, `auteur`, `date_de_sortie`, `genre`, `dernier_chapitre`,`lien`) VALUES ('$dst_db','$titre','$statut','$auteur','$date_de_sortie','$genre','$dernier_chapitre','$lien')");

    if(!$insert)
    {
        // echo "Connection failed: " . $exception->getMessage();
        // echo mysqli_error();
        die(mysqli_error($db));
    }
    else
    {
        echo "Le titre a été ajouter avec succès.";
    }
}

mysqli_close($db); // Close connection

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    
    <link rel= "stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/b51744feb7.js" crossorigin="anonymous"></script>
    <title>Ajouter un titre</title>
</head>
<body>
    <div class="container">
        <h1>Ajouter un titre</h1>
        <?php include "nav.php"; ?>
        
        <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
                <label for="image" class="form-label">Upload image</label>
                <input type="file" class="form-control" name="image" id="image">
                <input type="submit" class="form-control" name="upload" id="upload" value="Upload">
            </div>
    
            
       
            <div class="mb-3">
                <label for="titre" class="form-label">Titre</label>
                <input type="text" class="form-control" name="titre" id="titre">
            </div>
            <div class="mb-3">
                <label for="statut" class="form-label">Statut</label>
                <select name="statut" id="statut" class="form-select">
                    <option value="updating">En cours</option>
                    <option value="finish">Terminer</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="auteur" class="form-label">Auteur</label>
                <input type="text" class="form-control" name="auteur" id="auteur">
            </div>

            <div class="mb-3">
                <label for="date_de_sortie" class="form-label">Date de sortie</label>
                <input type="text" class="form-control" name="date_de_sortie" id="date_de_sortie">
            </div>

            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <input type="text" class="form-control" name="genre" id="genre">
            </div>
            <div class="mb-3">
                <label for="dernier_chapitre" class="form-label">Dernier chapitre</label>
                <input type="text" class="form-control" name="dernier_chapitre" id="dernier_chapitre">
            </div>
            <div class="mb-3">
                <label for="lien" class="form-label">Lien</label>
                <input type="text" class="form-control" name="lien" id="lien">
            </div>
            <button type="submit"  name="submit" value="submit" class="btn btn-primary">Ajouter</button>
            
        </form>
        
    </div>
    <br>
    <?php include "footer.php"; ?>
</body>
</html>