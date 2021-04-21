<?php
session_start();

echo "Session:" . $_SESSION['admin'];
?>

<header>
    <div>
        <a href="logout.php"> Déconnexion </a>
    </div>
</header>


