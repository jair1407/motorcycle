<?php 
  session_start();
  if(!isset($_SESSION['nombreUsuario'])){
      header('Location:../index.html');
  }
  include("../controlador/controladorRol.php");
  include("../controlador/controladorAcceso.php");
  

  $listaRol = $ControladorRol->listarRol();
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
  <title>Registro Usuario</title>
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
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
</head>
<body>
    <div class="container mt-4">
        <div class="card border info">
        <div class="card-header bg-dark text-white">

        <h2 align="center">Registrar usuarios</h2>
        </div>
        </div>
        <div class="card-body">
        <form name="frmUsuario" id="frmUsuario" method="POST" action="../controlador/controladorAcceso.php">
        <div class="form-row">
        <div class="form-group col-md-4">
        <label>Nombre usuario</label>
        <input type="text" id="nombre" name="nombre" class="form-control"></input>
        </div>
        <div class="form-group col-md-4">
        <label>Password</label>
        <input type="password" id="password" name="password" class="form-control"></input>
        </div>
          </div>
          <div class="form-row">
        <div class="form-group col-md-4">

        <label>Tipo de rol</label>
        <select name="rol" id="rol" class="form-control">
        <option value="">Seleccione</option>
                <?php
                foreach($listaRol as $rol) {
                    
               ?>
                <option value="<?php echo $rol['IdRol']; ?>">
                <?php echo $rol['Nombre']; ?>
            </option>

            <?php
                }
               ?>
            </select>
            
        </div>
        <div class="form-group col-md-4">
        <label>Correo</label>
        <input type="text" id="correo" name="correo" class="form-control"></input>
        </div>
          </div>
          <div class="form-row">
        <div class="form-group col-md-4">

        <label>Estado</label>

        <select name="estado" id="estado" class="form-control">
            <option value="">Seleccione</option>
            <option value="1">Activo</option>
            <option value="2">Inactivo</option>
        </select>
        </div>
          </div>
        <input type="hidden" name="registrarUsuario">
        <button type="button" onclick="validarUsuario()" class="btn btn-dark">Registrar</button>
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
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
  <script src="js/scripts.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/datatables-demo.js"></script>
</body>
<script src="validaciones/validaciones.js"></script>
<link rel="stylesheet" href="dark.css">
<script src="sweetalert2.min.js"></script>
</html>