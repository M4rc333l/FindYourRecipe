
<?php
$lifetime=600;
session_set_cookie_params($lifetime);
session_start();
$dbhost = "34.65.206.124";
$dbuser = "root";
$dbpass = "RI7lnd2VfajM";
$db = "FindYourRecipe";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
if (isset($_POST["username"])) {
    $benutzername = $_POST["username"];
    $passwort = $_POST["password"];
    $sql = "SELECT Name, Passwort FROM User WHERE Name='$benutzername'";
    $result = $conn->query($sql);    if ($result->num_rows > 0) {
        echo "Dieser Benutzername existiert bereits";
    }
    else {
        $sql2 = "INSERT INTO User (Name, Passwort) VALUES ('$benutzername', '$passwort')";
        if ($conn->query($sql2) === TRUE) {
            echo "Benutzerkonto erfolgreich angelegt";
            header("Location: HomeSeite.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
if (isset($_POST["username2"])) {
    $benutzername = $_POST["username2"];
    $passwort = $_POST["password2"];
    $sql = "SELECT * FROM User WHERE Name='$benutzername' AND Passwort='$passwort'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "Du hast dich erfolgreich angemeldet " . $row["Name"]. "!". "<br>";
            $_SESSION['id'] = $row['UserID'];
            header("Location: HomeSeite.php");
        }
    } else {
        echo "Fehler bei der Anmeldung";
    }
}
$conn->close();
