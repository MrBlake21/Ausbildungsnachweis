<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ausbildungsnachweise Exportieren</title>
    <link rel="stylesheet" href="style/styles.css">
</head>
<body>
    <div class="container">
        <h1>Ausbildungsnachweise Exportieren</h1>

        <?php
        session_start();

        if (!isset($_SESSION['azubi_id'])) {
            header("Location: index.php");
            exit();
        }

        include('db.php');

        $azubi_id = $_SESSION['azubi_id'];
        $azubi_info = $conn->query("SELECT * FROM azubis WHERE id='$azubi_id'")->fetch_assoc();
        ?>

        <form action="download_entries.php" method="post">
            <div class="form-group">
                <label for="dates">Wähle die Einträge aus, die du exportieren möchtest:</label><br>
                <?php
                $entries_result = $conn->query("SELECT * FROM eintraege WHERE azubi_id='$azubi_id'");
                while ($row = $entries_result->fetch_assoc()) {
                    echo "<input type='checkbox' name='entries[]' value='" . $row['id'] . "'>" . $row['datum'] . "<br>";
                }
                ?>
            </div>
            
            <button type="submit" class="btn btn-primary" name="export">Exportieren</button>
        </form>

        <br>
        <a href="dashboard.php" class="btn btn-secondary">Zurück zum Dashboard</a>
    </div>
</body>
</html>
