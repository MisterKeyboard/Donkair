
<?php
require "config.php";
?>

<html>

<h1> Ajouter une Route </h1>

<h2> Ajouter une ville de destination et/ou une ville de départ </h2>
<p> Si les villes de destinations ou de départs sont déja renseignées, merci de ne pas remplir de vous rendre directement au formulaire pour ajouter une route.</p>

<!-- Inserer une ville & airport -->

    <form method="POST">
        
        <label for="town"> Entrée le nom de la ville </label>
        <input type="text" name="town" id="town">

        <label for="airport"> Entrée le nom de l'aréoport </label>
        <input type="text" name="airport" id="airport">

        <label for="country"> Entrée le Pays </label>
        <input type="text" name="country" id="country">

        <input type="submit" value="ajouter une ville"/>

    </form>

    
<?php

//Récuperer les noms des villes et des airports

if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)){
    echo 'L\'altiport ' .  $_POST['airport']  . ' situé à ' . $_POST['town'] . ' en ' . $_POST['country'] . ' a bien été ajouté à votre base de donnée : City.';
    

    if(empty($_POST['town']) || empty($_POST['airport']) || empty($_POST['country'])) {
        echo 'veuillez remplir tous les champs';
    } else {
        $town = $_POST['town'];
        $airport = $_POST ['airport'];
        $country = $_POST ['country'];
    
    $sql = $objetPdo->prepare("INSERT INTO city (town, airport, country) VALUES (:town, :airport, :country)");

    $sql->execute(array(':town' => $town, ':airport' => $airport, ':country' => $country));

    }
}
