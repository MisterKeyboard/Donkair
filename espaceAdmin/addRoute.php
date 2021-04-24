<?php
require "db.php";
?>

<!-- AJOUTER UNE DESTINATION / ROUTE -->
    <div class="container pt-5">
        <h2 class="text-primary"> Formulaire pour ajouter une route </h2>

        <form method="POST">

            <label class="text-primary" for="flightNbr"> Numéro de Vol </label>
            <input type="text" name="flightNbr" id="flightNbr">
            </br>
            <!-- select from db city -->
            <label class="text-primary" for="departureCity"> Selectionner une Ville de Départ </label>
            <select name="departureCity" id="departureCity">
            </br>

<?php 

    $objetPdo = openPDO();
    $select = $objetPdo->query('SELECT town, id FROM route');

    while ($data = $select->fetch()) {
?>               
        
            <option value = "<?php echo $data['id']?>" >  
            <?php echo $data['town']?> </option>
            <?php                
                }
            ?>
    
            </select>            


            <label class="text-primary" for="arrivalCity"> Selectionner une Ville d'arrivée </label>
            <select name="arrivalCity" id="arrivalCity">
            </br>
<?php 
    
    $selection = $objetPdo->query('SELECT town, id FROM route');
        while ($datab = $selection->fetch()) {
?>               
        
        <option value = "<?php echo $datab['id']?>"> 
        <?php echo $datab['town']?> </option>

        <?php                
        }
        ?>

            </select>  


            <label class="text-primary" for="model"> Selectionner le modèle d'avion </label>
            <select name="model" id="model"> 
            <!-- select from db plane  -->
            </br>
<?php  

        $selection = $objetPdo->query('SELECT model, id FROM plane');

        while ($datab = $selection->fetch()) {
        ?>               
        
        <option value = "<?php echo $datab['id']?>">  
        <?php echo $datab['model']?> </option>

        <?php                
            }
        ?>
            </select>  

        <!-- Insert d'autre information -->

            <label class="text-primary" for="departureTime"> Heure de décollage </label>
            <input type="time" name="departureTime" id="departureTime">

            <label class="text-primary" for="arrivalTime"> Heure d'arrivée </label>
            <input type="time" name="arrivalTime" id="arrivalTime">

            <label class="text-primary" for="date"> Date de départ </label>
            <input type="date" name="date" id="date"/>

            <input class="btn btn-primary" type="submit" value="Ajouter un vol"/>

        </form>
    </div>

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
    echo 'Le numéro de vol ' .  $_POST['flightNbr']  . ' départ de ' . $_POST['departureCity'] . ' pour ' . $_POST['arrivalCity'] . ' le ' . $_POST['date'] . ' a bien été ajouté à votre base de donnée.';
    }

