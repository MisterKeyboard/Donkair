
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['name']) && isset($_POST['mail']) && isset($_POST['subject']) && isset($_POST['message'])) {


        $name = $_POST['name'];
        $mail = $_POST['mail'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];



        $headers = "From:" . $mail;

        $sent = mail("antoine.clavier@hotmail.fr", $subject, $message, $headers);

        if ($sent){
        echo "Votre Message a bien été envoyé, nous vous réponderons dans les plus brefs délais.";
        } else { echo "Une erreur s'est produite";
        }
    }
}
?>
