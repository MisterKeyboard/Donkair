
<?php
require "config.php";
?>

<html>

<h1> Ajouter une ville de destination et/ou une ville de départ  </h1>

<!-- Inserer une ville & airport -->

    <form method="POST">
        
        <label for="t
        own"> Entrée le nom de la ville </label>
        <input type="text" name="town" id="town">

        <label for="airport"> Entrée le nom de l'aréoport </label>
        <input type="text" name="airport" id="airport">

        <label for="country"> Entrée le Pays </label>
        <input type="text" name="country" id="country">

        <input type="submit" value="ajouter une ville"/>

    </form>
    
<?php

//Récuperer les noms des villes et des airports

if($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_POST['town']) || empty($_POST['airport']) || empty($_POST['country'])) {
    echo 'Veuillez remplir tous les champs';
} else {
    $town = $_POST['town'];
    $airport = $_POST ['airport'];
    $country = $_POST ['country'];

    $sql = $objetPdo->prepare("INSERT INTO city (town, airport, country) VALUES (:town, :airport, :country)");

    $sql->execute(array(':town' => $town, ':airport' => $airport, ':country' => $country));


if(!empty($_POST)){
    echo 'L\'altiport ' .  $_POST['airport']  . ' situé à ' . $_POST['town'] . ' en ' . $_POST['country'] . ' a bien été ajouté à votre base de donnée : City.';
    }
}

?>



<html>
    <br>
    <!-- retourn page d'accueil -->
    <a href="dashboard.php" target="_blank">Ajouter une route</a>
</html>

