<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sortLehrjahr = $_POST['sortLehrjahr'];

    $sql = "SELECT * FROM eintraege WHERE lehrjahr='$sortLehrjahr' ORDER BY datum ASC";
    $result = $conn->query($sql);

    // Rest bleibt gleich
}
?>
