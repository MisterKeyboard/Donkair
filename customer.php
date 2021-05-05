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

if ($data->flightFull()) {
    echo "Le nombre de place limité pour ce vol est de " . $data->getcapacity() . " places.";
}

$flightNbr = $data->flightNbr;
$capacity = $data->getCapacity();

if ($_SESSION['nbrPassenger'] > $capacity) {

} else {

?>

    <body>
        <main>
                                    <!-- *********       CAROUSSEL DESTINATION          ********** -->
                                    <section class="carouseldest">
                <div class="containerdestinations pb-3">
                    <div class="carouseldestinations">
                        <div class="carouseldestinations__face"><span class="spandestinations text-primary">Welcome</span></div>
                        <div class="carouseldestinations__face"><span class="spandestinations text-primary">Aboard</span></div>
                        <div class="carouseldestinations__face"><span class="spandestinations text-primary">Make</span></div>
                        <div class="carouseldestinations__face"><span class="spandestinations text-primary">Your</span></div>
                        <div class="carouseldestinations__face"><span class="spandestinations text-primary">Dream</span></div>
                        <div class="carouseldestinations__face"><span class="spandestinations text-primary">Come</span></div>
                        <div class="carouseldestinations__face"><span class="spandestinations text-primary">True</span></div>
                        <div class="carouseldestinations__face"><span class="spandestinations text-primary">DonkAir</span></div>
                        <div class="carouseldestinations__face"><span class="spandestinations text-primary">Does care</span></div>
                    </div>
                </div>
            </section>

        <form class="container card col-6 pt-3 pb-3 mb-3" method="POST" action="">

        <h2 class="text-primary"> Merci de bien vouloir vous enregistrer</h2>

        <?php


        for ($i = 0; $i < $_SESSION['nbrPassenger']; $i++ ) { ?>
<div class="card container pb-3 mb-3">
            <label class="text-primary pt-3" for="name_<?php echo $i; ?>" > Nom </label>
            <input class="form-control" type="text" name="name[]" id="name_<?php echo $i; ?>" value="<?php if (isset($_POST['name'])){echo $_POST['name'][$i];} ?>" />

            <label class="text-primary pt-3" for="firstname_<?php echo $i; ?>"> Prénom</label>
            <input class="form-control" type="text" name="firstname[]" id="firstname_<?php echo $i; ?>" value="<?php if (isset($_POST['firstname'])){echo $_POST['firstname'][$i];} ?>" />
    <br>
            <label class="text-primary pt-3" for="mail_<?php echo $i; ?>"> Email </label>
            <input class="form-control" type="email" name="mail[]" id="mail_<?php echo $i; ?>" placeholder="donkair@hotmail.fr" value="<?php if (isset($_POST['mail'])){echo $_POST['mail'][$i];} ?>" />

            <label class="text-primary pt-3" for="tel_<?php echo $i; ?>"> Numéro de téléphone </label>
            <input class="form-control" type="text" name="tel[]" id="tel_<?php echo $i; ?>" maxlength="15" value="<?php if (isset($_POST['tel'])){echo $_POST['tel'][$i];} ?>" />
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
        
        $sql = $objetPdo->prepare('INSERT INTO customer (name, firstname, mail, tel, flightNbr) VALUES (:name, :firstname, :mail, :tel');
    
        $sql->execute(array(':name' => $name, ':firstname' => $firstname, ':mail' => $mail, ':tel' => $tel));
        
    } 
}    

// $join = 'SELECT flight.flightNbr FROM flight LEFT JOIN customer ON flight.flightNbr = customer.flightNbr'; 

//  $customerId = 'SELECT customer.id, booking.customer_id FROM booking LEFT JOIN customer ON customer.id = booking.customer_id';

// $count = 'SELECT COUNT  '; 

require "footer.php";  
?>
   
</main>
 
