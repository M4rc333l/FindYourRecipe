<!DOCTYPE html>
<html>
<head>
    <title> Rezept bearbeiten </title>

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
        .bild
        {
            object-fit: cover;
        }
        .rahmen
        {
            border: 10px solid rgb(177, 234, 255);
            box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-image: linear-gradient(to right, rgb(177, 234, 255), rgb(156, 206, 241)) 1;
            width: 100%;
            height: 300px;
        }
        #delete, #update
        {
            font-size: 18px;
            font-weight: bold;
            padding: 1%;
            border: 5px solid rgb(177, 234, 255, 0.5);
            background-color: white;
            color: black;
            text-decoration: underline;
        }
        #update
        {
            position: absolute;
            margin-left: 65%;
            margin-top: -18%;
        }
        #delete
        {
            position: absolute;
            margin-left: 45%;
            margin-top: -18%;
        }
    </style>
</head>
<body>
<!-- JS Datei für NavBar -->
<script  src="NavBar.php"> </script>
<?php
    session_start();
    $dbh = new PDO('mysql:host=34.89.179.34;dbname=findyourrecipe',"root","nT0~dY&jhe%6>|BX");
    $UserID = $_SESSION['id'];
    $stmt = $dbh->prepare("Select * from Rezept as R Where R.Rezept_User_ID =  '$UserID'");
    $stmt->execute();
    $stmtString = "";
    while($row = $stmt->fetch()){
        $stmtString = $row[0];
        echo  "<div class='flex-rezeptvorschlaege'>
            <a class='bild' href='RezeptSeite.php?id=".$row['RezeptID']."'>
                <img class='rahmen'  src='uploads/".$row['Bildname']."?width=662&height=662' alt='Rezeptbild'  title='Rezeptbild'>
                <p class='rezepttext'> ".$row['Rezeptname']."  </p>
            </a>
        </div>";
        echo "<br>";
        echo "<a id='delete' href='RezeptLoeschen.php?id=".$row['RezeptID']."'> Rezept löschen </a>";
        echo "<a id='update' href='RezeptUpdate.php?id=".$row['RezeptID']."'> Rezept bearbeiten </a>";
        echo "<br>";
    }
    if(strlen($stmtString)==0){
        echo "Sie haben noch keine Rezepte erstellt!";
    }
?>
</body>
</html>