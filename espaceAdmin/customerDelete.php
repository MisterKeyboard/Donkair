<?php
require "db.php";
require "session.php";
require "head.php";

$cust = $_GET["cName"];

$PDO = openPDO();
$sql = "DELETE FROM customer where id = ?";

$del = $PDO->prepare($sql);

$del->bindValue(1, $cust, PDO::PARAM_STR);

$del->execute();


header('Location:/espaceAdmin/dashboard.php');
