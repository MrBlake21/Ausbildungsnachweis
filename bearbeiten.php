<?php
session_start();

if (!isset($_SESSION['azubi_id'])) {
    header("Location: index.php");
    exit();
}

include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $lehrjahr = $_POST['lehrjahr'];
    $datum = $_POST['datum'];
    $nachweis = $_POST['nachweis'];

    $sql = "UPDATE eintraege SET lehrjahr='$lehrjahr', datum='$datum', nachweis='$nachweis' WHERE id='$id'";
    $conn->query($sql);
    $conn->close();
    header("Location: dashboard.php");
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM eintraege WHERE id='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
} else {
    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Bearbeiten</title>
    <link rel="stylesheet" href="style/styles.css">
</head>
<body>
    <h1>Bearbeiten</h1>

    <form action="bearbeiten.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <label for="lehrjahr">Lehrjahr:</label>
        <select id="lehrjahr" name="lehrjahr" required>
            <option value="1" <?php if ($row['lehrjahr'] == 1) echo 'selected'; ?>>1. Lehrjahr</option>
            <option value="2" <?php if ($row['lehrjahr'] == 2) echo 'selected'; ?>>2. Lehrjahr</option>
            <option value="3" <?php if ($row['lehrjahr'] == 3) echo 'selected'; ?>>3. Lehrjahr</option>
        </select><br>

        <label for="datum">Datum:</label>
        <input type="date" id="datum" name="datum" value="<?php echo $row['datum']; ?>" required><br>

        <label for="nachweis">Ausbildungsnachweis:</label><br>
        <textarea id="nachweis" name="nachweis" rows="5" cols="40" required><?php echo $row['nachweis']; ?></textarea><br>

        <input type="submit" value="Speichern">
    </form>

    <a href="dashboard.php">Zurück</a>
</body>
</html>
