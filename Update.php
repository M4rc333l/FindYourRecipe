<?php
    $lifetime=1000000000000;
    session_set_cookie_params($lifetime);
    session_start();
    $Rezept_User_ID = $_SESSION['id'];
    $rezept_ID = $_GET['id'];
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


    $stmt = $dbh->prepare("DELETE FROM RezeptKategorie WHERE RezeptKategorie_RezeptID = '$rezept_ID'");
    $stmt->execute();

    for ($i = 0; $i < count($kategorielist);$i++){
        echo $kategorielist[$i];

        $stmt = $dbh->prepare("Select KategorieID FROM Kategorie  Where Name = '$kategorielist[$i]' ");
        $stmt->execute();
        while ($row = $stmt->fetch()){
            $KategorieID = $row['KategorieID'];
        }
        $stmt = $dbh->prepare("insert into RezeptKategorie(RezeptKategorie_KategorieID, RezeptKategorie_RezeptID) values ('$KategorieID','$rezept_ID')");
        $stmt->execute();

    }






    $stmt = $dbh->prepare("Select * from Rezept as R Where R.RezeptID =  '$rezept_ID'");
    $stmt->execute();
    while ($row = $stmt->fetch()){
        if ($bildname != null){
            unlink("uploads/".$row["Bildname"]);
        }
    }
    $img_ex = pathinfo($bildname, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);
    $allowed_exs = array("jpg", "jpeg", "png", "jfif");
    if (in_array($img_ex_lc, $allowed_exs)) {
        $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
        $img_upload_path = 'uploads/' . $new_img_name;
        move_uploaded_file($data, $img_upload_path);
        $stmt = $dbh->prepare("UPDATE Rezept
                                    SET Bildname = '$new_img_name', Kategorien = '$kategorie', Zubereitung = '$zubereitung', Name = '$rezeptname', Zutaten = '$zutaten', Bildtyp = '$bildtyp', Dauer = '$dauer'
                                    WHERE RezeptID = '$rezept_ID' AND Rezept_User_ID = '$Rezept_User_ID';");
        $stmt->execute();
    }
    if ($bildname == null){
        $stmt = $dbh->prepare("UPDATE Rezept
                                    SET   Kategorien = '$kategorie', Zubereitung = '$zubereitung', Name = '$rezeptname', Zutaten = '$zutaten', Bildtyp = '$bildtyp', Dauer = '$dauer'
                                    WHERE RezeptID = '$rezept_ID' AND Rezept_User_ID = '$Rezept_User_ID';");
        $stmt->execute();
      header("Location: ProfilSeite.php");
}
header("Location: ProfilSeite.php");





?>