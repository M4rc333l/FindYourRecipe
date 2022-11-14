<?php
$dbhost = "database-1.cn1qejqxue78.eu-central-1.rds.amazonaws.com";
$dbuser = "admin";
$dbpass = "RI7lnd2VfajM";
$db = "FindYourRecipe";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

    $rezeptname = $_POST["rezeptname"];
    $beschreibung = $_POST["beschreibung"];
    $bild = $_POST["bild"];
    $sql = "INSERT INTO Rezept (Name, Zubereitung, Bild, Rezept_User_ID) VALUES ('$rezeptname', '$beschreibung', '$bild', 1)";
    $result = $conn->query($sql);
$conn->close();
?>
