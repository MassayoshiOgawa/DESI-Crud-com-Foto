<?php
    include '../includes/db_connect.php';
    include '../src/User.php';
    include '../src/Auth.php';
    session_start();

    if(!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    $user = new User($conn);
    $currentUser = $user -> getUserById($_SESSION['user_id']);

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_FILE["foto_perfil"])){
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES['foto_perfil']['name']);
        $uploadOk = 1;
        $check = $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    }

    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "The file is not an image.";
        $uploadOk = 0;
    }

    if($_FILE['foto_perfil']['size'] > 500000) {
        echo "The image need to have a lower quality";
        $uploadOk = 0;
    }

    if($imageFileType !== "jpg" && $imageFileType !=="png" && $imageFileType !== "jpeg") {
        echo "Sorry, we only accept jpg, png and jpeg.";
        $uploadOk = 0;
    }

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

    <form action="upload_foto.php" method="POST" enctype="multipart/form-data">
        <h2>Upload Photo</h2>
        <input type="file" name="foto_perfil">
        <input type="submit">
        <br>
        <a href="index.php">Home</a>
    </form>
</body>
</html>