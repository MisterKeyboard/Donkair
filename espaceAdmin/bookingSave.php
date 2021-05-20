<?php
require "db.php";
require "session.php";
require "head.php";

$id = $_POST['id'];
$name = $_POST['name'];
$firstname = $_POST['firstname'];
// $flightNbr = $_POST['flightNbr'];

$objetPdo = openPDO();

$sql = "UPDATE booking SET 
name=:name,
firstname=:firstname,
-- flightNbr=:flightNbr,
WHERE id=:id" ;

$save = $objetPdo->prepare($sql);

$save->bindValue(':id',$id);
$save->bindValue(':name',$name);
// $save->bindValue(':flightNbr',$flightNbr);
$save->bindValue(':firstname',$firstname);

$save->execute();

header('Location:/espaceAdmin/dashboard.php');
