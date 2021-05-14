<?php

//require_once "db.php";
//session_start();
//require_once "espaceAdmin/db.php";
// <!-- QUERY POUR RECHERER UN VOL  -->

if (!empty($_POST)) {

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


    ?>

    <!-- <div class="container pt-3 recherche:">
        <h2 class="text-primary fw-bold">Votre recherche </h2>
    </div>
    <div class="container card my-3 pb-3">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 pt-3">
                <img src="img/uploadtownsimages/<?php //echo $departureImage ?> " class="card-img-top" alt="photo ville">
                <p><span class="text-primary">Ville de départ: </span><?php //echo $departureCity ?></p>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 pt-3">
                <img src="img/uploadtownsimages/<?php //echo $arrivalImage ?> " class="card-img-top" alt="photo ville">
                <p><span class="text-primary">Ville d'arrivée: </span><?php //echo $arrivalCity ?></p>
            </div>
        </div>
        <h3 class="text-primary">Validez votre vol</h3>
  <?php  
    
?>
        <!-flip card
        <div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
    <img src="">
    </div>
    <div class="flip-card-back">
      <h1></h1>
      <p></p>
      <p></p>
    </div>
  </div>
</div> -->

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

    $count = '
    SELECT 
        flight.id id,
        plane.capacity capacity,
        COUNT(booking.name), 
       (plane.capacity - COUNT(booking.name)) placeDispo
    FROM flight
    INNER JOIN plane ON plane.id = flight.planeModel
    LEFT JOIN booking ON booking.flightId = flight.id
    GROUP BY flight.id;
    ';

$flight = [
    [
    'id' => 1;
    'start' => ''
    'arrivée' =>']
    ]

$booking = [
    [
        flightID
    ]
    ]

//isFree = $resa[$key]['freesi] > 0 ? 'oui' : 'non'; 
     //indexer tab sur vol ID 

     foreach($resas as $resa)
$trueR['$re5' [$vols]] = $true []

//1 => vide
//2=> plein

    $countFetch = $objetPdo->query($count);
    //$items as $key => value
    //Recupe $resa [$vol][id] = $resa['capacity']
    foreach ($countFetch as $row) {
        $idF= $row['id']; 
        $capacity = $row['capacity']; 
        $placeDispo = $row['placeDispo'];
    };


 //indexer tab sur vol ID 
//for each($resas as $resa)
$trueR['$re5' [$vols]] = $true []

//1 => vide
//2=> plein

    $countFetch = $objetPdo->query($count);
    //$items as $key => value
    //Recupe $resa [$vol][id] = $resa['capacity']
    foreach ($countFetch as $row) {
        $idF= $row['id']; 
        $capacity = $row['capacity']; 
        $placeDispo = $row['placeDispo'];
//REVOIR TABLEAU



//indexer
$trueREsa = [];
foreach($resas as $resa) {
    $trueResa[$resa['flightId']] = $resa
}


foreach ($flight as $key=> $flight) {
    $flight['id']
    $flight['statrt']
    $trtrueResa[$flight[id]]['freesits']
}





// $id = $_GET['idd']; 

// $sql = "SELECT flightNbr FROM flight WHERE id=?";

// $stmt = $objetPdo->prepare($sql);

// $stmt->bindValue(1, $id, PDO::PARAM_INT);

// $stmt->execute();

// $row = $stmt->fetch(PDO::FETCH_OBJ);
    
// $i = $_GET['idd'];

// $i = $_GET['idd'];
// $title = $_GET['title'];

// $sql = "UPDATE flight SET flightNbr=:flightNbr, WHERE id=:i";

// $sql= $objetPdo->prepare($sql);


// $sql->bindValue('i', $i, PDO::PARAM_INT);
// $sql->bindValue('flightNbr', $flightNbr, PDO::PARAM_STR);

// $sql= $sql->execute();
