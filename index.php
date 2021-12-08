<?php

require_once "functions.php";
// require_once "database.php";
include "dbConn.php";


	// Initialiser la session
	session_start();
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["username"])){
		header("Location: login.php");
		exit(); 
	}
  
  $result = mysqli_query($db,"SELECT * FROM mangas");

?>





<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    
    <link rel= "stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/b51744feb7.js" crossorigin="anonymous"></script>
    <title>Manga</title>
</head>
<body>
    <div class="container">
    <h1>Bienvenue <?php echo $_SESSION['username']; ?>!</h1>
    <a href="logout.php">Déconnexion</a>
      <?php include "nav.php"; ?>

    <br> <br>
  <table class="table table-striped table-dark">
      <thead>
        <tr>
            <th scope="col">Id</th>
            <!-- <th scope="col">image</th>   -->
            <th scope="col">Titre</th>
            <th scope="col">Statut</th>
            <th scope="col">Auteur</th>
            <th scope="col">Date de sortie</th>
            <th scope="col">Genre</th>
            <th scope="col">Dernier chapitre</th>
            <th scope="col">Lien</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
      </thead>
  <tbody>
    

      <?php
	$i=0;
	while($row = mysqli_fetch_array($result)) {
	?>
	<tr class="<?php if(isset($classname)) echo $classname;?>">
	<td><?php echo $row["id"]; ?></td>
	<td><?php echo $row["titre"]; ?></td>
	<td><?php echo $row["statut"]; ?></td>
  <td><?php echo $row["auteur"]; ?></td>
	<td><?php echo $row["date_de_sortie"]; ?></td>
	<td><?php echo $row["genre"]; ?></td>
  <td><?php echo $row["dernier_chapitre"]; ?></td>
	<td><?php echo $row["lien"]; ?></td>
  <td><a href="update.php?id=<?php echo $row["id"]; ?>">Mettre à jour</a></td>
	<td><a href="delete.php?id=<?php echo $row["id"]; ?>">Supprimer</a></td>
  
	</tr>
	<?php
	$i++;
	}
	?>
  
  </tbody>
  </table>


<!-- end of table -->

      
  </div>
<!-- end of div container -->
<br>
<?php include "footer.php"; ?>


<script src="prog.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script></body>
</body>
</html>
