<?php include('db.php'); ?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Ausbildungsnachweis</title>
    <link rel="stylesheet" href="style/styles.css">
</head>
<body>
    <h1>Ausbildungsnachweis</h1>

    <form action="login.php" method="post">
        <label for="benutzername">Benutzername:</label>
        <input type="text" id="benutzername" name="benutzername" required><br>

        <label for="passwort">Passwort:</label>
        <input type="password" id="passwort" name="passwort" required><br>

        <input type="submit" value="Anmelden">
    </form>

    <form action="registrieren.php" method="post">
        <label for="vorname">Vorname:</label>
        <input type="text" id="vorname" name="vorname" required><br>

        <label for="nachname">Nachname:</label>
        <input type="text" id="nachname" name="nachname" required><br>

        <label for="benutzername_reg">Benutzername:</label>
        <input type="text" id="benutzername_reg" name="benutzername" required><br>

        <label for="passwort_reg">Passwort:</label>
        <input type="password" id="passwort_reg" name="passwort" required><br>

        <input type="submit" value="Registrieren">
    </form>
</body>
</html>
