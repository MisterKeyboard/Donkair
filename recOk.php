<?php
require "headHeader.php"      
?>

            <main>
            <div class="getMsg">
                <div class="msgRecu">
                    <p> Vos informations ont bien été enregistrées. Merci pour votre confiance</p>
                </div>
                <img  class="avion7" src="img/cessna/cessna7.jpg"/>
                <div class="redirection">
                    <p> Vous allez être redigéré vers la page principale dans quelques secondes...  <p>
                </div>
            </div>
<script>
    var timer = setTimeout(function(){
    window.location="index.php"
    },50000);
</script>

        </main>
    </body>
</html>
