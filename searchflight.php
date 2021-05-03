<?php
session_start();
require_once "db.php";

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
            arrivalRoute.town arrivalTown,
            departureRoute.image departureImage,
            arrivalRoute.image arrivalImage
        FROM flight f 
        LEFT JOIN route departureRoute
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
        $flightId = $donnees['id'];
        $departureCity = $donnees['departureTown'];
        $arrivalCity = $donnees['arrivalTown'];
        $date = $donnees['date'] . $donnees['departureTime'];
        $flightNbr = $donnees['flightNbr'];
        $departureImage = $donnees['departureImage'];
        $arrivalImage = $donnees['arrivalImage'];
        $date1 = new DateTime($date);
        

?> 
        
        <div class="container card">
            <div class="row">
                <div class="col-6">
                    <img src="img/uploadtownsimages/<?php echo $departureImage ?> " class="card-img-top" alt="photo ville">
                </div>
                <div class="col-6">
                    <img src="img/uploadtownsimages/<?php echo $arrivalImage ?> " class="card-img-top" alt="photo ville">
                </div>
            </div>

            <div class="card-body">
                <h5 class="card-title"> </h5>
                Ville de départ : <?php echo $departureCity ?> <br>
                Ville d'arrivée  : <?php echo $arrivalCity ?> <br>
                Date et heure du départ : <?php echo $date1->format('d-m-Y à H:i') ?> <br>
                Numéro de vol :  <?php echo $flightNbr ?> <br>
            </div>
            <div class="pb-3">
            <a href="customer.php?flightId=<?php echo $flightId; ?>" class="btn btn-primary" target=_blank> Choisir ce vol </a>
            </div>
        </div>

<?php 
    }
}

// $_SESSION["nbrPassenger"] = [
//     $_GET['persons']
// ];
