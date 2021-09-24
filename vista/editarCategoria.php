<?php
session_start();
if(!isset($_SESSION['nombreUsuario'])){
    header('Location:../index.html');
}
include("../controlador/controladorCategoria.php");
$categoria=$ControladorCategoria->buscarCategoria($_GET['idCategoria']);
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
  <title>Editar Categoría</title>
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

<h2 align="center"> Editar categoría</h2>
</div>
</div>
    <div class="card-body">
    <form  name="frmCategoria" id="frmCategoria" method="POST" action="../controlador/controladorCategoria.php">
    <div class="form-row">
     <div class="form-group col-md-4">
    <label >Id</label>
        <input  readonly type="text"  name="idCategoria" value="<?php echo $categoria['IdCategoria']?>" id="idCategoria"  class="form-control" >
        </div>
        <div class="form-group col-md-4">
        <label >Nombre categoría</label>
        <input type="text"  name="nombre" value="<?php echo $categoria['NombreCategoria']?>" id="nombreCategoria"  class="form-control">
        </div>
        </div>
        <div class="form-row">  
        <div class="form-group col-md-4">
        
        <label >Estado</label>
        <select  name="estadoCategoria" id="estadoCategoria"  class="form-control">
            <option value="">Seleccione</option>
            <option value="1" <?php if ($categoria['Estado']==1){?> selected <?php }?>>Activo</option>
            <option value="0"<?php if($categoria['Estado']==0){?> selected <?php }?>>Inactivo</option>
        </select>
        </div>
        </div>
        <input type="hidden" name="actualizarCategoria">
        <button type="button" onclick="validarECategoria()"  class="btn btn-dark">Guardar Cambios</button>
       
       
        

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