<?php
require "session.php";
require "head.php";
require "db.php";
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

$sql = ('SELECT f.flightNbr,
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
    ON arrivalRoute.id = f.arrivalCity');

$objetPdo=openPDO();

foreach  ($objetPdo->query($sql) as $row) :?>
            <tr>
                <td><?php echo $row["flightNbr"] ?></td>
                <td><?php echo $row["departureTown"] ?></td>
                <td><?php echo $row["arrivalTown"] ?></td>
                <td><?php echo $row["departureTime"] ?></td>
                <td><?php echo $row["arrivalTime"] ?></td>
                <td><?php echo $row["date"] ?></td>
                <td><a  href="routeUpdate.php?fnbr=<?php echo $row["flightNbr"] ?>">Edit</a>
                <a href="routeDel.php?fnbr=<?php echo $row["flightNbr"] ?>">Delete</a>
                </td>
            </tr>
<?php endforeach; ?>

        </table>
    </body>
</html>
