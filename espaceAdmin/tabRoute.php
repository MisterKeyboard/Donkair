
<!--  display --> 
<html>

    <!-- <link > -->

<body>

    <h1>Routes ajoutés</h1>

    <table>
        <thead>

            <tr>
                <th> Numéro de Vol </th>
                <th> Temps de vol</th>
                <th> Ville de départ </th>
                <th> Ville d'arrivée </th>
                <th> Date </th>
                <th> Heure décollage</th>
            </tr> 

        </thead>
    </table>    

</body>

</html>

<?php

require "config.php";
$objetPdo = new PDO('mysql:host=localhost;dbname=donkair','root',''); 

$sql = ('SELECT destination.flightNbr, destination.flightTime, destination.departureCity, departureCity.town, destination.arrivalCity, arrivalCity.town FROM destination LEFT JOIN city departureCity ON destination.departureCity = departureCity.id LEFT JOIN city arrivalCity ON destination.arrivalCity = arrivalCity.id');

//SELECT flight.date, flight.takeOff FROM flight';
//$result = mysqli_query($objetPdo, $sql) or die ("bad query");

// {
//     echo $row["flightNbr"];
//     echo $row["departureCity"];
//     echo $row["arrivalCity"];
//     echo $row["date"];
//     echo $row["takeOff"];
//     echo $row["flightTime"];
// }

// foreach  ($objetPdo as $row) {

//         echo "<tr><td>" .

//                 $row['title'] .  "</td><td>" . 
//                 $row['name'] .  "</td><td>" . 
//                 $row['id'] . "</td><td>" ;
//             }
foreach  ($objetPdo->query($sql) as $row) {

    echo "<tr><td>" .

        $row['flightNbr'] .  "</td><td>" . 
        $row['flightTime'] .  "</td><td>" . 
        $row['departureCity'] .  "</td><td>" . 
        $row['arrivalCity'] .  "</td><td>";
        // $row['date'] .  "</td><td>" . 
        // $row['takeOff'] .  "</td><td>" ;
        //$row['id'] . "</td><td>" 
}
