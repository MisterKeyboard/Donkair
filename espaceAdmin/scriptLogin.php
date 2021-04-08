<?php
session_start();
if(isset($_POST['submit'])){ 
    if(isset($_POST['pseudo']) AND !empty($_POST['pseudo'])){
        if(filter_var($_POST['pseudo'], FILTER_VALIDATE_EMAIL)){
            if(isset($_POST['password']) AND !empty($_POST['password'])){ 

            require "config.php";

            $password = sha1($_POST['password']);

            $getdata = $objetPdo->prepare("SELECT email FROM admin WHERE email=? and password = ?");
            $getdata->execute(array($_POST['pseudo'], $password));

            $rows = $getdata->rowCount();

            if($rows==true){
                $_SESSION['admin'] = $_POST['pseudo'];
                header("espaceAdmin/dashboard.php");
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
