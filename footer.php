        <!-- *********       FOOTER             ********** -->
        <footer class="bg-primary mt-5">
            <nav pl-5>
                <ul class="list-unstyled">
                    <li class="pt-3">
                        <a class="text-decoration-none text-white ml-5 mt-5 fs-3" href="#flight">Réservez votre vol</a>
                    </li>
                    <li>
                        <a class="text-decoration-none text-white ml-5 mt-5 fs-3 " href="#planes">Nos modèles d'avions</a>
                    <li>
                        <a class="text-decoration-none text-white ml-5 mt-5 fs-3" href="#expert">A propos</a>
                    </li>
                    <li class="pb-1">
                        <a class="text-decoration-none text-white ml-5 mt-5 fs-3" class="schedule" href="#header" target="_blank">Contact</a>
                    </li>
                </ul>
            </nav>
        </footer>



                <!-- *********       MODALE  1           ********** -->
        <div id="overlay" class="overlay1">
            <div class="w-50 container">
                <div id="popup" class="popup1">
                        <h2 class="text-primary">Contactez-Nous:<span id="btnClose"
                        class="btnClose1 text-primary">&times;</span>


                        <form action="getinfo.php" method="POST" >
                            <label class="pt-3" for="name">Nom </label>
                            <input class="form-select" type="text" name="name" id="name" placeholder="Name"/>

                            <label class="pt-3" for="mail">Mail </label>
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

                            <label class="pt-3" for="message">Message </label>
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
                    <h2 class="text-primary ">Contactez-Nous par téléphone:<span id="btnClose2"
                    class="btnClose2 text-primary">&times;</span>
                        
                    <p>Nous sommes joignables 7/7j et 24/24h <br>au 01 76 38 10 19</p>
                </div>
            </div>
            <script src="script.js"></script>
        </div>
    </body>
</html>
