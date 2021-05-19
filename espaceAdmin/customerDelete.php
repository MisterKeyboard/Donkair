<?php
require "db.php";
require "session.php";
require "head.php";

$custName = $_GET["cName"];

$PDO = openPDO();
$sql1 = "DELETE FROM customer WHERE name = ?";

$del1 = $objetPdo->prepare($sql1);

$del1->bindValue(1, $custName, PDO::PARAM_STR);

$del1->execute();






header('Location:/espaceAdmin/dashboard.php');
