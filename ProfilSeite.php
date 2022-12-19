<!-- Required meta tags -->
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title> Profil </title>

    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

    <!-- Flexboxen -->
    <style>
        body{
            background: url("https://cdn.discordapp.com/attachments/1023935776163119175/1051851552056414228/Hintergrund_Fuenf_Prozent.png");
        }

        .flexbox1
        {
            display: flex;
            flex-direction: row;
        }

        .flexbox2
        {
            display: flex;
            flex-direction: row;
            margin-left: 150px;
        }

        .bild2
        {
            margin: 50px;
            margin-left: 50px;
            width: 100px;
            height: 100px;
        }

        #überschrift
        {
            font-size: 50px;
            font-weight: bold;
            margin: 50px;
            box-shadow: 0 4px 8px 0 rgba(0, 150, 255, 0.2), 0 6px 20px 0 rgba(0, 150, 255, 0.19);
            background-color: white;
        }

        #einrücken
        {
            margin-left: 30%;
        }
    </style>
</head>
<body>
<!-- JS Datei für NavBar -->
<script  src="NavBar.php" > </script>

<p id="überschrift">
    <?php
    if(isset($_SESSION['id'])){
        echo $_SESSION['name'];
    }
    ?>
</p>

<div id="einrücken">
    <!-- Profil - Flexbox 1 -->
    <div class="flexbox1">
        <!-- Rezept erstellen -->
        <a href="RezeptErstellen.html">
            <img class="bild2" src="https://cdn.discordapp.com/attachments/1023935776163119175/1034091044679196732/unknown.png" alt="Rezept hinzufügen"  title="Rezept hinzufügen" >
        </a>
        <!-- Rezept bearbeiten -->
        <a href="RezeptBearbeiten.php">
            <img class="bild2" src="https://cdn.discordapp.com/attachments/1023935776163119175/1034093377169391707/unknown.png" alt="Rezept bearbeiten" title="Rezept bearbeiten" >
        </a>
        <!-- Rezept löschen -->
        <a href="RezeptLoeschen.php">
            <img class="bild2" src="https://cdn.discordapp.com/attachments/1023935776163119175/1034091190917804052/unknown.png" alt="Rezept löschen" title="Rezept löschen" width="50px" height="50px" >
        </a>
    </div>

    <!-- Profil - Flexbox 2 -->
    <div class="flexbox2">
        <!-- Favoriten -->
        <a href="Favoriten.php">
            <img class="bild2" src="https://cdn.discordapp.com/attachments/900294647514017862/1054126759244734564/Favorit_-_ausgemalt.png" alt="Favoriten"  title="Favoriten" >
        </a>
        <!-- Abmelden -->
        <a href="SignOut.php">
            <img class="bild2" src="https://cdn.discordapp.com/attachments/1023935776163119175/1034093822227005491/unknown.png" alt="Abmelden" title="Abmelden" >
        </a>
    </div>
</div>
</body>
</html>
