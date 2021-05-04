<?php
require "db.php";
require "session.php";
require "head.php";

$id = $_POST['id'];
$flightNbr = $_POST['flightNbr'];
$departureCity = $_POST['departureCity'];
$arrivalCity = $_POST['arrivalCity'];
$departureTime = $_POST['departureTime'];
$arrivalTime = $_POST['arrivalTime'];
$date = $_POST['date'];

$objetPdo = openPDO();

$sql = "UPDATE flight SET 
flightNbr=:flightNbr,
departureCity=:departureCity,
arrivalCity=:arrivalCity,
departureTime=:departureTime,
arrivalTime=:arrivalTime,
date=:date
WHERE id=:id" ;

$save = $objetPdo->prepare($sql);

$save->bindValue(':id',$id);
$save->bindValue(':flightNbr',$flightNbr);
$save->bindValue(':departureCity',$departureCity);
$save->bindValue(':arrivalCity',$arrivalCity);
$save->bindValue(':departureTime',$departureTime);
$save->bindValue(':arrivalTime',$arrivalTime);
$save->bindValue(':date',$date);

$save->execute();

header('Location:/espaceAdmin/dashboard.php');
