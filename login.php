<?php
session_start();

if($_POST){
    if($_POST["usuario"] == "joaquin" && $_POST["contrasenia"] == "12345"){

            $_SESSION["usuario"] = "joaquin" ;

        header("location:index.php");
    }else{
       echo "<script> alert('Usuario o contraseña incorrecta') </script>" ;
    }
}

?>


<!doctype html>
<html lang="en">
  <head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
 
    <div class="container">


     <div class="row">

       <div class="col-md-12">
           
       </div>

       <div class="col-md-12">
           <div class="card">
               <div class="card-header">
                   Iniciar sesión
               </div>
               <div class="card-body">
                    <form action="login.php" method="post">

                    Usuario: <input class="form-control" type="text" name="usuario" >
                    </br>
                    Contraseña: <input class="form-control" type="password" name="contrasenia" >
                    </br>

                    <button class="btn btn-success" type="submit">Entrar al portafolio</button>

                    </form>
               </div>
               <div class="card-footer text-muted">
                   Footer
               </div>
           </div>
       
           
       </div>

       <div class="col-md-12">
           
       </div>
         
     </div> 

   
        
    </div>
 
      
    
  </body>
</html>