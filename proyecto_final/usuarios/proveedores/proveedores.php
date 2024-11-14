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
    die("Error en la conexión: " . $conn->connect_error);  // Mostrar el error de conexión
}


// Consulta para obtener los datos de clientes
$sql = "SELECT nombre, edad, telefono, correo FROM proveedores";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet" href="clientes.css">
</head>
<body>
    <div class="table-container">
        <h2>Lista de proveedores</h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Mostrar los datos de los clientes
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row["nombre"]) . "</td>
                                <td>" . htmlspecialchars($row["edad"]) . "</td>
                                <td>" . htmlspecialchars($row["telefono"]) . "</td>
                                <td>" . htmlspecialchars($row["correo"]) . "</td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No hay clientes registrados.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
// Cerrar la conexión
$conn->close();
?>
