<?php
    include '../includes/db_connect.php';
    include '../src/User.php';
    include '../src/Auth.php';

    session_start();

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $user = new User($conn);
        $auth = new Auth();
        $loggedInUser = $user -> login($_POST['email'], $_POST['senha']);
        if($loggedInUser) {
            $auth -> loginUser($loggedInUser);
            header("Location: index.php");
        } else {
            echo 'Failed to log in.';
        }
    }

?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Login</title>
</head>
<body>
    <header>
        <h1>Login</h1>
    </header>
    <form action="login.php" method="POST">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="senha" placeholder="Password">
        <input type="submit" value="Submit">
    </form>
</body>
</html>