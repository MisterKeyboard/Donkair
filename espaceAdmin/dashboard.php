<?php
session_start();
if(!$_SESSION['admin']){
    header('Location: connexion.php');
}else{ 
echo "Bonjour",$_SESSION['admin'];
}
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
        
    </header>
</body>
