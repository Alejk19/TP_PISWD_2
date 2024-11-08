<?php
// Datos de la conexión
$servername = "localhost";  // Servidor de base de datos
$username = "root";         // Usuario de base de datos (ajústalo si usas otro)
$password = "";             // Contraseña de base de datos (ajústala si usas otra)
$dbname = "cole";           // Nombre de la base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} else {
    // Si la conexión fue exitosa, opcionalmente puedes mostrar un mensaje
    // echo "Conexión exitosa";
}

// Devuelve la conexión para poder usarla en otros archivos PHP
return $conn;
?>
