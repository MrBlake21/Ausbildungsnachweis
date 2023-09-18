<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchLehrjahr = $_POST['searchLehrjahr'];

    $sql = "SELECT * FROM eintraege WHERE lehrjahr='$searchLehrjahr'";
    $result = $conn->query($sql);

    // Rest bleibt gleich
}
?>
