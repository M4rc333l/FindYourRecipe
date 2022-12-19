<?php
session_start();
$dbh = new PDO('mysql:host=34.89.179.34;dbname=findyourrecipe',"root","nT0~dY&jhe%6>|BX");
$UserID = $_SESSION['id'];
$RezeptID = substr($_GET['id'],1,strlen($_GET['id'])-2);
$stmt = $dbh->prepare("SELECT User.FavoritenRezepte FROM User WHERE UserID='$UserID';");
$stmt->execute();
$stmtString = "";
while($row = $stmt->fetch()){
    $stmtString = $row[0];
}
$array = preg_split("/\,/", $stmtString);
/**
 * @param array $array
 * @param $RezeptID
 * @param PDO $dbh
 * @param $UserID
 * @return false|PDOStatement
 */
function updateFavorit(array $array, $RezeptID, PDO $dbh, $UserID)
{
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] == $RezeptID) {
            unset($array[$i]);
            break;
        }
    }
    $newString = implode(",", $array);
    $stmt = $dbh->prepare("UPDATE User SET FavoritenRezepte = '$newString' WHERE UserID = '$UserID';");
    $stmt->execute();
    return $stmt;
}

$stmt = updateFavorit($array, $RezeptID, $dbh, $UserID);
$stmt = $dbh->prepare("UPDATE Rezept SET Beliebtheit = Beliebtheit-1 WHERE RezeptID = '$RezeptID';");
$stmt->execute();
header('Location: ' . $_SERVER['HTTP_REFERER']);