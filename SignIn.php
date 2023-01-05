<?php
$lifetime=1000000000;
session_set_cookie_params($lifetime);
session_start();
$dbhost = "34.89.179.34";
$dbuser = "root";
$dbpass = "nT0~dY&jhe%6>|BX";
$db = "findyourrecipe";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
if (isset($_POST["username"])) {
    $benutzername = $_POST["username"];
    $passwort = $_POST["password"];
    $sql = "SELECT Name, Passwort FROM User WHERE Name='$benutzername'";
    $result = $conn->query($sql);    if ($result->num_rows > 0) {
        echo '<script type="text/javascript">
        alert("Dieser Benutzername existiert bereits");
        window.location = "RegistrierSeite.php";
        </script>';
    }
    else {
        $sql2 = "INSERT INTO User (Name, Passwort) VALUES ('$benutzername', '$passwort')";
        if ($conn->query($sql2) === TRUE) {
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
            $_SESSION['id'] = $row['UserID'];
            $_SESSION['name'] = $row['Name'];
            header("Location: HomeSeite.php");
        }
    } else {
        echo '<script type="text/javascript">
        alert("Fehler bei der Anmeldung");
        window.location = "HomeSeite.php";
        </script>';
    }
}
$conn->close();