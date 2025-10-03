<?php
    $servername = 'localhost';
    $user = 'root';
    $senha = 'root';
    $db = 'bancohash';

    try{
        $conn = new PDO("mysql: host=$servername;dbname=$db", $user, $senha);

        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Deu problema: " . $e -> getMessage();
    }

?>