<?php
$servername = "DeinHost";
$username = "DeinDBUser"; // Dein MySQL-Benutzername
$password = "DeinDBPasswort"; // Dein MySQL-Passwort
$dbname = "DeineDB"; // Der Name deiner Datenbank

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
