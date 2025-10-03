<?php
    include '../includes/db_connect.php';
    include '../src/User.php';
    include '../src/Auth.php';
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    $user = new User($conn);
    $currentUser = $user->getUserById($_SESSION['user_id']);

    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_FILES["foto_perfil"])) {
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES['foto_perfil']['name']);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["foto_perfil"]["tmp_name"]);
        if ($check === false) {
            echo "O arquivo não é uma imagem.";
            $uploadOk = 0;
        }

        if ($_FILES['foto_perfil']['size'] > 500000) {
            echo "A imagem é muito grande. Use uma de menor qualidade.";
            $uploadOk = 0;
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "Desculpe, só aceitamos arquivos JPG, JPEG e PNG.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Falha ao fazer upload da imagem.";
        } else {
            if (move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $target_file)) {
                $user->updateProfilePic($_SESSION['user_id'], basename($_FILES['foto_perfil']['name']));
                header("Location: dashboard.php");
                exit();
            } else {
                echo "Erro ao mover o arquivo.";
            }
        }
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