<?php
session_start();
?>
<!doctype html>
<html>
<head>
    <title> FindYourRecipe - Home </title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

    <!-- Flexboxen -->
    <style>
        body {
            background: url("https://cdn.discordapp.com/attachments/1023935776163119175/1049339294029971577/hintergrundi.png");
        }
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
        }
        .rezepttext
        {
            font-size: 20px;
            font-weight: bold;
        }
        img {
            width: 100%;
        }
        .bild{
            object-fit: cover;
        }
    </style>
</head>
<body>

<!-- JS Datei für NavBar -->
<script  src="NavBar.php" > </script>
<?php
$rezeptname = $_POST['search'];
$dbh = new PDO('mysql:host=34.89.179.34;dbname=findyourrecipe',"root","nT0~dY&jhe%6>|BX");
$stmt = $dbh->prepare("Select * from Rezept WHERE Rezeptname LIKE '%$rezeptname%'");
$stmt->execute();
while ($row = $stmt->fetch()){

    echo  "<div class='flex-rezeptvorschlaege'>
            <a class='bild' href='RezeptSeite.php?id=".$row['RezeptID']."'>
                <img class='rahmen'  src='uploads/".$row['Bildname']."?width=662&height=662' alt='Rezeptbild'  title='Rezeptbild'>
                <source srcset='https://cdn.discordapp.com/attachments/1023935776163119175/1034068564040241202/unknown.png' media='(max-width: 1500px'>
                <p class='rezepttext'> ".$row['Name']."  </p>
            </a>
        </div>";
}
?>
</body>
</html>