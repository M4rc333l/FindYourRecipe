<?php
$dbh = new PDO('mysql:host=34.65.206.124;dbname=FindYourRecipe',"root","RI7lnd2VfajM");
session_start();
$RezeptID = $_GET['id'];
$stmt = $dbh->prepare("Select * From Rezept where RezeptID = ?");
$stmt->bindParam(1,$RezeptID);
$_SESSION['RezeptID'] = $RezeptID;
$UserID = $_SESSION['id'];
$stmt->execute();
$row = $stmt->fetch();
?>

<!-- Required meta tags -->

<!DOCTYPE html>
<html>
<head>
    <title> Rezept </title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

    <style>

        body{
            background: url("https://cdn.discordapp.com/attachments/1023935776163119175/1051851552056414228/Hintergrund_Fuenf_Prozent.png");
        }

        #bild{
            width: 50%;
            height: 50%;
            object-fit:cover;
            border: 10px solid white;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        #rezeptname
        {
            font-size: 45px;
            font-weight: bold;
            box-shadow: 0 4px 8px 0 rgba(0, 150, 255, 0.2), 0 6px 20px 0 rgba(0, 150, 255, 0.19) ;
        }

        #einrücken
        {
            margin-left: 15%;
            margin-right: 15%;
            border-style:none solid;
            border-width: 5px;

            border-color: rgb(177, 234, 255);
            margin-top: 1%;
            padding-left: 10%;
            padding-right: 10%;

            background-color: white;
        }

        #favorit
        {
            position: absolute;
            left: 70%;
            top: 14%;
        }

        .überschrift
        {
            font-size: 30px;
            font-weight: bold;
            box-shadow: 0 4px 8px 0 rgba(0, 150, 255, 0.2), 0 6px 20px 0 rgba(0, 150, 255, 0.19) ;

        }

        .rezepttext
        {
            font-size: 18px;
            width: 100%;
            border: 1px none;
            word-wrap: break-word;
        }
    </style>
</head>
<body>
<!-- JS Datei für NavBar -->
<script  src="NavBar.php" > </script>

<div id="einrücken">
    <!-- Rezeptname -->

    <?php
    echo " <img id=bild src=uploads/".$row["Bildname"]." style='height:300px;width:300px;' >";
    ?>

    <p id="rezeptname">
        <?php
        echo  $row['Name']
        ?>
    </p>

    <!-- Dauer -->
    <p class="überschrift"> </p>
    <p class="rezepttext">
        <?php
        echo  $row['Dauer']
        ?>
    </p>

    <!-- Zutaten -->
    <p class="überschrift"> Zutaten </p>
    <p class="rezepttext">
        <?php
        echo  $row['Zutaten']
        ?>
    </p>

    <!-- Zubereitung -->
    <p class="überschrift"> Zubereitung </p>
    <p class="rezepttext">
        <?php
        echo  $row['Zubereitung']
        ?>
    </p>

    <!-- Kategorien -->
    <p class="überschrift"> Kategorien </p>
    <p class="rezepttext">
        <?php
        $RezeptKategorie = array();
        $RezeptID = $_GET['id'];
        $stmt = $dbh->prepare("select K.Name from Kategorie as K, RezeptKategorie as RK where RK.RezeptKategorie_RezeptID = '$RezeptID' AND RK.RezeptKategorie_KategorieID = K.KategorieID");
        $stmt->execute();
        $count = $stmt->rowCount();
        while($row = $stmt->fetch()){
            if ($count > 1){
                echo $row['Name'].", ";
                $count--;
            }else{
                echo $row['Name'];
            }
        }
        ?>
    </p>

</div>
 <?php
     $RezeptID = $_GET['id'];
     $stmt = $dbh->prepare("SELECT User.FavoritenRezepte FROM User WHERE UserID='$UserID'");
     $stmt->execute();
     $stmtString = "";
     while($row = $stmt->fetch()){
         $stmtString = $row[0];
     }
    $array = preg_split("/\,/", $stmtString);
     if(!in_array($RezeptID, $array)){
         echo "<a id='favorit' href=FavoritHinzufuegen.php?id='$RezeptID'>
               <img src='https://cdn-icons-png.flaticon.com/512/324/324679.png' alt='Favorit' width='50px' height='50px'>
               </a>";
     }
     else {
         echo "<a id='favorit' href=FavoritLoeschen.php?id='$RezeptID'>
               <img src='https://cdn-icons-png.flaticon.com/512/2107/2107957.png' alt='Favorit' width='50px' height='50px'>
               </a>";
     }
 ?>
</body>
</html>