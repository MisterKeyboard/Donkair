        <!-- *********       FOOTER             ********** -->
<footer>

    <nav class="navbar">

            <div class="container-fluid ">

            <ul class="listeFooter">
                <li class="donkey fas fa-democrat"> Nous joindre </li>
                <li> <i class="fas fa-phone"> </i> 01 76 38 10 19 </li>
                <li> <i class="fas fa-at"> </i> hello@donkey.school </li>
                <li > <i class="fas fa-map-pin"></i> 195 rue des Pyrénées </li>
                <li > <i class="zip fas fa-map-pin"></i> 75020 Paris </li>
            </ul>
                
                    <a class="text-decoration-none text-white" href="index.php#flight">Réservez un vol</a>
                    <a class="text-decoration-none text-white" href="index.php#planes">Nos modèles d'avions</a>
                    <a class="text-decoration-none text-white" href="index.php#expert">A propos</a>
                    <a class="text-decoration-none text-white" href="faq.php"> FAQ</a>

                <div clas="social">
                    <a class="fab fa-instagram" href="https://www.instagram.com/donkey.school/" target="_blank" ></a>
                    <a class="fab fa-facebook-f" href="https://www.instagram.com/donkey.school/" target="_blank" ></a>
                    <a class="fab fa-twitter" href="https://www.instagram.com/donkey.school/" target="_blank" ></a>
                    <a class="fab fa-linkedin-in" href="https://www.instagram.com/donkey.school/" target="_blank" ></a>
                </div>

            
    <div>
    
        <!-- Modale     phone number -->
        <!-- <button class="modal2 btnPopup2 btn btn-primary pb-1"> Contactez-nous par téléphone</button> -->


        <!-- Modale Mail -->
        <!-- <button id="btnPopup" class="modal1 btnPopup1 btn btn-primary pb-1">Contactez-nous par Mail</button> -->
    </div>

            </div>

    </nav>

            <div>
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
                    <h2 class="text-primary text-center fs-4">Contactez-Nous par téléphone:<span id="btnClose2"
                    class="btnClose2 text-primary">&times;</span>
                        
                    <p class="fs-4 text-center" >Nous sommes joignables 7/7j et 24/24h <br>au 01 76 38 10 19</p>
                </div>
            </div>
            <script src="script.js"></script>
        </div>
        
    </body>
</html>
