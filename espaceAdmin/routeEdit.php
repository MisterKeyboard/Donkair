<?php
require "db.php";
require "session.php";
require "head.php";

$flightNbr = $_GET["fnb"];
$objetPdo = openPDO();



$sql = "SELECT * FROM flight WHERE id = ?";

$edit = $objetPDO->prepare($sql);

$edit->bindValue(1,$flightNbr, PDO::PARAM_STR);

$edit->execute();

$row = $stmt ->fetch(PDO::FETCH_OBJ);

if(!$row){
    header("location:add.php");
}

?>

