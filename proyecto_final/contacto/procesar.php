<?php
// Configuración de la base de datos
$host = "localhost";
$usuario = "root";
$contraseña = "";
$base_datos = "usuarios";

// Crear conexión
$conn = new mysqli($host, $usuario, $contraseña, $base_datos);

// Verificar conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $tipo = $_POST["tipo"];

    // Verificar el tipo seleccionado y preparar la consulta SQL
    if ($tipo == "cliente") {
        $sql = "INSERT INTO clientes (nombre, edad, telefono, correo) VALUES ('$nombre', '$edad', '$telefono', '$correo')";
    } elseif ($tipo == "proveedor") {
        $sql = "INSERT INTO proveedores (nombre, edad, telefono, correo) VALUES ('$nombre', '$edad', '$telefono', '$correo')";
    }

    // Ejecutar la consulta e informar del estado
    if ($conn->query($sql) === TRUE) {
        // Mensaje de éxito con estilo y enlace a CSS
        echo '
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Registro Exitoso</title>
            <link rel="stylesheet" href="registro.css">
        </head>
        <body>
            <div class="success-container">
                <p>Registro guardado exitosamente en la tabla de ' . htmlspecialchars($tipo) . '.</p>
                <a href="../index.html" class="back-btn">Regresar al menú</a>
            </div>
        </body>
        </html>
        ';
    } else {
        echo "Error al guardar el registro: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
