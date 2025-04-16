<?php
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "Lol";
// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS Lol";
if ($conn->query($sql) === TRUE) {
}
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS Usuarios (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(30) NOT NULL,
    Apellido VARCHAR(30) NOT NULL,
    Email VARCHAR(50) NOT NULL,
    Usuario VARCHAR(30) NOT NULL,
    Contraseña VARCHAR(30) NOT NULL
    )";
    if ($conn->query($sql) === TRUE) {
    }

// Inserccion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $Usuario = $_POST['Usuario'];
      $Contraseña = $_POST['Contraseña'];
  }
  $conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM Usuarios 
WHERE Usuario = $Usuario AND Contraseña = $Contraseña AND EXISTS
(SELECT * FROM Usuarios 
WHERE Usuario = $Usuario AND Contraseña = $Contraseña)";

if ($conn->query($sql) === TRUE) {
    echo "<h1>Se ha iniciado sesion correctamente</h1>"
}
else {
    echo "<h1>No existe el usuario</h1>"
}
$conn->close();
?>
