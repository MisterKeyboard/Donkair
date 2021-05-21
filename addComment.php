
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

            <label class="pt-3 fs-4" for="titleAvis"> Sujet </label>
            <input class="form-control" type="text" name="titleAvis" id="titleAvis" required />

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

if($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_POST['name']) || empty($_POST['firstname']) || empty($_POST['mail']) || empty($_POST['avis']) || empty($_POST['titleAvis'])) {
} else {
        $name = $_POST['name']; 
        $firstname = $_POST['firstname'];
        $mail = $_POST['mail'];
        // $flightNbr = $_POST['flightNbr'];
        $avis = $_POST['avis'];
        $titleAvis = $_POST['titleAvis'];

    $sql = $objetPdo->prepare('INSERT INTO comment (name, firstname, mail,  avis) VALUES (:name, :firstname, :mail, :avis, :titleAvis)');
    
    $sql->execute(array(':name' => $name, ':firstname' => $firstname, ':mail' => $mail, ':avis' => $avis, ':titleAvis' => $titleAvis));
};


// $comment = 'SELECT * FROM donkair.comment';

// $stmt = $objetPdo->prepare($comment);
// $stmt->execute(); 
// $addComment = $stmt->fetchAll();


// if (isset($_POST['submit'])) { 

// foreach ($addComment as $row)
//     {  
//     $name = $addComment['name'];
//     $firstname = $addComment['firstname'];
//     $mail = $addComment['mail'];
//     $titleAvis = $addComment['titleAvis'];
//     $avis = $addComment['avis']; 

// ?>

<!-- // <div class="card" style="width: 18rem;">
//   <div class="card-body">
//     <h5 class="card-title"> <?php echo $titleAvis ?> </h5>
//     <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
//     <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
//     <a href="#" class="card-link">Card link</a>
//     <a href="#" class="card-link">Another link</a>
//   </div>
// </div> -->

 <?php
// }
// };
// ?>
