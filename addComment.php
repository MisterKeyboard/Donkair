<?php
require "espaceAdmin/db.php";
?>

<button id="btnAddComment" class="btnAddComment modal1 btnPopup1 btn btn-primary pb-1 mb-3">Ajouter un Avis</button>

<div id="overlayComment" class="overlayComment">

    <div id="popupComment" class="popupComment">

        <h1 class="titlePopup">
        Ajouter un Avis <span id="btnClose" class="btnCloseComment">&times;</span> 
        </h1>

        <form  method="POST" >

            <label class="pt-3 fs-4" for="name">Nom</label>
            <input class="form-control" type="text" name="name" id="name" required/>

            <label class="pt-3 fs-4" for="firstname">Prénom</label>
            <input class="form-control" type="text" name="firstname" id="firstname" required />

            <label class="pt-3 fs-4" for="mail">Mail </label>
            <input class="form-control" type="mail" name="mail" id="mail" placeholder="donkair@hotmail.fr" required/>

            <!-- <label class="pt-3 fs-4" for="flightNbr" > Choisissez Votre Vol </label>
            <select class="form-select" name="flightNbr"> 
                <option valeur="">Annuler/Modifier une Reservation </option>
                <option valeur="">Bagage</option>
                <option valeur="">Codes Promotionnels </option>
                <option valeur="">Locations de voiture</option>
                <option valeur="">Hotel</option>
                <option valeur="">Remboursements</option>
                <option valeur="">Autre </option>
            </select> -->

            <label class="pt-3 fs-4" for="avis"> Votre avis 😃 </label>
            <div class="input-group">
                <textarea class="form-control" aria-label="With textarea" name="avis" id="avis"></textarea>
            </div>
            <div class="pt-3 fs-4">
                <input class=" btn btn-primary" type="submit"  name="submit" value="Envoyer"/> 
            </div>

        </form>

    </div>

</div>

<?php


$objetPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_POST['name']) || empty($_POST['firstname']) || empty($_POST['mail']) || empty($_POST['avis'])) {
} else {
        $name = $_POST['name']; 
        $firstname = $_POST['firstname'];
        $mail = $_POST['mail'];
        // $flightNbr = $_POST['flightNbr'];
        $avis = $_POST['avis'];

    $sql = $objetPdo->prepare('INSERT INTO comment (name, firstname, mail,  avis) VALUES (:name, :firstname, :mail, :avis)');
    
    $sql->execute(array(':name' => $name, ':firstname' => $firstname, ':mail' => $mail, ':avis' => $avis));
};


$comment = 'SELECT * FROM donkair.comment';

$stmt = $objetPdo->prepare($comment);
$stmt->execute(); 
$addComment = $stmt->fetchAll();


   // if (!empty($addComment)) { 

    $id = $addComment['id'];
    $name = $addComment['name'];
    $firstname = $addComment['firstname'];
    $mail = $addComment['mail'];
    $avis = $addComment['avis']; 

?>
