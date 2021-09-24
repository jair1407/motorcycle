<?php
 session_start();
 if(!isset($_SESSION['nombreUsuario'])){
     header('Location:../index.html');
 }

 $nombre=$_SESSION['nombreUsuario'];
 $rol=$_SESSION['IdRol'];
 include("../controlador/controladorProducto.php");
$producto=$ControladorProducto->buscarProducto($_GET['idProducto']);

include("../controlador/controladorCategoria.php");
$listarCategoria= $ControladorCategoria->listarCategoria();

include("../controlador/controladorMarca.php");
$listarMarca= $ControladorMarca->listarMarca();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Editar Producto</title>
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

<h2 align="center">Editar producto</h2>
</div>
</div>
    <div class="card-body">
    <form  name="frmProducto"  id="frmProducto" method="POST" action="../controlador/controladorProducto.php">
        <div class="form-row">  
        <div class="form-group col-md-4">
    <label >Id</label>
        <input type="text" readonly  name="idProducto" value="<?php echo $producto['IdProducto']?>" id="idProducto"  class="form-control" >
        </div>
        <div class="form-group col-md-4">
        <label >Nombre producto</label>
        <input type="text" name="nombre" value="<?php echo $producto['Nombre']?>" id="nombre"  class="form-control" required>
        </div>
        </div>
        <div class="form-row">  
        <div class="form-group col-md-4">
        <label >Precio</label>
        <input type="text" name="precio" value="<?php echo $producto['Precio']?>" id="precio"  class="form-control">
        </div>
        <div class="form-group col-md-4">
        <label >Categoría producto</label>
        
        <select  name="idCategoria"  value="<?php echo $categoria['IdCategoria']?>" id="idCategoria" class="form-control">

            
            <?php 
            foreach($listarCategoria as $categoria)
            {
                ?>
               
                 
                 <option value="<?php echo $categoria['IdCategoria']?>" <?php if($categoria['IdCategoria'] == $producto['IdCategoria']){ ?> selected <?php } ?> >
                 <?php echo $categoria['NombreCategoria']?>

                </option>
                
                <?php
            }
            ?>
        </select>
        </div>
        </div>
        <div class="form-row">  
        <div class="form-group col-md-4">
        
        <label >Stock </label>
        <input type="text" name="stock"  value="<?php echo $producto['Stock']?>" id="stock"  class="form-control">

        </div>
        <div class="form-group col-md-4">
        <label >Marca producto</label>
        <select  name=" idMarca" value="<?php echo $marca['IdMarca']?>"  id="idMarca" class="form-control">

            
            <?php 
            foreach($listarMarca as $marca)
            {
                ?>
                 
                 <option value="<?php echo $marca['IdMarca']?>" <?php if($marca['IdMarca'] == $producto['IdMarca']){ ?> selected <?php } ?> >
                 <?php echo $marca['NombreMarca']?>

                </option>
                
                <?php
            }
            ?>
        </select>
        </div>
        </div>
        <div class="form-row">  
        <div class="form-group col-md-4">
        
        <label >Estado</label>
        <select  name="estadoProducto" id="estadoProducto"  class="form-control">
            <option value="">Seleccione</option>
            <option value="1" <?php if ($producto['Estado']==1){?> selected <?php }?>>Activo</option>
            <option value="0"<?php if($producto['Estado']==0){?> selected <?php }?>>Inactivo</option>
        </select>
        </div>
        </div>
        <input type="hidden" name="actualizarProducto"  >
        <button type="button" onclick="validarEProducto()"  class="btn btn-dark">Guardar Cambios</button>
       
       
        </div>
</div>  

    </form>

</body>
<script src="validaciones/validaciones.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
 

<script src="js/scripts.js"></script>

<!-- sweet alert2 -->
<link rel="stylesheet" href="dark.css">
<script src="sweetalert2.min.js"></script>
<!--  fin sweet alert2 -->
</html>