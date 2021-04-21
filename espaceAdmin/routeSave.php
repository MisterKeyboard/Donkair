<?php

$i = $_GET['idd'];
$t = $_GET["title"];
$p = $_GET["price"];
$r = $_GET["releasedate"];
$l = $_GET["language"];
$a = $_GET["author_id"];

$PDO = new PDO("mysql:host=localhost;dbname=my_library","root","BONJOUR2020µ£");

$sql = "UPDATE book SET id=:i,
title=:t,
price=:p,
releasedate=:r,
language=:l,
author_id=:a WHERE id=:i" ;

$stmt = $PDO->prepare($sql);

$stmt->bindValue('i',$i,PDO::PARAM_INT);
$stmt->bindValue('t',$t,PDO::PARAM_STR);
$stmt->bindValue('p',$p,PDO::PARAM_STR);
$stmt->bindValue('r',$r,PDO::PARAM_INT);
$stmt->bindValue('l',$l,PDO::PARAM_STR);
$stmt->bindValue('a',$a,PDO::PARAM_INT);

$stmt->execute();

header('location:routeTab.php');
