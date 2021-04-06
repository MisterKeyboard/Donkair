
<?php

require "config.php";
require "index.php";

//Récuperer les noms des villes et des airports

if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)){
    echo 'L\'altiport ' .  $_POST['airport']  . ' situé à ' . $_POST['towns'] . ' en ' . $_POST['country'] . ' a bien été ajouté à votre base de donnée : City.';
    

    if(empty($_POST['towns']) || empty($_POST['airport'])) {
        echo 'veuillez remplir tous les champs';
    } else {
        $towns = $_POST['towns'];
        $airport = $_POST ['airport'];
        $country = $_POST ['country'];
    
    $sql = $objetPdo->prepare("INSERT INTO city (towns, airport, country) VALUES (:towns, :airport, :country)");

    $sql->execute(array(':towns' => $towns, ':airport' => $airport, ':country' => $country));

    }
}
//header('location="index.php"');