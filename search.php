<?php
$Pdo = new PDO("mysql:host=localhost;dbname=user;charset=utf8mb4", "root", "");

$Statement  = $Pdo->prepare("SELECT * FROM usertable WHERE Description LIKE ?");
$Statement ->execute(["%".$_POST['search']."%"]);
$Results = $Statement->fetchAll();
$Count=count($Results);