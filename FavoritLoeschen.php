<?php
session_start();
$dbh = new PDO('mysql:host=34.65.206.124;dbname=FindYourRecipe',"root","RI7lnd2VfajM");
$UserID = $_SESSION['id'];
$RezeptID = substr($_GET['id'],1,strlen($_GET['id'])-2);
$stmt = $dbh->prepare("SELECT User.FavoritenRezepte FROM User WHERE UserID='$UserID';");
$stmt->execute();
$stmtString = "";
while($row = $stmt->fetch()){
    $stmtString = $row[0];
}
$array = preg_split("/\,/", $stmtString);
for($i=0;$i<count($array);$i++){
    if($array[$i] == $RezeptID){
        unset($array[$i]);
        break;
    }
}
$newString = implode(",", $array);
$stmt = $dbh->prepare("UPDATE User SET FavoritenRezepte = '$newString' WHERE UserID = '$UserID';");
$stmt->execute();
$stmt = $dbh->prepare("UPDATE Rezept SET Beliebtheit = Beliebtheit-1 WHERE RezeptID = '$RezeptID';");
$stmt->execute();
header('Location: ' . $_SERVER['HTTP_REFERER']);