<?php

$lifetime=1000000000000;
session_set_cookie_params($lifetime);
session_start();
$Rezept_User_ID = $_SESSION['id'];
echo $Rezept_User_ID;
//PHP Skript für alle Rezepte hinzufügen
$dbh = new PDO('mysql:host=34.65.206.124;dbname=FindYourRecipe',"root","RI7lnd2VfajM");
    $data = file_get_contents($_FILES["bild"]['tmp_name']);

    $rezeptname = $_POST['rezeptname'];
    $zubereitung = $_POST['zubereitung'];
    $zutaten = $_POST['zutaten'];
    $dauer= $_POST['dauer'];
    $rezeptname = $_POST['rezeptname'];
    $bildname = $_FILES['bild']['name'];
    $bildtyp = $_FILES['bild']['type'];
    if (isset($_POST["Vegan"])){
        $kategorie = 'Vegan';
    }
    if (isset($_POST["Vegetarisch"])){
        $kategorie = 'Vegetarisch';
    }
    if (isset($_POST["Fisch"])){
        $kategorie = 'Fisch';
    }
    if (isset($_POST["Fleisch"])){
        $kategorie = 'Fleisch';
    }
    if (isset($_POST["Glutenfrei"])){
        $kategorie = 'Glutenfrei';
    }
    if (isset($_POST["Kalorienarm"])){
        $kategorie = 'Kalorienarm';
    }
    echo $kategorie;
    $stmt = $dbh->prepare("insert into Rezept(Rezept_User_ID,Bildname,Kategorien,Beliebtheit,Zubereitung,Name,Zutaten,Bildtyp,Bilddata,Dauer) values (?,?,?,0,?,?,?,?,?,?)");
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
    echo $kategorie;
    echo $KategorieID;
    $stmt = $dbh->prepare("insert into RezeptKategorie(RezeptKategorie_KategorieID, RezeptKategorie_RezeptID) values ('$KategorieID','$RezeptID')");
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