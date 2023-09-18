<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vorname = $_POST['vorname'];
    $nachname = $_POST['nachname'];
    $benutzername = $_POST['benutzername'];
    $passwort = password_hash($_POST['passwort'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO azubis (vorname, nachname, benutzername, passwort) VALUES ('$vorname', '$nachname', '$benutzername', '$passwort')";
    $conn->query($sql);
    $conn->close();
    header("Location: index.php");
} else {
    header("Location: index.php");
}
?>
