<?php
    require "head.php";
    include_once "scriptLogin.php";
    
    if (isset($erreur)){
        echo $erreur;
    }
?>

<head>
<link rel="stylesheet" href="co.css"/>
</head>

    <body>
        <form class="pt-5 " method="POST" action="">

            <div class="container-fluid card w-25 border border-primary ">
                <div class="text-center"> 
                    <img src="/img/donkeysunglassesRemovebgw.png" alt="logo" width="50%">
                </div>

                <label class="text-primary" for="pseudo">Pseudo</label>
                <input class="form-control" type="text" name="pseudo" >

                <label class="text-primary pt-3" for="password">Password</label>
                <input class="form-control" type="password" name="password">
                <div class="py-3">
                    <input class="btn btn-primary w-100" type="submit" name="submit" class="envoyer" value="Connexion">
                </div>
            </div>    

        </form>
    

    </body>
</html>




