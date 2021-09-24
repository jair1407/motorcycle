<?php 
  session_start();
  if(!isset($_SESSION['nombreUsuario'])){
      header('Location:../index.html');
  }
  include("../controlador/controladorAcceso.php");
  $listaUsuarios = $Controlador->listarUsuario();
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
  <title>Registrar Cliente</title>
  <link rel="icon" type="image/png" href="../assets/img/logo.png">
  <link href="css/styles.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous">
  </script>
</head>
<body class="sb-nav-fixed">
<?php 
include "layout/navbar.php";
?>
  <div id="layoutSidenav">
  <?php include 'sidebar.php'; ?>
    </div>
    <div id="layoutSidenav_content">
      <main>

          <div class="card mb-4">

          <div class="card mb-4">

            <div class="card-body">
            <!DOCTYPE html>
<html lang="en">
<div class="container mt-4">
        <div class="card border info">
        <div class="card-header bg-dark text-white">

<h2 align="center">Registro de cliente</h2>
</div>
</div>
    <div class="card-body">

    <form  name="frmCliente" id="frmRol" method="POST" action="../controlador/controladorCliente.php">
    <div class="form-row">
        <div class="form-group col-md-4">
    <label >Documento</label>
        <input  type="text" name="documentoCliente" id="documentoCliente"  class="form-control">
        </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-4">
        <label >Nombre cliente</label>
        <input  type="text" name="nombreCliente" id="nombreCliente"  class="form-control">
        </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-4">
        <label >Celular</label>
        <input  type="text" name="celularCliente" id="celularCliente"  class="form-control">
        </div>
        </div>

        <div class="form-group col-md-4">
        <label>Estado</label>
       
        <select name="estadoCliente" id="estadoCliente" class="form-control">
            <option value="">Seleccione</option>
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>
        </select>
        </div>
        <input type="hidden" name="registroCliente">
        <button type="button" onclick="validarCliente()" class="btn btn-dark">Registrar</button>
       

    </form>
</div>
</div>
</body>


  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
  <script src="validaciones/validaciones.js"></script>
  
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="js/scripts.js"></script>
<!-- sweet alert2 -->
<link rel="stylesheet" href="dark.css">
<script src="sweetalert2.min.js"></script>
<!--  fin sweet alert2 -->
</html>