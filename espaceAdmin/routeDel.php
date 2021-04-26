<?php
require "config.php";
require "db.php";
require "session.php";
require "head.php";

$flightNbr = $_GET["fnbr"];

$PDO = openPDO();
$sql = "DELETE FROM flight where flightNbr = ?";

$del = $PDO->prepare($sql);

$del->bindValue(1, $flightNbr, PDO::PARAM_STR);

$del->execute();



//Database::executeSql( "DELETE FROM flight where flightNbr = ?", [
//    $_GET["fnbr"]
//]);

header('Location:dashboard.php');

