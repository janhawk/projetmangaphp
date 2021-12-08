<?php

try {
    $pdoInstance = new PDO('mysql:host=localhost;dbname=listes_des_mangas', 'root', '');
    $pdoInstance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>