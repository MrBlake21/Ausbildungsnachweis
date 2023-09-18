<?php
session_start();

if (!isset($_SESSION['azubi_id'])) {
    header("Location: index.php");
    exit();
}

include('db.php');

$azubi_id = $_SESSION['azubi_id'];

$sort = isset($_GET['sort']) ? $_GET['sort'] : 'datum';
if ($sort === 'datum') {
    $sort_sql = 'datum ASC';
} elseif ($sort === 'nachweis') {
    $sort_sql = 'nachweis ASC';
} else {
    $sort_sql = 'datum ASC';
}

$sql = "SELECT * FROM eintraege WHERE azubi_id='$azubi_id' ORDER BY $sort_sql";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style/styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Dashboard</h1>
        </header>

        <section class="entry-form">
            <h2>Eintrag erstellen</h2>
            <form action="speichern.php" method="post">
                <label for="lehrjahr">Lehrjahr:</label>
                <select id="lehrjahr" name="lehrjahr" required>
                    <option value="1">1. Lehrjahr</option>
                    <option value="2">2. Lehrjahr</option>
                    <option value="3">3. Lehrjahr</option>
                </select><br>

                <label for="datum">Datum:</label>
                <input type="date" id="datum" name="datum" required><br>

                <label for="nachweis">Ausbildungsnachweis:</label><br>
                <textarea id="nachweis" name="nachweis" rows="5" cols="40" required></textarea><br>

                <input type="submit" value="Speichern">
            </form>
        </section>

        <section class="entry-list">
            <h2>Gespeicherte Einträge</h2>
            <div class="sort-options">
    			<span>Sortieren nach:</span>
    			<a href="dashboard.php?sort=datum">Datum</a> |
    			<a href="dashboard.php?sort=nachweis">Nachweis</a>
			</div>
            <table>
                <tr>
                    <th>Lehrjahr</th>
                    <th>Datum</th>
                    <th>Nachweis</th>
                    <th>Bearbeiten</th>
                    <th>Löschen</th>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['lehrjahr'] . "</td>
                                <td>" . $row['datum'] . "</td>
                                <td>" . $row['nachweis'] . "</td>
                                <td><a href='bearbeiten.php?id=" . $row['id'] . "'>Bearbeiten</a></td>
                                <td><a href='loeschen.php?id=" . $row['id'] . "'>Löschen</a></td>
                            </tr>";
                    }
                } else {
                    echo '<tr><td colspan="5">Noch keine Einträge vorhanden.</td></tr>';
                }
                ?>
            </table>
        </section>

        <section class="dashboard-links">
            <a href="ausloggen.php">Ausloggen</a>
            <a href="export.php">Exportieren</a> <!-- Hier hinzugefügt -->
        </section>
    </div>
</section>
</body>
</html>
