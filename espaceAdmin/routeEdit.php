<?php
require "db.php";
require "session.php";
require "head.php";

$flightNbr = $_GET["fnbr"];
$objetPDO = openPDO();



$sql = "SELECT * FROM flight WHERE flightNbr = ?";

$edit = $objetPDO->prepare($sql);

$edit->bindValue(1,$flightNbr, PDO::PARAM_STR);

$edit->execute();

$row = $edit ->fetch(PDO::FETCH_OBJ);

if(!$row){
    header("location:routeTab.php");
}

?>


    <body>
        <div>

            <h2>Modification du vol:</h2>

            <form method="POST" action="routeSave.php">
                <input type="hidden" name="id" value="<?php echo $row->id; ?>"/>
                <label for="flightNbr">Numéro de vol</label>
                <input type="text" name="flightNbr" value="<?=$row->flightNbr?>">

                <!-----SELECT DEPARTURE CITY ----->
                <label for="departureCity">Ville de départ</label>
                <select name="departureCity" id="departureCity">
                <?php
                        foreach ($objetPDO->query('SELECT id,town FROM route') as $data) {
                    ?>
                            <option value="<?php echo $data['id']; ?>" 
                            <?php
                            if ($data['id'] == $row->departureCity){
                                echo "selected";
                            }
                            ?>
                            ><?php echo $data['town'];?></option>;
                    <?php
                    }
                    ?>
                    </select>


                <!-----SELECT ARRIVAL CITY ----->
                <label for="arrivalCity">Ville d'arrivée</label>
                <select name="arrivalCity" id="arrivalCity">
                <?php
                        foreach ($objetPDO->query('SELECT id,town FROM route') as $data) {
                    ?>
                            <option value="<?php echo $data['id']; ?>" 
                            <?php
                            if ($data['id'] == $row->arrivalCity){
                                echo "selected";
                            }
                            ?>
                            ><?php echo $data['town'];?></option>;
                    <?php
                    }
                    ?>
                    </select>

            

                <label for="departureTime">Heure de décollage</label>
                <input type="text" name="departureTime" value="<?=$row->departureTime?>">

                <label for="arrivalTime">Heure d'atterissage</label>
                <input type="text" name="arrivalTime" value="<?=$row->arrivalTime?>">

                <label for="date">Date</label>
                <input type="text" name="date" value="<?=$row->date?>">

                <button type="submit">Sauvegardez</button>

            </form>
