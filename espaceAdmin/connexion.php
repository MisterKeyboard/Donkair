<?php
    require "head.php";
    include_once "scriptLogin.php";
    
    if (isset($erreur)){
        echo $erreur;
    }
?>

    <body>
    <form method="POST" action="">

    <div class="connexion">

        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" >

        <label for="password">Password</label>
        <input type="password" name="password">
        
        <input type="submit" name="submit" class="envoyer">

    </div>    

    </form>
    

</body>
</html>




