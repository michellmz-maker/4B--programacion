<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$database = "biblioteca";

$conexion = new mysqli($servername, $username, $password, $database);


if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}

$sql_autores = "SELECT id, nombre_autor FROM autores";
$result_autores = $conexion->query($sql_autores);

$sql_generos = "SELECT id, nombre_genero FROM generos";
$result_generos = $conexion->query($sql_generos);

$sql_editoriales = "SELECT id, nombre_editorial FROM editoriales";
$result_editoriales = $conexion->query($sql_editoriales);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $conexion->real_escape_string($_POST["titulo"]);
    $id_autor = $conexion->real_escape_string($_POST["autor"]);
    $id_genero = $conexion->real_escape_string($_POST["genero"]);
    $id_editorial = $conexion->real_escape_string($_POST["editorial"]);
    $paginas = $conexion->real_escape_string($_POST["paginas"]);
    $anio = $conexion->real_escape_string($_POST["anio"]);
    $descripcion = $conexion->real_escape_string($_POST["descripcion"]);

    // Insertar primero en ficha técnica
    $sql_ficha = "INSERT INTO fichas_tecnicas (paginas, anio_publicacion) VALUES ('$paginas', '$anio')";
    if ($conexion->query($sql_ficha) === TRUE) {
        $id_ficha = $conexion->insert_id;

        // Ahora insertar en libros
        $sql_insert = "INSERT INTO libros (titulo, id_autor, id_genero, id_editorial, id_ficha, descripcion) 
                       VALUES ('$titulo', '$id_autor', '$id_genero', '$id_editorial', '$id_ficha', '$descripcion')";
        if ($conexion->query($sql_insert) === TRUE) {
            echo "<p class='success'>Libro agregado con éxito</p>";
        } else {
            echo "<p class='error'>Error al agregar libro: " . $conexion->error . "</p>";
        }
    } else {
        echo "<p class='error'>Error al agregar ficha técnica: " . $conexion->error . "</p>";
    }
}
?>

<form method="POST">
    <label>Título:</label>
    <input type="text" name="titulo" required><br>

    <label>Autor:</label>
    <select name="autor" required>
        <?php while($row = $result_autores->fetch_assoc()) { ?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre_autor']; ?></option>
        <?php } ?>
    </select><br>

    <label>Género:</label>
    <select name="genero" required>
        <?php while($row = $result_generos->fetch_assoc()) { ?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre_genero']; ?></option>
        <?php } ?>
    </select><br>

    <label>Editorial:</label>
    <select name="editorial" required>
        <?php while($row = $result_editoriales->fetch_assoc()) { ?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre_editorial']; ?></option>
        <?php } ?>
    </select><br>

    <label>Páginas:</label>
    <input type="text" name="paginas" required><br>

    <label>Año de publicación:</label>
    <input type="text" name="anio" required><br>

    <label>Descripción:</label>
    <input type="text" name="descripcion" required><br>

    <input type="submit" value="Registrar Libro">
</form>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f2f4f8;
        margin: 0;
        padding: 20px;
    }

    form {
        background-color: #ffffff;
        max-width: 500px;
        margin: auto;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 6px;
        font-weight: bold;
        color: #333;
    }

    input[type="text"],
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-sizing: border-box;
        font-size: 14px;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    .success {
        background-color: #d4edda;
        color: #155724;
        padding: 12px;
        margin: 10px auto;
        border: 1px solid #c3e6cb;
        border-radius: 8px;
        max-width: 500px;
        text-align: center;
    }

    .error {
        background-color: #f8d7da;
        color: #721c24;
        padding: 12px;
        margin: 10px auto;
        border: 1px solid #f5c6cb;
        border-radius: 8px;
        max-width: 500px;
        text-align: center;
    }
    <style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #f3f0ff; /* pastel lavanda */
        margin: 0;
        padding: 20px;
    }

    form {
        max-width: 400px;
        margin: 40px auto;
        background-color: #ffffff;
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 6px;
        font-weight: bold;
        color: #333;
    }

    input[type="text"],
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.05);
        transition: 0.3s;
    }

    input[type="text"]:focus,
    select:focus {
        border-color: #a084e8;
        box-shadow: 0 0 8px rgba(160, 132, 232, 0.3);
        outline: none;
    }

    input[type="submit"] {
        background-color: #a084e8;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #8661d1;
    }

    .success {
        color: green;
        font-weight: bold;
        text-align: center;
    }

    .error {
        color: red;
        font-weight: bold;
        text-align: center;
    }
</style>


