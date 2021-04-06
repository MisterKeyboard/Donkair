
<html>

    <body>

<!-- Alert -> Afficher Numéro -->

        <button onclick="myFunction()"> Contactez-nous par téléphone</button>
                <script>
                    function myFunction() {
                    alert( "Notre service est disponible 7/7j 24/24h au 06 46 43 49 71" );
                   }
                </script>
<!-- FIN Alert -> Afficher Numéro -->
<br/>

        <button id="btnPopup"> Contactez-nous par Mail</button>
        <span id="btnClose" >&times; </span>
<!-- PopUp -->
        <h1> Contactez-Nous </h1>

            <forms method="POST">

                    <label for="name"> Votre Nom </label>
                    <input type="text" id="name" placeholder="Name"/>

                    <label for="mail"> Votre Mail </label>
                    <input type="mail" id="mail" placeholder="donkair@hotmail.fr"/>

                    <label for="sujet"> Sujet </label>
                    <input type="texte" id="sujet"/>

                    <label for="message"> Votre Message </label>
                    <input type="textarea" id="message" cols="40" rows="10"/>

                    <input type="submit" value="Envoyer"/>
                    <p> Ou Etre appelé </p>   
                        

                    <label for="sujet" > Sujet </label>
                    <select name="sujet"> 
                    <option valeur="">Annuler/Modifier une Reservation </option>
                        <option valeur="">Bagage</option>
                        <option valeur="">Codes Promotionnels </option>
                        <option valeur="">Locations de voiture</option>
                        <option valeur="">Hotel</option>
                        <option valeur="">Remboursements</option>
                        <option valeur="">Autre </option>
                        </select>

                        <label for="tel"> Votre numéro </label>
                        <input type="tel" id="tel" maxlength="10" required/>

                        <input type="submit" value="Envoyer"/>

            </forms>

             <!-- <script>

                var btnPopup = document.getElementById('btnPopup');
                var btnClose = document.getElementById('btnClose');
                var overlay = document.getElementById('overlay');

                btnPopup.addEvenListener('click',openModal);
                btnClose.addEvenListener('click',closeModal);

                    function openModal(){
                        overlay.style.display = 'block';

                        console.log("OpenModal");
                    }

                    function closeModal(){
                        overlay.styke.display = 'none';
                    }

            </script>  -->

    </body>

</html>

