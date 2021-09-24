<?php
 session_start();
 if(!isset($_SESSION['nombreUsuario'])){
     header('Location:../index.html');
 }

 $nombre=$_SESSION['nombreUsuario'];
 $rol=$_SESSION['IdRol'];
 include("../controlador/controladorAcceso.php");
 include("../controlador/controladorRol.php");
 $listarRol= $ControladorRol->listarRol();
 $listaUsuarios = $Controlador->listarUsuario();
$usuario=$Controlador->buscarUsuario($_GET['IdUsuario']);



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
<title>Editar Usuario</title>
<link rel="icon" type="image/png" href="../assets/img/logo.png">
<link href="css/styles.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous">

</script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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

<h2 align="center"> Editar usuario</h2>
</div>
</div>
    <div class="card-body">
    <form  name="frmUsuario" id="frmUsuario"  method="POST" action="../controlador/controladorAcceso.php">
    <div class="form-row">  
        <div class="form-group col-md-4">
    <label >Id</label>
        <input type="text" readonly name="IdUsuario" value="<?php echo $usuario['IdUsuario']?>" id="IdUsuario"  class="form-control" >
        </div>
        <div class="form-group col-md-4">
    <label >Nombre usuario</label>
        <input type="text"  name="nombre" value="<?php echo $usuario['NombreUsuario']?>" id="nombre"  class="form-control" >
        </div>
        </div>
        <div class="form-row">  
        <div class="form-group col-md-4">
        <label >Contraseña</label>
        <input type="password" name="password" value="<?php echo $usuario['Password']?>" id="password"  class="form-control">
        </div>
        <div class="form-group col-md-4">   
        <label >Tipo rol</label>
        <select  name=" idRol" value="<?php echo $roles['IdRol']?>"  id="idRol" class="form-control">

            
            <?php 
             foreach($listarRol as $rol)
            {
                ?>
                 <option value="<?php echo $rol['IdRol']?>" <?php if($rol['IdRol'] == $usuario['IdRol']){ ?> selected <?php } ?> >
             <?php echo $rol['Nombre']?>

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
        <select  name="estado" id="estado"  class="form-control">
            <option value="">Seleccione</option>
            <option value="1" <?php if ($usuario['Estado']==1){?> selected <?php }?>>Activo</option>
            <option value="0"<?php if($usuario['Estado']==0){?> selected <?php }?>>Inactivo</option>
        </select>
        </div>
        
        <div class="form-group col-md-4">
        <label >Correo</label>
        <input type="text" name="correo" value="<?php echo $usuario['Correo']?>" id="correo"  class="form-control">
        
        </div>
        </div>
 
        <input type="hidden" name="actualizarUsuario">
        <button type="button" onclick="actualizarUsu()" class="btn btn-dark">Guardar Cambios</button>
        
    </form>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="js/scripts.js"></script>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>


<script src="validaciones/validaciones.js"></script>
<link rel="stylesheet" href="dark.css">
<script src="sweetalert2.min.js"></script>
</html>