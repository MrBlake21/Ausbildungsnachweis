<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $datum = $_POST['datum'];
    $nachweis = $_POST['nachweis'];

    $sql = "UPDATE eintraege SET datum='$datum', nachweis='$nachweis' WHERE id='$id'";
    $conn->query($sql);
    $conn->close();
    header("Location: index.php");
} else {
    header("Location: index.php");
}
?>
