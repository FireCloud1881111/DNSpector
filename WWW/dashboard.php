<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; color: #333; }
        h1 { color: #007bff; }
        p { margin: 20px 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #007bff; color: #ffffff; }
        td { background-color: #ffffff; }
        .no-transactions { color: #888; margin-top: 20px; }
    </style>
</head>
<body>

<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

// Dane połączenia z bazą danych
$host = '127.0.0.1'; // Adres serwera bazy danych
$db_user = 'adminwww'; // Nazwa użytkownika bazy danych
$db_password = 'Passw0rd2'; // Hasło dostępu do bazy danych
$db_name = 'realbanking'; // Nazwa bazy danych

// Nawiązanie połączenia z bazą danych
$conn = new mysqli($host, $db_user, $db_password, $db_name);

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "<h1>Witaj, " . $_SESSION['imie'] . " " . $_SESSION['nazwisko'] . "!</h1>";
echo "<p>Twoje saldo: " . $_SESSION['saldo'] . " zł</p>";

// Pobieranie i wyświetlanie transakcji
$sql = "SELECT typ, kwota, data_transakcji FROM transakcje WHERE id_uzytkownika = ? ORDER BY data_transakcji DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<table><tr><th>Typ</th><th>Kwota</th><th>Data</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["typ"] . "</td><td>" . $row["kwota"] . " zł</td><td>" . $row["data_transakcji"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Brak transakcji.";
}

$conn->close();
?>
</body>
</html>
