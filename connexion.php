<!DOCTYPE html>
<html>
<head>
    
    <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Espace de connexion DonkAir admin</title>
        <link rel="icon" href="img/donkeysunglassesRemovebg.png" />
        <link rel="stylesheet" href="./css/stylepage.css" />
</head>
<body>
    <form method="POST" action="" >
        <input type="text" name="pseudo" autocomplete="off">
        <br/>
        <input type="password" name="mdp">
        <br/>
        <input type="submit" name="valider">
    </form>
</body>
</html>


<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['pseudo']) && isset($_POST['mdp'])) {
        $pseudo_par_defaut = "admin";
        $mdp_par_defaut = "admin1234";

        $pseudo_saisi = htmlspecialchars($_post['pseudo']);
        $mdp_saisi = htmlpecialchars($_POST['mdp']);

        if($pseudo_saisi == $pseudo_par_defaut && $mdp_saisi == $mdp_par_defaut){
        }else{
            echo "Votre mot de passe ou pseudo est incorrect";
            }
    }else{
        echo"Veuillez remplir tous les champs";
    }
}

