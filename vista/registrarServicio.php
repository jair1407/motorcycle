<?php 
  session_start();
  if(!isset($_SESSION['nombreUsuario'])){
      header('Location:../index.html');
  }
  include("../controlador/controladorServicio.php");

  

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
  <title>Registrar Servicio</title>
  <link rel="icon" type="image/png" href="../assets/img/logo.png">
  <link href="css/styles.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    crossorigin="anonymous" />
<link rel="stylesheet" href="dark.css">
<script src="sweetalert2.min.js"></script>
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
         
    <div class="container mt-4">
        <div class="card border info">
        <div class="card-header bg-dark text-white">
        
        
        <h2 align="center">Registrar servicios</h2>
        </div>
        
        </div>
        
        <div class="card-body">
        <form name="frmServicio" id="frmServicio" method="POST" action="../controlador/controladorServicio.php">
        <div class="form-row">
            <div class="form-group col-md-4">
        <label>Nombre servicio</label>
        <input type="text" id="nombre" name="nombre" class="form-control" ></input>
        </div> 
        <div class="form-group col-md-4">
        <label>Descripción</label>
        <input type="text" id="descripcion" name="descripcion" class="form-control" ></input>
        </div> 
        </div>
        <div class="form-row">
        <div class="form-group col-md-8">
        <label>Precio</label>
        <input type="text" id="precio" name="precio" class="form-control" ></input>
        </div>

        <div class="form-group col-md-4">
        <label>Estado</label>
       
        <select name="estadoServicio" id="estadoServicio" class="form-control">
            <option value="">Seleccione</option>
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>
        </select>
        </div>
        </div>
      
        <input type="hidden" name="registrarServicio">
        <button type="button" onclick="validarServicio()" class="btn btn-dark">Registrar</button>
        <button type="button" onclick="limpiar()" class="btn btn-dark">Cancelar</button>
        </form>
    </div>
        </div>
</body>

</html>
             
            </div>
          </div>
        
        </div>
      </main>
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; MOTORCYCLE</div>
            <div>
              <a href="#">Privacy Policy</a>
              &middot;
              <a href="#">Terms &amp; Conditions</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="validaciones/validaciones.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
  <script src="js/scripts.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/datatables-demo.js"></script>
 
</body>


</html>