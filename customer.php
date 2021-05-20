<?php
session_start();  
//require "espaceAdmin/config.php";
require "Model/Plane.php";
require "headHeader.php";  

$objetPdo=openPDO();
$flightId = $_GET['flightId'];
$statement = 'SELECT plane.model, plane.capacity FROM flight LEFT JOIN plane ON plane.id = flight.planeModel WHERE flight.id = ?'; 

$getFlightId = $objetPdo->prepare($statement);
$getFlightId->execute([$flightId]); 
$getFlightId->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Plane');
$data = $getFlightId->fetch();

// gestion des erreurs

if ($data->flightFull()) {
    echo "Le nombre de place limité pour ce vol est de " . $data->getcapacity() . " places.";
}

//GESTION des erreurs du forms 

if (isset($_POST['send']))
{
    if(isset($_POST['name']) && isset($_POST['firstname']) && isset($_POST['mail']) && isset($_POST['tel']));
    {  
        $name = $_POST['name'];
        $firstname = $_POST['firstname'];
        $mail = $_POST['mail'];
        $tel = $_POST['tel'];

        if(!empty($_POST['name']) && !empty($_POST['firstname']) && !empty($_POST['mail']) && !empty($_POST['tel']))
        {
            //print_r($name);
            $name = $_POST['name'];
            $firstname = $_POST['firstname'];
            $mail = $_POST['mail'];
            $tel = $_POST['tel'];
            

            header('Location:recOk.php');;
?> 
            <a class="container fs-3 pb-4" href = "index.php"> Retourner à la page d'accueil</a> 
            <?php
        } else {
            echo "Veuillez remplir tous les champs svp";
        }
    }
}

$flightNbr = $data->flightNbr;
$capacity = $data->getCapacity();

$count = '
SELECT tab.* FROM 
(SELECT 
    flight.id,
    plane.capacity,
    COUNT(booking.name), 
(plane.capacity - COUNT(booking.name)) placeDispo
FROM flight
INNER JOIN plane ON plane.id = flight.planeModel
LEFT JOIN booking ON booking.flightId = flight.id
GROUP BY flight.id) tab
WHERE tab.placeDispo > 0;
';
$countFetch = $objetPdo->query($count);
foreach ($countFetch as $row) {
    $idF= $row['id']; 
    $capacity = $row['capacity']; 
    //$num = $row['num'];
    $placeDispo = $row['placeDispo'];
}



if ($_SESSION['nbrPassenger'] > $capacity) {
    echo "Le nombre de place limité pour ce vol est de " . $data->getcapacity() . " places.";
} else {

?>

    <body>
        <main>

        <form class="container card col-6 pt-3 mt-3 pb-3 mb-3" method="POST" action="">

        <h2 class="text-primary"> Merci de bien vouloir vous enregistrer</h2>

        <?php


        for ($i = 0; $i < $_SESSION['nbrPassenger']; $i++ ) { ?>
<div class="card container pb-3 mb-3">
            <label class="text-primary pt-3" for="name_<?php echo $i; ?>" > Nom </label>
            <input class="form-control" type="text" name="name[]" id="name_<?php echo $i; ?>" value="<?php if (isset($_POST['name'])){echo $_POST['name'][$i];} ?>" required />

            <label class="text-primary pt-3" for="firstname_<?php echo $i; ?>"> Prénom</label>
            <input class="form-control" type="text" name="firstname[]" id="firstname_<?php echo $i; ?>" value="<?php if (isset($_POST['firstname'])){echo $_POST['firstname'][$i];} ?>" required />
    <br>
            <label class="text-primary pt-3" for="mail_<?php echo $i; ?>"> Email </label>
            <input class="form-control" type="email" name="mail[]" id="mail_<?php echo $i; ?>" placeholder="donkair@hotmail.fr" value="<?php if (isset($_POST['mail'])){echo $_POST['mail'][$i];} ?>" required />

            <label class="text-primary pt-3" for="tel_<?php echo $i; ?>"> Numéro de téléphone </label>
            <input class="form-control" type="text" name="tel[]" id="tel_<?php echo $i; ?>" pattern="[0-9]{8-15}" required value="<?php if (isset($_POST['tel'])){echo $_POST['tel'][$i];} ?>" />
        </div>
    <br/>  

            <input type="hidden" value="<?php echo $i; ?>" name="nbrP"/>
        
    <?php
    }
    ?>
            <div class="pt-1">
                <input class="btn btn-primary" type="submit" name="send" value="Envoyer"/> 
            </div>
        </form>

<?php 

if (isset($_POST['name']) && isset($_POST['firstname']) && isset($_POST['mail']) && isset($_POST['tel']))

    for ($i = 0; $i < $_SESSION['nbrPassenger']; $i++ ) {

        $name = $_POST['name'][$i];
        $firstname = $_POST['firstname'][$i];
        $mail = $_POST['mail'][$i];
        $tel = $_POST['tel'][$i];

        $sql = $objetPdo->prepare('INSERT INTO customer (name, firstname, mail, tel) VALUES (:name, :firstname, :mail, :tel)');
        
        $sql->execute(array(':name' => $name, ':firstname' => $firstname, ':mail' => $mail, ':tel' => $tel));

    // $fetch = $sql->fetch();
    // var_dump($fetch);

 //Remplir la table Booking 
$flightId = $_GET['flightId'];

// $name = $_POST['name'];
// $firstname = $_POST['firstname'];

$sql2 = $objetPdo->prepare('INSERT INTO booking (name, firstname, flightId) VALUES (:name, :firstname, :flightId)');

$sql2->execute(array(':name' => $name, ':firstname' => $firstname, ':flightId' => $flightId));

        
    } 

}

// $requestJoin = $objetPdo->prepare('SELECT customer.name, booking.customer_id FROM customer LEFT JOIN booking ON customer.id = booking.customer_id');
// $requestJoin->execute();

//  $join = $objetPdo->prepare('SELECT flight.flightNbr FROM flight LEFT JOIN customer ON flight.flightNbr = customer.flightNbr'); 
//  $joinLeft = $join->execute();

//  $customerId = 'SELECT customer.id, booking.customer_id FROM booking LEFT JOIN customer ON customer.id = booking.customer_id';
//'SELECT flight.flightNbr FROM flight LEFT JOIN customer ON flight.flightNbr = customer.flightNbr'

// $count = 'SELECT COUNT(*) FROM booking WHERE flightId = 2';
// $countFectch = $objetPdo->query($count);
// $counter = $countFectch->fetchColumn();
// print($counter);

// $count1 = 'SELECT COUNT(*) FROM booking WHERE flightId = 1';
// $countFectch1 = $objetPdo->query($count1);
// $counter1 = $countFectch->fetchColumn();
// print($counter1);

$count = '
SELECT tab.* FROM 
(SELECT 
    flight.id,
    plane.capacity,
    COUNT(booking.name), 
(plane.capacity - COUNT(booking.name)) placeDispo
FROM flight
INNER JOIN plane ON plane.id = flight.planeModel
LEFT JOIN booking ON booking.flightId = flight.id
GROUP BY flight.id) tab
WHERE tab.placeDispo > 0;
';
$countFetch = $objetPdo->query($count);
foreach ($countFetch as $row) {
    $idF= $row['id']; 
    $capacity = $row['capacity']; 
    //$num = $row['num'];
    $placeDispo = $row['placeDispo'];
}

//print($counter);
require "footer.php";  
?>

</main>

