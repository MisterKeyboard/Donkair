<?php
require "db.php";
require "session.php";
require "head.php";

$id = $_POST['id'];
$name = $_POST['name'];
$firstname = $_POST['firstname'];
$mail = $_POST['mail'];
$tel = $_POST['tel'];

$objetPdo = openPDO();

$sql = "UPDATE customer SET 
name=:name,
firstname=:firstname,
mail=:mail,
tel=:tel
WHERE id=:id" ;

$save1 = $objetPdo->prepare($sql);

$save1->bindValue(':id',$id);
$save1->bindValue(':name',$name);
$save1->bindValue(':firstname',$firstname);
$save1->bindValue(':mail',$mail);
$save1->bindValue(':tel',$tel);

$save1->execute();

header('Location:/espaceAdmin/dashboard.php');
