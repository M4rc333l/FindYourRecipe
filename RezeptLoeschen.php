<?php
session_start();
$RezeptID = $_GET['id'];
$dbh = new PDO('mysql:host=34.65.206.124;dbname=FindYourRecipe',"root","RI7lnd2VfajM");
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
    for($i=0;$i<count($array);$i++){
        if($array[$i] == $RezeptID){
            unset($array[$i]);
            break;
        }
    }
    $newString = implode(",", $array);
    $stmt2 = $dbh->prepare("UPDATE User SET FavoritenRezepte = '$newString' WHERE UserID = '$UserID';");
    $stmt2->execute();
}
header("Location: RezeptBearbeiten.php");