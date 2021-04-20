
<!--  display 
<html>
    <link >

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
            </tr> --> 
<?php

require "config.php";

$sql = ('SELECT destination.flightNbr, destination.flightTime FROM destination
    UNION 
    SELECT destination.departureCity, city.town FROM destination LEFT JOIN city ON destination.departureCity = city.id
    UNION
    SELECT destination.arrivalCity, city.town FROM destination LEFT JOIN city ON destination.arrivalCity = city.id
    UNION
    SELECT flight.date, flight.takeOff FROM flight');

$donnees = $objetPdo->query($sql);

while ($row = $donnees->fetch())
{
    echo $row["flightNbr"];
    // echo $row["departureCity"];
    // echo $row["arrivalCity"];
    // echo $row["date"];
    // echo $row["takeOff"];
    echo $row["flightTime"];
}
    



