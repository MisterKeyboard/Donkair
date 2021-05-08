        <!-- *********       FOOTER             ********** -->
        <footer class="bg-primary mt-5">
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
                    <li>
                        <a class="text-decoration-none text-white ml-5 mt-5 fs-3" href="faq.php">FAQ</a>
                    </li>
                    <li class="pb-1">
                        <a class="text-decoration-none text-white ml-5 mt-5 fs-3" class="schedule" href="#header" target="_blank">Contact</a>
                    </li>
                </ul>
            </nav>
        <!-- *********       COOKIES            ********** -->

<?php
    if(!isset($_COOKIE['accepte-cookie'])){
?>
        <div class="container fixed-bottom bg-white rounded py-3 mb-3 w-75 px-5">
            <div class="fs-3">
                <p>Notre site utilise des cookies pour une meilleure expérience:</p>
            </div>
            <div class="">
                
                    <a class="btn btn-primary fs-4 text" href="?accepte-cookie">J'accepte</a>
                
            </div>
        </div>
<?php
    }
?>

        </footer>



                <!-- *********       MODALE  1           ********** -->
        <div id="overlay" class="overlay1">
            <div class="w-50 container">
                <div id="popup" class="popup1">
                        <h2 class="text-primary fs-3">Contactez-Nous:<span id="btnClose"
                        class="btnClose1 text-primary">&times;</span>


                        <form action="getinfo.php" method="POST" >
                            <label class="pt-3 fs-4" for="name">Nom</label>
                            <input class="form-control" type="text" name="name" id="name" />

                            <label class="pt-3 fs-4" for="mail">Mail </label>
                            <input class="form-control" type="mail" name="mail" id="mail" placeholder="donkair@hotmail.fr"/>

                            <label class="pt-3 fs-4" for="sujet" > Sujet </label>
                            <select class="form-select" name="subject"> 
                                <option valeur="">Annuler/Modifier une Reservation </option>
                                <option valeur="">Bagage</option>
                                <option valeur="">Codes Promotionnels </option>
                                <option valeur="">Locations de voiture</option>
                                <option valeur="">Hotel</option>
                                <option valeur="">Remboursements</option>
                                <option valeur="">Autre </option>
                            </select>

                            <label class="pt-3 fs-4" for="message">Message </label>
                            <div class="input-group">
                                <textarea class="form-control" aria-label="With textarea" name="message" id="message"></textarea>
                            </div>
                            <div class="pt-3">
                                <input class=" btn btn-primary" type="submit"  name="Envoyer" value="Envoyer"/> 
                            </div>
                        </form>
                </div>
            </div>
        </div>

                       <!-- *********       MODALE  2          ********** -->
        <div id="overlay2" class="overlay2">
            <div class="w-50 container">
                <div id="popup2" class="popup2">
                    <h2 class="text-primary fs-4">Contactez-Nous par téléphone:<span id="btnClose2"
                    class="btnClose2 text-primary">&times;</span>
                        
                    <p class="fs-4" >Nous sommes joignables 7/7j et 24/24h <br>au 01 76 38 10 19</p>
                </div>
            </div>
            <script src="script.js"></script>
        </div>
    </body>
</html>
