<?php

$lifetime=1000000000000;
session_set_cookie_params($lifetime);
session_start();
$Rezept_User_ID = $_SESSION['id'];
echo $Rezept_User_ID;
//PHP Skript für alle Rezepte hinzufügen
$dbh = new PDO("mysql:host=database-1.cn1qejqxue78.eu-central-1.rds.amazonaws.com;dbname=FindYourRecipe","admin","RI7lnd2VfajM");
    //$data = null;
    $data = file_get_contents($_FILES['bild']['tmp_name']);
    $rezeptname = $_POST['rezeptname'];
    $zubereitung = $_POST['zubereitung'];
    $zutaten = $_POST['zutaten'];
    $dauer= $_POST['dauer'];
    $rezeptname = $_POST['rezeptname'];
    $bildname = $_FILES['bild']['name'];
    $bildtyp = $_FILES['bild']['type'];
    $kategorie = $_POST['kategorie'];

    $stmt = $dbh->prepare("insert into Rezept values ('',?,?,?,0,?,?,?,?,?,?)");
    $stmt->bindParam(1,$Rezept_User_ID);
    $stmt->bindParam(2,$bildname);
    $stmt->bindParam(3,$kategorie);
    $stmt->bindParam(4,$zubereitung);
    $stmt->bindParam(5,$rezeptname);
    $stmt->bindParam(6,$rezeptname);
    $stmt->bindParam(7,$bildtyp);
    $stmt->bindParam(8,$data);
    $stmt->bindParam(9,$dauer);
    $stmt->execute();

    $stmt = $dbh->prepare("Select KategorieID FROM Kategorie  Where Name = '$kategorie' ");
    $stmt->execute();
    while ($row = $stmt->fetch()){
        $KategorieID = $row['KategorieID'];
    }
    $stmt = $dbh->prepare("Select MAX(RezeptID)FROM Rezept");
    $stmt->execute();
    while ($row = $stmt->fetch()){
        $RezeptID = $row['MAX(RezeptID)'];
    }
    echo $KategorieID;
    echo $RezeptID;
    $stmt = $dbh->prepare("insert into RezeptKategorie(RezeptKategorie_KategorieID, RezeptKategorie_RezeptID) values ($KategorieID','$RezeptID')");
    $stmt->execute();


?>
<?php
//PHP Skript für alle Rezepte zu sehen
/*
$stmt = $dbh->prepare("Select * From Rezept");
$stmt->execute();
while ($row = $stmt->fetch()){
    echo "<li><a target='_blank' href='view.php?id=".$row['RezeptID']."'>".$row['Bildname']."'".$row['RezeptID']."</a><br/>
         <embed src='data:".$row['Bildtyp'].";base64,".base64_encode($row['Bilddata'])."'width='200'/></li>";
}*/
?>