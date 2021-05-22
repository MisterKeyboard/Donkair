<?php
require 'espaceAdmin/db.php';
require 'headHeader.php';
?>

        <h1 class="addComment mb-3">
        Ajouter un Avis 
        </h1>

        <form  method="POST" >

            <label class="fs-4 ms-3" for="name">Nom</label>
            <input class="form-control addComment" type="text" name="name" id="name" required/>

            <label class="fs-4 ms-3" for="firstname">Prénom</label>
            <input class="form-control addComment" type="text" name="firstname" id="firstname" required />

            <label class="fs-4 ms-3" for="mail">Mail </label>
            <input class="form-control addComment" type="mail" name="mail" id="mail" placeholder="donkair@hotmail.fr" required/>


            <label class="fs-4 ms-3" for="titleAvis"> Sujet </label>
            <input class="form-control addComment" type="text" name="titleAvis" id="titleAvis" required />

            <label class="fs-4 ms-3" for="avis"> Votre avis 😃 </label>
            <div class="input-group addComment">
                <textarea class="form-control addComment" aria-label="With textarea" name="avis" id="avis"></textarea>
            </div>


            <div class="fs-4 ms-3">
                <input class=" btn btn-primary mb-3 " type="submit"  name="submit" value="Envoyer"/> 
            </div>

        </form>


<?php
require 'footer.php';

//$objetPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_POST['name']) || empty($_POST['firstname']) || empty($_POST['mail']) || empty($_POST['avis']) || empty($_POST['titleAvis'])) {
} else {
        $name = $_POST['name']; 
        $firstname = $_POST['firstname'];
        $mail = $_POST['mail'];
        // $flightNbr = $_POST['flightNbr'];
        $avis = $_POST['avis'];
        $titleAvis = $_POST['titleAvis'];
        

    $sql = $objetPdo->prepare('INSERT INTO comment (name, firstname, mail,  avis, titleAvis) VALUES (:name, :firstname, :mail, :avis, :titleAvis)');
    
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
//     <h5 class="card-title"> <?php //echo $titleAvis ?> </h5>
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
