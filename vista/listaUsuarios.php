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
  <title>Usuarios</title>
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
        <div class="container-fluid">

        <div class="container mt-4">
<div class="card border info">
<div class="card-header bg-dark text-white">
          <a class="btn btn-primary" href="registroUsuario.php" <?php if($rol!=1){ ?> style="display: none;" <?php } ?> type="button">
          <ion-icon name="person-add"></ion-icon>
            </a>
            <h2 align="center">Tabla de usuarios</h2>
          <div class="card mb-4">

          <div class="card mb-4">

            <div class="card-body">
              <div class="table-responsive">
<table class="table table-bordered" id="tablaUsuario" width="100%" cellspacing="0">
<thead>
<th>Id</th>
<th>Nombre usuario</th>
<th>Rol</th>
<th <?php if($rol!=1){ ?> style="display: none;" <?php } ?>>Estado</th>
<th <?php if($rol!=1){ ?> style="display: none;" <?php } ?>>Acciones</th>
</thead>
<tbody>
<?php
foreach($listaUsuarios as $usuarios) {

    ?>
    <tr>
    <td><?php echo $usuarios['IdUsuario'];?></td>
    <td><?php echo $usuarios['NombreUsuario'];?></td>
    <td><?php echo $usuarios['NombreRol'];?></td>
    <td <?php if($rol!=1){ ?> style="display: none;" <?php } ?>> 
      <?php if($usuarios['Estado']==1){?>
      <button type="submit"   id="estado" onclick="cambiarEstado(<?php echo $usuarios['IdUsuario'];  ?>,0)" class="btn btn-success  " 
       ><ion-icon name="thumbs-up"></ion-icon></button>

       <?php } else{ ?>

         <button type="submit"   id="estado" onclick="cambiarEstado(<?php echo $usuarios['IdUsuario'];  ?>,1)" class="btn btn-danger  " 
         ><ion-icon name="thumbs-down"></ion-icon></button>
        
         <?php } ?>
   
    <td>
    <form action="../controlador/controladorAcceso.php" method="POST">
    <input type="hidden" name="IdUsuario" value="<?php echo $usuarios['IdUsuario'];?>">

    <button type="submit" name="editarUsuario"class="btn btn-warning " <?php if($rol!=1){ ?> style="display: none;" <?php } ?>>
    <ion-icon name="create"></ion-icon></button>

    <button type="button" <?php if($rol!=1){ ?> style="display: none;" <?php } ?> name="eliminar" class="btn btn-danger" onclick="eliminarUsuario(<?php echo $usuarios['IdUsuario']; ?>)">
    <ion-icon name="trash"></ion-icon></button>
    </form>
    </tr>
    <?php
}
?>
</tbody>
</table>
              </div>

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
  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
  <script src="js/scripts.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/datatables-demo.js"></script>

</body>
<!-- sweet alert2 -->
<link rel="stylesheet" href="dark.css">
<script src="sweetalert2.min.js"></script>
<!--  fin sweet alert2 -->

<script>
    $(document).ready(function() {
    $('#tablaUsuario').DataTable();
} );
function eliminarUsuario(IdUsuario){

    let formData = new FormData();
    formData.append('IdUsuario',IdUsuario);
    formData.append('eliminarUsuario','');
    Swal.fire({
        title: '¿Esta usted seguro de eliminar el Usuario?',
        icon:'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si borrar este'
}).then((result) => {
  if (result.isConfirmed) {

      $.ajax({
          url:'../controlador/controladorAcceso.php',
          type:'post',
          data:formData,
          contentType:false,
          processData:false,
          success: function(response){
            location.reload("listaUsuario.php");
          }
      });
    Swal.fire(
      'Eliminado!',
      'El usuario ha sido eliminado',
      'warning'
    );
 }
});

}



function cambiarEstado(IdUsuario,estado){

let formData = new FormData();
formData.append('IdUsuario',IdUsuario);
formData.append('estado',estado);
formData.append('cambiarEstado','');
Swal.fire({
    title: '¿Quieres cambiar el estado Del Usuario?',
    icon:'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si cambiar'
}).then((result) => {
if (result.isConfirmed) {

  $.ajax({
      url:'../controlador/controladorAcceso.php',//peticion asincrona del controlador
      type:'post',
      data:formData,
      contentType:false,
      processData:false,
      success: function(response){
          location.reload("listarUsuarios.php");
          
      }
  });
Swal.fire(
  'Estado!',
  'Estado Cambiado',
  'warning'
);
}


});

}
  </script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>

</html>