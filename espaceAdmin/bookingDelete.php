<?php
require "db.php";
require "session.php";
require "head.php";

$fresaNbr = $_GET["resa"];

$PDO = openPDO();
$sql = "DELETE FROM booking where name = ?";

$del = $PDO->prepare($sql);

$del->bindValue(1, $flightNbr, PDO::PARAM_STR);

$del->execute();


header('Location:/espaceAdmin/dashboard.php');
