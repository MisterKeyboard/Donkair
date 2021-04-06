<?php
require "addCity.php";
?>

<html>

<h1> Ajouter une Route </h1>

<h2> Ajouter une ville de destination et/ou une ville de départ </h2>
<p> Si les villes de destinations ou de départs sont déja renseignées, merci de ne pas remplir de vous rendre directement </p>
<a href="#addDestination"> Ici </a>

<!-- Inserer une ville & airport -->

    <form method="POST">
        
        <label for="town"> Entrée le nom de la ville </label>
        <input type="text" name="town" id="town">

        <label for="airport"> Entrée le nom de l'aréoport </label>
        <input type="text" name="airport" id="airport">

        <label for="country"> Entrée le Pays </label>
        <input type="text" name="country" id="country">

        <input type="submit" value="ajouter une ville"/>

    </form>

    

<!-- AJOUTER UNE DESTINATION / ROUTE -->
    <h2 id="addDestination"> Formulaire pour ajouter une route </h2>

    <form method="POST">

        <!-- select from db city -->

        <label for="toGo"> Selectionner une Ville de Départ </label>
        <select name="toGo" id="toGo">

                <?php 
                    //modifier la query
                        $select = $objetPdo->query('SELECT town, id FROM city');
                            while ($data = $select->fetch()) {
                ?>               
        
            <option value = "<?php echo $data['id']?>" >  <?php echo $data['town']?> </option>

                <?php                
                    }
                ?>
    
        </select>            

        <label for="return"> Selectionner une Ville d'arrivée </label>
        <select name="return" id="return">

                <?php 
                    //modifier la query
                        $selection = $objetPdo->query('SELECT town, id FROM city');
                            while ($datab = $selection->fetch()) {
                ?>               
        
            <option value = "<?php echo $datab['id']?>"> <?php echo $datab['town']?> </option>

                <?php                
                    }
                ?>

        </select>  

        <label for="model"> Selectionner le modèle d'avion </label>
        <select name="model" id="model"> 

        <!-- select from db plane -->

                <?php  
                    //modifier la query
                        $selection = $objetPdo->query('SELECT model, id FROM plane');

                            while ($datab = $selection->fetch()) {
                ?>               
        
            <option value = "<?php echo $datab['id']?>">  <?php echo $datab['model']?> </option>

                <?php                
                    }
                ?>

        </select>  

        <!-- Insert d'autre information -->

        <label for="takeOff"> Heure de décollage </label>
        <input type="time" name="takeOff" id="takeOff">

        <label for="landing"> Heure d'atterissage</label>
        <input type="time" name="landing" id="landing"/>
        
        <label for="date"> Date du vol </label>
        <input type="date" name="date" id="date"/>

        <label for="price"> Prix </label>
        <input type="number" name="price" id="price" step=".01"/>

        <input type="submit" value="Ajouter un vol"/>



    </form>


</html>

<?php

// INSERT LES DONNEES DANS DATABASE
