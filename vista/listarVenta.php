<?php
session_start();
if(!isset($_SESSION['nombreUsuario'])){
    header('Location:../index.html');
}
include("../controlador/controladorVenta.php");
$nombre=$_SESSION['nombreUsuario'];
$rol=$_SESSION['IdRol'];


$listaVentas = $ControladorVenta->listarVenta();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Ventas</title>
  <link rel="icon" type="image/png" href="../assets/img/logo.png">
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous">
  </script>
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous">
  </script>
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
<a href="registrarVenta.php" type="button" class="btn btn-primary">
<ion-icon name="add"></ion-icon>
<ion-icon name="cart"></ion-icon>
</a>

<h2 align="center">Gestión ventas</h2>
<div class="card mb-4">
         
          <div class="card mb-4">
           
            <div class="card-body">
              <div class="table-responsive">
<div class="card-body">
<table class="table table-bordered"  width="100%" cellspacing="0" id="tablaPedido">
<thead  class="" >
<th>Id</th>
<th>Documento</th>
<th>Nombre Cliente</th>
<th>Fecha</th>
<th>Acciones</th>
</thead>
<tbody>
<?php
foreach($listaVentas as $ventas) {
    ?>
    <tr>
    <td><?php echo $ventas['IdVenta'];?></td>
    <td><?php echo $ventas['DocumentoCliente'];?></td>
    <td><?php echo $ventas['Nombre'];?></td>
    <td><?php echo $ventas['Fecha'];?></td>
   
    <td>
    
    <form action="../controlador/controladorVenta.php" method="POST">
    <input type="hidden" name="IdVenta" value="<?php echo $ventas['IdVenta'];?>">
    
    
    
    <button type="button" class="btn btn-info" onclick="imprimirVenta(<?php echo $ventas['IdVenta']?>)">Imprimir</button>

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
    $('#tablaPedido').DataTable();
} );
function eliminarventa(idVenta){

    let formData = new FormData();
    formData.append('IdVenta',idVenta);
    formData.append('eliminarPedido','');
    Swal.fire({
        title: '¿Esta usted seguro de eliminar el pedido de  venta?',
        icon:'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si borrar este' 
}).then((result) => {
  if (result.isConfirmed) {

      $.ajax({
          url:'../controlador/controladorVenta.php',
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
function imprimirVenta(idVenta){
window.open('TCPDF-main/examples/reporteDetalleVenta.php?idVenta='+idVenta);

}

    </script>
</body>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>

<button onclick="window.print()" class="btn btn-primary">Imprimir</button>


</html>