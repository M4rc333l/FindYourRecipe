<?php
session_start();
$RezeptID = $_SESSION['rezept_id'];
$dbh = new PDO('mysql:host=34.65.206.124;dbname=FindYourRecipe',"root","RI7lnd2VfajM");
$stmt = $dbh->prepare("Delete from RezeptKategorie as RK Where RK.RezeptKategorie_RezeptID =  '$RezeptID'");
$stmt->execute();
$stmt = $dbh->prepare("Delete from Rezept as R Where R.RezeptID =  '$RezeptID'");
$stmt->execute();
header("Location: RezeptBearbeiten.php");