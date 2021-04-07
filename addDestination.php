<?php
require "config.php";
?>

<!-- AJOUTER UNE DESTINATION / ROUTE -->
    <h2> Formulaire pour ajouter une route </h2>

    <form method="POST">

        <label for="flightNbr"> Numéro de Vol </label>
        <input type="text" name="flightNbr" id="flightNbr">

        <!-- select from db city -->

        <label for="departureCity"> Selectionner une Ville de Départ </label>
        <select name="departureCity" id="departureCity">

                <?php 
                    //modifier la query
                        $select = $objetPdo->query('SELECT town, id FROM city');
                            while ($data = $select->fetch()) {
                ?>               
        
            <option value = "<?php echo $data['id']?>" >  <?php echo $data['town']?> </option>

                <?php                
                    }
                ?>
    
        </select>            

        <label for="arrivalCity"> Selectionner une Ville d'arrivée </label>
        <select name="arrivalCity" id="arrivalCity">

                <?php 
                    //modifier la query
                        $selection = $objetPdo->query('SELECT town, id FROM city');
                            while ($datab = $selection->fetch()) {
                ?>               
        
            <option value = "<?php echo $datab['id']?>"> <?php echo $datab['town']?> </option>

                <?php                
                    }
                ?>

        </select>  

        <label for="model"> Selectionner le modèle d'avion </label>
        <select name="model" id="model"> 

        <!-- select from db plane -->

                <?php  
                    //modifier la query
                        $selection = $objetPdo->query('SELECT model, id FROM plane');

                            while ($datab = $selection->fetch()) {
                ?>               
        
            <option value = "<?php echo $datab['id']?>">  <?php echo $datab['model']?> </option>

                <?php                
                    }
                ?>

        </select>  

        <!-- Insert d'autre information -->

        <label for="takeOff"> Heure de décollage </label>
        <input type="time" name="takeOff" id="takeOff">

        <label for="landing"> Heure d'atterissage</label>
        <input type="time" name="landing" id="landing"/>
        
        <label for="date"> Date du vol </label>
        <input type="date" name="date" id="date"/>

        <label for="flightTime"> Durée du Vol </label>
        <input type="time" name="flightTime" id="flightTime"/>

        <input type="submit" value="Ajouter un vol"/>



    </form>


</html>

<?php

// INSERT LES DONNEES DANS DATABASE

//Récuperer les info pour add une route

if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)){
    echo   $_POST['flightNbr'] . $_POST['departureCity']   . $_POST['arrivalCity']  . $_POST['model'] . $_POST['takeOff']  . $_POST['landing']  . $_POST['date'] . $_POST['flightTime'];
    

    if(empty($_POST['departureCity']) || empty($_POST['arrivalCity']) || empty($_POST['model']) || empty($_POST['takeOff']) ||  empty($_POST['landing']) || empty($_POST['date']) || empty($_POST['flightTime'])) {
        echo 'veuillez remplir tous les champs';
    } else {
        $flightNbr = $_POST['flightNbr'];
        $departureCity = $_POST['departureCity'];
        $arrivalCity = $_POST ['arrivalCity'];
        $model = $_POST ['model'];
        $takeOff = $_POST['takeOff'];
        $landing = $_POST ['landing'];
        $date = $_POST ['date'];
        $flightTime = $_POST['flightTime'];

//Insert les villes de départ et d'arrivée dans la table destination
    $city = $objetPdo->prepare("INSERT INTO destination (flightNbr, departureCity, arrivalCity) VALUES (:departureCity, :arrivalCity)");

    $city->execute(array( 'flightNbr' => $flightNbr, ':departureCity' => $departureCity, ':arrivalCity' => $arrivalCity));

//Insert le modele d'avion et autre information dans tab Flight
    $flight = $objetPdo->prepare("INSERT INTO flight (model, takeOff, landing, date, flightTime) VALUES (:plane_id, :takeOff, :landing, :date, :flightTime)");

    $flight->execute(array(':plane_id' => $model, ':takeOff' => $takeOff, ':landing' => $landing, ':date' => $datab, ':flightTime' => $flightTime));

    }
}