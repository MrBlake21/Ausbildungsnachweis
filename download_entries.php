<?php
session_start();

if (!isset($_SESSION['azubi_id'])) {
    header("Location: index.php");
    exit();
}

include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['export'])) {
    $selected_entries = isset($_POST['entries']) ? $_POST['entries'] : [];

    if (empty($selected_entries)) {
        echo "Keine Einträge ausgewählt.";
        exit();
    }

    // Holen Sie sich die Informationen über den Azubi
    $azubi_id = $_SESSION['azubi_id'];
    $azubi_info = $conn->query("SELECT * FROM azubis WHERE id='$azubi_id'")->fetch_assoc();

    // Festlegen der Dateiendung und -name (Textdatei)
    $filename = 'exported_entries.txt';

    // Vorbereiten der Daten für die Textdatei
    $export_data = [];

    // Fügen Sie den Firmennamen, den Azubinamen und das Ausbildungsjahr hinzu
    if (!empty($azubi_info['firma'])) {
        $export_data[] = "Firma: " . $azubi_info['firma'];
    }
    if (!empty($azubi_info['name'])) {
        $export_data[] = "Azubi: " . $azubi_info['name'];
    }
    if (!empty($azubi_info['ausbildungsjahr'])) {
        $export_data[] = "Ausbildungsjahr: " . $azubi_info['ausbildungsjahr'];
    }

    foreach ($selected_entries as $entry_id) {
        $sql = "SELECT * FROM eintraege WHERE id='$entry_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $export_data[] = "Datum: " . $row['datum'];
            $export_data[] = "Tätigkeit: " . $row['nachweis'];
        }
    }

    // Speichern der Daten in der Textdatei
    file_put_contents($filename, implode("\n\n", $export_data));

    // Download der Textdatei
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . $filename);
    readfile($filename);
    unlink($filename);
    exit();
}
?>
