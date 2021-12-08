

<?php
// including the database connection file
include_once("dbConn.php");

if(count($_POST)>0) {
    mysqli_query($db,"UPDATE mangas set id='" . $_POST['id'] . "', titre='" . $_POST['titre'] . "', statut='" . $_POST['statut'] . "', auteur='" . $_POST['auteur'] . "' ,date_de_sortie='" . $_POST['date_de_sortie'] . "', genre='" . $_POST['genre'] . "', dernier_chapitre='" . $_POST['dernier_chapitre'] . "', lien='" . $_POST['lien'] . "' WHERE id='" . $_POST['id'] . "'");
    $message = "Record Modified Successfully";
    }
    $result = mysqli_query($db,"SELECT * FROM mangas WHERE id='" . $_GET['id'] . "'");
    $row= mysqli_fetch_array($result);
    
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
    <title>Mettre à jour!</title>
</head>
<body>
    <div class="container">
        <h1>Mettre à jour!</h1>
        <?php include "nav.php"; ?>
        <form name="frmUser" action="" method="POST" enctype="multipart/form-data">
        <div><?php if(isset($message)) { echo $message; } ?> </div>
        
        <div class="mb-3" style="padding-bottom:5px;">
       
        <input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
        <!-- <input type="text" name="id"  value="<?php echo $row['id']; ?>"> -->
        </div>
        
        <div class="mb-3">
            
                <label for="image" class="form-label">Upload image</label>
                <input type="file" class="form-control" name="image" id="image">
                <input type="submit" class="form-control" name="upload" id="upload" value="upload">
            </div>
    
            
       
            <div class="mb-3">
                <label for="titre" class="form-label">Titre</label>
                <input type="text" class="form-control" name="titre" id="titre" value="<?php echo $row['titre']; ?>">
            </div>
            <div class="mb-3">
                <label for="statut" class="form-label">Statut</label>
                <select name="statut" id="statut" class="form-select" value="<?php echo $row['email']; ?>">
                    <option value="updating">En cours</option>
                    <option value="finish">Terminer</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="auteur" class="form-label">Auteur</label>
                <input type="text" class="form-control" name="auteur" id="auteur" value="<?php echo $row['auteur']; ?>">
            </div>

            <div class="mb-3">
                <label for="date_de_sortie" class="form-label">Date</label>
                <input type="text" class="form-control" name="date_de_sortie" id="date_de_sortie" value="<?php echo $row['date_de_sortie']; ?>">
            </div>

            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <input type="text" class="form-control" name="genre" id="genre" value="<?php echo $row['genre']; ?>">
            </div>
            <div class="mb-3">
                <label for="dernier_chapitre" class="form-label">Dernier chapitre</label>
                <input type="text" class="form-control" name="dernier_chapitre" id="dernier_chapitre" value="<?php echo $row['dernier_chapitre']; ?>">
            </div>
            <div class="mb-3">
                <label for="lien" class="form-label">Lien</label>
                <input type="text" class="form-control" name="lien" id="lien" value="<?php echo $row['lien']; ?>">
            </div>
            <button type="submit"  name="submit" value="Submit" class="btn btn-primary">Mettre à jour</button>
            
        </form>
    </div>
    
    <br>
    <?php include "footer.php"; ?>
</body>
</html>