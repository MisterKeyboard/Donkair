<?php
require "db.php";

// On détermine sur quelle page on se trouve
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}


$objetPdo=openPDO();
// On détermine le nombre total de vols
$sql = 'SELECT COUNT(*) AS nb_flights FROM `flight`;';


// On prépare la requête
$query = $objetPdo->prepare($sql);

// On exécute
$query->execute();

// On récupère le nombre d'articles
$result = $query->fetch();

$nbFlights = (int) $result['nb_flights'];

// On détermine le nombre de vols par page
$parPage = 3;

// On calcule le nombre de pages total
$pages = ceil($nbFlights / $parPage);

// Calcul du 1er vol de la page
$premier = ($currentPage * $parPage) - $parPage;

$sql = 'SELECT f.flightNbr,
f.departureCity,
departureRoute.town departureTown,
arrivalRoute.town arrivalTown,
f.departureTime ,
f.arrivalTime,
f.date
FROM flight f 
left join route departureRoute 
ON departureRoute.id = f.departureCity 
LEFT JOIN route arrivalRoute 
ON arrivalRoute.id = f.arrivalCity 
ORDER BY `flightNbr` 
DESC LIMIT :premier, :parpage;';

// On prépare la requête
$query = $objetPdo->prepare($sql);

$query->bindValue(':premier', $premier, PDO::PARAM_INT);
$query->bindValue(':parpage', $parPage, PDO::PARAM_INT);

// On exécute
$query->execute();

// On récupère les valeurs dans un tableau associatif
$flights = $query->fetchAll(PDO::FETCH_ASSOC);

?>


<body >

<section class="container pt-5">
    <h1 class="text-primary">Liste des vols</h1>

    <table class="table table-striped">
            <tr>
                <th class="text-primary"> Numéro de Vol </th>
                <th class="text-primary"> Ville de départ </th>
                <th class="text-primary"> Ville d'arrivée </th>
                <th class="text-primary"> Heure de décollage </th>
                <th class="text-primary"> Heure d'atterrisage </th>
                <th class="text-primary"> Date </th>
                <th class="text-primary"> Action </th>
            </tr>     
</section>


<?php

foreach  ($flights as $row) :?>
            <tr>
                <td><?php echo $row["flightNbr"] ?></td>
                <td><?php echo $row["departureTown"] ?></td>
                <td><?php echo $row["arrivalTown"] ?></td>
                <td><?php echo $row["departureTime"] ?></td>
                <td><?php echo $row["arrivalTime"] ?></td>
                <td><?php echo $row["date"]?></td>
                <td> <a  href="/espaceAdmin/routeEdit.php?fnbr=<?php echo $row["flightNbr"] ?>">Modifier</a> 
                <a href="/espaceAdmin/routeDel.php?fnbr=<?php echo $row["flightNbr"] ?>" class="delete" data-confirm="Etes vous sur de vouloir supprimer cette ligne?">Supprimer</a> 
                </td> 
            </tr>
<?php endforeach; ?>

        </table>

        <ul class="pagination">
                        <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                            <a href="/espaceAdmin/dashboard.php/?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                        </li>
                        <?php for($page = 1; $page <= $pages; $page++): ?>
                        <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                        <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                                <a href="/espaceAdmin/dashboard.php/?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                            </li>
                        <?php endfor ?>
                        <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                        <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                            <a href="/espaceAdmin/dashboard.php/?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                        </li>
        </ul>

    </body>

</html>

<!-- customers -->
<!-- customers -->
<!-- customers -->

<?php

// On détermine sur quelle page on se trouve
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}


$objetPdo=openPDO();
// On détermine le nombre total de vols
$sql1 = 'SELECT COUNT(*) AS nb_customer FROM `customer`;';


// On prépare la requête
$query1 = $objetPdo->prepare($sql1);

// On exécute
$query1->execute();

// On récupère le nombre d'articles
$result1 = $query1->fetch();

$nbCustomers = (int) $result1['nb_customer'];

// On détermine le nombre de vols par page
$parPage = 3;

// On calcule le nombre de pages total
$pages = ceil($nbCustomers / $parPage);

// Calcul du 1er vol de la page
$premier = ($currentPage * $parPage) - $parPage;

$sql = 'SELECT * FROM customer
ORDER BY `name` 
DESC LIMIT :premier, :parpage;';

// On prépare la requête
$query = $objetPdo->prepare($sql);

$query->bindValue(':premier', $premier, PDO::PARAM_INT);
$query->bindValue(':parpage', $parPage, PDO::PARAM_INT);

// On exécute
$query->execute();

// On récupère les valeurs dans un tableau associatif
$customers = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<body >

<section class="container pt-5">
    <h1 class="text-primary">Liste des Clients</h1>

    <table class="table table-striped">
            <tr>
                <th class="text-primary"> Id du client </th>
                <th class="text-primary"> Nom </th>
                <th class="text-primary"> Prénom </th>
                <th class="text-primary"> Email </th>
                <th class="text-primary"> Téléphone </th>
                <th class="text-primary"> Action </th>
            </tr>     
</section>


<?php

foreach  ($customers as $row1) :?>
            <tr>
                <td><?php echo $row1["id"] ?></td>
                <td><?php echo $row1["name"] ?></td>
                <td><?php echo $row1["firstname"] ?></td>
                <td><?php echo $row1["mail"] ?></td>
                <td><?php echo $row1["tel"] ?></td>
                <td><a  href="/espaceAdmin/customerEdit.php?cName=<?php echo $row1["name"] ?>">Modifier</a>
                <a href="/espaceAdmin/customerDelete.php?cName=<?php echo $row1["id"] ?>" class="delete" data-confirm="Etes vous sur de vouloir supprimer cette ligne?">Supprimer</a>
                </td>
            </tr>
<?php endforeach;?>

        </table>
        
        <ul class="pagination">
            <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
            <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                <a href="/espaceAdmin/dashboard.php/?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
            </li>
            <?php for($page = 1; $page <= $pages; $page++): ?>
            <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
            <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                    <a href="/espaceAdmin/dashboard.php/?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                </li>
            <?php endfor ?>
            <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
            <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                <a href="/espaceAdmin/dashboard.php/?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
            </li>
        </ul>
                

    </body>

</html>

<!-- booking -->
<!-- booking -->
<!-- booking -->

<?php

// On détermine sur quelle page on se trouve
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}


$objetPdo=openPDO();
// On détermine le nombre total de vols
$sql2 = 'SELECT COUNT(*) AS nb_resa FROM `booking`;';


// On prépare la requête
$query2 = $objetPdo->prepare($sql2);

// On exécute
$query2->execute();

// On récupère le nombre d'articles
$result2 = $query2->fetch();

$nbResas = (int) $result2['nb_resa'];

// On détermine le nombre de vols par page
$parPage = 3;

// On calcule le nombre de pages total
$pages = ceil($nbResas / $parPage);

// Calcul du 1er vol de la page
$premier = ($currentPage * $parPage) - $parPage;

$sql = 'SELECT *
FROM booking
ORDER BY `id` 
DESC LIMIT :premier, :parpage;';

// On prépare la requête
$query = $objetPdo->prepare($sql);

$query->bindValue(':premier', $premier, PDO::PARAM_INT);
$query->bindValue(':parpage', $parPage, PDO::PARAM_INT);

// On exécute
$query->execute();

// On récupère les valeurs dans un tableau associatif
$resas = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<body >

<section class="container pt-5">
    <h1 class="text-primary">Liste des Reservations</h1>

    <table class="table table-striped">
            <tr>
                <th class="text-primary"> Id du client </th>
                <th class="text-primary"> Nom </th>
                <th class="text-primary"> Prénom </th>
                <th class="text-primary"> Id du Vol </th>
                <th class="text-primary"> Action </th>
            </tr>     
</section>


<?php

foreach  ($resas as $row2) :?>
            <tr>
                <td><?php echo $row2["id"] ?></td>
                <td><?php echo $row2["name"] ?></td>
                <td><?php echo $row2["firstname"] ?></td>
                <td> <?php echo $row2["flightId"] ?> </td>
                <td>
                <a href="/espaceAdmin/bookingDelete.php?resa=<?php echo $row2["id"] ?>" class="delete" data-confirm="Etes vous sur de vouloir supprimer cette ligne?">Supprimer</a>
                </td>
            </tr>
<?php endforeach; ?>

        </table>
        
        <ul class="pagination">
            <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
            <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                <a href="/espaceAdmin/dashboard.php/?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
            </li>
            <?php for($page = 1; $page <= $pages; $page++): ?>
            <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
            <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                    <a href="/espaceAdmin/dashboard.php/?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                </li>
            <?php endfor ?>
            <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
            <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                <a href="/espaceAdmin/dashboard.php/?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
            </li>
        </ul>
                

    </body>

<script>
    var deleteLinks = document.querySelectorAll('.delete');

for (var i = 0; i < deleteLinks.length; i++) {
  deleteLinks[i].addEventListener('click', function(event) {
      event.preventDefault();

      var choice = confirm(this.getAttribute('data-confirm'));

      if (choice) {
        window.location.href = this.getAttribute('href');
      }
  });
}

</script>

</html>

