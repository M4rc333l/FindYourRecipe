<?php
$dbh = new PDO("mysql:host=database-1.cn1qejqxue78.eu-central-1.rds.amazonaws.com;dbname=FindYourRecipe","admin","RI7lnd2VfajM");
$RezeptID = isset($_GET['RezeptID']) ? $_GET['RezeptID'] : "";
$stmt = $dbh->prepare("Select * From Rezept where RezeptID = ?");
$stmt->bindParam(1,$RezeptID);
$stmt->execute();
$row = $stmt->fetch();
}

?>