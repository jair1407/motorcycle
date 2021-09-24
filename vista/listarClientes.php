<?php

include("../controlador/controladorCliente.php");
$listarCliente= $ControladorCliente->listarCliente();

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
  <title>Clientes</title>
  <link rel="icon" type="image/png" href="../assets/img/logo.png">
  <link href="css/styles.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous">
    </script>
</head>
<body>
</nav>
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



<a href="../controlador/controladorCliente.php?registroCliente" class="btn btn-primary">
<ion-icon name="person-add"></ion-icon>
</a>
<h2 align="center"> Gestión clientes</h2>
<div class="card mb-4">

          <div class="card mb-4">

            <div class="card-body">
              <div class="table-responsive">
<table class="table table-bordered"  width="100%" cellspacing="0" id="tablaProductos">
<thead>
<tr>

<th>Documento</th>
<th >Nombre cliente</th>
<th>Celular</th>
<th>Estado</th>
<th>Acciones</th>
</tr>
</thead>
<tbody>
<?php 

foreach($listarCliente as $cliente)
{
    ?>
    <tr>
    
    <td><?php echo $cliente['Documento'] ?></td>
    <td><?php echo $cliente['Nombre'];  ?></td>   
    <td><?php echo $cliente['Celular'];  ?></td>
    <td> 
      <?php if($cliente['EstadoCliente']==1){?>
      <button type="submit"   id="estadoCliente" onclick="cambiarEstadoCliente(<?php echo $cliente['Documento'];  ?>,0)" class="btn btn-success  " 
       ><ion-icon name="thumbs-up"></ion-icon></button>

       <?php } else{ ?>

         <button type="submit"   id="estadoCliente" onclick="cambiarEstadoCliente(<?php echo $cliente['Documento'];  ?>,1)" class="btn btn-danger  " 
         ><ion-icon name="thumbs-down"></ion-icon></button>
        
         <?php } ?>
    <td>

   
    
   
   
    <form method="POST" action="../controlador/controladorCliente.php">
         <input hidden name="documentoCliente" value="<?php echo $cliente['Documento'];?>"/>
        <button type="submit" name="editarCliente"class="btn btn-warning">
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
    
    
</body>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
  <script src="js/scripts.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/datatables-demo.js"></script>

<!-- sweet alert2 -->
<link rel="stylesheet" href="dark.css">
<script src="sweetalert2.min.js"></script>
<!--  fin sweet alert2 -->

<script>
$(document).ready(function() {
    $('#tablaProductos').DataTable({
        "language": {
            "lengthMenu": "Mostrar cantidad registros MENU  por página",
            "zeroRecords": "Nothing found - sorry",
            "info": "Mostrar paginas PAGE en PAGES",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from MAX total records)",
            'search':'Buscar',
            'paginate':{'next':'Siguiente','previous':'Anterior'}
        }

    });
} );



</script>
<script >
 function eliminarCliente(documentoCliente){

let formData = new FormData();
formData.append('documentoCliente',documentoCliente);
formData.append('eliminarCliente','');
Swal.fire({
    title: '¿Esta usted seguro de eliminar el Cliente?',
    icon:'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si borrar '
}).then((result) => {
if (result.isConfirmed) {

  $.ajax({
      url:'../controlador/controladorCliente.php',//peticion asincrona del controlador
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
function cambiarEstadoCliente(documentoCliente,estadoCliente){

let formData = new FormData();
formData.append('documentoCliente',documentoCliente);
formData.append('estadoCliente',estadoCliente);
formData.append('cambiarEstadoCliente','');
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
      url:'../controlador/controladorCliente.php',//peticion asincrona del controlador
      type:'post',
      data:formData,
      contentType:false,
      processData:false,
      success: function(response){
          location.reload("listarCliente.php");
          
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

</html>