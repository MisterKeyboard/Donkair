<?php
require "db.php";
require "session.php";
require "head.php";

$custName = $_GET["cName"];
$objetPDO = openPDO();



$sql1 = "SELECT * FROM donkair.customer WHERE  name = ?";

$edit1 = $objetPDO->prepare($sql1);

$edit1->bindValue(1, $custName, PDO::PARAM_STR);

$edit1->execute();

$row = $edit1->fetch(PDO::FETCH_OBJ);

if(!$row){
    header("location:/espaceAdmin/dashboard.php");
}

?>


    <body>
        <div class="container">

            <h2 class="text-primary pt-5">Modification des informations du Clients:</h2>

            <form method="POST" action="customerSave.php">
                <input type="hidden" name="id" value="<?php echo $row->id; ?>"/>

                <label class="text-primary pt-3" for="name"> Nom </label>
                <input class="form-control w-25" type="text" name="name" value="<?=$row->name?>">

                <div class="row">
                    <div class="col-4">

                        <label class="text-primary pt-3" for="firstname"> Prénom </label>
                        <input class="form-control w-25" type="text" name="firstname" value="<?=$row->firstname?>">
                        
                    </div>

                    <div class="col-4">

                        <label class="text-primary pt-3" for="mail">Email</label>
                        <input class="form-control w-25" type="text" name="mail" value="<?=$row->mail?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <label class="text-primary pt-3" for="tel">Téléphone</label>
                        <input class="form-control w-25" type="text" name="tel" value="<?=$row->tel?>">
                    </div>

                <div class="pt-3">
                    <button class="btn btn-primary" type="submit">Sauvegarder</button>
                </div>
            </form>
        </div>
