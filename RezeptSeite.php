<?php
$dbh = new PDO('mysql:host=34.65.206.124;dbname=FindYourRecipe',"root","RI7lnd2VfajM");
session_set_cookie_params(10000000);
session_start();
$ID = $_GET['id'];
$stmt = $dbh->prepare("Select * From Rezept where RezeptID = ?");
$stmt->bindParam(1,$ID);
$_SESSION['RezeptID'] = $ID;
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

    <style>

        body{
            background: url("https://cdn.discordapp.com/attachments/1023935776163119175/1049339294029971577/hintergrundi.png");
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
            left: 60%;
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
        echo "<embed src ='data:".$row['Bildtyp'].";base64,".base64_encode($row['Bilddata'])."'width='100' height='100'/>";
    ?>

    <p id="rezeptname">
        <?php
        echo  $row['Name']
        ?>
    </p>

    <!-- Rezeptbild -->

    <!-- <img src="https://cdn.discordapp.com/attachments/1023935776163119175/1034068564040241202/unknown.png" alt="Rezeptbild"  title="Rezeptbild" width="300px" height="180px" id="rezeptbild"> -->

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
        echo  $row['Kategorien']
        ?>
    </p>

</div>

<a id="favorit" href="FavoritHinzufuegen.php">
    <img src="https://cdn-icons-png.flaticon.com/512/324/324679.png" alt="Favorit" width="50px" height="50px">
</a>


</body>
</html>