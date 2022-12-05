<?php
$lifetime=1000000000000;
session_set_cookie_params($lifetime);
session_start();

$dbh = new PDO('mysql:host=34.65.206.124;dbname=FindYourRecipe',"root","RI7lnd2VfajM");
$User_ID = $_SESSION['id'];
$RezeptID = $_SESSION['RezeptID'];
$stmt = $dbh->prepare("UPDATE User SET FavoritenRezepte = CONCAT(FavoritenRezepte,',',$RezeptID) WHERE UserID = '$User_ID';");
$stmt->execute();
$stmt = $dbh->prepare("UPDATE User SET FavoritenRezepte = $RezeptID WHERE UserID = '$User_ID' AND FavoritenRezepte IS NULL;");
$stmt->execute();
header('Location: ' . $_SERVER['HTTP_REFERER']);
