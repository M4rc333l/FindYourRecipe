<!-- Required meta tags -->

<!DOCTYPE html>
<html>
<head>
    <title> Rezept bearbeiten </title>

    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<!-- JS Datei für NavBar -->
<script  src="NavBar.php" > </script>
<?php
    session_set_cookie_params(1000000000);
    session_start();
    $dbh = new PDO('mysql:host=34.65.206.124;dbname=FindYourRecipe',"root","RI7lnd2VfajM");
    $id = $_SESSION['id'];
    $stmt = $dbh->prepare("Select * from Rezept as R
        Where R.Rezept_User_ID =  '$id'");
    $stmt->execute();
    while ($row = $stmt->fetch()){
        echo "<li><a target='_blank' href='RezeptSeite.php?id=".$row['RezeptID']."'>".$row['Bildname']."'".$row['RezeptID']."</a><br/>";
        echo "<img src=uploads/".$row["Bildname"].">";
     //   $_SESSION['rezept_id'] = $row['RezeptID'];
        echo "<a id='delete' target='_blank' href='RezeptLoeschen.php?id=".$row['RezeptID']."'>Rezept löschen</a></li>";
        echo "<a id='update' target='_blank' href='RezeptUpdate.php?id=".$row['RezeptID']."'>Rezept bearbeiten</a></li>";
    }
?>
</body>
</html>