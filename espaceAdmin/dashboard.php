<?php
session_start();
echo "Session:",$_SESSION['admin'];

require "../targetCity.php";
require "../addDestination.php";
require "../tabDestination.php";
?>




<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="icon" href="img/donkeysunglassesRemovebg.png" />
</head>



<body>
    <header>
        <a href="logout.php" >Déconnexion
        </a>
    </header>
</body>
