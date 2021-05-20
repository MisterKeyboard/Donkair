
<?php
session_start();
include "getinfo.php";
require "espaceAdmin/db.php";
    if (isset($_POST['persons'])) {
        $_SESSION["nbrPassenger"] =  $_POST['persons'];
    }
require "headHeader.php";      
?>


    <header>
        <link rel="stylesheet" href="style.css"> 
    </header>

    <main>
        <!-- *********       SECTION FORMULAIRE DE RECHERCHE DE VOLS      ********** -->
<section  class="section1">

            <div id="flight" class="col-8 container card py-3 ">
                <h2 class="text-white fw-bold text-center"> Reservez votre vol:<h2>

                <form name="form" method="POST">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6 text-white ">
                            <label class="pt-3" for="departureCity"> Ville de départ </label>
                            <select class="form-select" name="departureCity" id="departureCity">

                            <?php
                                $objetPdo=openPDO();
                                $selection = $objetPdo->query('SELECT town, id FROM route');
                                while($donnees = $selection->fetch())
                                {

                            ?>
                                <option <?php if (isset($_POST['departureCity']) && $donnees['id'] == $_POST['departureCity']){echo "selected";} ?> value="<?= $donnees['id'] ?>"> <?= $donnees['town'] ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 text-white">
                            <label class="pt-3" for="arrivalCity"> Ville d'arrivée </label>
                            <select class="form-select " name="arrivalCity" id="arrivalCity">
                            <?php
                            $selection = $objetPdo->query('SELECT town, id FROM route');
                            while($donnees = $selection->fetch())
                            {
                            ?>
                            <option <?php if (isset($_POST['arrivalCity']) && $donnees['id'] == $_POST['arrivalCity']){echo "selected";} ?> value="<?= $donnees['id'] ?>"> <?= $donnees['town'] ?> </option>
                            <?php
                            }
                            ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6 text-white">
                            <label class="pt-3" for="date">Date de départ</label>
                            <input class="form-select" type="date" name="date" id="date" value="<?php if (isset($_POST['date'])){echo $_POST['date'];} ?>" required />
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 text-white">
                            <label class="pt-3" for="persons">Nombre de personnes</label>
                            <select class="form-select " name="persons" id="persons" >
                                <option value="1" >1</option>
                                <option value="2" >2</option>
                                <option value="3" >3</option>
                                <option value="4" >4</option>
                            </select>
                        </div>
                    </div>
                    <div >               
                        <input class="btnResv" type="submit" name="search" value="Rechercher un Vol"/>
                    </div>
                </form>    
            </div>
            

            <?php require_once "searchflight.php";
                    ?>
</section> 

<section  class="section2">

            <!-- Images ---->
        
    <figure>
        <img src="img/cirrus/cirrus4.jpg" id="image1" class="images" alt="image d'avion" >
        <img src="img/cessna/cessna2.jpg" class="images image2" alt="image d'avion" >
        <img src="img/cessna/cessna6.jpg" class="images" id="image3" alt="image d'avion" >
        <img src="img/cessna/cessna8.jpg" class="images image4" alt="image d'avion" >
        <img src="img/cirrus/cirrus10.jpg" class="images image5" alt="image d'avion" >
        <img src="img/cessna/cessna10.jpg" class="images" id="image6" alt="image d'avion" >
        <img src="img/cirrus/cirrus13.jpg" class="images image7" alt="image d'avion" >
        <img src="img/cessna/cessna11.jpg" class="images image8" alt="image d'avion" >
    </figure>   
            
</section>                   

<section  class="section3">
            <!-- *********       SECTION AVIONS/VIDEOS    ********** -->         
            <section id="planes" class="planes container py-5">
                <h2 class="text-primary fw-bold pb-4 text-white"> Nos modèles d'avions:<h2>
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

  <!-- *********       A propos          ********** -->

<section  class="section4">

                <h2 class="text-primary fw-bold container pb-3 pt-4"> Pourquoi choisir Donkair ? <h2>
                
                    <div class="row rowChoice px-1">
                        <div class=" col-sm-12 col-md-6 col-lg-3">
                            <div class="container w-25 py-4 px-1">
                                <?xml version="1.0" encoding="iso-8859-1"?>
                                <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                <svg class="st0" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                <g>
                                    <g>
                                        <path d="M497.535,14.465c-19.569-19.568-51.395-19.241-70.557,0.726L322.092,124.488L66.131,39.781L12.4,93.513l213.352,131.365
                                            L117.796,337.372l-69.231-11.366L0,374.571l101.78,35.649L137.429,512l48.565-48.565l-11.366-69.231l112.494-107.955
                                            L418.487,499.6l53.732-53.732l-84.706-255.961L496.808,85.022C516.776,65.86,517.103,34.034,497.535,14.465z"/>
                                    </g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                </svg>
                            </div>
                            <h3 class="text-center">20 000 VOLS ASSURÉS<h3>
                            <p class="text-center">Une expérience considérable</p>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-3 container">
                            <div class="container w-25 py-4 px-1">
                                <?xml version="1.0" encoding="iso-8859-1"?>
                                <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                <svg class="st0" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 368 368" style="enable-background:new 0 0 368 368;" xml:space="preserve">
                                <g>
                                    <g>
                                        <g>
                                            <path d="M184,0C82.544,0,0,82.544,0,184s82.544,184,184,184s184-82.544,184-184S285.456,0,184,0z M184,352
                                                c-92.64,0-168-75.36-168-168S91.36,16,184,16s168,75.36,168,168S276.64,352,184,352z"/>
                                            <path d="M144,152c0-13.232-10.768-24-24-24s-24,10.768-24,24s10.768,24,24,24S144,165.232,144,152z M112,152c0-4.408,3.592-8,8-8
                                                s8,3.592,8,8s-3.592,8-8,8S112,156.408,112,152z"/>
                                            <path d="M248,128c-13.232,0-24,10.768-24,24s10.768,24,24,24s24-10.768,24-24S261.232,128,248,128z M248,160
                                                c-4.408,0-8-3.592-8-8s3.592-8,8-8c4.408,0,8,3.592,8,8S252.408,160,248,160z"/>
                                            <path d="M261.336,226.04c-3.296-2.952-8.36-2.664-11.296,0.624C233.352,245.312,209.288,256,184,256
                                                c-25.28,0-49.352-10.688-66.04-29.336c-2.952-3.288-8-3.576-11.296-0.624c-3.296,2.944-3.568,8-0.624,11.296
                                                C125.76,259.368,154.176,272,184,272c29.832,0,58.248-12.64,77.96-34.664C264.904,234.04,264.624,228.984,261.336,226.04z"/>
                                        </g>
                                    </g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                </svg>
                            </div>
                            <h3 class="text-center">95 000+ PASSAGERS<h3>
                            <p class="text-center">Satisfaction</p>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-3 container">
                            <div class="container w-25 py-4 px-1">
                                <svg  class="st0" viewBox="0 0 480 480"  xmlns="http://www.w3.org/2000/svg">
                                <path d="m240 0c-132.546875 0-240 107.453125-240 240s107.453125 240 240 240 240-107.453125 
                                240-240c-.148438-132.484375-107.515625-239.851562-240-240zm207.566406 324.078125-68.253906 
                                11.777344c7.8125-28.652344 12.03125-58.164063 12.558594-87.855469h71.929687c-.902343 
                                26.117188-6.398437 51.871094-16.234375 76.078125zm-431.367187-76.078125h71.929687c.527344 
                                29.691406 4.746094 59.203125 12.558594 87.855469l-68.253906-11.777344c-9.835938-24.207031-15.332032-49.960937-16.234375-76.078125zm16.234375-92.078125 
                                68.253906-11.777344c-7.8125 28.652344-12.03125 58.164063-12.558594 87.855469h-71.929687c.902343-26.117188 
                                6.398437-51.871094 16.234375-76.078125zm215.566406-27.472656c28.746094.367187 57.421875 2.984375 85.761719 7.832031l28.238281 4.871094c8.675781 29.523437 13.34375 60.078125 13.878906 90.847656h-127.878906zm88.488281-7.9375c-29.238281-4.996094-58.828125-7.695313-88.488281-8.0625v-96c45.863281 4.40625 85.703125 46.398437 108.28125 107.511719zm-104.488281-8.0625c-29.660156.367187-59.242188 3.066406-88.480469 8.0625l-19.800781 3.425781c22.578125-61.128906 62.417969-103.136719 108.28125-107.523438zm-85.753906 23.832031c28.335937-4.847656 57.007812-7.464844 85.753906-7.832031v103.550781h-127.878906c.535156-30.769531 5.203125-61.324219 13.878906-90.847656zm-42.125 111.71875h127.878906v103.550781c-28.746094-.367187-57.421875-2.984375-85.761719-7.832031l-28.238281-4.871094c-8.675781-29.523437-13.34375-60.078125-13.878906-90.847656zm39.390625 111.488281c29.238281 5.003907 58.824219 7.714844 88.488281 8.105469v96c-45.863281-4.410156-85.703125-46.402344-108.28125-107.515625zm104.488281 8.105469c29.660156-.390625 59.242188-3.101562 88.480469-8.105469l19.800781-3.425781c-22.578125 61.128906-62.417969 103.136719-108.28125 107.523438zm85.753906-23.875c-28.335937 4.847656-57.007812 7.464844-85.753906 7.832031v-103.550781h127.878906c-.535156 30.769531-5.203125 61.324219-13.878906 90.847656zm58.117188-111.71875c-.527344-29.691406-4.746094-59.203125-12.558594-87.855469l68.253906 11.777344c9.835938 24.207031 15.332032 49.960937 16.234375 76.078125zm47.601562-93.710938-65.425781-11.289062c-11.761719-38.371094-33.765625-72.808594-63.648437-99.601562 55.878906 18.648437 102.21875 58.457031 129.074218 110.890624zm-269.871094-110.890624c-29.882812 26.792968-51.886718 61.230468-63.648437 99.601562l-65.425781 11.289062c26.855468-52.433593 73.195312-92.242187 129.074218-110.890624zm-129.074218 314.3125 65.425781 11.289062c11.761719 38.371094 33.765625 72.808594 63.648437 99.601562-55.878906-18.648437-102.21875-58.457031-129.074218-110.890624zm269.871094 110.890624c29.882812-26.792968 51.886718-61.230468 63.648437-99.601562l65.425781-11.289062c-26.855468 52.433593-73.195312 92.242187-129.074218 110.890624zm0 0"/></svg>
                            </div>
                            <h3 class="text-center">COUVERTURE MONDIALE<h3>
                            <p class="text-center">Des bureaux DonkAir sur les 6 continents</p>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-3 container">
                            <div class="container w-25 py-4 px-1">
                                <?xml version="1.0" encoding="iso-8859-1"?>
                                <!-- Generator: Adobe Illustrator 16.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                                <svg class="st0" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 189.725 189.725" style="enable-background:new 0 0 189.725 189.725;"
                                    xml:space="preserve">
                                <g>
                                    <g>
                                        <path d="M112.703,12.209c-1.405-3.553-3.822-6.638-7.471-8.748c-1.387-0.801-2.783-1.35-4.178-1.695
                                            C96.97,0.084,92.388-0.42,87.608,0.355c-21.487,3.487-27.597,33.089-8.88,43.769c5.806,3.313,17.978,5.163,24.773,1.866
                                            c4.167-0.936,7.916-3.299,10.623-7.077C119.761,31.051,117.265,19.955,112.703,12.209z"/>
                                        <path d="M57.595,41.947c-0.283-3.619-1.864-7.103-4.235-9.897c-0.321-0.733-0.679-1.442-1.092-2.109
                                            c-4.732-7.653-13.913-7.003-21.186-3.91c-9.08,3.862-12.511,13.844-10.447,22.938c1.921,8.454,9.287,15.215,18.029,15.381
                                            C50.41,64.573,58.44,52.715,57.595,41.947z"/>
                                        <path d="M128.755,90.472c-0.108-8.433,0.187-17.614-2.546-25.695c-4.021-11.894-17.353-12.543-27.915-13.038
                                            c-11.533-0.541-28.531-2.116-36.068,9.037c-9.732,14.398-6.897,37.548-5.605,53.859c0.199,2.518,3.003,3.075,4.338,1.664
                                            c0.013,0.003,0.026,0.003,0.04,0.006c1.299,1.376,1.977,1.269,4.794,1.404c1.376,0.066,2.197-1.12,2.334-2.334
                                            c1.275-11.243-2.976-29.565,7.567-36.255c-0.007,0.436-0.008,0.875-0.011,1.313c-0.168,0.254-0.307,0.543-0.386,0.887
                                            c-0.168,0.724-0.146,1.237-0.076,1.934c0.229,14.167,1.411,28.26,1.143,42.472c-0.376,19.812,1.62,40.222-0.804,59.894
                                            c-0.04,0.32,0.01,0.596,0.106,0.843c-0.318,0.688-0.051,1.642,0.85,1.979c2.876,1.079,5.459,0.769,8.53,1.238
                                            c1.729,0.265,3.34-0.693,3.391-2.582c0.266-10.103,1.366-20.236,2.071-30.315c0.295-4.227,0.37-8.585,0.162-12.815
                                            c-0.081-0.978-0.166-1.955-0.255-2.931c-0.03-0.331-0.053-0.61-0.073-0.86c0.641-0.117,1.247-0.264,1.693-0.312
                                            c2.351-0.258,4.499-0.147,6.727,0.46c0.448,6.001,1.188,11.962,1.089,18.073c-0.155,9.547-0.941,19.168-0.177,28.701
                                            c0.129,1.611,1.852,1.951,2.727,1.08c2.382,0.943,5.507,1.676,7.593-0.063c0.077-0.065,0.117-0.145,0.181-0.214
                                            c1.047,0.49,2.474,0.019,2.534-1.542c1.388-35.634,6.238-72.424,0.304-107.834c1.306,0.382,2.525,0.997,3.59,2.019
                                            c2.651,2.548,1.997,7.905,1.827,11.175c-0.404,7.855-2.162,17.012,2.275,24.101c0.637,1.018,1.794,1.254,2.766,0.962
                                            c1.547,0.519,3.358-0.001,3.743-2.058C128.714,106.711,128.861,98.605,128.755,90.472z"/>
                                        <path d="M171.496,34.543c-1.455-12.344-18.521-22.357-29.055-14.004c-4.249,3.369-6.162,9.061-6.477,14.866
                                            c-1.185,5.069-0.246,10.612,2.761,14.825c1.705,3.41,4.323,6.254,8.088,7.455c2.654,0.848,5.319,0.444,7.808-0.578
                                            C164.322,55.575,172.786,45.487,171.496,34.543z"/>
                                        <path d="M55.579,124.249c-0.059-1.253-0.889-2.78-2.272-2.985c-1.856-0.274-3.548-0.6-5.289-0.764
                                            c-0.418-7.429-0.63-14.867-0.597-22.309c0.031-6.995-1.039-18.149,3.305-24.135c0.376-0.518,0.536-1.029,0.562-1.515
                                            c1.003-1.254,0.821-3.447-1.12-3.863c-11.499-2.469-32.588-8.243-39.703,4.832c-6.726,12.359-2.641,29.993-2.452,43.345
                                            c0.02,1.325,0.916,2.638,2.248,2.952c2.285,0.54,4.374,0.808,6.73,0.843c1.237,0.019,2.746-0.936,2.947-2.243
                                            c1.276-8.348-1.562-16.85,0.169-25.117c1.26-6.025,2.825-4.196,3.643-0.131c0.646,3.202,0.693,6.562,0.749,9.817
                                            c0.161,9.46-1.06,19.017-1.46,28.47c-0.596,14.107-0.664,28.231-0.215,42.346c0.044,1.362,0.897,2.558,2.231,2.931
                                            c3.378,0.944,6.297,1.283,9.748,0.733c1.395-0.222,2.117-1.684,2.228-2.925c1.289-14.536,0.864-29.11,0.772-43.683
                                            c1.431,0.015,2.846,0.137,4.271,0.368c0.262,14.697-1.341,29.353-0.826,44.055c0.055,1.567,1.373,3.26,3.102,3.1
                                            c2.718-0.251,6.781-0.326,8.845-2.389c2.446-2.445,2.108-10.288,2.425-13.565C56.835,149.757,56.17,136.921,55.579,124.249z
                                            M14.256,114.397c-0.062-0.009-0.123-0.021-0.184-0.03c-0.113-3.922-0.341-7.848-0.524-11.771
                                            C13.866,106.661,14.414,110.746,14.256,114.397z"/>
                                        <path d="M178.9,73.948c-5.887-12.958-28.205-13.373-39.209-7.859c-4.544,2.277-6.254,5.522-6.332,10.527
                                            c-0.182,11.64,1.837,23.386,1.954,35.062c0.098,9.756-5.177,18.336-6.663,27.864c-1.772,11.356-0.535,22.869,0.243,34.247
                                            c0.097,1.421,1.28,2.018,2.326,1.842c0.034,0.007,0.058,0.029,0.094,0.034c2.499,0.393,5.152,0.841,7.68,0.878
                                            c1.572,0.023,2.662-1.274,2.755-2.755c0.867-13.839,0.866-27.727,0.886-41.59c2.387-0.108,4.747-0.164,7.156,0.105
                                            c-0.868,13.843,0.944,27.629,1.096,41.484c0.017,1.444,1.312,3.074,2.896,2.896c1.976-0.222,3.93-0.57,5.916-0.72
                                            c1.237-0.093,2.539-0.812,2.811-2.14c3.522-17.208,0.388-34.45,0.17-51.795c-0.134-10.773,3.882-22.881,2.021-33.783
                                            c0.139-0.167,0.242-0.365,0.334-0.581c1.216,2.55,1.767,5.609,2.312,8.306c1.151,5.696,2.347,12.789,1.255,18.596
                                            c-0.298,1.579,0.413,3.327,2.12,3.734c1.601,0.382,3.427,0.55,4.924,0.039c1.513,1.127,4.052,0.926,4.649-1.441
                                            C183.74,103.28,184.831,87.002,178.9,73.948z"/>
                                    </g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                </svg>
                            </div>
                            <h3 class="text-center">SERVICE PERSONNALISÉ<h3>
                            <p class="text-center">Des chargés de clientèle dédiés, disponibles 24h/24, 7j/7 </p>
                        </div>
                    </div>
            </section>

</section>

<section  class="section5">

            <!-- *********       UN MOT DU PRESIDENT DE DONKAIR          ********** -->
            <section class="expert container" id="expert">
                <div class="row  pt-5">
                    <!--<h2 class="text-primary fw-bold pb-4">Un mot de notre président</h2>-->
                    <div class=" lastSEction col-sm-12 col-md-12 col-lg-6">
                        <img class="rounded imgCedric" src="img/cedric.jpg" alt="Président Cédric" width="60%">
                    </div>
    
                    <div class="col-5 pt-5">
                        <p class="fs-1 fst-italic text-primary pt-4 quote">
                            <span>
                                <svg class="w-25" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                    version="1.1" x="0px" y="0px" viewBox="0 0 100 125" style="enable-background:new 0 0 100 100;" xml:space="preserve">
                                    <path class="st0" d="M75.6,40.5c11,0,19.9,9,19.9,20c0,11-9,20-20,20s-20-9-20-20c0-22.1,17.9-40,40-40  
                                    C95.5,20.5,82.4,25.4,75.6,40.5z M45.5,60.5c0,11-9,20-20,20s-20-9-20-20l0,0c0-22.1,17.9-40,40-40c0,0-13.1,4.9-19.9,20  
                                    C36.6,40.5,45.5,49.5,45.5,60.5z"/>
                                </svg>
                            </span>
                            <br>
                            <div class="title">
                    <p class="title1"> Donk <span class="title2"> Air <span> <span  class="DoesCare"> Does Care </span> </div> </p>
                  </div>
                        </p> 
                    </div> 
                </div>


                    <div class="textLastSection">
                        <p class="fs-3">Notre objectif principal chez DonkAir est de fournir des 
                        expériences d'aviation privée sûres et fiables à nos clients, 
                        avec une présence dédiée sur tous les continents. Notre réseau d'opérateurs 
                        triés sur le volet est conforme à toutes les réglementations 
                        aéronautiques internationales et utilise une flotte d'avions 
                        modernes.</p>
                        <br>
                        <p class="fs-3 ">Cédric Lombardot</p>
                        <p class="fs-3">Président, DonkAir</p>
                    </div>

                </div>
</section>

                                    
            </section>

        </main>



<?php
        
require "footer.php";

?>
