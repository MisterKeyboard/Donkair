<?php
include 'index.php';

$searchFlight = $objetPdo->query('SELECT departureCity, arrivalCity, date FROM flight ORDER BY id DESC');
if(isset($searchFlight)  && !empty($searchFlight)); {
    $recherche = htmlspecialchars($_POST['departureCity'], $_POST['arrivalCity'], $_POST['date']);  
    $allFlight = $objetPdo->query('SELECT departureCity, arrivalCity, date FROM flight WHERE departureCity, arrivalCity, date LIKE "%' .$recherche. '%" ');
}
?>

<!DOCTYPE html>
<html>
<!-- *********       SECTION FORMULAIRE DE RECHERCHE DE VOLS             ********** -->
<section class="flight">
    <img src="img/cirrus/cirrus10.jpg" alt="avion de type cirrus avec une chaine de montagnes en arrière plan">

<p> Reserver votre vol <p>

    <form method="POST">
    
            <label for="departureCity"> Ville de départ </label>
            <select name="departureCity" id="departureCity">

                <?php
                    $selection = $objetPdo->query('SELECT town, id FROM route');
                        while($donnees = $selection->fetch())
                        {
                ?>
                    <option value= " <?= $donnees['id'] ?> "> <?= $donnees['town'] ?> </option>
                <?php
                        }
                ?>

            </select>

            <label for="arrivalCity"> Ville d'arrivée </label>
            <select name="arrivalCity" id="arrivalCity">

                <?php
                    $selection = $objetPdo->query('SELECT town, id FROM route');
                        while($donnees = $selection->fetch())
                        {
                ?>
                    <option value= " <?= $donnees['id'] ?> "> <?= $donnees['town'] ?> </option>
                <?php
                        }
                ?>

            </select>

            <label for="date">Date de départ</label>
            <input type="date" name="date" id="date" />

            <label for="persons">Nombre de personnes</label>
            <select name="persons" id="persons">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
            </select>

            <input type="submit" name="search" value="Rechercher un Vol"/>

            <section>
                <?php
                if($searchFlight->rowCount() > 0){
                    while($flight = $allFlight->fetch()){
                        ?>
                        <p> <?= $flight['departureCity'] . $flight['arrivalCity'] . $flight['date']; ?> </p>

                        <?php
                    } 
                } else {
                ?>  
                <p> Aucun vol trouvé </p>
                <?php
                } 
                ?>
            </section>


    </form>
