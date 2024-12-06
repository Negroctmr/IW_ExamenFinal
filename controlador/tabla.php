<?php
require_once '../modelo/multiplicar.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numero = intval($_POST['valor']);
    $tabla = multiplicar::generarTabla($numero);

    // Redirigir a la vista con los datos
    header('Location: ../vista/index.php?numero=' . $numero . '&tabla=' . urlencode(json_encode($tabla)));
    exit;
}