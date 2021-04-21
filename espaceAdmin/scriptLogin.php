<?php
session_start();
if(isset($_POST['submit'])){ 
    if(isset($_POST['pseudo']) and !empty($_POST['pseudo'])){
        if(filter_var($_POST['pseudo'], FILTER_VALIDATE_EMAIL)){
            if(isset($_POST['password']) and !empty($_POST['password'])){ 

            require "db.php";


            $password = sha1($_POST['password']);
            $objetPdo=openPDO();

            $getdata = $objetPdo->prepare("SELECT email FROM admin WHERE email=? and password=?");
            $getdata->execute(array($_POST['pseudo'], $password));

            $rows = $getdata->rowCount();

            if($rows==true){
                $_SESSION['admin'] = $_POST['pseudo'];
                header("Location:/espaceAdmin/dashboard.php");
            }else{
                $erreur = "Username ou mot de passe inconnu";
            }
        }else{
            $erreur = "Veuillez saisir votre mot de passe";
        }
    }else{
        $erreur = "Veuillez saisir un email valide";
    }
}else{
    $erreur = "Veuillez saisir votre pseudo";
}
}
?>
