
<?php
require "head.php";      
?>

        <!-- *********     HEADER     ********** -->
        <header class="pb-3 px-3">

        <div class="title">
            <h1 class="title1"> Donk <span class="title2"> Air <span> <span  class="title3"> resvervation de vol en un click </span> <div id="takeOff" class="fa"> </div> </h1>
        </div>


        <nav class="navbar">

            <div class="container-fluid ">
            <img src="img/donkeysunglassesRemovebg.png" alt="logo" class="logo">
                <a class="text-decoration-none text-white" href="index.php#flight">Réservez un vol</a>
                <a class="text-decoration-none text-white" href="index.php#planes">Nos modèles d'avions</a>
                <a class="text-decoration-none text-white" href="index.php#expert">A propos</a>
                <a class="text-decoration-none text-white" href="faq.php"> FAQ</a>
            </div>
        </nav>
    </header>


        <main>
            <h1 class="card container">Votre Message a bien été envoyé,<br>nous vous répondrons dans les plus brefs délais.</h1>
            <p class="fs-3 pl-3 pt-3 container"> Vous allez être redirigé vers la page principale dans 3 secondes...<p>


<script>
    var timer = setTimeout(function(){
    window.location="index.php"
    },50000);
</script>

        </main>
    </body>
</html>
