<?php
$dbh = new PDO("mysql:host=database-1.cn1qejqxue78.eu-central-1.rds.amazonaws.com;dbname=FindYourRecipe","admin","RI7lnd2VfajM");
$ID = $_GET['id'];
$stmt = $dbh->prepare("Select * From Rezept where RezeptID = ?");
$stmt->bindParam(1,$ID);
$stmt->execute();
$row = $stmt->fetch();
?>

<!-- Required meta tags -->

<!DOCTYPE html>
<html>
<head>
    <title> Rezept </title>

    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        #rezeptbild
        {
            opacity: 0.5;
        }

        #rezeptname
        {
            font-size: 45px;
            font-weight: bold;
        }

        #einrücken
        {
            margin-left: 40%;
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
        }

        .rezepttext
        {
            font-size: 18px;
            margin-left: 30px;
        }
    </style>
</head>
<body>
<!-- JS Datei für NavBar -->
<script  src="NavBar.php" > </script>

<div id="einrücken">
    <!-- Rezeptname -->
    <p id="rezeptname">
        <?php
        echo  $row['Name']
        ?>
    </p>

    <!-- Rezeptbild -->
    <?php
    echo "<embed src ='data:".$row['Bildtyp'].";base64,".base64_encode($row['Bilddata'])."'/>";
    ?>
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

<a id="favorit">
    <img src="https://cdn-icons-png.flaticon.com/512/324/324679.png" alt="Favorit" width="50px" height="50px">
</a>
</body>
</html>