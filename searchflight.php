<?php

//require_once "db.php";
//session_start();
//require_once "espaceAdmin/db.php";
// <!-- QUERY POUR RECHERER UN VOL  -->


// ne pas afficher les vols complets

if (!empty($_POST)) {

    $allFlights = <<<SQL
    SELECT q.id
    FROM 
	(
		SELECT 
			flight.*,
			plane.capacity capacity,
			COUNT(booking.name) nbrCustomer, 
			(plane.capacity - COUNT(booking.name)) placesDispo
		FROM flight
		INNER JOIN plane ON plane.id = flight.planeModel
		LEFT JOIN booking ON booking.flightId = flight.id
		GROUP BY flight.id
	) q
    WHERE q.placesDispo > 0
SQL;

$query = $objetPdo->query($allFlights);
//$query->execute($allFlights); 

$idFlight = [];

    foreach ($objetPdo->query($allFlights) as $row) {
    $idFlight[] = $row['id'];
    }

    $request = '
        SELECT
            f.id,
            f.departureCity,
            f.arrivalCity,
            f.date,
            f.departureTime,
            f.arrivalTime,
            TIMEDIFF(f.arrivalTime,f.departureTime),
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
    } else {
        echo "Remplir tous les champs";
    };

    if (isset($_POST['arrivalCity'])) {
        $keyConditions[] = 'f.arrivalCity = ?';
        $valConditions[] = $_POST['arrivalCity'];
    }else {
        echo "Remplir tous les champs";
    };

    if (isset($_POST['date'])) {
        $keyConditions[] = 'f.date = ?';
        $valConditions[] = $_POST['date'];
    }else {
        echo "Remplir tous les champs";
    };

    
    $keyConditions[] = 'f.id IN (' . implode(',' , $idFlight ) . ')'; 

    if (!empty($keyConditions)) {
        $request .= ' WHERE ' . implode(' AND ', $keyConditions);
    }else {
        echo "Remplir tous les champs";
    };


    $searchFlight = $objetPdo->prepare($request);
    $searchFlight->execute($valConditions); 

    $flights = $searchFlight->fetchAll();

    $departureCity = $_POST['arrivalCity'];
    $arrivalCity = $_POST['departureCity'];


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
                <p class="vol"><span class="text-primary pl-3">Numéro de vol: </span><?php echo $flightNbr ?></p>
                <p class="vol"><span class="text-primary pl-3">Date et heure du départ: </span><?php echo $date1->format('d-m-Y à H:i') ?></p>
                <p class="vol"><span class="text-primary pl-3">Durée du vol: </span><?php echo $flight['TIMEDIFF(f.arrivalTime,f.departureTime)'] ?></p>
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



