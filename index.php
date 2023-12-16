<?php

// Incluye la clase Conexion`
require_once('Conexion.php');

// Configuración de la base de datos
$host = 'localhost';
$username = 'root';
$password = '';
$baseDatos = 'usuarios';

// Crea una instancia de la clase Conexion
$databaseObj = new Conexion($host, $username, $password, $baseDatos);

// Conecta a la base de datos
$databaseObj->connect();

// Ahora, puedes realizar operaciones en la base de datos usando la conexión
$conn = $databaseObj->getConnection();

// Ejemplo de consulta
$query = "SELECT * FROM clientes";
$result = $conn->query($query);

/*
if ($result->num_rows > 0) {
    // Procesa los resultados
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Nombre: " . $row["nombre"] . " - Apellidos: " . $row["apellidos"] . " - Edad: " . $row["edad"] . " - Poblacion: " . $row["poblacion"] . " - Telefono: " . $row["telefono"] . " - email: " . $row["email"] . "<br>";
    }
} else {
    echo "0 resultados";
}
*/

//presentar resultados en una tabla 

if ($result->num_rows > 0) {
  // Encabezados de la tabla
  echo "<table border='1'>";
  echo "<tr><th>ID</th><th>Nombre</th><th>Apellidos</th><th>Edad</th><th>Población</th><th>Teléfono</th><th>Email</th></tr>";

  // Procesa los resultados
  while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["id"] . "</td>";
      echo "<td>" . $row["nombre"] . "</td>";
      echo "<td>" . $row["apellidos"] . "</td>";
      echo "<td>" . $row["edad"] . "</td>";
      echo "<td>" . $row["poblacion"] . "</td>";
      echo "<td>" . $row["telefono"] . "</td>";
      echo "<td>" . $row["email"] . "</td>";
      echo "</tr>";
  }

  echo "</table>";
} else {
  echo "0 resultados";
}
// Cierra la conexión a la base de datos al finalizar
$databaseObj->close();

?>

