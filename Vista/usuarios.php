<?php
require_once "../controlador/UsuarioController.php";

$usuarioController = new UsuarioController();
$usuarios = $usuarioController->index();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['crear'])) {
        $usuarioController->create($_POST['nombre_usuario'], $_POST['contraseña'], $_POST['id_perfil']);
    } elseif (isset($_POST['actualizar'])) {
        $usuarioController->update($_POST['id_usuario'], $_POST['nombre_usuario'], $_POST['contraseña'], $_POST['id_perfil']);
    } elseif (isset($_POST['borrar'])) {
        $usuarioController->delete($_POST['id_usuario']);
    }
    header("Location: usuarios.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
</head>
<body>
    <h1>Gestión de Usuarios</h1>
    <form method="POST">
        <input type="text" name="nombre_usuario" placeholder="Nombre de Usuario" required>
        <input type="password" name="contraseña" placeholder="Contraseña" required>
        <input type="number" name="id_perfil" placeholder="ID Perfil" required>
        <button type="submit" name="crear">Crear</button>
    </form>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Perfil</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <td><?= $usuario['Id_usuario'] ?></td>
            <td><?= $usuario['Nombre_usuario'] ?></td>
            <td><?= $usuario['Id_perfil'] ?></td>
            <td>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="id_usuario" value="<?= $usuario['Id_usuario'] ?>">
                    <button type="submit" name="borrar">Borrar</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>