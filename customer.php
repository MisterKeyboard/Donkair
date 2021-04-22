<?php
session_start();  
require "espaceAdmin/config.php";

?>

<form method="POST" action="">

        <h2> Merci de bien vouloir vous enregistrer </h2>

    <?php

    //var_dump($_SESSION);

    for ($i = 0; $i < $_SESSION['nbrPassenger']; $i++ ) { ?>

        <label for="name_<?php echo $i; ?>" > Nom </label>
        <input type="text" name="name[]" id="name_<?php echo $i; ?>" value="<?php if (isset($_POST['name'])){echo $_POST['name'][$i];} ?>" />

        <label for="firstname_<?php echo $i; ?>"> Prénom</label>
        <input type="text" name="firstname[]" id="firstname_<?php echo $i; ?>" value="<?php if (isset($_POST['firstname'])){echo $_POST['firstname'][$i];} ?>" />

        <label for="mail_<?php echo $i; ?>"> Email </label>
        <input type="email" name="mail[]" id="mail_<?php echo $i; ?>" placeholder="donkair@hotmail.fr" value="<?php if (isset($_POST['mail'])){echo $_POST['mail'][$i];} ?>" />

        <label for="tel_<?php echo $i; ?>"> Numéro de téléphone </label>
        <input type="text" name="tel[]" id="tel_<?php echo $i; ?>" maxlength="15" value="<?php if (isset($_POST['tel'])){echo $_POST['tel'][$i];} ?>" />

        <br/>  

        <input type="hidden" value="<?php echo $i; ?>" name="nbrP"/>
    
<?php
}
?>
        <input type="submit" name="send" value="Envoyer"/> 

</form>


<?php 

require "espaceAdmin/config.php";



if (isset($_POST['name']) && isset($_POST['firstname']) && isset($_POST['mail']) && isset($_POST['tel']))

    for ($i = 0; $i < $_SESSION['nbrPassenger']; $i++ ) {

        $name = $_POST['name'][$i];
        $firstname = $_POST['firstname'][$i];
        $mail = $_POST['mail'][$i];
        $tel = $_POST['tel'][$i];

        $sql = $objetPdo->prepare('INSERT INTO customer (name, firstname, mail, tel) VALUES (:name, :firstname, :mail, :tel)');
        $sql->execute(array(':name' => $name, ':firstname' => $firstname, ':mail' => $mail, ':tel' => $tel));
    
    }

