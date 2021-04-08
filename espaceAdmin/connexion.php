
<?php
require "config.php";
?>

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
    <?php include_once "espaceAdmin/scriptLogin.php"?>
    <?php if (isset($erreur)){
        echo $erreur;
    }
    ?>

    <form method="POST" action="">

        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" autocomplete="off">

        <br/>

        <label for="password">Password</label>
        <input type="password" name="password">
        <br/>
        <input type="submit" name="valider">
    </form>
</body>
</html>




