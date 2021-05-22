<?php
require "headHeader.php";      
?>

<main>
            <div class="getMsg">
                <div class="msgRecu">
                    <p>Une erreur s'est produite <i class="far fa-sad-cry"></i> </p>
                </div>
                <img  class="avion7" src="img/cessna/cessna7.jpg"/>
                <div class="redirection">
                    <p> Vous allez être redigéré vers la page principale dans quelques secondes...  <p>
                </div>
            </div>
<main>

<script>
    var timer = setTimeout(function(){
    window.location="index.php"
    },50000);
</script>

        </main>
    </body>
</html>
