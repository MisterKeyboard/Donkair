<?php
require "session.php";
require "head.php";
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



<body>

    <h1>Liste des vols</h1>

    <table>
            <tr>
                <th> Numéro de Vol </th>
                <th> Ville de départ </th>
                <th> Ville d'arrivée </th>
                <th> Heure de décollage </th>
                <th> Heure d'atterrisage </th>
                <th> Date </th>
            </tr>     



<?php



foreach  ($flights as $row) :?>
            <tr>
                <td><?php echo $row["flightNbr"] ?></td>
                <td><?php echo $row["departureTown"] ?></td>
                <td><?php echo $row["arrivalTown"] ?></td>
                <td><?php echo $row["departureTime"] ?></td>
                <td><?php echo $row["arrivalTime"] ?></td>
                <td><?php echo $row["date"]?></td>
                <td><a  href="routeEdit.php?fnbr=<?php echo $row["flightNbr"] ?>">Edit</a>
                <a href="routeDel.php?fnbr=<?php echo $row["flightNbr"] ?>">Delete</a>
                </td>
            </tr>
<?php endforeach; ?>

        </table>
        <ul class="pagination">
                        <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                            <a href="/espaceAdmin/routeTab.php/?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                        </li>
                        <?php for($page = 1; $page <= $pages; $page++): ?>
                        <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                        <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                                <a href="/espaceAdmin/routeTab.php/?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                            </li>
                        <?php endfor ?>
                        <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                        <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                            <a href="/espaceAdmin/routeTab.php/?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                        </li>
                    </ul>
                </nav>


    </body>

</html>
