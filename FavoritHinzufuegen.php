<?php
session_start();
$dbh = new PDO('mysql:host=34.89.179.34;dbname=findyourrecipe',"root","nT0~dY&jhe%6>|BX");
$UserID = $_SESSION['id'];
$RezeptID = $_GET['id'];
$stmt = $dbh->prepare("UPDATE User SET FavoritenRezepte = CONCAT(FavoritenRezepte,',',$RezeptID) WHERE UserID = '$UserID'AND FavoritenRezepte IS NOT NULL AND FavoritenRezepte <> '';");
$stmt->execute();
$stmt = $dbh->prepare("UPDATE User SET FavoritenRezepte = $RezeptID WHERE UserID = '$UserID' AND (FavoritenRezepte IS NULL OR FavoritenRezepte = '' );");
$stmt->execute();
$stmt = $dbh->prepare("UPDATE Rezept SET Beliebtheit = Beliebtheit+1 WHERE RezeptID = $RezeptID;");
$stmt->execute();
header('Location: ' . $_SERVER['HTTP_REFERER']);
