<?php
session_start();
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $azubi_id = $_SESSION['azubi_id']; 
    $lehrjahr = $_POST['lehrjahr'];
    $datum = $_POST['datum'];
    $nachweis = $_POST['nachweis'];

    $sql = "INSERT INTO eintraege (azubi_id, lehrjahr, datum, nachweis) VALUES ('$azubi_id', '$lehrjahr', '$datum', '$nachweis')";
    $conn->query($sql);
    $conn->close();
    header("Location: dashboard.php");
} else {
    header("Location: index.php");
}
?>
