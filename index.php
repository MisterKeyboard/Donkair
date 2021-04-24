
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
                
                    <img src="img/donkeysunglassesRemovebgw.png" alt="logo" width="10%">
                
                <a class="text-decoration-none" href="#flight">Réservez un vol</a>
                <a class="text-decoration-none" href="#planes">Avions</a>
                <a class="text-decoration-none" href="#expert">A propos</a>
            </div>
            <div>
                <button class="btn btn-primary" onclick="myFunction()"> Contactez-nous par téléphone</button>

                <script>
                function myFunction() {
                alert( "Notre service est disponible 7/7j 24/24h au 06 46 43 49 71" );
                }
                </script>



                <!-- PopUp -->
                <button id="btnPopup" class="btn btn-primary">Contactez-nous par Mail</button>

                
        </nav>
    </header>



<main>
            <!-- *********       SECTION FORMULAIRE DE RECHERCHE DE VOLS      ********** -->
            <section class="flight">
                <div class="container card col-6 py-3 border-primary bg-white">
                    <h2 class="text-primary fw-bold"> Reservez votre vol:<h2>

                    
                    <form name="form" method="POST">

                        <label class="pt-3" for="departureCity"> Ville de départ </label>
                        <select class="form-select" name="departureCity" id="departureCity">

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
                        <label class="pt-3" for="arrivalCity"> Ville d'arrivée </label>
                        <select class="form-select" name="arrivalCity" id="arrivalCity">
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

                        <label class="pt-3" for="date">Date de départ</label>
                        <input class="form-select" type="date" name="date" id="date" value="<?php if (isset($_POST['date'])){echo $_POST['date'];} ?>" />

                        <label for="persons">Nombre de personnes</label>
                        <select class="form-select" name="persons" id="persons" >
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
<br>
                        <input class="btn btn-primary" type="submit" name="search" value="Recherche"/>
                        </form>

                        <!-- QUERY POUR RECHERER UN VOL  -->
            <?php require_once "searchflight.php"; 

    if (isset($_POST['persons'])) {
        $_SESSION["nbrPassenger"] =  $_POST['persons'];
    }

    ?>
                </div>
            </section>


<!-- Carrousel ---->
<div id="carouselExampleSlidesOnly" class="carousel slide pt-5" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/cirrus/cirrus10.jpg" class="d-block w-100" alt="avion de type cirrus avec une chaine de montagnes en arrière plan">
        </div>
        <div class="carousel-item">
            <img src="img/cessna/cessna7.jpg" class="d-block w-100" alt="avion cessna dans les airs">
        </div>
        <div class="carousel-item">
            <img src="img/cessna/cessna1.jpg" class="d-block w-100" alt="intérieur côté passager de l'avion cessna">
        </div>
    </div>
</div>





            <!-- *********       SECTION AVIONS/VIDEOS    ********** -->         
            <section class="planes container py-5">
                <h2 class="text-primary fw-bold pb-4"> Nos modèles d'avions:<h2>
                    <div class="row">
                        <div class="col-sm-6" >
                            <div class="card border-primary">
                                <div class="card-body">
                                    <iframe width="100%" src="https://www.youtube.com/embed/aZgqMxM6HJE?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    <h3 class="card-title text-primary">Cirrus SR22 <br>3 places</h3>
                                    <p class="card-text">Le Cirrus SR22 est un avion monomoteur léger produit par le constructeur aéronautique américain Cirrus Design .  </p>
                                    <a href="https://fr.wikipedia.org/wiki/Cirrus_SR22" class="btn btn-primary">+ d'infos</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6" >
                            <div class="card border-primary">
                                <div class="card-body">
                                    <iframe width="100%" src="https://www.youtube.com/embed/mXSgenTN0Kk?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    <h3 class="card-title text-primary">Cessna Citation Mustang C510 <br>4 places</h3>
                                    <p class="card-text">Le Cessna Citation Mustang, Modèle 510, est un jet très léger construit par Cessna Aircraft Company.</p>
                                    <a href="https://fr.wikipedia.org/wiki/Cessna_Citation_Mustang" class="btn btn-primary">+ d'infos</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>




            <!-- *********       UN MOT DU PRESIDENT DE DONKAIR          ********** -->
            <section class="expert container py-5">
                <div class="row">
                <h2 class="text-primary fw-bold pb-4">Un mot de notre président</h2>
                    <div class="col-8">
                        <img src="img/cedric.jpg" alt="Président Cédric" width="100%">
                    </div>

                    <div class="col-4">
<!----                      
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                            version="1.1" x="0px" y="0px" viewBox="0 0 100 125" style="enable-background:new 0 0 100 100;" xml:space="preserve">
                            <path class="st0" d="M75.6,40.5c11,0,19.9,9,19.9,20c0,11-9,20-20,20s-20-9-20-20c0-22.1,17.9-40,40-40  
                            C95.5,20.5,82.4,25.4,75.6,40.5z M45.5,60.5c0,11-9,20-20,20s-20-9-20-20l0,0c0-22.1,17.9-40,40-40c0,0-13.1,4.9-19.9,20  
                            C36.6,40.5,45.5,49.5,45.5,60.5z"/>
                            </svg>
                        </span>
---->
                        <p class="fs-1 fst-italic text-primary pt-4">
                            "YES 
                            </br>
                            NO 
                            </br>
                            MAYBE"
                        </p>
                    </div>
                </div>
            </section>
        </main>

        <!-- *********       FOOTER             ********** -->
        <footer class="bg-primary ">
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
