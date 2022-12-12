<!-- Required meta tags -->

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
        body{
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

        #kategorie1, #kategorie2, #kategorie3
        {
            margin-top: 40px;
        }

        #kategorie4, #kategorie5, #kategorie6
        {
            margin-top: 40px;
        }

        label
        {
            font-size: 25px;
        }

        #linkeSpalte
        {
            position: absolute;
            left: 35%;
            top: 45%;
        }

        #rechteSpalte
        {
            position: absolute;
            left: 55%;
            top: 45%;
        }

        #suchbutton
        {
            position: absolute;
            left: 47%;
            top: 80%;
        }
        #rahmen{
            border: 10px solid rgb(177, 234, 255);

        }
    </style>
</head>
<body>
<!-- JS Datei für NavBar -->
<script  src="NavBar.php" > </script>

<p id="überschrift"> Kategorien </p>

<div  id="rahmen">


<div id="suchen">
    <!-- Suchleiste -->
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Pizza, Burger, ..." aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> Search </button>
    </form>
</div>


<!-- Checkboxen für Kategorien -->
<form  method="post">
    <div>
        <div id="linkeSpalte">
            <input type="checkbox" id="kategorie1" name="Vegan" value="Vegan">
            <label for="kategorie1"> Vegan </label>

            <br>

            <input type="checkbox" id="kategorie2" name="Vegetarisch" value="Vegetarisch">
            <label for="kategorie2"> Vegetarisch </label>

            <br>

            <input type="checkbox" id="kategorie3" name="Fisch" value="Fisch">
            <label for="kategorie3"> Fisch </label>
        </div>

        <div id="rechteSpalte">
            <input type="checkbox" id="kategorie4" name="Fleisch" value="Fleisch">
            <label for="kategorie4"> Fleisch </label>

            <br>

            <input type="checkbox" id="kategorie5" name="Glutenfrei" value="Glutenfrei">
            <label for="kategorie5"> Glutenfrei </label>

            <br>

            <input type="checkbox" id="kategorie6" name="Kalorienarm" value="Kalorienarm">
            <label for="kategorie6"> Kalorienarm </label>
        </div>
    </div>

    <div id="suchbutton">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="suchen" id="suchen"> Suchen </button>
    </div>


</form>
</div>
<!-- Unterer Suchbutton -->
<?php
$dbh = new PDO('mysql:host=34.65.206.124;dbname=FindYourRecipe',"root","RI7lnd2VfajM");
if(isset($_POST['suchen'])){
    if (isset($_POST['Vegetarisch'])){
        $Kategorie = $_POST['Vegetarisch'];
    }
    if (isset($_POST['Vegan'])){
        $Kategorie = $_POST['Vegan'];
    }
    if (isset($_POST['Fisch'])){
        $Kategorie = $_POST['Fisch'];
    }
    if (isset($_POST['Fleisch'])){
        $Kategorie = $_POST['Fleisch'];
    }
    if (isset($_POST['Glutenfrei'])){
        $Kategorie = $_POST['Glutenfrei'];
    }
    if (isset($_POST['Kalorienarm'])){
        $Kategorie = $_POST['Kalorienarm'];
    }
    $stmt = $dbh->prepare("Select * from Rezept as R, RezeptKategorie as RK, Kategorie as K
        Where R.RezeptID = RK.RezeptKategorie_RezeptID AND K.KategorieID = RK.RezeptKategorie_KategorieID  AND K.Name = '$Kategorie'");
    $stmt->execute();
    while ($row = $stmt->fetch()){
        echo "<li><a target='_blank' href='RezeptSeite.php?id=".$row['RezeptID']."'>".$row['Bildname']."'".$row['RezeptID']."</a><br/>
                 <embed src='data:".$row['Bildtyp'].";base64,".base64_encode($row['Bilddata'])."'width='200'/></li>";
    }
}
?>

</body>
</html>