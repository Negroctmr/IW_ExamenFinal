<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Tabla de Multiplicar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
        }
        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 50%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Generador de Tabla de Multiplicar</h1>
    <form method="POST" action="../controlador/tabla.php">
        <input type="number" name="valor" placeholder="Ingresa un número" required>
        <button type="submit">Generar</button>
    </form>
    
    <?php
    if (isset($_GET['tabla'])) {
        $tabla = json_decode($_GET['tabla'], true);
        $numero = $_GET['numero'];
        echo "<h2>Tabla de multiplicar del $numero</h2>";
        echo "<table>";
        echo "<tr><th>Multiplicador</th><th>Resultado</th></tr>";
        foreach ($tabla as $fila) {
            echo "<tr><td>{$numero} x {$fila['multiplicador']}</td><td>{$fila['resultado']}</td></tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>