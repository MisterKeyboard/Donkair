<?php
session_start();

// <!-- QUERY POUR RECHERER UN VOL  -->

if (!empty($_POST)) {
    $request = '
        SELECT
            f.id,
            f.departureCity,
            f.arrivalCity,
            f.date,
            f.departureTime,
            f.flightNbr,
            departureRoute.town departureTown,
            arrivalRoute.town arrivalTown
        FROM flight f LEFT JOIN route departureRoute
            ON departureRoute.id = f.departureCity
        LEFT JOIN route arrivalRoute
            ON arrivalRoute.id = f.arrivalCity';

    $keyConditions = [];
    $valConditions = [];


    if (isset($_POST['departureCity'])) {
        $keyConditions[] = 'f.departureCity = ?';
        $valConditions[] = $_POST['departureCity'];
    }

    if (isset($_POST['arrivalCity'])) {
        $keyConditions[] = 'f.arrivalCity = ?';
        $valConditions[] = $_POST['arrivalCity'];
    }

    if (isset($_POST['date'])) {
        $keyConditions[] = 'f.date = ?';
        $valConditions[] = $_POST['date'];
    }

    if (!empty($keyConditions)) {
        $request .= ' WHERE ' . implode(' AND ', $keyConditions);
    }

    $searchFlight = $objetPdo->prepare($request);
    $searchFlight->execute($valConditions); 

    
    while ($donnees = $searchFlight->fetch())
    {
        $departureCity = $donnees['departureTown'];
        $arrivalCity = $donnees['arrivalTown'];
        $date = $donnees['date'] . $donnees['departureTime'];
        $flightNbr = $donnees['flightNbr'];


        echo " Ville de départ : " . $departureCity ; 
        echo " Ville d'arrivée : " . $arrivalCity;
        $date1 = new DateTime($date);
        echo " Date et Heure de départ : " . date_format($date1, ' d-m-Y H:i ');
        echo  " Numéro de Vol : " . $flightNbr;
        echo "<a href=\"customer.php\" target=_blank> Choisir ce vol </a>"; 
        echo "<br>";
    }
}

// $_SESSION["nbrPassenger"] = [
//     $_GET['persons']
// ];
