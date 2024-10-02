<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $_SESSION['username'] = $username;
    $_SESSION['hashedPassword'] = $hashedPassword;
}

if (isset($_POST['logout'])) {

    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']); 
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
    <?php if (!isset($_SESSION['username'])): ?>
            <h1>Login UWU</h1>

            <form method="POST" action="">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br><br>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br><br>

                <input type="submit" name="submit" value="LOGIN">
            </form>
        <?php else: ?>
            <h1>User Data:</h1>
            <p><strong>Username:</strong> <?= $_SESSION['username'] ?></p>
            <p><strong>Hashed Password:</strong> <?= $_SESSION['hashedPassword'] ?></p>
            
            <form method="POST" action="">
                <input type="submit" name="logout" value="LOGOUT">
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
