<?php
    include '../includes/db_connect.php';
    include '../src/User.php';
    include '../src/Auth.php';
    session_start();
    $auth = new Auth();
    $user = new User($conn);

    if(!$auth->isLoggedIn()) {
        header("Location: login.php");
        exit();
    }

    $currentUser = $user-> getUserById($_SESSION['user_id'])
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <title>DashBoard</title>
</head>
<body>
    <header>
        <h1>DashBoard</h1>
    </header>
        <div>
            <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
            <br><br>
            <img src="" alt="">
            <br>
            <div>
                <br>
                <a href="upload_foto.php">Change profile picture</a>
                <br>
                <a href="logout.php">Log Out</a>
                <br>
                <a href="index.php">Home</a>
            </div>
        </div>
</body>
</html>