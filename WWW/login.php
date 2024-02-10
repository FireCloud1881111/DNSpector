<?php
session_start();

$host = '127.0.0.1'; 
$db_user = 'adminwww'; 
$db_password = 'Passw0rd2'; 
$db_name = 'realbanking'; 

$conn = new mysqli($host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$haslo = $_POST['password'];

$sql = "SELECT id, imie, nazwisko, email, haslo, saldo FROM uzytkownicy WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($haslo === $row['haslo']) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['imie'] = $row['imie'];
        $_SESSION['nazwisko'] = $row['nazwisko'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['saldo'] = $row['saldo'];

        header("Location: dashboard.php");
        exit();
    } else {
        echo "Niepoprawne hasło.";
    }
} else {
    echo "Nie znaleziono użytkownika o podanym adresie e-mail.";
}

$conn->close();
?>
