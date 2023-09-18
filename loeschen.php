<?php
session_start();

if (!isset($_SESSION['azubi_id'])) {
    header("Location: index.php");
    exit();
}

include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM eintraege WHERE id='$id'";
    $conn->query($sql);
}

$conn->close();
header("Location: dashboard.php");
?>
