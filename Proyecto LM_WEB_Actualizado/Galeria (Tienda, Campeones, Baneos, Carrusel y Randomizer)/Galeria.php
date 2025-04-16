<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Galería - Campeones</title>
  <link rel="stylesheet" href="Galeria.css" />
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600&display=swap" rel="stylesheet">
</head>
<body>
  <header>
    <nav class="navbar">
      <div class="logo">Legends Portal</div>
      <ul class="nav-links" id="nav-links">
        <li><a href="../Galeria (Tienda, Campeones, Baneos, Carrusel y Randomizer)/Galeria.php">Galería y más</a></li>
        <li><a href="../Jugadores (Inicio de sesión y Registro)/Jugadores_Registro.html">Registro</a></li>
        <li><a href="../Jugadores (Inicio de sesión y Registro)/Jugadores_Sesion.html">Inicio de Sesión</a></li>
        <li><a href="../Equipos(Formulario de Contacto)/Equipos.html">Equipos y Contacto</a></li>
      </ul>
    </nav>
  </header>

  <!-- Sección Slider de Campeones -->
  <section class="slider" id="slider">
    <img src="img/yasuo.jpg" alt="Campeón 1" class="slide active">
    <img src="img/nunu.jpg" alt="Campeón 2" class="slide">
    <img src="img/mordekaiser.jpg" alt="Campeón 3" class="slide">
    <img src="img/Braum.jpg" alt="Campeón 4" class="slide">
    <img src="img/Vladimir.jpg" alt="Campeón 5" class="slide">
    <img src="img/yone.jpg" alt="Campeón 6" class="slide">
    <img src="img/darius.jpg" alt="Campeón 7" class="slide">
    <img src="img/kalista.jpg" alt="Campeón 8" class="slide">
    <img src="img/riven.jpg" alt="Campeón 9" class="slide">
    <img src="img/sona.jpg" alt="Campeón 10" class="slide">
  </section>  

  <!-- Repositorio Campeones -->
  <section class="grid-section" id="champions">
    <h2>Campeones</h2>
    <div class="grid">
      <!-- Puedes duplicar este bloque por cada campeón -->
      <div class="card">
        <img src="img/Braum.jpg" alt="Campeón" />
        <p>Braum</p>
      </div>
      <div class="card">
        <img src="img/sona.jpg" alt="Campeón" />
        <p>Sona</p>
      </div>
      <div class="card">
        <img src="img/Vladimir.jpg" alt="Campeón" />
        <p>Vladimir</p>
      </div>
      <div class="card">
        <img src="img/Mordekaiser.jpg" alt="Campeón" />
        <p>Mordekaiser</p>
      </div>
    </div>
  </section>

  <!-- Objetos -->
  <section class="grid-section" id="items">
    <h2>Objetos</h2>
    <div class="grid">
      <div class="card">
        <img src="img/Corazon.jpg" alt="Objeto" />
        <p>Corazón de Acero</p>
      </div>
      <div class="card">
        <img src="img/Tormento.jpg" alt="Objeto" />
        <p>Tormento de Lyandri's</p>
      </div>
      <div class="card">
        <img src="img/guinsoo.jpg" alt="Objeto" />
        <p>guinsoo</p>
      </div>
    </div>
  </section>

<!-- Zona de Build Aleatoria -->
<section class="random-build-section">
  <h2>Build Aleatoria del Día</h2>
  <p>¿Te atreves a jugar esta combinación?</p>
  <button id="generateBuild">¡Generar Build!</button>
  
  <div class="build-display">
    <div class="build-champion">
      <h3>Campeón</h3>
      <img id="randomChampion" src="img/yasuo.jpg" alt="Campeón aleatorio">
    </div>
    <div class="build-items">
      <h3>Objetos</h3>
      <div class="items-grid">
        <img class="build-item" src="img/Corazon.jpg" alt="Objeto 1">
        <img class="build-item" src="img/Tormento.jpg" alt="Objeto 2">
        <img class="build-item" src="img/guinsoo.jpg" alt="Objeto 3">
      </div>
    </div>
  </div>
</section>

<!-- Zona de baneos con formulario -->
<section class="ban-section" id="ban">
    <h2>Zona de Baneos</h2>
    <p>Selecciona los campeones que deseas banear:</p>
  
    <form action="procesar_baneos.php" method="POST" class="ban-form">
      <div class="ban-grid">
        <label><input type="checkbox" name="baneos[]" value="Aatrox"> Aatrox</label>
        <label><input type="checkbox" name="baneos[]" value="Ahri"> Ahri</label>
        <label><input type="checkbox" name="baneos[]" value="Yasuo"> Yasuo</label>
        <label><input type="checkbox" name="baneos[]" value="Zed"> Zed</label>
        <label><input type="checkbox" name="baneos[]" value="Lux"> Lux</label>
        <label><input type="checkbox" name="baneos[]" value="Teemo"> Teemo</label>
        <!-- Puedes añadir más aquí -->
      </div>
  
      <button type="submit" class="ban-submit">Enviar Baneos</button>
    </form>
  </section>
<?php
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "Lol";

  $conn = new mysqli($servername, $username, $password, $dbname);
  $db = mysqli_select_db($conn, $dbname) or die("No se ha podido conectar con la base de datos"); 
  $sql = "CREATE TABLE IF NOT EXISTS Personajes (
    ID INT PRIMARY KEY,
    Nombre VARCHAR(30) NOT NULL,
    Ataque INT NOT NULL,
    Defensa INT NOT NULL,
    Habilidad_definitiva VARCHAR(50) NOT NULL)";
    if ($conn->query($sql) === TRUE) {
    }

// Inserccion
  $conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Verificar si la tabla ya tiene datos
$check_sql = "SELECT COUNT(*) as total FROM Personajes";
$result = $conn->query($check_sql);
$row = $result->fetch_assoc();

if ($row['total'] == 0) {
    $sql = "INSERT INTO Personajes (ID, Nombre, Ataque, Defensa, Habilidad_definitiva)
    VALUES 
    (1, 'Mordekaiser', 5, 10, 'Brasil'),
    (2, 'Nunu&Willump', 20, 50, 'Ventisca eterna'),
    (3, 'Milio', 0, 0, 'Curacion Peruana'),
    (4, 'Kalista', 70, 5, 'Cirque du Soleil'),
    (5, 'Braum', -5, 90, 'Sacame de aqui'),
    (6, 'Vladimir', 200, 400, 'If manterola plays = Pentakill'),
    (7, 'Shaco', 13, 13, 'Baneao'),
    (8, 'Diego', 999, 999, 'Uni Power'),
    (9, 'Dr. Mundo', 999, 999, 'Baneao')";
    
    if ($conn->query($sql) === TRUE) {
    }
}

echo '<br>';
echo '<table align=center border=1 class="styled-table">
    <td>ID</td>
    <td>Nombre</td>
    <td>Ataque</td>
    <td>Defensa</td>
    <td>Habilidad definitiva</td>
    </tr>';
$sql3 = "SELECT * FROM Personajes";
$datos3 = mysqli_query($conn, $sql3);
while($row3 = mysqli_fetch_row($datos3)){
foreach($row3 as $element) {
 echo '<td>'.$element.'</td>';
}
echo '</tr>';
} 
echo '</table>';
?>
    <form action="" method="post" class="form">
        <h2>¿A quien quieres banear?</h2>
        <label for="ID">ID</label>
        <input type="text" id="ID" name="ID" class="input"><br><br>
        <label for="Nombre">Nombre</label>
        <input type="text" id="Nombre" name="Nombre" class="input"><br><br>
        <input type="submit" value="Banear" class="button">
    </form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $ID = $_POST['ID'];
  $Nombre = $_POST['Nombre'];

  if (!empty($ID) && !empty($Nombre)) {
    $sql = "DELETE FROM Personajes WHERE ID = '$ID' AND Nombre = '$Nombre'";
    if ($conn->query($sql) === TRUE) {
    }
  }
}

?>
<script src="Galeria.js"></script>

</body>
</html>
