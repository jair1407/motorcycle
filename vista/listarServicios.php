<?php 
  session_start();
  if(!isset($_SESSION['nombreUsuario'])){
      header('Location:../index.html');
  }
  include("../controlador/controladorServicio.php");
  $listaServicios = $ControladorServicio->listarServicio();
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
  <title>Servicios</title>
  <link rel="icon" type="image/png" href="../assets/img/logo.png">
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous">
    </script>
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    crossorigin="anonymous" />
   
  
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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
       
       
      <div class="container mt-4">
<div class="card border info">
<div class="card-header bg-dark text-white">
<a href="../controlador/controladorServicio.php?registrarServicio" type="button" class="btn btn-primary">
<ion-icon name="add-circle"></ion-icon></a>

<h2 align="center">Gestión servicios</h2>

<div class="card mb-4">
         
          <div class="card mb-4">
           
            <div class="card-body">
            <div class="table-responsive">
<table class="table table-bordered" width="100%" cellspacing="0" id="tablaServicios" >
<thead>
<th>Id</th>
<th>Nombre servicio</th>
<th>Descripción</th>
<th>Precio</th>
<th>Estado</th>
<th>Acciones</th>
</thead>
<tbody>
<?php
foreach($listaServicios as $servicio) {
    ?>
    <tr>
    <td><?php echo $servicio['IdServicio'];?></td>
    <td><?php echo $servicio['Nombre'];?></td>
    <td><?php echo $servicio['Descripcion'];?></td>
    <td><?php echo $servicio['Precio'];?></td>
    
    <td> 
      <?php if($servicio['Estado']==1){?>
      <button type="submit"   id="estadoServicio" onclick="cambiarEstadoServicio(<?php echo $servicio['IdServicio'];  ?>,0)" class="btn btn-success  " 
       ><ion-icon name="thumbs-up"></ion-icon></button>

       <?php } else{ ?>

         <button type="submit"   id="estadoServicio" onclick="cambiarEstadoServicio(<?php echo $servicio['IdServicio'];  ?>,1)" class="btn btn-danger  " 
         ><ion-icon name="thumbs-down"></ion-icon></button>
        
         <?php } ?>
    <td>
    <form action="../controlador/controladorServicio.php" method="POST">
    <input type="hidden" id="idServicio" name="idServicio" value="<?php echo $servicio['IdServicio'];?>">
    <button type="submit" name="editarServicio" class="btn btn-warning">
    <ion-icon name="create"></ion-icon>
    </button>
    
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
<script >
    $(document).ready(function() {
    $('#tablaServicios').DataTable();
} );
function eliminarServicio(idServicio){

    let formData = new FormData();
    formData.append('idServicio',idServicio);
    formData.append('eliminarServicio','');
    Swal.fire({
        title: '¿Esta usted seguro de eliminar el servicio?',
        icon:'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si borrar este' 
}).then((result) => {
  if (result.isConfirmed) {

      $.ajax({
          url:'../controlador/controladorServicio.php',
          type:'post',
          data:formData,
          contentType:false,
          processData:false,
          success: function(response){
            
          }
      });
    Swal.fire(
      'Eliminado!',
      'El registro ha sido eliminado',
      'warning'
    );
   }
});

}

function cambiarEstadoServicio(idServicio,estadoServicio){

let formData = new FormData();
formData.append('idServicio',idServicio);
formData.append('estadoServicio',estadoServicio);
formData.append('cambiarEstadoServicio','');
Swal.fire({
    title: '¿Quieres cambiar el estado?',
    icon:'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si cambiar'
}).then((result) => {
if (result.isConfirmed) {

  $.ajax({
      url:'../controlador/controladorServicio.php',//peticion asincrona del controlador
      type:'post',
      data:formData,
      contentType:false,
      processData:false,
      success: function(response){
          location.reload("listarServicios.php");
          
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