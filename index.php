
<?php
include "getinfo.php";
require "db.php";
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
                <a class="navbar-brand" href="_self">
                    <img src="img/donkeysunglassesRemovebgw.png" alt="logo" width="23%">
                </a>
                <a href="#flight">Réservez un vol</a>
                <a href="#planes">Avions</a>
                <a href="#expert">A propos</a>
            </div>
            <div>
                <button class="btn btn-primary" onclick="myFunction()"> Contactez-nous par téléphone</button>

                <script>
                function myFunction() {
                alert( "Notre service est disponible 7/7j 24/24h au 06 46 43 49 71" );
                }
                </script>

                <br/>


                <!-- PopUp -->
                <button id="btnPopup" class="btn btn-primary">Contactez-nous par Mail</button>

                <div id="overlay" class="overlay zindex-modal-backdrop">

                    <div id="popup" class="popup">
                        <h2 class="text-primary">Contactez-Nous:<span id="btnClose"
                        class="btnClose text-primary">&times;</span>


                        <form action="getinfo.php" method="POST" >
                            <label for="name"> Votre Nom </label>
                            <input type="text" name="name" id="name" placeholder="Name"/>

                            <label for="mail"> Votre Mail </label>
                            <input type="mail" name="mail" id="mail" placeholder="donkair@hotmail.fr"/>

                            <label for="sujet" > Sujet </label>
                            <select name="subject"> 
                                <option valeur="">Annuler/Modifier une Reservation </option>
                                <option valeur="">Bagage</option>
                                <option valeur="">Codes Promotionnels </option>
                                <option valeur="">Locations de voiture</option>
                                <option valeur="">Hotel</option>
                                <option valeur="">Remboursements</option>
                                <option valeur="">Autre </option>
                            </select>

                            <label for="message"> Votre Message </label>
                            <input type="textarea" name="message" id="message" />

                            <input class="btn-primary" type="submit"  name="Envoyer" value="Envoyer"/> 

                        </form>
                    </div>
                </div>
            <script src="script.js"></script>
        </nav>
    </header>





            

<main>
            <!-- *********       SECTION FORMULAIRE DE RECHERCHE DE VOLS      ********** -->
            <section class="flight">
                <div class="container">
                    <h2 class="text-primary fw-bold"> Reservez votre vol:<h2>
            
                    <form name="form" method="POST">

                        <label for="departureCity"> Ville de départ </label>
                        <select name="departureCity" id="departureCity">

                            <?php
                                $objetPdo=openPDO();
                                $selection = $objetPdo->query('SELECT town, id FROM route');
                                    while($donnees = $selection->fetch())
                                    {
                            ?>
                                <option value= " <?= $donnees['id'] ?> "> <?= $donnees['town'] ?> </option>
                            <?php
                                    }
                            ?>

                        </select>
                        <label for="arrivalCity"> Ville d'arrivée </label>
                        <select name="arrivalCity" id="arrivalCity">
                            <?php
                                $selection = $objetPdo->query('SELECT town, id FROM route');
                                    while($donnees = $selection->fetch())
                                    {
                            ?>
                                <option value= " <?= $donnees['id'] ?> "> <?= $donnees['town'] ?> </option>
                            <?php
                                    }
                            ?>
                        </select>

                        <label for="date">Date de départ</label>
                        <input type="date" name="date" id="date" value="<?php if (isset($_POST['date'])){echo $_POST['date'];} ?>" />

                        <label for="persons">Nombre de personnes</label>
                        <select name="persons" id="persons" >
                            <option value="1" >1</option>
                            <option value="2" >2</option>
                            <option value="3" >3</option>
                            <option value="4" >4</option>
                            <option value="5" >5</option>
                            <option value="6" >6</option>
                            <option value="7" >7</option>
                            <option value="8" >8</option>
                            <option value="9" >9</option>
                            <option value="10" >10</option>
                        </select>

                        <input class="btn-primary" type="submit" name="search" value="Recherche"/>
                        </form>

                        <!-- QUERY POUR RECHERER UN VOL  -->
            <?php require_once "searchflight.php"; 

    if (isset($_POST['persons'])) {
        $_SESSION["nbrPassenger"] =  $_POST['persons'];
    }

    ?>
                </div>
            
<!-- Carrousel ---->
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/cirrus/cirrus10.jpg" class="d-block w-100" alt="avion de type cirrus avec une chaine de montagnes en arrière plan">
        </div>
        <div class="carousel-item">
            <img src="img/cessna/cessna7.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="img/cessna/cessna1.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
</div>


        <!-- Insert contact's form-->



            <!-- *********       SECTION AVIONS/VIDEOS             ********** -->
            <section class="container">
            <h2 class="text-primary fw-bold"> Nos modèles d'avions:<h2>
                <div class="row">
                    <div class="card col-6" >
                        <iframe width="100%"  src="https://www.youtube.com/embed/aZgqMxM6HJE?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <div class="card-body">
                            <h3 class="card-title text-primary">Cirrus SR22 <br>3 places</h3>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="https://fr.wikipedia.org/wiki/Cirrus_SR22" class="btn btn-primary">+ d'infos</a>
                        </div>
                    </div>

                    <div class="card col-6" >
                        <iframe width="100%"  src="https://www.youtube.com/embed/mXSgenTN0Kk?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <div class="card-body">
                            <h3 class="card-title text-primary">Cessna Citation Mustang C510 4 places</h3>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="https://fr.wikipedia.org/wiki/Cessna_Citation_Mustang" class="btn btn-primary">+ d'infos</a>
                        </div>
                    </div>
                </div>
            </section>




            <!-- *********       UN MOT DU PRESIDENT DE DONKAIR             ********** -->
            <section class="container">
                <div class="row">
                <h2 class="text-primary fw-bold">Un mot de notre président</h2>
                    <div class="col-8">
                        <img src="img/cedric.jpg" alt="Président Cédric" width="100%">
                    </div>

                    <div class="col-4">
                        <p class="fs-1 fst-italic">
                            <span class="text-primary ">"</span>
                            YES 
                        </br>
                            NO 
                        </br>
                            MAYBE
                        </p>
                    </div>
                </div>
            </section>
        </main>

        <!-- *********       FOOTER             ********** -->
        <footer>
            <nav>
                <a href="#flight">Réservez votre vol</a>
                <a href="#planes">Nos modèles d'avions</a>
                <a href="#expert">Nos destinations</a>

                <a class="schedule" href="http://localhost:8000/getinfo.php" target="_blank">Contact
                </a>
            </nav>
        </footer>
    </body>
</html>
