<?php
//
session_start();
$Rezept_User_ID = $_SESSION['id'];
//PHP Skript für alle Rezepte hinzufügen
$dbh = new PDO('mysql:host=34.65.206.124;dbname=FindYourRecipe',"root","RI7lnd2VfajM");
$data = $_FILES["bild"]['tmp_name'];
$rezeptname = $_POST['rezeptname'];
$zubereitung = $_POST['zubereitung'];
$zutaten = $_POST['zutaten'];
$dauer= $_POST['dauer'];
$rezeptname = $_POST['rezeptname'];
$bildname = $_FILES['bild']['name'];
$bildtyp = $_FILES['bild']['type'];
$kategorielist = array();
if (isset($_POST["Vegan"])){
    $kategorie = 'Vegan';
    array_push($kategorielist, $kategorie);
}
if (isset($_POST["Vegetarisch"])){
    $kategorie = 'Vegetarisch';
    array_push($kategorielist, $kategorie);
}
if (isset($_POST["Fisch"])){
    $kategorie = 'Fisch';
    array_push($kategorielist, $kategorie);
}
if (isset($_POST["Fleisch"])){
    $kategorie = 'Fleisch';
    array_push($kategorielist, $kategorie);
}
if (isset($_POST["Kalorienarm"])){
    $kategorie = 'Kalorienarm';
    array_push($kategorielist, $kategorie);
}

if (isset($_POST["Glutenfrei"])){
    $kategorie = 'Glutenfrei';
    array_push($kategorielist, $kategorie);
}


$stmt = $dbh->prepare("insert into Rezept(Rezept_User_ID,Bildname,Kategorien,Beliebtheit,Zubereitung,Name,Zutaten,Bildtyp,Dauer) values (?,?,?,0,?,?,?,?,?)");


$img_ex = pathinfo($bildname, PATHINFO_EXTENSION);
$img_ex_lc = strtolower($img_ex);

$allowed_exs = array("jpg", "jpeg", "png", "jfif");
if (in_array($img_ex_lc, $allowed_exs)) {
    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
    $img_upload_path = 'uploads/'.$new_img_name;
    move_uploaded_file($data, $img_upload_path);

    // Insert into Database
    $stmt->bindParam(1,$Rezept_User_ID);
    $stmt->bindParam(2,$new_img_name);
    $stmt->bindParam(3,$kategorie);
    $stmt->bindParam(4,$zubereitung);
    $stmt->bindParam(5,$rezeptname);
    $stmt->bindParam(6,$zutaten);
    $stmt->bindParam(7,$bildtyp);
    $stmt->bindParam(8,$dauer);
    $stmt->execute();
}else {
    $em = "You can't upload files of this type";
    header("Location: index.php?error=$em");
}

for ($i = 0; $i < count($kategorielist);$i++){
    echo $kategorielist[$i];

    $stmt = $dbh->prepare("Select KategorieID FROM Kategorie  Where Name = '$kategorielist[$i]' ");
    $stmt->execute();
    while ($row = $stmt->fetch()){
        $KategorieID = $row['KategorieID'];
    }
    $stmt = $dbh->prepare("Select MAX(RezeptID)FROM Rezept");
    $stmt->execute();
    while ($row = $stmt->fetch()){
        $RezeptID = $row['MAX(RezeptID)'];
    }
    $stmt = $dbh->prepare("insert into RezeptKategorie(RezeptKategorie_KategorieID, RezeptKategorie_RezeptID) values ('$KategorieID','$RezeptID')");
    $stmt->execute();

}
header("Location: HomeSeite.php");
?>