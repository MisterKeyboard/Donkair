<?php
require "db.php";

// On détermine sur quelle page on se trouve
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}

$objetPdo=openPDO();
// On détermine le nombre total de customer
$customer = 'SELECT COUNT(*) AS nb_customer FROM `customer`;';


// On prépare la requête
$query = $objetPdo->prepare($customer);

// On exécute
$query->execute();

// On récupère le nombre d'articles
$result = $query->fetch();

$nbCustomer = (int) $result['nb_customer'];

// On détermine le nombre de customer par page
$parPage = 5;

// On calcule le nombre de pages total
$pages = ceil($nbCustomer / $parPage);

// Calcul du 1e customer de la page
$premier = ($currentPage * $parPage) - $parPage;

$customerDisplay = 'SELECT * FROM donkair.customer
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

foreach  ($customers as $row) :?>
            <tr>
                <td><?php echo $row["id"] ?></td>
                <td><?php echo $row["name"] ?></td>
                <td><?php echo $row["firstname"] ?></td>
                <td><?php echo $row["mail"] ?></td>
                <td><?php echo $row["tel"] ?></td>
                <td><a  href="/espaceAdmin/routeEdit.php?fnbr=<?php echo $row["id"] ?>">Edit</a>
                <a href="/espaceAdmin/routeDel.php?fnbr=<?php echo $row["id"] ?>">Delete</a>
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
