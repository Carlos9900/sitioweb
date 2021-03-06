<?php include("../template/cabecera.php"); ?>
<?php
$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";

$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
$accion=(isset($_POST['txtaccion']))?$_POST['txtaccion']:"";

echo $txtID."<br/>";
echo $txtNombre."<br/>";
echo $txtImagen."<br/>";
echo $accion."<br/>";

$host="localhost";
$bd="sitio";
$usuario="root";
$contraseña="";

try {
        $conexion=new PDO("mysql:host=$host;dbname:$bd", $usuario,$contraseña);
        if($conexion){ echo "conectando... al sistema";}
        
} catch ( Exception $ex) {

    echo $ex ->getMessage();
}

include("../config/bd.php");

switch($accion){

        case "Agregar":
            //INSERT INTO `libros` (`id`, `nombre`, `imagen`) VALUES (NULL, 'Libro de php', 'imagen.jpg');
            $sentenciaSQL= $conexion->prepare("INSERT INTO libros (nombre,imagen) VALUES (:nombre,:imagen);");
            $sentenciaSQL->bindParam(':nombre,$txtNombre');
            $sentenciaSQL->bindParam(':imagen,$txtImagen');
            $sentenciaSQL->execute();

            echo "presionando botón agregar";
            break;
        case "Modificar":
            echo "presionando botón modificar";
            break;
        case "Cancelar":
            echo "presionando botón cancelar";
            break;
}


?>

<div class="col-md-5">

    <div class="card">
        <div class="card-header">
            Datos de libros
        </div>
        <div class="card-body">
        </div>
        <form method="POST" entype="multipart/form-data" >

    <div class = "form-group">
    <label for="txtID">ID:</label>
    <input type="text" class="form-control" name="txtID" id="txtID" placeholder="ID">
    </div>

    <div class = "form-group">
    <label for="txtID">Nombre:</label>
    <input type="text" class="form-control" name="txtNombre" id="txtNombre" placeholder="Nombre">
    </div>

    <div class = "form-group">
    <label for="txtID">Imagen:</label>
    <input type="file" class="form-control" name="txtImagen" id="txtImagen" placeholder="Imagen">
    </div>
    
    <div class="btn-group" role="group" aria-label="">
        <button type="submit" name="accion" value="Agregar" class="btn btn-success">Agregar</button>
        <button type="submit" name="accion" value="Modificar" class="btn btn-warning">Modificar</button>
        <button type="submit" name="accion" value="Cancelar"class="btn btn-info">Cancelar</button>
    </div>
    </form>
</div>
Formulario de agregar libros
</div>
<div class="col-md-7">
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>2</td>
            <td>Aprende php</td>
            <td>imagen.jpg</td>
            <td>Seleccionar </td>
        </tr>
    </tbody>
</table>

</div>

<?php include("../template/pie.php"); ?>