<!-- Required meta tagss -->

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
    <p id="rezeptname"> Rezeptname </p>

    <!-- Rezeptbild -->
    <img src="https://cdn.discordapp.com/attachments/1023935776163119175/1034068564040241202/unknown.png" alt="Rezeptbild"  title="Rezeptbild" width="300px" height="180px" id="rezeptbild">

    <!-- Dauer -->
    <p class="überschrift"> Dauer </p>
    <p class="rezepttext"> 3h </p>

    <!-- Zutaten -->
    <p class="überschrift"> Zutaten </p>
    <p class="rezepttext">
        100g Zucker <br>
        300g Mehl <br>
    </p>

    <!-- Zubereitung -->
    <p class="überschrift"> Zubereitung </p>
    <p class="rezepttext">
        1. Zucker & Mehl abwiegen. <br>
        2. Zutaten vermischen. <br>
        3. Guten Appetit! :) <br>
    </p>

    <!-- Kategorien -->
    <p class="überschrift"> Kategorien </p>
    <p class="rezepttext">
        Vegan <br>
        Vegetarisch <br>
    </p>
</div>

<a id="favorit">
    <img src="https://cdn-icons-png.flaticon.com/512/324/324679.png" alt="Favorit" width="50px" height="50px">
</a>
</body>
</html>