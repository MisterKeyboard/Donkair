<?php
    include_once "scriptLogin.php";
    
    if (isset($erreur)){
        echo $erreur;
    }
?>

<head>
<link rel="stylesheet" href="co.css"/>

<!-- NUAGES -->
<meta charset="utf-8" />
    <title>Connexion : Donkair</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" >
    
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>

    <body>

        <!-- nuages -->
    <div id="contentCloud">
        <i id="cloud1" class="fa fa-cloud" aria-hidden="true"></i>
        <i id="cloud2" class="fa fa-cloud" aria-hidden="true"></i>
        <i id="cloud3" class="fa fa-cloud" aria-hidden="true"></i>
        <i id="cloud4" class="fa fa-cloud" aria-hidden="true"></i>
        <i id="cloud5" class="fa fa-cloud" aria-hidden="true"></i>
        <i id="cloud6" class="fa fa-cloud" aria-hidden="true"></i>
    </div>

        <form  method="POST" action="">

            <div>
                <div> 
                    <img src="/img/donkeysunglassesRemovebg.png" alt="logo" width="250px">
                </div>

                    <label  for="pseudo">Pseudo</label>
                    <input  type="text" name="pseudo" autofocus >

                    <label  for="password">Password</label>
                    <input type="password" name="password">
                    <div >
                        <input class="btnCo" type="submit" name="submit" class="envoyer" value="Connexion">
                    </div>
                </div>    

        </form>
    

    </body>
</html>




