<?php
session_start();

if(!$_SESSION['admin']){
    header('Location:connexion.php');
}else{
echo "Session:" . $_SESSION['admin'];
}
?>

<header>
    <div>
        <a href="/espaceAdmin/logout.php"> Déconnexion </a>
    </div>
</header>


