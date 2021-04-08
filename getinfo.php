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

            <form action="getinfo.php" method="POST" >

                <div class="container">

                    <label for="name"> Votre Nom </label>
                    <input type="text" name="name" id="name" placeholder="Name"/>

                    <label for="mail"> Votre Mail </label>
                    <input type="mail" name="mail" id="mail" placeholder="donkair@hotmail.fr"/>

                    <label for="subject"> Sujet </label>
                    <input type="texte" name="subject" id="subject"/>

                    <label for="message"> Votre Message </label>
                    <input type="textarea" name="message" id="message" cols="40" rows="10"/>


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

                    <label for="tel"> Votre numéro </label>
                    <input type="tel" name="tel" id="tel" maxlength="15" required/>

                    <input type="submit"  name="Envoyer" value="Envoyer"/> 

                </div>
                
            </form>

<!-----
            <script>

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

            </script> ---->

    </body>

</html>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['name']) && isset($_POST['mail']) && isset($_POST['subject']) && isset($_POST['message'])) {


        $name = $_POST['name'];
        $mail = $_POST['mail'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];



        $headers = "From:" . $mail;

        $sent = mail("antoine.clavier@hotmail.fr", $subject, $message, $headers);

        if ($sent){
        echo "Votre Message a bien été envoyé, nous vous réponderons dans les plus brefs délais.";
        } else { echo "Une erreur s'est produite";
        }
    }
}
?>
