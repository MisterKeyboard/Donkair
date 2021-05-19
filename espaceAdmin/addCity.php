<?php
require "db.php";
require "session.php";
require "head.php";
?>

<link re="stylesheet" href="admin.css"/>

<body>

    <section class="container">
        <h1 class="text-primary pt-5"> Ajouter une ville de destination ou une ville de départ  </h1>

    <!-- Inserer une ville & airport -->

        <form action="addCity.php" method="POST" enctype="multipart/form-data">
            
            <label class="text-primary pt-4" for="town"> Entrez le nom de la ville </label>
            <input class="form-control w-25" type="text" name="town" id="town" require>
<br>
            <lable class="text-primary pt-4" for="image">Choisissez l'image à sauvegarder  </label>
            <br>
            <span> <i> * Optionnel <i> </span>
            <br>
            <input class="btn btn-primary" type="file" name="image"  />
            <br>
            <label class="text-primary pt-4" for="airport"> Entrez le nom de l'aréoport </label>
            <input class="form-control w-25" type="text" name="airport" id="airport" require>
            <br>
            <label class="text-primary pt-4" for="country"> Entrez le Pays </label>
            <input class="form-control w-25" type="text" name="country" id="country" require>
            <br>
            <div class="pt-4">
                <input class="btn btn-primary" type="submit" value="ajouter la ville"/>
            </div>      
        </form>




<?php

//Récuperer les noms des villes et des airports


if($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_POST['town']) || empty($_POST['airport']) || empty($_POST['country'])) {

} else {
    $objetPdo = openPDO();
    $town = $_POST['town'];
    $airport = $_POST ['airport'];
    $country = $_POST ['country'];
    $image= $_FILES['image']['name'];
    

    if(!move_uploaded_file($_FILES['image']['tmp_name'],"../img/uploadtownsimages/".$image)){
        //die("Une erreure est survenue");
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
    <a href="dashboard.php" target="_blank">Retour vers la page principale</a>
    </section>
</body>

</html>

