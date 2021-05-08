<?php
if(isset($_GET['accepte-cookie'])){
    setcookie('accepte-cookie','true',time() + 365*24*3600);
    header('Location:./');
}

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>DonkAir</title>
        <!-- CSS only -->
        <link rel="stylesheet" href="public/assets/css/global.css" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

        <link rel="icon" href="img/donkeysunglassesRemovebg.png" />
    </head>

    <body>

        <!-- *********     HEADER     ********** -->
        <header class="pb-3 px-3">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand col-2" href="_self">
                    <img src="img/donkeysunglassesRemovebgw.png" alt="logo" width="100%">
                </a>
                <a class="text-decoration-none" href="index.php#flight">Réservez un vol</a>
                <a class="text-decoration-none" href="index.php#planes">Avions</a>
                <a class="text-decoration-none" href="index.php#expert">A propos</a>
                <a class="text-decoration-none" href="faq.php"> FAQ</a>
            <div>
                <!-- Modale     phone number -->
                <button class="modal2 btnPopup2 btn btn-primary pb-1"> Contactez-nous par téléphone</button>


                <!-- Modale Mail -->
                <button id="btnPopup" class="modal1 btnPopup1 btn btn-primary pb-1">Contactez-nous par Mail</button>
                </div>
            </div>
        </nav>
    </header>
