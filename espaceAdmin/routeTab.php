<?php
require_once "db.php";




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
$parPage = 5;

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
ORDER BY `flightNbr` ASC;
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
                <td> <a  href="/espaceAdmin/routeEdit.php?fnbr=<?php echo $row["flightNbr"] ?>">Edit</a>
                <a href="/espaceAdmin/routeDel.php?fnbr=<?php echo $row["flightNbr"] ?>">Delete</a>
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
                </nav>


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
// On détermine le nombre total de customer
$customer = 'SELECT COUNT(*) AS nb_customer FROM `customer`';


// On prépare la requête
$query1 = $objetPdo->prepare($customer);

// On exécute
$query1->execute();

// On récupère le nombre d'articles
$result = $query1->fetch();

$nbCustomer = (int) $result['nb_customer'];

// On détermine le nombre de customer par page
$parPage = 5;

// On calcule le nombre de pages total
$pages = ceil($nbCustomer / $parPage);

// Calcul du 1e customer de la page
$premier = ($currentPage * $parPage) - $parPage;

$customerDisplay = 'SELECT * FROM donkair.customer;
ORDER BY id ASC LIMIT 1;
DESC LIMIT :premier, :parpage;';

// On prépare la requête
$query2 = $objetPdo->prepare($customerDisplay);

$query2->bindValue(':premier', $premier, PDO::PARAM_INT);
$query2->bindValue(':parpage', $parPage, PDO::PARAM_INT);

// On exécute
$query2->execute();

// On récupère les valeurs dans un tableau associatif
$customers = $query2->fetchAll(PDO::FETCH_ASSOC);


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

foreach  ($customers as $row) :?>
            <tr>
                <td><?php echo $row["id"] ?></td>
                <td><?php echo $row["name"] ?></td>
                <td><?php echo $row["firstname"] ?></td>
                <td><?php echo $row["mail"] ?></td>
                <td><?php echo $row["tel"] ?></td>
                <td><a  href="/espaceAdmin/customerEdit.php?cName=<?php echo $row["name"] ?>">Edit</a>
                <a href="/espaceAdmin/customerDelete.php?cName=<?php echo $row["name"] ?>">Delete</a>
                </td>
            </tr>
<?php endforeach; 

?>
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
                </nav>


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
// On détermine le nombre total de resa
$booking = 'SELECT COUNT(*) AS nb_booking FROM `booking`';


// On prépare la requête
$query2 = $objetPdo->prepare($booking);

// On exécute
$query2->execute();

// On récupère le nombre d'articles
$result = $query2->fetch();

$nbBooking = (int) $result['nb_booking'];

// On détermine le nombre de customer par page
$parPage = 5;

// On calcule le nombre de pages total
$pages = ceil($nbBooking / $parPage);

// Calcul du 1e booking de la page
$premier = ($currentPage * $parPage) - $parPage;

$bookingDisplay = 'SELECT b.name,
b.firstname
flight.flightNbr 
FROM booking b
LEFT JOIN flight flightNbr
ON flight.flightNbr = b.flightId nbrF,
ORDER BY id ASC LIMIT 1 ASC;
DESC LIMIT :premier, :parpage';

// On prépare la requête
$query3 = $objetPdo->prepare($customerDisplay);

$query3->bindValue(':premier', $premier, PDO::PARAM_INT);
$query3->bindValue(':parpage', $parPage, PDO::PARAM_INT);

// On exécute
$query3->execute();

// On récupère les valeurs dans un tableau associatif
$resas = $query2->fetchAll(PDO::FETCH_ASSOC);


?>

<body >

<section class="container pt-5">
    <h1 class="text-primary">Liste des Reservations</h1>

    <table class="table table-striped">
            <tr>
                <th class="text-primary"> Id du client </th>
                <th class="text-primary"> Nom </th>
                <th class="text-primary"> Prénom </th>
                <th class="text-primary"> Numéro de Vol </th>
                <th class="text-primary"> Action </th>
            </tr>     
</section>


<?php

foreach  ($customers as $row) :?>
            <tr>
                <td><?php echo $row["id"] ?></td>
                <td><?php echo $row["name"] ?></td>
                <td><?php echo $row["firstname"] ?></td>
                <td><?php echo $row["id"] ?></td>
                <td>
                <a  href="/espaceAdmin/bookingEdit.php?resa=<?php echo $row["id"] ?>">Edit</a>
                <a href="/espaceAdmin/bookingDelete.php?resa=<?php echo $row["id"] ?>">Delete</a>
                </td>
            </tr>
<?php endforeach; 

?>
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
                </nav>


    </body>

</html>
