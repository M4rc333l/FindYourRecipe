<?php
session_start();
$RezeptID = $_SESSION['rezept_id'];
$dbh = new PDO("mysql:host=database-1.cn1qejqxue78.eu-central-1.rds.amazonaws.com;dbname=FindYourRecipe","admin","RI7lnd2VfajM");
$stmt = $dbh->prepare("Delete from Rezept as R
    Where R.RezeptID =  '$RezeptID'");
$stmt->execute();
header("Location: RezeptBearbeiten.php");