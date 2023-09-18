<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $benutzername = $_POST['benutzername'];
    $passwort = $_POST['passwort'];

    $sql = "SELECT * FROM azubis WHERE benutzername='$benutzername'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($passwort, $row['passwort'])) {
            session_start();
            $_SESSION['azubi_id'] = $row['id'];
            $_SESSION['azubi_benutzername'] = $row['benutzername'];
            header("Location: dashboard.php");
        } else {
            echo "Falsches Passwort.";
        }
    } else {
        echo "Benutzer nicht gefunden.";
    }

    $conn->close();
}
?>
