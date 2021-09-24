<?php
session_start();
if(!isset($_SESSION['nombreUsuario'])){
    header('Location:../index.html');
}
include("../controlador/controladorMarca.php");
$marca=$ControladorMarca->buscarMarca($_GET['idMarca']);
$nombre=$_SESSION['nombreUsuario'];
 $rol=$_SESSION['IdRol'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Editar Marca</title>
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
      </div>
    <div class="container mt-4">
        <div class="card border-info">

<div class="card-header bg-dark text-white">

<h2 align="center">Editar marca</h2>
</div>
</div>
    <div class="card-body">
    <form  name="frmMarca" id="frmMarca" method="POST" action="../controlador/controladorMarca.php">
    <div class="form-row">
     <div class="form-group col-md-4">
    <label >Id</label>
        <input readonly type="text"  name="idMarca" value="<?php echo $marca['IdMarca']?>" id="idCategoria"  class="form-control" >
        </div>
        <div class="form-group col-md-4">
        <label >Nombre marca</label>
        <input type="text"  name="nombre" value="<?php echo $marca['NombreMarca']?>" id="nombre"  class="form-control">
        </div>
        </div>
        <div class="form-group col-md-4">
        
        <label >Estado</label>
        <select  name="estadoMarca" id="estadoMarca"  class="form-control">
            <option value="">Seleccione</option>
            <option value="1" <?php if ($marca['EstadoMarca']==1){?> selected <?php }?>>Activo</option>
            <option value="0"<?php if($marca['EstadoMarca']==0){?> selected <?php }?>>Inactivo</option>
        </select>
        </div>
        <input type="hidden" name="actualizarMarca">
        <button type="button" onclick="validarEMarca()"  class="btn btn-dark">Guardar Cambios</button>
        
       
       
        

    </form>
</div>
</div>
</body>
<script src="validaciones/validaciones.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="js/scripts.js"></script>

<!-- sweet alert2 -->
<link rel="stylesheet" href="dark.css">
<script src="sweetalert2.min.js"></script>
<!--  fin sweet alert2 -->
</html>