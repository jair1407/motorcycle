
<?php
include("../controlador/controladorCategoria.php");

$listarCategoria= $ControladorCategoria->listarCategoria();

session_start();
if(!isset($_SESSION['nombreUsuario'])){
    header('Location:../index.html');
}
include("../controlador/controladorAcceso.php");
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
  <title> Categorías Productos</title>
  <link rel="icon" type="image/png" href="../assets/img/logo.png">
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous">
  </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
<a href="../controlador/controladorCategoria.php?registrarCategoria" class="btn btn-primary">
<ion-icon name="add-circle-outline"></a>

<h2 align="center"> Categorías productos</h2>
<div class="card mb-4">
         
         <div class="card mb-4">
          
           <div class="card-body">
             <div class="table-responsive">
<div class="card-body">
<table class="table table-bordered"  width="100%" cellspacing="0" id="tablaCategorias">
<thead>
<tr>
<th >Id</th>
<th >Nombre categoría</th>
<th>Estado</th>
<th>Acciones</th>
</tr>
</thead>
<tbody>
<?php 

foreach($listarCategoria as $categoria)
{
    ?>
    <tr>
    <td><?php echo $categoria['IdCategoria'];  ?></td>
    <td><?php echo $categoria['NombreCategoria'];  ?></td>
    <td> 
      <?php if($categoria['Estado']==1){?>
      <button type="submit"   id="estadoCategoria" onclick="cambiarEstadoCategoria(<?php echo $categoria['IdCategoria'];  ?>,0)" class="btn btn-success  " 
       ><ion-icon name="thumbs-up"></ion-icon></button>

       <?php } else{ ?>

         <button type="submit"   id="estadoCategoria" onclick="cambiarEstadoCategoria(<?php echo $categoria['IdCategoria'];  ?>,1)" class="btn btn-danger  " 
         ><ion-icon name="thumbs-down"></ion-icon></button>
        
         <?php } ?>
    <td>
    
    <form method="POST" action="../controlador/controladorCategoria.php">
         <input type="hidden"  name="idCategoria" value="<?php echo $categoria['IdCategoria'];?>"/>
        <button type="submit" name="editarCategoria"class="btn btn-warning"><ion-icon name="create"></button>
       
       
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



<!-- sweet alert2 -->
<link rel="stylesheet" href="dark.css">
<script src="sweetalert2.min.js"></script>
<!--  fin sweet alert2 -->

<script>
$(document).ready(function() {
    $('#tablaCategorias').DataTable({
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
 



function cambiarEstadoCategoria(idCategoria,estadoCategoria){

let formData = new FormData();
formData.append('idCategoria',idCategoria);
formData.append('estadoCategoria',estadoCategoria);
formData.append('cambiarEstadoCategoria','');
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
      url:'../controlador/controladorCategoria.php',//peticion asincrona del controlador
      type:'post',
      data:formData,
      contentType:false,
      processData:false,
      success: function(response){
          location.reload("listarCategorias.php");
          
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