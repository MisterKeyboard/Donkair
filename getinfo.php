<?php



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['name']) && isset($_POST['mail']) && isset($_POST['subject']) && isset($_POST['message'])) {


        $name = $_POST['name'];
        $mail = $_POST['mail'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];


        $headers = "From: cedric@donkeycode.fr\r\n";
        $headers .= "Reply-to: " . $mail."\r\n";

        $sent = mail("nafemtn@gmail.com", $subject, $message, $headers);
//var_dump($sent);
        if ($sent){
            header('Location:mailOk.php'); 
        } else { header('Location:mailnotOk.php');
        }
    }
}
?>
