<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie do Banku</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; }
        .login-container { width: 300px; padding: 20px; background-color: white; margin: 100px auto; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        input[type="text"], input[type="password"], input[type="email"] { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        input[type="submit"] { width: 100%; padding: 10px; border: none; border-radius: 5px; background-color: #007bff; color: white; cursor: pointer; }
        input[type="submit"]:hover { background-color: #0056b3; }
        h2 { text-align: center; color: #333; }
        .logo { text-align: center; margin-bottom: 20px; }
        .logo h1 { font-size: 24px; color: #007bff; }
    </style>
</head>
<body>

<div class="login-container">
    <div class="logo">
        <h1>RealBanking</h1>
    </div>
    <h2>Logowanie do Banku</h2>
    <form action="login.php" method="post">
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="password" name="password" placeholder="Hasło" required>
        <input type="submit" value="Zaloguj">
    </form>
</div>

</body>
</html>
