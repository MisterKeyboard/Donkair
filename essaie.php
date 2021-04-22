<?php
require_once "index.php";
require_once "espaceAdmin/config.php";
?>

<form method="POST">
                
        <?php 

        

        $nbrP = $_POST['persons'];
        
        for($i=1; $nbrP <= 1; $i++ ) 
        {
        ?>
        

        
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
                        <input type="date" name="date" id="date" value="<?php if (isset($_POST['date'])){echo $_POST['date'];} ?>" />

                        <label for="persons">Nombre de personnes</label>
                        <select name="persons" id="persons" >
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

        <?php
        }
        ?>

                            <input type="hidden" value="<?php echo ($nbrP + 1); ?>" name="persons"/>
                            <input type="submit" name="search" value="Rechercher un Vol"/>

                            </form>
