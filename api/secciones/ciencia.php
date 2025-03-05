<?php
// Configuración de la conexión a la base de datos
$host = "localhost";  // Cambia esto si usas un servidor remoto
$usuario = "tu_usuario";  // Cambia esto con tu usuario de base de datos
$contraseña = "tu_contraseña";  // Cambia esto con tu contraseña de base de datos
$baseDeDatos = "personal";  // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($host, $usuario, $contraseña, $baseDeDatos);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consultar los datos de la tabla persona
$sql = "SELECT * FROM persona";
$resultado = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos de Persona</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h1>Datos de la Tabla Persona</h1>

<?php
if ($resultado->num_rows > 0) {
    // Mostrar los datos en una tabla
    echo "<table>";
    echo "<tr><th>ID</th><th>Nombres</th><th>Apellidos</th><th>Edad</th><th>Correo</th><th>Teléfono</th></tr>";

    while($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila["id"] . "</td>";
        echo "<td>" . $fila["nombres"] . "</td>";
        echo "<td>" . $fila["apellidos"] . "</td>";
        echo "<td>" . $fila["edad"] . "</td>";
        echo "<td>" . $fila["correo"] . "</td>";
        echo "<td>" . $fila["telefono"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No hay registros en la base de datos.";
}

// Cerrar la conexión
$conn->close();
?>

</body>
</html>
