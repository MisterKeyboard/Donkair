
<?php
require "config.php";


//Récuperer les noms des villes et des airports

if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)){
    echo 'L\'altiport ' .  $_POST['airport']  . ' situé à ' . $_POST['town'] . ' en ' . $_POST['country'] . ' a bien été ajouté à votre base de donnée : City.';
    

    if(empty($_POST['town']) || empty($_POST['airport'])) {
        echo 'veuillez remplir tous les champs';
    } else {
        $town = $_POST['town'];
        $airport = $_POST ['airport'];
        $country = $_POST ['country'];
    
    $sql = $objetPdo->prepare("INSERT INTO city (town, airport, country) VALUES (:town, :airport, :country)");

    $sql->execute(array(':town' => $town, ':airport' => $airport, ':country' => $country));

    }
}
header('location="index.php"');