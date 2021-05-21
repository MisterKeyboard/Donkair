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
    header("location:/espaceAdmin/dashboard.php");
}

?>


    <body>
        <div class="container">

            <h2 class="text-primary pt-5">Modification du vol:</h2>

            <form method="POST" action="routeSave.php">
                <input type="hidden" name="id" value="<?php echo $row->id; ?>"/>

                <label class="text-primary pt-3" for="flightNbr">Numéro de vol</label>
                <input class="form-control w-25" type="text" name="flightNbr" value="<?=$row->flightNbr?>">

                <div class="row">
                    <div class="col-4">
                        <!-----SELECT DEPARTURE CITY ----->
                        <label class="text-primary pt-3" for="departureCity">Ville de départ</label>
                        <select class="form-select w-50" name="departureCity" id="departureCity">
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
                    </div>

                    <div class="col-4">
                        <!-----SELECT ARRIVAL CITY ----->
                        <label class="text-primary pt-3" for="arrivalCity">Ville d'arrivée</label>
                        <select class="form-select w-50" name="arrivalCity" id="arrivalCity">
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
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <label class="text-primary pt-3" for="departureTime">Heure de décollage</label>
                        <input class="form-control w-50" type="text" name="departureTime" value="<?=$row->departureTime?>">
                    </div>
                    <div class="col-4">
                        <label class="text-primary pt-3" for="arrivalTime">Heure d'atterissage</label>
                        <input class="form-control w-50" type="text" name="arrivalTime" value="<?=$row->arrivalTime?>">
                    </div>
                </div>
                        <label class="text-primary pt-3" for="date">Date</label>
                        <input class="form-control w-25" type="text" name="date" value="<?=$row->date?>">
                    
                

                <div class="pt-3">
                    <button class="btn btn-primary" type="submit">Sauvegarder</button>
                </div>
            </form>
        </div>
