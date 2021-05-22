<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
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
            departureRoute.descriptive departureDescriptive,
            arrivalRoute.descriptive arrivalDescriptive,
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
        //echo "Remplir tous les champs";
    };

    if (isset($_POST['arrivalCity'])) {
        $keyConditions[] = 'f.arrivalCity = ?';
        $valConditions[] = $_POST['arrivalCity'];
    }else {
        //echo "Remplir tous les champs";
    };

    if (isset($_POST['date'])) {
        $keyConditions[] = 'f.date = ?';
        $valConditions[] = $_POST['date'];
    }else {
        //echo "Remplir tous les champs";
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

    // $departureCity = $_POST['arrivalCity'];
    // $arrivalCity = $_POST['departureCity'];

    if (!empty($flights)) { 

    $departureCity = $flights[0]['departureTown'];
    $arrivalCity = $flights[0]['arrivalTown'];
    $departureImage = $flights[0]['departureImage'];
    $arrivalImage = $flights[0]['arrivalImage']; 
    $departureDescriptive = $flights[0]['departureDescriptive'];
    $arrivalDescriptive = $flights[0]['arrivalDescriptive']; 

    };
    

    foreach ($flights as $flight)
    {   
        $flightId = $flight['id'];
        $date = $flight['date'] . $flight['departureTime'];
        $flightNbr = $flight['flightNbr'];
        $planeImage = $flight['image'];
        $date1 = new DateTime($date);

?> 

    <div class="cardResa row container card mb-3 mt-5 ">

       
            <div class="imgResa col-sm-12 col-md-6 col-lg-6 pt-3 row g-0">
                <img class="w-100 rounded ps-3 pb-3" src="img/uploadtownsimages/<?php echo $planeImage ?> " class="card-img-top" alt="photo avion">
            </div>

            <div class="textResa col-md-8">
                <div class="card-body " >
                    <p class="vol"><span class="text-primary">Votre avion: </span><?php echo $flight['model'] ?></p>
                    <p class="vol"><span class="text-primary pl-3">Numéro de vol: </span><?php echo $flightNbr ?></p>
                    <p class="vol"><span class="text-primary pl-3">Date et heure du départ: </span><?php echo $date1->format('d-m-Y à H:i') ?></p>
                    <p class="vol"><span class="text-primary pl-3">Durée du vol: </span><?php echo $flight['TIMEDIFF(f.arrivalTime,f.departureTime)'] ?></p>

                    <div>
                            <a class="btn btn-primary vol mb-3 href="customer.php?flightId=<?php echo $flightId; ?>"    target=_blank> Choisir ce vol </a>
                        </div>
                </div>
            </div>
            
        

    </div>

<?php 
   if (!empty($flights)) { ?>
        <div class="container pt-3 recherche:"></div>

            <div class="container card my-3 pb-3">
                <div class="photos">
                    <div class="col-sm-12 col-md-12 col-lg-6 pt-2 float-start">
                    <p><span class="text-primary text-center fs-4">Ville de départ: </span><?php echo $departureCity ?></p>
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <img src="img/uploadtownsimages/<?php echo $departureImage ?> " class="card-img-top" alt="photo ville">
                                </div>
                                <div class="flip-card-back">
                                    <p class="mt-3 container text-dark fw-bold text-center"><?php echo $departureDescriptive ?></p>
                                </div>
                    </div>
                 </div> 
            </div>
        
        
                    <div class="col-sm-12 col-md-12 col-lg-6 pt-2 float-end">
                    <p><span class="text-primary text-center fs-4" >Ville d'arrivée: </span><?php echo $arrivalCity ?></p>
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <img src="img/uploadtownsimages/<?php echo $arrivalImage ?> " class="card-img-top" alt="photo ville">
                                </div>
                                <div class="flip-card-back">
                                    <p class="mt-3 container text-dark fw-bold text-center"><?php echo $arrivalDescriptive ?></p>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
        <?php
        }
    
    } 

    if (empty($flights)) { ?>
        
        <div class="pasVol card mt-4 text-center" style="width: 30rem;">

            <div class="card-header">
                <h4> Il n'y a pas de Vol prévu pour cette journée<div id="sad" class="fa"> </div> </h4>
            </div>

            <div class="card-body ">
                <h5 class="card-title">Nous sommes désolé pour la gêne occasionnée.</h5>
                <p class="card-text">  
                    Merci de nous contacter, nous vous trouverons solution.</p>

                    <ul class="JoindrePasVol">
                        <li> <i class="fas fa-phone "> </i> 01 76 38 10 19 </li>
                        <li> <i class="fas fa-at"> </i> hello@donkey.school </li>
                        <li > <i class="fas fa-map-pin"></i> 195 rue des Pyrénées </li>
                        <li > <i class="zip fas fa-map-pin"></i> 75020 Paris </li>
                    </ul>

            </div>

        </div>
        <script>
            //Sad personnage

function sad(){
    let sad = document.getElementById('sad');
    sad.innerHTML="&#xf119";

    setTimeout(function() {
        sad.innerHTML="&#xf5b4"
    }, 2000);
    setTimeout(function() {
        sad.innerHTML="&#xf5b3"
    }, 4000);
    setTimeout(function() {
        sad.innerHTML="&#xf7a9"
    }, 6000);

}

sad();

setInterval(sad, 8000);
        </script>
<?php       
    }

?>

        </div>    
    </div>
<?php 

} 



