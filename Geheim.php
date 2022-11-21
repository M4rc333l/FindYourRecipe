<?php

$lifetime = 10000000000;
session_set_cookie_params($lifetime);
session_start();
if (!isset($_SESSION['id'])) {
    die('Bitte zuerst <a href="HomeSeite.html">einloggen</a>');
}

//Abfrage der Nutzer ID vom Login
$id = $_SESSION['id'];


