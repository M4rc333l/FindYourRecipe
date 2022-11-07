<?php
$dbhost = "database-1.cn1qejqxue78.eu-central-1.rds.amazonaws.com";
$dbuser = "admin";
$dbpass = "RI7lnd2VfajM";
$db = "FindYourRecipe";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
if (isset($_POST["username"])) {
    $benutzername = $_POST["username"];
    $passwort = $_POST["password"];
    $sql = "SELECT Name, Passwort FROM User WHERE Name='$benutzername' AND Passwort='$passwort'";
    $result = $conn->query($sql);    if ($result->num_rows > 0) {
        echo "Dieser Benutzername existiert bereits";
    }
    else {
        $sql2 = "INSERT INTO User (Name, Passwort) VALUES ('$benutzername', '$passwort')";
        if ($conn->query($sql2) === TRUE) {
            echo "Benutzerkonto erfolgreich angelegt";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
if (isset($_POST["username2"])) {
    $benutzername = $_POST["username2"];
    $passwort = $_POST["password2"];
    $sql = "SELECT Name, Passwort FROM User WHERE Name='$benutzername' AND Passwort='$passwort'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "Du hast dich erfolgreich angemeldet " . $row["Name"]. "!". "<br>";
        }
    } else {
        echo "Fehler bei der Anmeldung";
    }
}
$conn->close();
