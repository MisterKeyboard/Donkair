<?php
session_start();  
require "db.php";
require "Model/Plane.php";
require "headHeader.php";  

$objetPdo=openPDO();
$flightId = $_GET['flightId']; 
$statement = 'SELECT plane.model, plane.capacity, flight.flightNbr 
                FROM flight 
                INNER JOIN plane 
                ON plane.id = flight.planeModel 
                WHERE flight.id = ?'; 

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
        <form class="container card col-6 pb-5" method="POST" action="">

        <h2 class="text-primary"> Merci de bien vouloir vous enregistrer</h2>

        <?php


        for ($i = 0; $i < $_SESSION['nbrPassenger']; $i++ ) { ?>
<div class="card container pb-3">
            <label class="text-primary pt-3" for="name_<?php echo $i; ?>" > Nom </label>
            <input type="text" name="name[]" id="name_<?php echo $i; ?>" value="<?php if (isset($_POST['name'])){echo $_POST['name'][$i];} ?>" />

            <label class="text-primary pt-3" for="firstname_<?php echo $i; ?>"> Prénom</label>
            <input type="text" name="firstname[]" id="firstname_<?php echo $i; ?>" value="<?php if (isset($_POST['firstname'])){echo $_POST['firstname'][$i];} ?>" />
    <br>
            <label class="text-primary pt-3" for="mail_<?php echo $i; ?>"> Email </label>
            <input type="email" name="mail[]" id="mail_<?php echo $i; ?>" placeholder="donkair@hotmail.fr" value="<?php if (isset($_POST['mail'])){echo $_POST['mail'][$i];} ?>" />

            <label class="text-primary pt-3" for="tel_<?php echo $i; ?>"> Numéro de téléphone </label>
            <input  type="text" name="tel[]" id="tel_<?php echo $i; ?>" maxlength="15" value="<?php if (isset($_POST['tel'])){echo $_POST['tel'][$i];} ?>" />
        </div>
    <br/>  

            <input type="hidden" value="<?php echo $i; ?>" name="nbrP"/>
        
    <?php
    }
    ?>
            <div class="pt-3">
                <input class="btn btn-primary pt-3" type="submit" name="send" value="Envoyer"/> 
            </div>
        </form>

<?php 
require "espaceAdmin/config.php";

if (isset($_POST['name']) && isset($_POST['firstname']) && isset($_POST['mail']) && isset($_POST['tel']))

    for ($i = 0; $i < $_SESSION['nbrPassenger']; $i++ ) {

        $name = $_POST['name'][$i];
        $firstname = $_POST['firstname'][$i];
        $mail = $_POST['mail'][$i];
        $tel = $_POST['tel'][$i];

        $sql = $objetPdo->prepare('INSERT INTO customer (name, firstname, mail, tel) VALUES (:name, :firstname, :mail, :tel)');
        
    
    }

}
    //     $sql->execute(array(':name' => $name, ':firstname' => $firstname, ':mail' => $mail, ':tel' => $tel));
    
    // }


require "footer.php";  
?>


</main>


        <!-- *********       FOOTER             ********** -->
        <footer class="bg-primary ">
            <nav pl-5>
                <ul class="list-unstyled">
                    <li class="pt-3">
                        <a class="text-decoration-none text-white ml-5 mt-5 fs-3" href="index.php#flight">Réservez votre vol</a>
                    </li>
                    <li>
                        <a class="text-decoration-none text-white ml-5 mt-5 fs-3 " href="index.php#planes">Nos modèles d'avions</a>
                    <li>
                        <a class="text-decoration-none text-white ml-5 mt-5 fs-3" href="index.php#expert">A propos</a>
                    </li>
                    <li class="pb-1">
                        <a class="text-decoration-none text-white ml-5 mt-5 fs-3" class="schedule" href="index.php#header" >Contact</a>
                    </li>
                </ul>
            </nav>
        </footer>



                <!-- *********       MODALE             ********** -->
                <div id="overlay" class="overlay">
            <div class="w-50 container">
                <div id="popup" class="popup">
                        <h2 class="text-primary">Contactez-Nous:<span id="btnClose"
                        class="btnClose text-primary">&times;</span>


                        <form action="getinfo.php" method="POST" >
                            <label class="pt-3" for="name"> Votre Nom </label>
                            <input class="form-select" type="text" name="name" id="name" placeholder="Name"/>

                            <label class="pt-3" for="mail"> Votre Mail </label>
                            <input class="form-select" type="mail" name="mail" id="mail" placeholder="donkair@hotmail.fr"/>

                            <label class="pt-3" for="sujet" > Sujet </label>
                            <select class="form-select" name="subject"> 
                                <option valeur="">Annuler/Modifier une Reservation </option>
                                <option valeur="">Bagage</option>
                                <option valeur="">Codes Promotionnels </option>
                                <option valeur="">Locations de voiture</option>
                                <option valeur="">Hotel</option>
                                <option valeur="">Remboursements</option>
                                <option valeur="">Autre </option>
                            </select>

                            <label class="pt-3" for="message"> Votre Message </label>
                            <div class="input-group">
                                <textarea class="form-control" aria-label="With textarea" name="message" id="message"></textarea>
                            </div>
                            <div class="pt-3">
                                <input class=" btn btn-primary" type="submit"  name="Envoyer" value="Envoyer"/> 
                            </div>
                        </form>
                </div>
            </div>
            <script src="script.js"></script>
        </div>
    </body>
</html>

