
<?php
$dbh = new PDO("mysql:host=database-1.cn1qejqxue78.eu-central-1.rds.amazonaws.com;dbname=FindYourRecipe","admin","RI7lnd2VfajM");
$ID = $_GET['id'];
echo $ID;
$stmt = $dbh->prepare("Select * From Rezept where RezeptID = ?");
$stmt->bindParam(1,$ID);
$stmt->execute();
$row = $stmt->fetch();
echo "<li><a target='_blank' href='view.php?id=".$row['RezeptID']."'>".$row['Bildname']."'".$row['RezeptID']."</a><br/>
         <embed src='data:".$row['Bildtyp'].";base64,".base64_encode($row['Bilddata'])."'width='200'/></li>";
?>

