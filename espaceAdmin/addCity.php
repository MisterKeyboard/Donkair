<?php
require "db.php";
require "session.php";
require "head.php";
?>

<body>

    <h1> Ajouter une ville de destination ou une ville de départ  </h1>

    <!-- Inserer une ville & airport -->

        <form action="addCity.php" method="POST" enctype="multipart/form-data">
            
            <label for="town"> Entrez le nom de la ville </label>
            <input type="text" name="town" id="town">

            <lable>Choisissez l'image à sauvegarder</label>
            <input type="file" name="image" />

            <label for="airport"> Entrez le nom de l'aréoport </label>
            <input type="text" name="airport" id="airport">

            <label for="country"> Entrez le Pays </label>
            <input type="text" name="country" id="country">

            <input type="submit" value="ajouter une ville"/>

        </form>




<?php

//Récuperer les noms des villes et des airports

if($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_POST['town']) || empty($_POST['airport']) || empty($_POST['country'])) {
    echo 'Veuillez remplir tous les champs';
} else {
    $objetPdo = openPDO();
    $town = $_POST['town'];
    $airport = $_POST ['airport'];
    $country = $_POST ['country'];
    $image=$_FILES['image']['name'];

    if(!move_uploaded_file($_FILES['image']['tmp_name'],"../img/uploadtownsimages/".$image)){
        die("non");
    }

    $sql = $objetPdo->prepare("INSERT INTO route (town, airport, country, image) VALUES (:town, :airport, :country, :image)");

    $sql->execute(array(':town' => $town, ':airport' => $airport, ':country' => $country, ':image' => $image ));
    
if(!empty($_POST)){
    echo 'L\'altiport ' .  $_POST['airport']  . ' situé à ' . $_POST['town'] . ' en ' . $_POST['country'] . ' a bien été ajouté à votre base de données : City.';
    }
}

?>



    <br>
    <!-- retourn page d'accueil -->
    <a href="dashboard.php" target="_blank">Ajouter une route</a>
</body>

</html>

