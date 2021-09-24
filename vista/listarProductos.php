<?php 
  session_start();
  if(!isset($_SESSION['nombreUsuario'])){
      header('Location:../index.html');
  }
  include("../controlador/controladorProducto.php");
  $listaProducto = $ControladorProducto->listarProducto();
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
  <title>Productos</title>
  <link rel="icon" type="image/png" href="../assets/img/logo.png">
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    crossorigin="anonymous"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous">
  </script>    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
<a href="../controlador/controladorProducto.php?registrarProducto" type="button" class="btn btn-primary">
<ion-icon name="add-circle-outline"></ion-icon></a>

<h2 align="center">Gestión productos</h2>
<div class="card mb-4">
         
          <div class="card mb-4">
           
            <div class="card-body">
              <div class="table-responsive">
<div class="card-body">
<table class="table table-bordered"  width="100%" cellspacing="0"id="tablaProductos">
<thead>
<th>Id</th>
<th>Nombre producto</th>
<th>Precio</th>
<th>Marca</th>
<th>Categoría</th>
<th>Stock</th>
<th>Estado</th>
<th>Acciones</th>
</thead>
<tbody>
<?php
foreach($listaProducto as $producto) {
    ?>
    <tr>
    <td><?php echo $producto['IdProducto'];?></td>
    <td><?php echo $producto['Nombre'];?></td>
    <td><?php echo $producto['Precio'];?></td>
    <td><?php echo $producto['NombreMarca'];?></td>
    <td><?php echo $producto['NombreCategoria'];?></td>
    <td><?php echo $producto['Stock'];?> </td>
    
 
  <td> 
      <?php if($producto['Estado']==1){?>
      <button type="submit"   id="estadoProducto" onclick="cambiarEstado(<?php echo $producto['IdProducto'];  ?>,0)" class="btn btn-success  " 
       ><ion-icon name="thumbs-up"></ion-icon></button>

       <?php } else{ ?>

         <button type="submit"   id="estadoProducto" onclick="cambiarEstado(<?php echo $producto['IdProducto'];  ?>,1)" class="btn btn-danger  " 
         ><ion-icon name="thumbs-down"></ion-icon></button>
        
         <?php } ?>
    <td>
    
    <form action="../controlador/controladorProducto.php" method="POST">
    <input type="hidden" name="idProducto" value="<?php echo $producto['IdProducto'];?>">
    <button type="submit" name="editarProducto" class="btn btn-warning">
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
    $('#tablaProductos').DataTable();
} );


function cambiarEstado(idProducto,estadoProducto){

let formData = new FormData();
formData.append('idProducto',idProducto);
formData.append('estadoProducto',estadoProducto);
formData.append('cambiarEstado','');
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
      url:'../controlador/controladorProducto.php',//peticion asincrona del controlador
      type:'post',
      data:formData,
      contentType:false,
      processData:false,
      success: function(response){
          location.reload("listarProductos.php");
          
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