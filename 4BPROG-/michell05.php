<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$username = "root";
  $password = "";
  $servername = "localhost";
  $database = "cetis 131";
  $conexion = new mysqli($servername, $username, $password, $database);
if($conexion->connect_error){
  die( "La conexion fallo: " . $conexion->connect_error);

}if($_SERVER["REQUEST_METHOD"]=="POST"){
  $nombre = $_POST["nombre"];
$precio = $_POST["precio"];
$id_categoria = $_POST["categoria"];
$id_colores = $_POST["colores"];
$sql = "INSERT INTO productos (nombre, precio, id_categoria, id_colores) VALUES ("$nombre","$precio", "$id_categoria", "$id_colores")";
if($conexion->query($sql)===TRUE){
echo "<p style= color :green; >Producto agregada con exito,</p>"
}else{
echo "<p style= color:red; >Error: ". $conexion->error . "<p>";
}}

$sql_categoria = "SELECT * FROM categoria";
$result_categoria = $conexion->query($sql_categoria);

$sql_colores = "SELECT * FROM colores";
$result_colores = $conexion->query($sql_colores);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de Prueba</title>
</head>
<body>
  <h2>Registrar productos</h2>
  <form method="POST">
  <label>Nombre del producto:</label>
  <input type="text" name="nombre" required><br><br>
  <label>Precio:</label>
  <input type="number" name="precio" required><br><br>
  
  <label>Categoría:</label>
  <select name="categoria" required>
    <option value="">Seleccione una categoria</option>
    <?php
        if($result_categorias->num_rows > 0){
            while($row = $result_categorias->fetch_assoc()){
                echo "<option value='" . $row("id") . "'>" . $row["nombre"] . "</option>";
            }
        }
    ?>
</select><br><br>

<input type="submit" value="Agregar Producto">
</form>
<h2>Lista de Productos</h2>
<table>
  <tr>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Categoria</th>
  </tr>
  <?php
  $sql_productos = "SELECT productos.nombre, productos.precio, categorias.nombre AS categoria
  FROM productos
  JOIN categorias ON poductos.id_categoria = categorias.id";$result_productos = $conexion->query( $sql_productos);
  if($result_categorias->num_rows > 0) {
    while($row = $result_productos->fetch_assoc()){
      echo "<tr>
      <td>{$row['nombre']}<?td>
      <td>{$row['precio']}<?td>
      <td>{$row['categoria']}<?td>
      </tr>";
    } else{
      echo "<tr><.d>No hay productos registrados</tr";
    }
  }
  ?>
</table>
    </body>
    </html>