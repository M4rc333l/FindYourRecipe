<!-- Required meta tagss -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Test -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Rezept erstellen</title>
</head>
<body>
<?php
 $dbh = new PDO("mysql:host=database-1.cn1qejqxue78.eu-central-1.rds.amazonaws.com;dbname=FindYourRecipe","admin","RI7lnd2VfajM");
 if(isset($_POST['test'])){
     $data = null;
     $data = file_get_contents($_FILES['bild']['tmp_name']);
     $zubereitung = $_POST['beschreibung'];
     $rezeptname = $_POST['rezeptname'];
     $name = $_FILES['bild']['name'];
     $nametyp = $_FILES['bild']['type'];
     echo $name;
     $stmt = $dbh->prepare("insert into Rezept values ('',2,?,'','',?,?,'',?,?)");
     $stmt->bindParam(1,$name);
     $stmt->bindParam(2,$zubereitung);
     $stmt->bindParam(3,$rezeptname);
     $stmt->bindParam(4,$nametyp);
     $stmt->bindParam(5,$data);
     $stmt->execute();

 }
?>
<!-- JS Datei für NavBar -->
<script  src="NavBar.js" > </script>
<form method="post" enctype="multipart/form-data">
    <label for="rezeptname">Rezeptname</label>
    <input type="text" class="form-control" id="rezeptname" placeholder="Rezeptname" name="rezeptname">
    </div>
    <div class="form-group">
        <label for="beschreibung">Passwort</label>
        <input type="text" class="form-control" id="beschreibung" placeholder="Beschreibung" name="beschreibung">
        <input type="file" id="bild" name="bild">
    </div>
    <button type="submit" class="btn btn-primary" name="test"></button>
</form>

<?php
 $stmt = $dbh->prepare("Select * From Rezept");
 $stmt->execute();
 while ($row = $stmt->fetch()){
     echo "<li>a target='_blank' href=view.php?id=".$row['RezeptID']."'>".$row['Name']."</a></li>";
 }
?>
</body>
</html>