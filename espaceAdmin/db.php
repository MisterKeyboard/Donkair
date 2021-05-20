<?php
require "config.php";

function openPDO() {
    return new PDO(DB_DSN,DB_USER,DB_PASS); 
}

$objetPdo = new PDO('mysql:host=localhost;dbname=donkair','root','BONJOUR2020µ£'); 
