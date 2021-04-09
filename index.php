<? include "getinfo.php" ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>DonkAir</title>
        <link rel="icon" href="img/donkeysunglassesRemovebg.png" />
        <link rel="stylesheet" href="style.css" />
        
    </head>

    <body>

        <!-- *********       HEADER             ********** -->
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
                                <input type="textarea" name="message" id="message" cols="40" rows="10"/>

                                <input type="submit"  name="Envoyer" value="Envoyer"/> 


                            </form>
                        </div>
                    </div>
                    <script src="script.js"></script>
        </header>

        <main>
            <!-- *********       SECTION FORMULAIRE DE RECHERCHE DE VOLS             ********** -->
            <section class="flight">
                <img src="img/cirrus/cirrus10.jpg" alt="avion de type cirrus avec une chaine de montagnes en arrière plan">
                <div>
                    <form method="post">
                        <label for="departure">Aéroport de départ</label>
                        <input
                        type="text"
                        name="departure"
                        id="departure"
                        placeholder="Courchevel,Genève..."
                        />

                        <label for="arrival">Aéroport d'arrivée</label>
                        <input
                        type="text"
                        name="arrival"
                        id="arrival"
                        placeholder="Courchevel,Genève..."
                        />

                        <label for="date">Date de départ</label>
                        <input type="date" name="date" id="date" value="19/04/2021" />

                        <label for="persons">Nombre de personnes</label>
                        <select name="persons" id="persons">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>

                        <input
                        type="submit"
                        value="Lancer la recherche"
                        name="recherche"
                        id="recherche"
                        />
                    </form>
                </div>
            </section>


            <!-- *********       SECTION AVIONS/VIDEOS             ********** -->
            <section class="planes">
                <div>
                    <h2>Cirrus SR22 3 places</h2>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/aZgqMxM6HJE?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>

                <div>
                    <h2>Cessna Citation Mustang C510 4 places</h2>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/mXSgenTN0Kk?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </section>


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
