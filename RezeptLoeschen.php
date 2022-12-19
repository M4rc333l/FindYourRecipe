<?php
session_start();
$RezeptID = $_GET['id'];
$dbh = new PDO('mysql:host=34.89.179.34;dbname=findyourrecipe',"root","nT0~dY&jhe%6>|BX");
$stmt = $dbh->prepare("Delete from RezeptKategorie as RK Where RK.RezeptKategorie_RezeptID =  '$RezeptID'");
$stmt->execute();
$stmt = $dbh->prepare("Select * from Rezept as R Where R.RezeptID =  '$RezeptID'");
$stmt->execute();
while ($row = $stmt->fetch()){
    unlink("uploads/".$row["Bildname"]);
}
$stmt = $dbh->prepare("Delete from Rezept as R Where R.RezeptID =  '$RezeptID'");
$stmt->execute();

$stmt = $dbh->prepare("SELECT UserID, FavoritenRezepte FROM User;");
$stmt->execute();
while($row = $stmt->fetch()){
    $UserID = $row['UserID'];
    $stmtString = $row['FavoritenRezepte'];
    $array = preg_split("/\,/", $stmtString);
    $stmt2 = updateFavorit($array, $RezeptID, $dbh, $UserID);
}
header("Location: RezeptBearbeiten.php");