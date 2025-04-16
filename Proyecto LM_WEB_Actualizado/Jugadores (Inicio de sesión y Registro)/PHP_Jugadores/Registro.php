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
      $Nombre = $_POST['Nombre'];
      $Apellido = $_POST['Apellido'];
      $Email = $_POST['Email'];
      $Usuario = $_POST['Usuario'];
      $Contraseña = $_POST['Contraseña'];
  }
  $conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO Usuarios (Nombre, Apellido, Email, Usuario, Contraseña)
VALUES ('$Nombre', '$Apellido', '$Email', '$Usuario', '$Contraseña')";

if ($conn->query($sql) === TRUE) {
  echo "<h1>Se ha creado el usuario correctamente</h1>"
}
else {
  echo "<h1>No se ha podido crear el usuario</h1>"
}
$conn->close();
?>
