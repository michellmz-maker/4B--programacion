<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.cdnfonts.com/css/mercy-christole" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/optinaval" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/wensfort" rel="stylesheet">
    <title>Michell</title>
</head>
<body>
    <nav class="navbar navbar-light" style="background-color: #d4471c;">
        <div class="container">
            <a class="navbar-brand" href="index.html" style="color: white;">INICIO</a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="unidad1.html" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">UNIDAD 1</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="michell01.php">Práctica 1</a><br>
                            <a class="dropdown-item" href="michell02.php">Práctica 2</a><br>
                            <a class="dropdown-item" href="michell03.php">Práctica 3</a>
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="unidad2.html" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">UNIDAD 2</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="michell04.html">Práctica 4</a><br>
                            <a class="dropdown-item" href="michell06.html">Práctica 6</a>
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="unidad3.html" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">UNIDAD 3</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="michell07.html">Práctica 7</a><br>
                            <a class="dropdown-item" href="michell08.html">Práctica 8</a><br>
                            <a class="dropdown-item" href="michell09.html">Práctica 9</a><br>
                            <a class="dropdown-item" href="michell10.html">Práctica Final</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <style>
        th{
            background-color: rgb(255, 190, 10);
            color: white;
        }

        .cute-button {
        background-color: #ff66b2; /* Rosa vibrante */
        color: white;
        font-size: 18px;
        font-family: "Comic Sans MS", cursive, sans-serif;
        padding: 12px 24px;
        border: 3px solid #ff1493; /* Bordes en rosa fuerte */
        border-radius: 25px; /* Esquinas redondeadas */
        box-shadow: 3px 3px 8px rgba(255, 20, 147, 0.5);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .cute-button:hover {
        background-color: #ff1493; /* Rosa más fuerte al pasar el mouse */
        border: 3px solid #ff66b2;
        transform: scale(1.1);
    }

    .cute-button:active {
        background-color: #ff99cc;
        box-shadow: none;
        transform: scale(1);
    }
    </style>
<body>
   
    
    <div class="container">
        <h1 class="display-4 text-center" style="font-family: 'Wensfort', sans-serif;color:rgb(0, 0, 0);">-Clientes-</h1>

        <?php
        $servername = "localhost"; 
        $username = "root"; 
        $password = ""; 
        $database = "helados"; 
        $conexion = new mysqli($servername, $username, $password, $database);

        if ($conexion->connect_error) {
            die("<p class='text-center text-danger'>❌ Error de conexión: " . $conexion->connect_error . "</p>");
        }

        // Verificar si se envió el formulario
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];

            $sql_insert = "INSERT INTO Clientes (Nombre, Correo, Telefono, Direccion, Fecha_de_registro) 
                           VALUES ('$nombre', '$correo', '$telefono', '$direccion', NOW())";

            if ($conexion->query($sql_insert) === TRUE) {
                echo "<p class='text-success text-center'>✅ Cliente registrado con éxito.</p>";
            } else {
                echo "<p class='text-danger text-center'>❌ Error al registrar: " . $conexion->error . "</p>";
            }
        }

        $sql = "SELECT * FROM `Clientes`";
        $resultado = $conexion->query($sql);
        ?>

        <form method="POST" class="form-horizontal" style="margin-bottom: 20px;">
            <div class="form-group">
                <label class="control-label col-sm-2">Nombre:</label>
                <div class="col-sm-10">
                    <input type="text" name="nombre" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Correo:</label>
                <div class="col-sm-10">
                    <input type="email" name="correo" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Teléfono:</label>
                <div class="col-sm-10">
                    <input type="text" name="telefono" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Dirección:</label>
                <div class="col-sm-10">
                    <input type="text" name="direccion" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="cute-button">Agregar Cliente</button>
                </div>
            </div>
        </form>

        <?php if ($resultado->num_rows > 0): ?>
            <table class="table table-striped" style="border-collapse: collapse; width: 100%; border: 2px solid black;">
                <thead>
                    <tr style="border: 2px solid black;">
                        <th style="border: 2px solid black;">ID</th>
                        <th style="border: 2px solid black;">Nombre</th>
                        <th style="border: 2px solid black;">Correo</th>
                        <th style="border: 2px solid black;">Teléfono</th>
                        <th style="border: 2px solid black;">Dirección</th>
                        <th style="border: 2px solid black;">Fecha de registro</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($fila = $resultado->fetch_assoc()): ?>
                    <tr style="border: 2px solid black;">
                        <td style="background-color: rgb(255, 190, 10); color: white; border: 2px solid black;"><?php echo htmlspecialchars($fila['ID']); ?></td>
                        <td style="background-color: rgb(250, 246, 43); border: 2px solid black;"><?php echo htmlspecialchars($fila['Nombre']); ?></td>
                        <td style="background-color: rgb(251, 255, 8); border: 2px solid black;"><?php echo htmlspecialchars($fila['Correo']); ?></td>
                        <td style="background-color: rgb(236, 240, 23); border: 2px solid black;"><?php echo htmlspecialchars($fila['Telefono']); ?></td>
                        <td style="background-color: rgb(229, 255, 0); border: 2px solid black;"><?php echo htmlspecialchars($fila['Direccion']); ?></td>
                        <td style="background-color: rgb(229, 255, 0); border: 2px solid black;"><?php echo htmlspecialchars($fila['Fecha_de_registro']); ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-center">No hay Clientes registrados.</p>
        <?php endif; ?>
      
