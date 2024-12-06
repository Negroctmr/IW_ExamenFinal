<?php
require_once "../config/database.php";

class Usuario {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getUsuarios() {
        $query = "SELECT * FROM usuarios";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createUsuario($nombre_usuario, $contraseña, $id_perfil) {
        $query = "INSERT INTO usuarios (Nombre_usuario, Contraseña, Id_perfil) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$nombre_usuario, password_hash($contraseña, PASSWORD_BCRYPT), $id_perfil]);
    }

    public function updateUsuario($id_usuario, $nombre_usuario, $contraseña, $id_perfil) {
        $query = "UPDATE usuarios SET Nombre_usuario = ?, Contraseña = ?, Id_perfil = ? WHERE Id_usuario = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$nombre_usuario, password_hash($contraseña, PASSWORD_BCRYPT), $id_perfil, $id_usuario]);
    }

    public function deleteUsuario($id_usuario) {
        $query = "DELETE FROM usuarios WHERE Id_usuario = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id_usuario]);
    }
}
?>