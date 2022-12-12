<?php
session_set_cookie_params(1000000000);
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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

        .überschrift1
        {
            margin: 20px;
            margin-left: 50px;
            font-size: 50px;
            font-weight: bold;
            box-shadow: 0 4px 8px 0 rgba(0, 150, 255, 0.2), 0 6px 20px 0 rgba(0, 150, 255, 0.19) ;
        }
        img {
            width: 100%;
        }

        .bild{
            object-fit: cover;

        }
        .rahmen{
            border: 10px solid rgb(177, 234, 255);
            box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-image: linear-gradient(to right, rgb(177, 234, 255), rgb(156, 206, 241)) 1;

        }
    </style>
</head>
<body>

<!-- JS Datei für NavBar -->
<script  src="NavBar.php" > </script>
<?php
$rezeptname = $_POST['search'];
$dbh = new PDO('mysql:host=34.65.206.124;dbname=FindYourRecipe',"root","RI7lnd2VfajM");
$stmt = $dbh->prepare("Select * from Rezept WHERE Name LIKE '%$rezeptname%'");
$stmt->execute();
while ($row = $stmt->fetch()){

    echo "<li><a target='_blank' href='RezeptSeite.php?id=".$row['RezeptID']."'>".$row['Bildname']."'".$row['RezeptID']."</a><br/>";
    echo " <img  src=uploads/".$row["Bildname"]."  style='height:150px;width:150px;' >";
}
?>

</body>
</html>