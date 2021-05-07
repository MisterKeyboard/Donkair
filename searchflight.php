<?php

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
            plane.model,
            plane.image,
            departureRoute.town departureTown,
            arrivalRoute.town arrivalTown,
            departureRoute.image departureImage,
            arrivalRoute.image arrivalImage
        FROM flight f 
        LEFT JOIN route departureRoute
            ON departureRoute.id = f.departureCity
        LEFT JOIN route arrivalRoute
            ON arrivalRoute.id = f.arrivalCity
        LEFT JOIN plane
            ON plane.id = f.planeModel';

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

    $flights = $searchFlight->fetchAll();
    $departureCity = $flights[0]['departureTown'];
    $arrivalCity = $flights[0]['arrivalTown'];
    $departureImage = $flights[0]['departureImage'];
    $arrivalImage = $flights[0]['arrivalImage']; 
    ?>

    <div class="container pt-3 recherche:">
        <h2 class="text-primary fw-bold">Votre recherche </h2>
    </div>
    <div class="container card my-3 pb-3">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 pt-3">
                <img src="img/uploadtownsimages/<?php echo $departureImage ?> " class="card-img-top" alt="photo ville">
                <p><span class="text-primary">Ville de départ: </span><?php echo $departureCity ?></p>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 pt-3">
                <img src="img/uploadtownsimages/<?php echo $arrivalImage ?> " class="card-img-top" alt="photo ville">
                <p><span class="text-primary">Ville d'arrivée: </span><?php echo $arrivalCity ?></p>
            </div>
        </div>
        <h3 class="text-primary">Validez votre vol</h3>


<?php
    foreach ($flights as $flight)
    {   
        $flightId = $flight['id'];
        $date = $flight['date'] . $flight['departureTime'];
        $flightNbr = $flight['flightNbr'];
        $planeImage = $flight['image'];
        $date1 = new DateTime($date);
?> 



        <div class="row container g-0">
            <div class="col-sm-12 col-md-6 col-lg-6 pt-3">
                <img class="w-100 rounded" src="img/uploadtownsimages/<?php echo $planeImage ?> " class="card-img-top" alt="photo avion">
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 pt-4">
                <p class="vol"><span class="text-primary">Votre avion: </span><?php echo $flight['model'] ?></p>
                <p class="vol"><span class="text-primary pl-3">Date et heure du départ:</span><?php echo $date1->format('d-m-Y à H:i') ?></p>
                <p class="vol"><span class="text-primary pl-3">Numéro de vol: </span><?php echo $flightNbr ?></p>
                <div>
                    <a class="btn btn-primary vol" href="customer.php?flightId=<?php echo $flightId; ?>"  target=_blank> Go </a>
                </div>
            </div>


        

<?php 
    }
?>

        </div>    
    </div>
<?php 
    }


// $_SESSION["nbrPassenger"] = [
//     $_GET['persons']
// ];
