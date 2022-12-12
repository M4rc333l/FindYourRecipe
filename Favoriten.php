<!-- Required meta tags -->

<!DOCTYPE html>
<html>
<head>
    <title> Favoriten </title>

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
    session_start();
    $dbh = new PDO('mysql:host=34.65.206.124;dbname=FindYourRecipe',"root","RI7lnd2VfajM");
    $id = $_SESSION['id'];
    $stmt = $dbh->prepare("SELECT User.FavoritenRezepte FROM User WHERE UserID='$id'");
    $stmt->execute();
    $stmt2 = $dbh->prepare("SELECT RezeptID From Rezept");
    $stmt2->execute();
    $stmtString = "";
    while($row = $stmt->fetch()){
        $stmtString = $row[0];
    }
    $array = preg_split("/\,/", $stmtString);
    for($i=0;$i<count($array);$i++){
        $stmt2 = $dbh->prepare("SELECT * FROM Rezept Where RezeptID = '$array[$i]';");
        $stmt2->execute();
        while ($row = $stmt2->fetch()) {
            echo "<li><a target='_blank' href='RezeptSeite.php?id=" . $row['RezeptID'] . "'>" . $row['Bildname'] . "'" . $row['RezeptID'] . "</a><br/>";
            echo " <img  src=uploads/" . $row["Bildname"] . "  style='height:150px;width:150px;' >";
        }
    }
?>
</body>
</html>