<?php
require_once "../modelo/Usuario.php";

class UsuarioController {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
    }

    public function index() {
        return $this->usuarioModel->getUsuarios();
    }

    public function create($nombre_usuario, $contraseña, $id_perfil) {
        $this->usuarioModel->createUsuario($nombre_usuario, $contraseña, $id_perfil);
    }

    public function update($id_usuario, $nombre_usuario, $contraseña, $id_perfil) {
        $this->usuarioModel->updateUsuario($id_usuario, $nombre_usuario, $contraseña, $id_perfil);
    }

    public function delete($id_usuario) {
        $this->usuarioModel->deleteUsuario($id_usuario);
    }
}
?>
