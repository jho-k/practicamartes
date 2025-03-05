<?php

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
