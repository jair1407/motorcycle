<?php
session_start();
if(!isset($_SESSION['nombreUsuario'])){
    header('Location:../index.html');
}
include("../controlador/controladorEntrada.php");
include("../controlador/controladorProducto.php");
$listaProductos = $ControladorProducto->listarProducto();
$listaEntradas = $controladorEntrada->listarEntrada();
$nombre=$_SESSION['nombreUsuario'];
  $rol=$_SESSION['IdRol'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Compras</title>
    <link rel="icon" type="image/png" href="../assets/img/logo.png">
    <link href="css/styles.css" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<?php 
include "layout/navbar.php";
?>
<body class="sb-nav-fixed">

  <div id="layoutSidenav">
  <?php include 'sidebar.php'; ?>
  
    </div>
    <div id="layoutSidenav_content">


      <main>
 
    <div class="container mt-4">
        <div class="card border info">
        <div class="card-header bg-dark text-white">
        
        
        <h2 align="center">Realizar compra</h2>

        </div>
        </div>
        <div class="card mb-4">
           
            <div class="card-body">
              <div class="table-responsive">
        <main class="container p-4">
        <div class="row">
    <div class="col-md-4">
<div class="card card-body">
  
        <form name="frmEntrada" id="frmEntrada" action="../controlador/controladorEntrada.php" method="POST">
          <div class="form-group">
            <input type="date" name="fecha" id="fecha"  class="form-control" placeholder="Fecha" autofocus>
          </div>
          <div class="form-group">
            <textarea name="descripcion" id="descripcion"rows="2" class="form-control" placeholder="Ingresa una descripción"></textarea>
          </div>
          <input type="hidden" name="registrarEntrada" >
          <input type="button" onclick="validarEntrada()" class="btn btn-dark btn-block" value="Guardar Compra">
        </form>
      </div>
    </div>

    </div>
      
        <div class="col-md-8">
            <h1>Datos de compra</h1>
            <form name="frmCompra" id="frmCompra"  action="../controlador/controladorCompras.php" method="POST">
            <div class="form-group">
            <label >Id</label>
            <input type="text" id="id" name="id" class="form-control" readonly></input>
            </div>
            <div class="form-group">
        <label>Entrada</label>
            <select name="entrada" id="entrada" class="form-control">
                <option value="">Seleccione</option>
                <?php
                foreach($listaEntradas as $entrada) {
                    
               ?>
                <option value="<?php echo $entrada['IdEntrada']; ?>">
                <?php echo $entrada['Descripcion']; ?>
            </option>

            <?php
                }
               ?>
            </select>
            </div>
            <div class="form-group">
            <label>Producto</label>
            <select name="producto" id="producto" class="form-control">
                <option value="">Seleccione</option>
                <?php
                foreach($listaProductos as $productos) {
                    if($productos['Estado']==1){
                    
               ?>
                <option value="<?php echo $productos['IdProducto']; ?>">
                <?php echo $productos['Nombre']; ?>
            </option>

            <?php
                    }
                }
               ?>
            </select>
            </div>
            <div class="form-group">
            <label >Cantidad</label>
            <input type="text" id="cantidad" name="cantidad" class="form-control"></input>
            </div>
            
   
            <input type="button" name="agregarProducto" id="agregarProducto"  class="btn btn-dark btn-block" value="Agregar Producto">
            <div class="table-responsive">
                <table style="width: 100%;" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Entrada</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody id="registroProducto">


                    </tbody>
                </table>
            </div>
            <input type="hidden">
            <input type="submit"    name="registrarCompra" class="btn btn-dark btn-block" value="Guardar Compra">
            </form>

            
        </div>
       
        </div> 
        
      </main>
      <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/datatables-demo.js"></script>
</body>
<script src="validaciones/validaciones.js"></script>
<!-- sweet alert2 -->

<link rel="stylesheet" href="dark.css">
<script src="sweetalert2.min.js"></script>
<!--  fin sweet alert2 -->

</html>
<script>

function consultarPrecio(idProducto){
    $('#precio').val('');
    $('#cantidad').val('');
    $('#total').val('');
    let formData = new FormData();
    formData.append('idProducto',idProducto);
    formData.append('consultarPrecio','');
    $.ajax({
            url:'../controlador/controladorProducto.php',
            type:'post',
            data:formData,
            contentType:false,
            processData:false,
            success: function(response){
                $('#precio').val(response);
                
            }
      });
}

var idArray = [];
var cantidadArray = [];
$(document).ready(function(){
    $('#agregarProducto').click(function(){
      var Identrada = $("#entrada option:selected").val();
        var Idproducto = $("#producto option:selected").val();
      


        var entrada = $("#entrada option:selected").text();
        var producto = $("#producto option:selected").text();
        var cantidad =  parseInt($("#cantidad").val());


        if($('#entrada').val()==""){
        Swal.fire({
  icon: 'error',
  title: 'No ha seleccionado la entrada',
  text: 'Debe seleccionar el producto'
  
})
    }

       else if($('#producto').val()==""){
        Swal.fire({
  icon: 'error',
  title: 'No ha seleccionado el producto',
  text: 'Debe seleccionar el producto'
  
})
    }
    else  if($('#cantidad').val()==""){
        Swal.fire({
  icon: 'error',
  title: 'Por favor ingrese la cantidad deseada',
  text: 'Debe ingresar la cantidad del producto'
  
})
    }else{
      
        if(idArray.includes(Idproducto)){
            $(`#tr-${Idproducto}`).remove();
            let indice = idArray.indexOf(Idproducto);
            cantidad += parseInt(cantidadArray[indice]);
            cantidadArray.splice(indice, 1);
            idArray.splice(indice, 1);
            cantidadArray.push(cantidad);
            idArray.push(Idproducto);
        }else{
            idArray.push(Idproducto);
            cantidadArray.push(cantidad);
        }
        $('#registroProducto').append(`
            <tr id="tr-${Idproducto}">
                <input type="hidden" name="Identrada[]"  value="${Identrada}">
                <input type="hidden" name="Idproducto[]"  value="${Idproducto}">
                <input type="hidden"  name="cantidad[]" value="${cantidad}">
                <td>${entrada}</td>
                <td>${producto}</td>
                <td>${cantidad}</td>
                <td>
                    <button type="button" onclick="eliminarCompra(${Idproducto})" class="btn btn-danger">Eliminar</button>
                </td>
            </tr>
        `);
                   
                   
                    $("#producto").focus()
    }
    });
});

function eliminarCompra(Idproducto){
    let indice = idArray.indexOf(Idproducto);
    cantidadArray.splice(indice, 1);
    idArray.splice(indice, 1);
    $('#tr-'+Idproducto).remove();
} 



</script>