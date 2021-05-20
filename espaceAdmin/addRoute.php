
<!-- AJOUTER UNE DESTINATION / ROUTE -->

<head>
<link rel="stylesheet" href="admin.css"/>
</head>

    

    <div class="container pt-5">
        <h2 class="text-primary"> Formulaire pour ajouter une route </h2>

        <form method="POST">

            <label class="text-primary pt-3" for="flightNbr"> Numéro de Vol </label>
            <input class="form-control w-25" type="text" name="flightNbr" id="flightNbr" placeholder="1-A-B" required>


            <div class="row">
                <div class="col-6">
                    <label class="text-primary pt-3" for="departureCity"> Selectionner une Ville de Départ </label>
                    <select class="form-select" name="departureCity" id="departureCity" required>
                        <?php 
                        $objetPdo = openPDO();
                        $select = $objetPdo->query('SELECT town, id FROM route');

                        while ($data = $select->fetch()) {
                        ?>               
                        <option value = "<?php echo $data['id']?>" >  
                        <?php echo $data['town']?> </option>
                        <?php                
                        }
                        ?>
                    </select>            
                </div>

                <div class="col-6">
                    <label class="text-primary pt-3" for="arrivalCity"> Selectionner une Ville d'arrivée </label>
                    <select class="form-select" name="arrivalCity" id="arrivalCity" required>
                        <?php 
                        $selection = $objetPdo->query('SELECT town, id FROM route');
                        while ($datab = $selection->fetch()) {
                        ?>               
                                        
                        <option value = "<?php echo $datab['id']?>"> 
                        <?php echo $datab['town']?> </option>

                        <?php                
                        }
                        ?>
                    </select>
                </div>
            </div>

            <label class="text-primary pt-3" for="model"> Selectionner le modèle d'avion </label>
            <select class="form-select w-25" name="model" id="model" required> 
            <!-- select from db plane  -->
            
<?php  

        $selection = $objetPdo->query('SELECT model, id FROM plane');

        while ($datab = $selection->fetch()) {
        ?>               
        
        <option value = "<?php echo $datab['id']?>">  
        <?php echo $datab['model']?> </option>

        <?php                
            }
        ?>
            </select>  

        <!-- Insert d'autre information -->
            <div class="row pt-3">
                <div class="col-6">
                    <label class="text-primary" for="departureTime"> Heure de décollage </label>
                    <input class="form-control" type="time" name="departureTime" id="departureTime" required>
                </div>
                <div class="col-6">
                    <label class="text-primary" for="arrivalTime"> Heure d'arrivée </label>
                    <input class="form-control" type="time" name="arrivalTime" id="arrivalTime" required>
                </div>
            </div>

            <label class="text-primary pt-3" for="date"> Date de départ </label>
            <input class="form-control w-25" type="date" name="date" id="date" required/>

            <div class="pt-3">
                <input class="btn btn-primary btnAddF mb-5" type="submit" name="submit" value="Ajouter une Route"/>
            </div>
        </form>
    </div>
    </body>
</html>

<?php

$objetPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST['submit']))
{
        $flightNbr = $_POST['flightNbr']; 
        $departureCity = $_POST['departureCity'];
        $arrivalCity = $_POST['arrivalCity'];
        $model = $_POST['model'];
        $arrivalTime = $_POST['arrivalTime'];
        $departureTime = $_POST['departureTime'];
        $date = $_POST['date'];

    $sql = $objetPdo->prepare('INSERT INTO flight (flightNbr, departureCity, arrivalCity, departureTime, arrivalTime, date, planemodel) VALUES (:flightNbr, :departureCity, :arrivalCity, :departureTime, :arrivalTime, :date, :model)');
    
    $sql->execute(array(':flightNbr' => $flightNbr, ':departureCity' => $departureCity, ':arrivalCity' => $arrivalCity, ':departureTime' => $departureTime, ':arrivalTime' => $arrivalTime, ':date' => $date, ':model' => $model));
};

if(!empty($_POST)){
    echo 'Le numéro de vol ' .  $_POST['flightNbr']  .  ' a bien été ajouté à votre base de donnée.';
    }

