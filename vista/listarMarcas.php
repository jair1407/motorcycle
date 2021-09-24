
<?php
include("../controlador/controladorMarca.php");
$listarMarca= $ControladorMarca->listarMarca();

session_start();
if(!isset($_SESSION['nombreUsuario'])){
    header('Location:../index.html');
}
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
  <title>Marcas</title>
  <link rel="icon" type="image/png" href="../assets/img/logo.png">
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous">
  </script>
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
<div class="card border-infos">

<div class="card-header bg-dark text-white">
<a href="../controlador/controladorMarca.php?registrarMarca" class="btn btn-primary">
<ion-icon name="add-circle"></ion-icon></a>

<h2 align="center">Marcas</h2>
<div class="card mb-4">
         
         <div class="card mb-4">

<div class="card-body">
             <div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" id="tablaProductos">
<thead>
<tr>
<th >Id</th>
<th >Nombre marca</th>
<th>Estado</th>
<th>Acciones</th>
</tr>
</thead>
<tbody>
<?php 

foreach($listarMarca as $marca)
{
    ?>
    <tr>
    <td><?php echo $marca['IdMarca'];  ?></td>
    <td><?php echo $marca['NombreMarca'];  ?></td>
    <td> 
      <?php if($marca['EstadoMarca']==1){?>
      <button type="submit"   id="estadoMarca" onclick="cambiarEstadoMarca(<?php echo $marca['IdMarca'];  ?>,0)" class="btn btn-success  " 
       ><ion-icon name="thumbs-up"></ion-icon></button>

       <?php } else{ ?>

         <button type="submit"   id="estadoMarca" onclick="cambiarEstadoMarca(<?php echo $marca['IdMarca'];  ?>,1)" class="btn btn-danger  " 
         ><ion-icon name="thumbs-down"></ion-icon></button>
        
         <?php } ?>
    <td>
    <form method="POST" action="../controlador/controladorMarca.php">
    <input type="hidden"  name="idMarca" value="<?php echo $marca['IdMarca'];?>">
        <button type="submit" name="editarMarca"   class="btn btn-warning">
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
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
  <script src="js/scripts.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/datatables-demo.js"></script>
</body>

  </script>

<!-- sweet alert2 -->
<link rel="stylesheet" href="dark.css">
<script src="sweetalert2.min.js"></script>
<!--  fin sweet alert2 -->

<script>
$(document).ready(function() {
    $('#tablaProductos').DataTable({
        "language": {
            "lengthMenu": "Mostrar cantidad registros _MENU_  por página",
            "zeroRecords": "Nothing found - sorry",
            "info": "Mostrar paginas _PAGE_ en _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)",
            'search':'Buscar',
            'paginate':{'next':'Siguiente','previous':'Anterior'}
        }

    });
} );



</script>
<script >
 
function cambiarEstadoMarca(idMarca,estadoMarca){

let formData = new FormData();
formData.append('idMarca',idMarca);
formData.append('estadoMarca',estadoMarca);
formData.append('cambiarEstadoMarca','');
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
      url:'../controlador/controladorMarca.php',//peticion asincrona del controlador
      type:'post',
      data:formData,
      contentType:false,
      processData:false,
      success: function(response){
          location.reload("listarMarca.php");
          
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