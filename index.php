
<?php
session_start();
include "getinfo.php";
require "db.php";



    if (isset($_POST['persons'])) {
        $_SESSION["nbrPassenger"] =  $_POST['persons'];
    }


require "headHeader.php";      



?>






    <main>
        <!-- *********       SECTION FORMULAIRE DE RECHERCHE DE VOLS      ********** -->
        <section id="flight" class="flight">
            <div class="col-8 container card py-3 border-primary bg-white">
                <h2 class="text-primary fw-bold"> Reservez votre vol:<h2>

                <form name="form" method="POST">
                    <div class="row">
                        <div class="col-6">
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
                        </div>
                        <div class="col-6">
                            <label class="pt-3" for="arrivalCity"> Ville d'arrivée </label>
                            <select class="form-select " name="arrivalCity" id="arrivalCity">
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
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label class="pt-3" for="date">Date de départ</label>
                            <input class="form-select " type="date" name="date" id="date" value="<?php if (isset($_POST['date'])){echo $_POST['date'];} ?>" />
                        </div>
                        <div class="col-6">
                            <label class="pt-3" for="persons">Nombre de personnes</label>
                            <select class="form-select " name="persons" id="persons" >
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
                        </div>
                    </div>
                    <div >               
                        <input class="btn btn-primary mt-3" type="submit" name="search" value="Rechercher un Vol"/>
                    </div>
                </form>    
            </div>
            

            <?php require_once "searchflight.php";
                    ?>

        </section>


<!-- Carrousel ---->
<div id="carouselExampleSlidesOnly" class="carousel slide pt-3" data-bs-ride="carousel">
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
            <section id="planes" class="planes container py-5">
                <h2 class="text-primary fw-bold pb-4"> Nos modèles d'avions:<h2>
                    <div class="row">
                        <div class="pb-4 col-sm-12 col-md-12 col-lg-6" >
                            <div class="card border-primary">
                                <div class="card-body">
                                    <iframe width="100%" src="https://www.youtube.com/embed/aZgqMxM6HJE?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    <h3 class="card-title text-primary">Cirrus SR22 <br>3 places</h3>
                                    <p class="card-text">Le Cirrus SR22 est un avion monomoteur léger produit par le constructeur aéronautique américain Cirrus Design .  </p>
                                    <a href="https://fr.wikipedia.org/wiki/Cirrus_SR22" class="btn btn-primary">+ d'infos</a>
                                </div>
                            </div>
                        </div>

                        <div class="pb-4 col-sm-12 col-md-12 col-lg-6" >
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



            <!-- *********       les chiffres          ********** -->
            <section>
                <h2 class="text-primary fw-bold container">Pourquoi choisir Donkair<h2>
                <div>
                    <ul class="row container">
                        <li class=" col-sm-12 col-md-6 col-lg-3 container">

                            <h3 class="feature-icons-title title--quaternary">VOLS<h3>
                            <p>Une expérience considérable</p>
                        </li>

                        <li class="col-sm-12 col-md-6 col-lg-3 container">

                            <h3>PASSAGERS<h3>
                            <p>Satisfaction</p>
                        </li>

                        <li class="col-sm-12 col-md-6 col-lg-3 container">
                            <i>
                            ::before
                            </i>
                            <h3>COUVERTURE MONDIALE<h3>
                            <p>Des bureaux DonkAir sur les 6 continents</p>
                        </li>

                        <li class="col-sm-12 col-md-6 col-lg-3 container">
                            <i>
                            ::before
                            </i>
                            <h3>SERVICE PERSONNALISÉ<h3>
                            <p>Des chargés de clientèle dédiés, disponibles 24h/24, 7j/7 </p>
                        </li>
                    </ul>






            <!-- *********       UN MOT DU PRESIDENT DE DONKAIR          ********** -->
            <section class="expert container py-5" id="expert">
                <div class="row">
                <h2 class="text-primary fw-bold pb-4">Un mot de notre président</h2>
                    <div class="col-7">
                        <img src="img/cedric.jpg" alt="Président Cédric" width="100%">
                    </div>

                    <div class="col-5">
                        <div class="w-25">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                version="1.1" x="0px" y="0px" viewBox="0 0 100 125" style="enable-background:new 0 0 100 100;" xml:space="preserve">
                                <path class="st0" d="M75.6,40.5c11,0,19.9,9,19.9,20c0,11-9,20-20,20s-20-9-20-20c0-22.1,17.9-40,40-40  
                                C95.5,20.5,82.4,25.4,75.6,40.5z M45.5,60.5c0,11-9,20-20,20s-20-9-20-20l0,0c0-22.1,17.9-40,40-40c0,0-13.1,4.9-19.9,20  
                                C36.6,40.5,45.5,49.5,45.5,60.5z"/>
                                </svg>
                            </span>
                        </div>

                        <div>
                            <p class="fs-1 fst-italic text-primary pt-4 quote">
                                YES 
                                </br>
                                NO 
                                </br>
                                MAYBE
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </main>



<?php
        
require "footer.php";

?>
