<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Index</title>
</head>
<body>
    <header>
        <h1>Aula Expositiva</h1>
    </header>

    <div class="container">
    <?php if (isset($_SESSION['user_id'])): ?>
        <p>Hello, <?php echo htmlspecialchars($_SESSION['username']); ?></p>
        <p>You're logged in</p>
        <a href="dashboard.php">Access Dashboard</a>
        <a href="logout.php">Log Out</a>
    <?php else: ?>
        <h1>Welcome to CRUD with Photo</h1>
        <p><a href="login.php">Login</a> or <a href="register.php">Register</a></p>
    <?php endif; ?>
    </div>
</body>
</html>