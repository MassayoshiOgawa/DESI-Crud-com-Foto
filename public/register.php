<?php
    include '../includes/db_connect.php';
    include '../src/User.php';
    
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $user = new User($conn);
        $user -> register($_POST['nome'], $_POST['email'], $_POST['senha']);
        header("Location: login.php");
    }
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Register</title>
</head>
<body>
    <header>
        <h1>Register</h1>
    </header>
    <form action="register.php" method="POST">
        <input type="text" name="nome" placeholder="Name">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="senha" placeholder="Password">
        <input type="submit" value="Submit">
    </form>
</body>
</html>