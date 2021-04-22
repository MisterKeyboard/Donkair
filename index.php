
<?php
include "getinfo.php";
require "espaceAdmin/config.php"; 
?>

<!DOCTYPE html>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

<html>

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>DonkAir</title>
        <link rel="icon" href="img/donkeysunglassesRemovebg.png" />
        <link rel="stylesheet" href="style.css" />
        
    </head>

    <body>

        <!-- *********     HEADER     ********** -->
        <header>
            <div>
                <a class="logo" href="" target="_self">
                    <img src="img/donkeysunglassesRemovebgw.png" alt="logo">
                </a>
            </div>
            <div>
                <nav>
                    <a href="#flight">Réserver un vol</a>
                    <a href="#planes">Avions</a>
                    <a href="#expert">Destinations</a>
                    <a href="#expert">A propos</a>

                    <a href="http://localhost:8000/getinfo.php" target="_blank">Contact
                    </a>
                </nav>
            </div>
        

            <!-- *********       SECTION FORMULAIRE DE RECHERCHE DE VOLS      ********** -->
            <section class="flight">

            <p> Reserver votre vol <p>
            
            <form name="form" method="POST">

                <label for="departureCity"> Ville de départ </label>
                <select name="departureCity" id="departureCity">

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

                <input type="submit" name="search" value="Rechercher un Vol"/>

                </form>

                        <!-- QUERY POUR RECHERER UN VOL  -->
            <?php require_once "searchflight.php"; 

    if (isset($_POST['persons'])) {
        $_SESSION["nbrPassenger"] =  $_POST['persons'];
    }

    ?>
            <img src="img/cirrus/cirrus10.jpg" alt="avion de type cirrus avec une chaine de montagnes en arrière plan">
            
<!-- Essaie Carrousel -->

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/planeclouds.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/bg.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/planeclouds.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

        <!-- Insert contact's form-->

            <div>

                <button class="contacttel" onclick="myFunction()"> Contactez-nous par téléphone</button>

                <script>
                        function myFunction() {
                        alert( "Notre service est disponible 7/7j 24/24h au 06 46 43 49 71" );
                        }
                </script>
        
                    <br/>


                    <!-- PopUp -->
                    <button id="btnPopup" class="btnPopup">Contactez-nous par Mail</button>

                    <div id="overlay" class="overlay">

                        <div id="popup" class="popup">


                            <h2>Contactez-Nous:<span id="btnClose"
                            class="btnClose">&times;</span>


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

                                <input type="submit"  name="Envoyer" value="Envoyer"/> 


                            </form>
                        </div>
                    </div>
                    <script src="script.js"></script>
        </header>

        <main>

            <!-- *********       SECTION AVIONS/VIDEOS             ********** -->
            <!-- <section class="planes">
                <div>
                    <h2>Cirrus SR22 3 places</h2>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/aZgqMxM6HJE?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>

                <div>
                    <h2>Cessna Citation Mustang C510 4 places</h2>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/mXSgenTN0Kk?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </section> -->


            <!-- *********       NOS DESTINATIONS            ********** -->
            <section class="destinations">
                <div>
                </div>
            </section>


            <!-- *********       UN MOT DU PRESIDENT DE DONKAIR             ********** -->
            <section class="president">
                <div>

                </div>

                <div>
                    <h2>Un mot de notre président</h2>
                    <img src="img/cedric.jpg" alt="Président Cédric">
                </div>

                <div>
                    <p>

                    </p>
                </div>
            </section>
        </main>

        <!-- *********       FOOTER             ********** -->
        <footer>
            <nav>
                <a href="#flight">Réserver un vol</a>
                <a href="#planes">Nos modèles d'avions</a>
                <a href="#expert">Nos destinations</a>

                <a class="schedule" href="http://localhost:8000/getinfo.php" target="_blank">Contact
                </a>
            </nav>

        </div>
        </footer>
    </body>
</html>
