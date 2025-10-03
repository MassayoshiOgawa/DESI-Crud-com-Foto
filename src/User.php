<?php
    include '../includes/db_connect.php';
    class User{
        private $conn;

        public function __construct($db){
            $this -> conn = $db;
        }

        public function register($user, $email, $senha){
            $hash = password_hash($senha, PASSWORD_DEFAULT);
            $sql = "INSERT INTO usuario (nome, email, senha) VALUES (:user, :email, :senha)";

            $stmt = $this -> conn->prepare($sql);

            $stmt -> bindParam(':user', $user);
            $stmt -> bindParam(':senha', $hash);
            $stmt -> bindParam(':email', $email);
            return $stmt -> execute();
        }

        public function login($email, $senha) {
            $sql = "SELECT * FROM usuario WHERE email = :email";
            $stmt = $this -> conn->prepare($sql);
            $stmt -> bindParam(':email', $email);
            $stmt -> execute();
            $user = $stmt -> fetch(PDO::FETCH_ASSOC);
            if ($user && password_verify($senha, $user['senha'])) {
                return $user;
            }
            return false;
        }

        public function getUserById($userId) {
            $sql = "SELECT * FROM usuario WHERE id = :id";
            $stmt = $this -> conn->prepare($sql);
            $stmt -> bindParam(':id', $userId);
            $stmt -> execute();
            return $stmt -> fetch(PDO::FETCH_ASSOC);
        }
    };
?>