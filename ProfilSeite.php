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

    <style>
        body
        {
            background: url("https://cdn.discordapp.com/attachments/1023935776163119175/1051851552056414228/Hintergrund_Fuenf_Prozent.png");
        }
        .flexbox
        {
            display: flex;
            flex-direction: row;
        }
        .button
        {
            max-height: 100%;
            max-width: 60%;
            width: auto;
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
            border: 5px solid rgb(177, 234, 255, 0.5);
            background-color: white;
            margin-left: 15%;
            margin-right: 15%;
            margin-top: 10%;
            padding-left: 6%;
            padding-top: 1%;
        }
        a, a :hover, a:visited
        {
            font-size: 18px;
            font-weight: bold;
            color: black;
            text-decoration: underline;
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
    <!-- Profil - Flexbox  -->
    <div class="flexbox">
        <!-- Rezept erstellen -->
        <a href="RezeptErstellen.html">
            <img class="button" src="https://cdn.discordapp.com/attachments/1023935776163119175/1059480367352008747/ja4.png" alt="Rezept hinzufügen"  title="Rezept hinzufügen">
            <p>Rezept erstellen</p>
        </a>
        <!-- Rezept bearbeiten -->
        <a href="RezeptBearbeiten.php">
            <img class="button" src="https://cdn.discordapp.com/attachments/1023935776163119175/1059479846683693148/ja2.png" alt="Rezept bearbeiten" title="Rezept bearbeiten">
            <p>Rezept bearbeiten</p>
        </a>
        <!-- Favoriten -->
        <a href="Favoriten.php">
            <img class="button" src="https://cdn.discordapp.com/attachments/900294647514017862/1054126759244734564/Favorit_-_ausgemalt.png" alt="Favoriten"  title="Favoriten">
            <p>Favoriten-Liste</p>
        </a>
        <!-- Abmelden -->
        <a href="SignOut.php">
            <img class="button" src="https://cdn.discordapp.com/attachments/1023935776163119175/1059481613798494268/ja6.png" alt="Abmelden" title="Abmelden">
            <p>Abmelden</p>
        </a>
    </div>
</div>
</body>
</html>