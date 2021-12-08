<?php
include_once 'dbConn.php';
$sql = "DELETE FROM mangas WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($db, $sql)) {
    echo "Le titre a été supprimer.";
} else {
    echo "Error 404, your pc will auto destroy in 3..2..1..peww pewww: " . mysqli_error($db);
}
mysqli_close($db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    
    <link rel= "stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/b51744feb7.js" crossorigin="anonymous"></script>
    <title>Suprimmer</title>
</head>
<body>
    
<?php include "nav.php"; ?>
</body>
</html>