<?php
session_start();
$dbh = new PDO('mysql:host=34.89.179.34;dbname=findyourrecipe',"root","nT0~dY&jhe%6>|BX");
$RezeptID = $_GET['id'];
$stmt = $dbh->prepare("Select * From Rezept where RezeptID = ?");
$stmt->bindParam(1,$RezeptID);
$stmt->execute();
$row = $stmt->fetch();
?>
<!-- Required meta tags -->
<!DOCTYPE html>
<html>
<head>
    <title> Rezept erstellen </title>

    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

    <style>
        #rezeptbildUpload
        {
            opacity: 0.5;
            margin-left: 20px;
            margin-top: 1%;
        }
        #einrücken
        {
            margin-left: 38%;
        }
        .überschrift
        {
            font-size: 20px;
            font-weight: bold;
            margin-top: 2%;
        }
        .unten
        {
            display: flex;
        }
        #button
        {
            margin-left: 15%;
            margin-bottom: 1%;
        }
    </style>
</head>
<body>
<!-- JS Datei für NavBar -->
<script  src="NavBar.php" > </script>
<script src = "Kategorien.js"> </script>
<div id="einrücken">

    <!-- Rezeptbild -->
    <!--   <input type="image" id="rezeptbildUpload" src="https://uxwing.com/wp-content/themes/uxwing/download/video-photography-multimedia/upload-image-icon.png" alt="Rezeptbild hochladen" width="200px" height="190px"> -->
    <img id="preview" width="300" height="300" src="<?php  echo "uploads/".$row['Bildname']?>">
    <form action="Update.php?id=<?php echo $row['RezeptID']?>" method="post" id="rezepterstellen" enctype="multipart/form-data">

        <input
            type="file" id="bild" name="bild" accept=".jpg, .jpeg, .png, .jfif"
            onchange="previewImage();"
        />

        <!-- Rezeptname -->
        <div class="überschrift">
            <label> Rezeptname </label>
            <input type="text" class="unten" name="rezeptname" size="30%" required onKeyUp="buttonReady()" value=<?php echo $row["Rezeptname"] ?>>
        </div>

        <!-- Dauer -->
        <div class="überschrift">
            <label> Dauer </label>
            <input type="text" class="unten" name="dauer" size="30%" required onKeyUp="buttonReady()"
                   value=<?php echo $row["Dauer"]; ?>>
        </div>

        <!-- Zutaten -->
        <!-- TODO: Schöneres Feld (bei Enter => neues Eingabefeld) -->
        <div class="überschrift">
            <label> Zutaten </label>
            <textarea name="zutaten" class="unten" rows="5" cols="40" required onKeyUp="buttonReady()"> <?php
                $text = $row["Zutaten"];
                $text = str_replace("<br />", "", $text);
                echo $text;
                ?></textarea>
        </div>

        <!-- Zubereitung -->
        <div class="überschrift">
            <label> Zubereitung </label>
            <textarea name="zubereitung" class="unten" rows="5" cols="40" required onKeyUp="buttonReady()"> <?php
                $text = $row["Zubereitung"];
                $text = str_replace("<br />", "", $text);
                echo $text;
                ?></textarea>
        </div>

        <!-- Kategorien -->
        <div>
            <label class="überschrift"> Kategorien </label>
            <ul style="list-style-type:none;">
                <?php
                $ids = ["first", "second", "third", "fourth", "fifth", "sixth"];
                $RezeptID = $_GET['id'];
                $Kategorie = array();
                $stmt = $dbh->prepare("Select K.Name from Kategorie as K, RezeptKategorie as RK where RK.RezeptKategorie_RezeptID = '$RezeptID' AND RK.RezeptKategorie_KategorieID = K.KategorieID");
                $stmt->execute();
                $count2 = $stmt->rowCount();
                while($row = $stmt->fetch()){
                    $Kategorie[] = $row['Name'];
                }
                $stmt = $dbh->prepare("Select * from Kategorie");
                $stmt->execute();
                $count = $stmt->rowCount();
                $zaehler = 0;
                $buttonID = "button";
                while ($row = $stmt->fetch()) {

                    if (in_array($row['Name'], $Kategorie)) {
                        echo '<li>
                                <input type="checkbox" value="" id="'.$ids[$zaehler].'Checkbox" name="' . $row['Name'] . '" onchange="buttonReady()" checked>
                                <label for="'.$ids[$zaehler].'Checkbox" > ' . $row['Name'] . ' </label>
                                </li>';

                    } else {
                        echo '<li>
                               <input type="checkbox" value="" id="'.$ids[$zaehler].'Checkbox" name="' . $row['Name'] . '" onchange="buttonReady()">
                              <label for="'.$ids[$zaehler].'Checkbox" > ' . $row['Name'] . ' </label>
                                </li>';
                    }
                    $zaehler++;
                }
                echo '';
                ?>
            </ul>
        </div>

        <!-- Fertig-Button -->
        <div>
            <input type="submit" id="button" name="button" value="Fertig">
        </div>
    </form>
</div>
</body>
<script>document.querySelector('#button').disabled = true;
</script>
</html>