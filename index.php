<?php 
include("cabecera.php") ; 
include("conexion.php") ; 

$consulta = mysqli_query($conexion,"SELECT * FROM `proyectos` ") ;

?>

<div class="p-5 bg-light">
    <div class="container">
        <h1 class="display-3">Bienvenidos</h1>
        <p class="lead">Esta es un portafolio privado.</p>
        <hr class="my-2">
        <p>Mas información</p>
        
    </div>
</div>

   

<div class="row row-cols-1 row-cols-md-3 g-4">

<?php while($proyectos=mysqli_fetch_array($consulta)){?>
  <div class="col">
    <div class="card">
      <img src="imagenes/<?php echo $proyectos['imagen']; ?>" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?php echo $proyectos['nombre'];?></h5>
        <p class="card-text"> <?php echo $proyectos['descripcion']?></p>
      </div>
    </div>
  </div>
<?php }

mysqli_free_result($consulta);
mysqli_close($conexion);

?>  

</div>

<?php include("pie.php"); ?>
