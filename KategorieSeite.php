<!DOCTYPE html>
<html>
<head>
    <title> Kategorien </title>

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
        #überschrift
        {
            font-size: 50px;
            font-weight: bold;
            margin: 50px;
            box-shadow: 0 4px 8px 0 rgba(0, 150, 255, 0.2), 0 6px 20px 0 rgba(0, 150, 255, 0.19);
            background-color: white;
        }
        #suchen
        {
            margin-left: 40%;
        }
        label
        {
            font-size: 25px;
        }
        fieldset
        {
            border: 5px solid rgb(177, 234, 255, 0.5);
            background-color: white;
            margin-left: 15%;
            margin-right: 15%;
            margin-top: 7%;
        }
        ul
        {
            list-style: none;
        }
        #links
        {
            padding-left: 20%;
        }
        #rechts
        {
            padding-left: 30%;
        }
        #suchleiste
        {
            padding-left: 36.5%;
            padding-top: 2%;
        }
    </style>
</head>
<body>
<!-- JS Datei für NavBar -->
<script  src="NavBar.php" > </script>
<script src = "Kategorien.js"> </script>

<p id="überschrift"> Kategorien </p>

<!-- Checkboxen für Kategorien -->
<form method="post" action="KategorieSuchen.php">
    <fieldset>
        <ul>
            <li>
                <div class="form-inline my-2 my-lg-0" id="suchleiste">
                    <input class="form-control mr-sm-2" type="search" placeholder="Pizza, Burger, ..." aria-label="Search" name="suchemich" id="suchemich">
                </div>
            </li>
            <li style="float: left;" id="links">
                <input type="checkbox" id="firstCheckbox" name="Vegan" value="Vegan" onchange="buttonReady(null,'suchen')">
                <label for="firstCheckbox"> Vegan </label>

                <br>

                <input type="checkbox" id="secondCheckbox" name="Vegetarisch" value="Vegetarisch" onchange="buttonReady(null,'suchen')">
                <label for="secondCheckbox"> Vegetarisch </label>

                <br>

                <input type="checkbox" id="thirdCheckbox" name="Fisch" value="Fisch" onchange="buttonReady(null,'suchen')">
                <label for="thirdCheckbox"> Fisch </label>
            </li>
            <li style="float: left;" id="rechts">
                <input type="checkbox" id="fourthCheckbox" name="Fleisch" value="Fleisch" onchange="buttonReady(null,'suchen')">
                <label for="fourthCheckbox"> Fleisch </label>

                <br>

                <input type="checkbox" id="fifthCheckbox" name="Glutenfrei" value="Glutenfrei" onchange="buttonReady(null,'suchen')">
                <label for="fifthCheckbox"> Glutenfrei </label>

                <br>

                <input type="checkbox" id="sixthCheckbox" name="Kalorienarm" value="Kalorienarm" onchange="buttonReady(null,'suchen')">
                <label for="sixthCheckbox"> Kalorienarm </label>
            </li>
            <li>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="suchen" id="suchen"> Suchen </button>
            </li>
        </ul>
    </fieldset>
</form>
<script>document.querySelector('#suchen').disabled = true;</script>
</body>
</html>