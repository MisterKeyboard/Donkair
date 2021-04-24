<?php
    require "head.php";
    include_once "scriptLogin.php";
    
    if (isset($erreur)){
        echo $erreur;
    }
?>



    <body>
        <form class="pt-5" method="POST" action="">

            <div class="connexion container-fluid card w-25">
                <div class="text-center"> 
                    <img src="/img/donkeysunglassesRemovebgw.png" alt="logo" width="50%">
                </div>

                <label class="text-primary" for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" >

                <label class="text-primary pt-3" for="password">Password</label>
                <input type="password" name="password">
                
                <input class="btn btn-primary" type="submit" name="submit" class="envoyer">

            </div>    

        </form>
    

    </body>
</html>




