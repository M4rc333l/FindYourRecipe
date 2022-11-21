<!-- Required meta tagss -->

<!doctype html>
<html>
<head>
    <title> FindYourRecipe - Home </title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- Flexboxen -->
    <style>
        .flex-rezeptvorschlaege
        {
            display: inline-flex;
        }

        .bild, .bild:hover
        {
            margin:50px;
            max-width: 100%;
            height: auto;
            color: black;
            opacity: 0.5;
        }

        .rezepttext
        {
            font-size: 20px;
            font-weight: bold;
        }

        .überschrift1
        {
            margin: 20px;
            margin-left: 50px;
            font-size: 50px;
            font-weight: bold;
        }
        img {
            width: 100%;
        }
    </style>
</head>
<body>

<!-- JS Datei für NavBar -->
<script  src="NavBar.js" > </script>

<!-- Flexbox - Rezeptvorschläge -->
<p class="überschrift1"> Rezeptvorschläge </p>

<div class="flex-rezeptvorschlaege">
    <a class="bild" href="RezeptSeite.html">
        <img src="https://cdn.discordapp.com/attachments/1023935776163119175/1034068564040241202/unknown.png" alt="Rezeptbild"  title="Rezeptbild">
        <source srcset="https://cdn.discordapp.com/attachments/1023935776163119175/1034068564040241202/unknown.png" media="(max-width: 1500px)">
        <p class="rezepttext"> Rezept 1 </p>
    </a>

    <a class="bild" href="RezeptSeite.html">
        <img src="https://cdn.discordapp.com/attachments/1023935776163119175/1034068564040241202/unknown.png" alt="Rezeptbild" title="Rezeptbild"  >
        <source srcset="https://cdn.discordapp.com/attachments/1023935776163119175/1034068564040241202/unknown.png" media="(max-width: 1500px)">
        <p class="rezepttext"> Rezept 2 </p>
    </a>
</div>

<!-- Flexbox - Die beliebtesten Rezepte -->
<p class="überschrift1"> Die beliebtesten Rezepte </p>

<div class="flex-rezeptvorschlaege">
    <a class="bild" href="RezeptSeite.html">
        <img src="https://cdn.discordapp.com/attachments/1023935776163119175/1034068564040241202/unknown.png" alt="Rezeptbild"  title="Rezeptbild">
        <p class="rezepttext"> Rezept 1 </p>
    </a>

    <a class="bild" href="RezeptSeite.html">
        <img src="https://cdn.discordapp.com/attachments/1023935776163119175/1034068564040241202/unknown.png" alt="Rezeptbild" title="Rezeptbild">
        <p class="rezepttext"> Rezept 2 </p>
    </a>

    <a class="bild" href="RezeptSeite.html">
        <img src="https://cdn.discordapp.com/attachments/1023935776163119175/1034068564040241202/unknown.png" alt="Rezeptbild" title="Rezeptbild">
        <p class="rezepttext"> Rezept 3 </p>
    </a>
</div>
</body>
</html>