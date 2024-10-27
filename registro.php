<?php 
session_start(); 
// Conexión a la base de datos
$host = "localhost";
$user = "root";
$password = "";
$database = "db_feria";
$message = "";


// Se crea la conexión
$conexion = new mysqli($host, $user, $password, $database);

// Verifica la conexión
if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}

// Verifica si los datos fueron enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $cedula = $_POST['cedula'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $fecha = $_POST['fecha'];
    $celular = $_POST['celular'];
    $tecnico = $_POST['tecnico'];
    $jornada = $_POST['jornada'];

    // Verifica si la   cedula o  emial ya existe
    $validar = "SELECT * FROM usuarios WHERE cedula = '$cedula'";
    $validando = $conexion->query($validar);

    if ($validando->num_rows>0){
        $_SESSION['message'] = "La cédula ya se encuentra registrada"; 
        header("Location: index.php"); 
        exit();    
    } else {
        // Inserta el nuevo usuario
        $sql = "INSERT INTO usuarios (nombre, cedula, direccion, email, fecha, celular, tecnico, jornada)
                VALUES ('$nombre', '$cedula', '$direccion', '$email', '$fecha', '$celular', '$tecnico', '$jornada')";

        // Ejecuta la consulta
        if ($conexion->query($sql) === TRUE) {
            //se define el codigo que tendra
            $codigo_fijo = "1411";

            // Redirige a la página con el código
            echo "<script>
                window.location.href = 'codigo.php?codigo=1411';
              </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error; 
        }
    }
}

$conexion->close(); // Cierra la conexión
?>
