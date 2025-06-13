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
            background-color: rgb(107, 15, 3);
            color: white;
        }
    </style>
    <div class="container">
        <h1 class="display-4 text-center" style=" font-family: 'Wensfort', sans-serif;color:rgb(11, 125, 133);">-Helados-</h1>
        <?php
        $servername = "localhost"; 
        $username = "root"; 
        $password = ""; 
        $database = "helados"; 
        $conexion = new mysqli($servername, $username, $password, $database);
        if ($conexion->connect_error) {
            die("<p class='text-center text-danger'>❌ Error de conexión: " . $conexion->connect_error . "</p>");
        }
        $sql = "SELECT * FROM `inventario de helados`";
        $resultado = $conexion->query($sql);
        ?>
        <?php if ($resultado->num_rows > 0): ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Sabor</th>
                    <th>Precio</th>
                    <th>Cantidad en stock</th>
                    <th>Proveedor</th>
                    <th>Vencimiento</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = $resultado->fetch_assoc()): ?>
                <tr>
                    <td style="background-color: rgb(233, 229, 31); color: white;"><?php echo htmlspecialchars($fila['ID']); ?></td>
                    <td style="background-color: rgb(231, 228, 35);"><?php echo htmlspecialchars($fila['Sabor']); ?></td>
                    <td style="background-color: rgb(228, 231, 52);"><?php echo number_format($fila['Precio'], 2); ?></td>
                    <td style="background-color: rgb(232, 248, 13);"><?php echo htmlspecialchars($fila['Cantidad en stock']); ?></td>
                    <td style="background-color: rgb(233, 181, 9);"><?php echo htmlspecialchars($fila['Proveedor']); ?></td>
                    <td style="background-color: rgb(228, 235, 129);"><?php echo htmlspecialchars($fila['Vencimiento']); ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p class="text-center">No hay productos registrados.</p>
        <?php endif; ?>
        <?php $conexion->close(); ?>
    </div>
    <div class="jumbotron">
        
    </div>
</body>
</html>
