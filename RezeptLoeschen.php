<?php
    session_start();
    $rezept_ID = $_GET['id'];
    $dbh = new PDO('mysql:host=34.65.206.124;dbname=FindYourRecipe',"root","RI7lnd2VfajM");
    $stmt = $dbh->prepare("Delete from RezeptKategorie as RK Where RK.RezeptKategorie_RezeptID =  '$rezept_ID'");
    $stmt->execute();
    $stmt = $dbh->prepare("Select * from Rezept as R Where R.RezeptID =  '$rezept_ID'");
    $stmt->execute();
    while ($row = $stmt->fetch()){
        unlink("uploads/".$row["Bildname"]);
    }
    $stmt = $dbh->prepare("Delete from Rezept as R Where R.RezeptID =  '$rezept_ID'");
    $stmt->execute();
    header("Location: RezeptBearbeiten.php");