<?php
session_start();  
require "./espaceAdmin/db.php";

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>DonkAir</title>
        <!-- CSS only -->
        <link rel="stylesheet" href="public/assets/css/global.css" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

        <link rel="icon" href="img/donkeysunglassesRemovebg.png" />
    </head>

    <body>

        <!-- *********     HEADER     ********** -->
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand " href="_self">
                    <img src="img/donkeysunglassesRemovebgw.png" alt="logo" width="25%">
                </a>
                <a class="text-decoration-none" href="#flight">Réservez un vol</a>
                <a class="text-decoration-none" href="#planes">Avions</a>
                <a class="text-decoration-none" href="#expert">A propos</a>
            </div>
            <div>
                <button class="btn btn-primary pb-1" onclick="myFunction()"> Contactez-nous par téléphone</button>

                <script>
                function myFunction() {
                alert( "Notre service est disponible 7/7j 24/24h au 06 46 43 49 71" );
                }
                </script>



                <!-- PopUp -->
                <button id="btnPopup" class="btn btn-primary pb-1">Contactez-nous par Mail</button>

                
        </nav>
    </header>


<main>
    <body>
        <form class="container card col-6 pb-5" method="POST" action="">

        <h2 class="text-primary"> Merci de bien vouloir vous enregistrer</h2>

        <?php

    //var_dump($_SESSION);

        for ($i = 0; $i < $_SESSION['nbrPassenger']; $i++ ) { ?>

            <label class="text-primary pt-3" for="name_<?php echo $i; ?>" > Nom </label>
            <input type="text" name="name[]" id="name_<?php echo $i; ?>" value="<?php if (isset($_POST['name'])){echo $_POST['name'][$i];} ?>" />

            <label class="text-primary pt-3" for="firstname_<?php echo $i; ?>"> Prénom</label>
            <input type="text" name="firstname[]" id="firstname_<?php echo $i; ?>" value="<?php if (isset($_POST['firstname'])){echo $_POST['firstname'][$i];} ?>" />
    <br>
            <label class="text-primary pt-3" for="mail_<?php echo $i; ?>"> Email </label>
            <input type="email" name="mail[]" id="mail_<?php echo $i; ?>" placeholder="donkair@hotmail.fr" value="<?php if (isset($_POST['mail'])){echo $_POST['mail'][$i];} ?>" />

            <label class="text-primary pt-3" for="tel_<?php echo $i; ?>"> Numéro de téléphone </label>
            <input  type="text" name="tel[]" id="tel_<?php echo $i; ?>" maxlength="15" value="<?php if (isset($_POST['tel'])){echo $_POST['tel'][$i];} ?>" />

    <br/>  

            <input type="hidden" value="<?php echo $i; ?>" name="nbrP"/>
        
    <?php
    }
    ?>
            <input class="btn btn-primary pt-3" type="submit" name="send" value="Envoyer"/> 

        </form>



    
<?php 


if (isset($_POST) && (!empty($_POST))) {
    $objetPdo=openPDO();
    $name = $_POST['name'];
    $firstname = $_POST['firstname'];
    $mail = $_POST['mail'];
    $tel = $_POST['tel'];


    for ($i = 0; $i < $_SESSION['nbrPassenger']; $i++ ) 
    {  
        $sql = $objetPdo->prepare('INSERT INTO customer (name, firstname, mail, tel) VALUES (:name, :firstname, :mail, :tel)');
        $sql->execute(array(':name' => $name, ':firstname' => $firstname, ':mail' => $mail, ':tel' => $tel));
    } 

}

?>

        <!-- *********       FOOTER             ********** -->
        <footer class="bg-primary pt-5">
            <nav pl-5>
                <ul class="list-unstyled">
                    <li class="pt-3">
                        <a class="text-decoration-none text-white ml-5" href="#flight">Réservez votre vol</a>
                    </li>
                    <li>
                        <a class="text-decoration-none text-white ml-5" href="#planes">Nos modèles d'avions</a>
                    <li>
                        <a class="text-decoration-none text-white ml-5" href="#expert">Nos destinations</a>
                    </li>
                    <li class="pb-3">
                        <a class="text-decoration-none text-white ml-5" class="schedule" href="http://localhost:8000/getinfo.php" target="_blank">Contact</a>
                    </li>
                </ul>
            </nav>
        </footer>



                <!-- *********       MODALE             ********** -->
                <div id="overlay" class="overlay">

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
                            <input type="textarea" rows="10" cols="50" name="message" id="message" />

                            <input class=" btn btn-primary" type="submit"  name="Envoyer" value="Envoyer"/> 

                        </form>
                    </div>
                </div>
                <script src="script.js"></script>
            </div>
    </body>
</html>


