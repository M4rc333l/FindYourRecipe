<!-- Required meta tagss -->
<?php
session_set_cookie_params(1000000000);
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

    <!-- Flexboxen -->
    <style>
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
        echo $_SESSION['id'];
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
        <a href="RezeptLöschen.php">
            <img class="bild2" src="https://cdn.discordapp.com/attachments/1023935776163119175/1034091190917804052/unknown.png" alt="Rezept löschen" title="Rezept löschen" width="50px" height="50px" >
        </a>
    </div>

    <!-- Profil - Flexbox 2 -->
    <div class="flexbox2">
        <!-- Favoriten -->
        <a href="Favoriten.php">
            <img class="bild2" src="https://cdn.discordapp.com/attachments/1023935776163119175/1034093652483510282/unknown.png" alt="Favoriten"  title="Favoriten" >
        </a>
        <!-- Abmelden -->
        <a href="#">
            <img class="bild2" src="https://cdn.discordapp.com/attachments/1023935776163119175/1034093822227005491/unknown.png" alt="Abmelden" title="Abmelden" >
        </a>
    </div>
</div>
</body>
</html>
