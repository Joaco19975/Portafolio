<?php include("cabecera.php");?>
<?php include("conexion.php");?>

<?php
if($_POST){
//print_r($_POST);
$nombre = $_POST['nombre']; 

$descripcion = $_POST['descripcion'];

$fecha = new DateTime(); // creo esta variable, por si alguna imagen tiene el mismo nombre, que no se reescriba perdiendo la imagen anterior

$imagen = $fecha->getTimestamp()."_".$_FILES['archivo']['name']; //primero tengo la hora, concateno "_" y luego el nombre de la imagen.

$imagenTemporal = $_FILES['archivo']['tmp_name'];

move_uploaded_file($imagenTemporal,"imagenes/".$imagen);


$objConexion = new conexion(); //class conexion 

$sql = "INSERT INTO `proyectos` (`ID`, `nombre`, `imagen`, `descripcion`) VALUES (NULL, '$nombre', '$imagen', '$descripcion');";

$objConexion->ejecutar($sql);
//para que cuando refresque la pagina no vuelva a insertar el ultimo proyecto, redirecciono a la misma pagina
header("location:portafolio.php");
}

if($_GET){

$id = $_GET['borrar'];
$objConexion = new conexion();
// acá solo nos pasa el ID $_GET['borrar'], para hacer un borrado completo y borrar la imagen, tenemos que hacer una busqueda mediante una consulta
//BORRADO DEL ARCHIVO
$imagenBorrar = $objConexion->consultar("SELECT imagen FROM `proyectos` WHERE ID=".$id) ;
unlink("imagenes/".$imagen[0]['imagen']);
//BORRADO DEL ARCHIVO


$sql = "DELETE FROM `proyectos` WHERE `proyectos`.`ID` = ".$id ;
$objConexion->ejecutar($sql);
//para que cuando refresque la pagina no vuelva a insertar el ultimo proyecto, redirecciono a la misma pagina
header("location:portafolio.php");

}

$objConexion = new conexion ();
$proyectos = $objConexion->consultar("SELECT * FROM `proyectos` ") ;
//print_r($proyectos);
?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Datos del proyecto
            </div>
            <div class="card-body">

            <form action="portafolio.php" method="post" enctype="multipart/form-data"> <!-- enctype es para recepcionar los datos tipo file -->

            Nombre del proyecto: <input required class="form-control" type="text" name="nombre" id="">
            <br>
            Imagen del proyecto: <input required class="form-control" type="file" name="archivo" id="">
            <br>

              Descripcion:
              <textarea required class="form-control" name="descripcion" id="" rows="3"></textarea>
              <br>
            <input class="btn btn-success" type="submit" value="Enviar proyecto">

            </form>
                
            </div>
    
            </div>
            
        </div>
        <div class="col-md-6">
                <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($proyectos as $proyecto){?>
                <tr>
                    <td><?php echo $proyecto['ID'];?></td>
                    <td><?php echo $proyecto['nombre'];?></td>
                    <td> <img width="100" src="imagenes/<?php echo $proyecto['imagen']; ?>"></td>
                    <td><?php echo $proyecto['descripcion']?></td>
                    <td><a class="btn btn-danger" href="?borrar=<?php echo $proyecto['ID'];?>">Eliminar</a></td>
                </tr> 
             <?php } ?>
            </tbody>
        </table>
        </div>
        
    </div>
</div>



<?php include("pie.php"); ?>