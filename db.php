<?php
$servername = "localhost";
$username = "server"; // Dein MySQL-Benutzername
$password = "v3^4wP4q1"; // Dein MySQL-Passwort
$dbname = "ausbildungsnachweise"; // Der Name deiner Datenbank

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
