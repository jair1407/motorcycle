<?php
 session_start();
 if(!isset($_SESSION['nombreUsuario'])){
     header('Location:../index.html');
 }

 $nombre=$_SESSION['nombreUsuario'];
 $rol=$_SESSION['IdRol'];
 include("../controlador/controladorServicio.php");
$servicio=$ControladorServicio->buscarServicio($_GET['idServicio']);


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Editar Servicio</title>
  <link rel="icon" type="image/png" href="../assets/img/logo.png">
  <link href="css/styles.css" rel="stylesheet" />
 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous">
  </script>
</head>
<body>
    <!--principio de rango de la plantilla -->

    <?php 
include "layout/navbar.php";
?>
  <div id="layoutSidenav">
  <?php include 'sidebar.php'; ?>
    </div>
    <div id="layoutSidenav_content">
      <main>

      <!-- fin de rango de la plantilla -->
    <div class="container mt-4">
        <div class="card border-info">

<div class="card-header bg-dark text-white">

<h2 align="center"> Editar servicio</h2>
</div>
</div>
    <div class="card-body">
    <form  name="frmVServicio"  method="POST" action="../controlador/controladorServicio.php">
    <div class="form-row">  
        <div class="form-group col-md-4">
    <label >Id</label>
        <input type="text"  name="idServicio" value="<?php echo $servicio['IdServicio']?>" id="idServicio"  class="form-control" >
        </div>
        <div class="form-group col-md-4">
        <label >Nombre servicio </label>
        <input type="text" name="nombre" value="<?php echo $servicio['Nombre']?>" id="nombre"  class="form-control">
        </div>
        </div>
        <div class="form-row">  
        <div class="form-group col-md-4">
        <label >Descripción</label>
        <input type="text" name="descripcion" value="<?php echo $servicio['Descripcion']?>" id="descripcion"  class="form-control">
        </div>
        <div class="form-group col-md-4">    
        <label >Precio</label>
        <input type="text" name="precio"  value="<?php echo $servicio['Precio']?>" id="precio"  class="form-control">
        </div>
        </div>
        <div class="form-row">  
        <div class="form-group col-md-4">
        
        <label >Estado</label>
        <select  name="estadoServicio" id="estadoServicio"  class="form-control">
            <option value="">Seleccione</option>
            <option value="1" <?php if ($servicio['Estado']==1){?> selected <?php }?>>Activo</option>
            <option value="0"<?php if($servicio['Estado']==0){?> selected <?php }?>>Inactivo</option>
        </select>
        </div>
        </div>
        
        
        
       
        <input type="hidden" name="actualizarServicio">
        <button type="button" onclick="validarSer()" class="btn btn-dark">Guardar Cambios</button>
        </div>
</div>  

    </form>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
 
 <script src="validaciones/validaciones.js"></script>
<script src="js/scripts.js"></script>

<!-- sweet alert2 -->
<link rel="stylesheet" href="dark.css">
<script src="sweetalert2.min.js"></script>
<!--  fin sweet alert2 -->
</html>