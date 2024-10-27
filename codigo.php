<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ingreso de Código</title>
    <style>
        body {
            font-family: Arial, sans-serif; 
            background-color: #f0f0f0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh; 
            margin: 0; 
            position: relative; 
            overflow: hidden;  
        }

        .bg-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover; 
            z-index: -1; 
        }

        h1 {
            color: #fff; 
            margin-bottom: 20px; 
        }

        input[type="text"] {
            padding: 10px;
            width: 250px; 
            border: 1px solid #ccc; 
            border-radius: 4px; 
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); 
            font-size: 25px; 
            margin-bottom: 10px; 
        }

        button {
            padding: 10px 20px;
            background-color: #2d5bf4; 
            color: white; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer; 
            font-size: 30px; 
            transition: background-color 0.3s; 
        }

        button:hover {
            background-color: #45a049; 
        }
    </style>
    
    <script>
        // Definir el código fijo
        const codigoFijo = "<?php echo htmlspecialchars($_GET['codigo']); ?>"; // Obtener el código de la URL

        function validarCodigo() {
            const codigoIngresado = document.getElementById("codigo").value;

            if (codigoIngresado === codigoFijo) {
                // Código válido, redirigir a la simulación
                window.location.href = "simulacion.html"; // Cambia a la URL de tu simulación
            } else {
                alert("Código inválido. Intenta de nuevo.");
            }
        }
    </script>
</head>
<body>
    <!-- Video de fondo -->
    <video autoplay muted loop class="bg-video">
        <source src="img/video.mp4" type="video/mp4">
        Tu navegador no soporta el video.
    </video>

    <!-- Contenido principal -->
    <h1>Ingresa el código para acceder al cuestionario</h1>
    <input type="text" id="codigo" placeholder="Código de acceso" required>
    <button onclick="validarCodigo()">➠</button>
</body>
</html>
