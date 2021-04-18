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
                        $select = $objetPdo->query('SELECT town, id FROM route');
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
                        $selection = $objetPdo->query('SELECT town, id FROM route');
                            while ($datab = $selection->fetch()) {
                ?>               
        
            <option value = "<?php echo $datab['id']?>"> <?php echo $datab['town']?> </option>

                <?php                
                    }
                ?>

        </select>  

        <label for="model"> Selectionner le modèle d'avion </label>
        <select name="model" id="model"> 
        <!-- select from db plane  -->

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

        <label for="departureTime"> Heure de décollage </label>
        <input type="time" name="departureTime" id="departureTime">

        <label for="arrivalTime"> Heure d'arrivée </label>
        <input type="time" name="arrivalTime" id="arrivalTime">

        <label for="date"> Date de départ </label>
        <input type="date" name="date" id="date"/>

        <input type="submit" value="Ajouter un vol"/>

    </form>


</html>

<?php

require_once "config.php";

$objetPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $flightNbr = $_POST['flightNbr']; 
        $departureCity = $_POST['departureCity'];
        $arrivalCity = $_POST['arrivalCity'];
        $model = $_POST['model'];
        $arrivalTime = $_POST['arrivalTime'];
        $departureTime = $_POST['departureTime'];
        $date = $_POST['date'];

    $sql = $objetPdo->prepare('INSERT INTO flight (flightNbr, departureCity, arrivalCity, departureTime, arrivalTime, date, planemodel) VALUES (:flightNbr, :departureCity, :arrivalCity, :departureTime, :arrivalTime, :date, :model)');
    $sql->execute(array(':flightNbr' => $flightNbr, ':departureCity' => $departureCity, ':arrivalCity' => $arrivalCity, ':departureTime' => $departureTime, ':arrivalTime' => $arrivalTime, ':date' => $date, ':model' => $model));

// echo "flightNbr = " . $flightNbr;
// echo "departureCity = " . $departureCity;
// echo "arrivalCity = " . $arrivalCity;
// echo "departureTime = " . $departureTime;
// echo "arrivalTime = " . $arrivalTime;
// echo "date = " . $date;
// echo "model = " . $model;

//     $sql->debugDumpParams();

if(!empty($_POST)){
    echo 'La numéro de vol ' .  $_POST['flightNbr']  . ' dépar de ' . $_POST['departureCity'] . ' pour ' . $_POST['arrivalCity'] . ' le ' . $_POST['date'] . 'a bien été ajouté à votre base de donée.';
    }

