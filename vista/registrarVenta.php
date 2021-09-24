<?php
session_start();
if(!isset($_SESSION['nombreUsuario'])){
    header('Location:../index.html');
}
include("../controlador/controladorCliente.php");
include("../controlador/controladorProducto.php");
include("../controlador/controladorServicio.php");
$nombre=$_SESSION['nombreUsuario'];
$rol=$_SESSION['IdRol'];
$listaProductos = $ControladorProducto->listarProducto();
$listaServicio = $ControladorServicio->listarServicio();
$listaClientes = $ControladorCliente->listarCliente();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous">
  </script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Registrar Pedido</title>
    <link rel="icon" type="image/png" href="../assets/img/logo.png">
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
        
        
        <h2 align="center">Registrar pedido</h2>
        <div class="card mb-4">
         
         <div class="card mb-4">
          
           <div class="card-body">
             <div class="table-responsive">
        
        <div class="card-body">
        <form name="frmPedido" id="frmPedido" class="row" method="POST" action="../controlador/controladorVenta.php">
        <div class="col text-dark" >
        <label>Pedido</label>
        <input type="text" readonly id="venta" name="venta" class="form-control "> 
        </div>
        <div class="col-md-10 text-dark">
            <label  >Cliente</label>
            <select name="cliente" id="cliente"  class="form-control text-dark ">
                <option value="">Seleccione</option>
                <?php
                foreach($listaClientes as $clientes) {
                    
               ?>
                <option value="<?php echo $clientes['Documento']; ?>">
                <?php echo $clientes['Nombre']; ?>
            </option>

            <?php
                }
               ?>
            </select>

            </div>
            <div class="col-md-6 text-dark">
                <br>
            <label> <h4 align="center">Producto</h4> </label>
            <select  name="producto" id="producto" class="form-control " onchange="consultarPrecio(this.value);consultarStock(this.value);">
            <option value="">Seleccione</option>
               <?php
                foreach($listaProductos as $producto) {
                    if($producto['Estado']==1){
                    
               ?>
                <option value="<?php echo $producto['IdProducto']; ?>">
                <?php echo $producto['Nombre']; ?>
            </option>

            <?php
                    }
                }
               ?>
               
            </select>
            </div>
            <div class="col-md-6 text-dark">
                <br>
            <label> <h4 align="center">Servicio</h4></label>
            
            <select  name="servicio" id="servicio" class="form-control " onchange="consultarValor(this.value)">
                <option value="">Seleccione</option>
               <?php
                foreach($listaServicio as $servicio) {
                    if($servicio['Estado']==1){
               ?>
                <option value="<?php echo $servicio['IdServicio']; ?>">
                <?php echo $servicio['Nombre']; ?>
            </option>

            <?php
                    }
                }
               ?>
            </select>
            </div>
            <div class="col-md-6 text-dark">
            <label >Precio producto</label>
            <input type="text" id="precio" readonly name="precio" class="form-control "> 
            </div>
            <div class="col-md-6 text-dark">
            <label >Precio servicio</label>
            <input type="text" id="precioServicio" readonly name="precioServicio" class="form-control ">
            </div>
            <div class="col-md-6 text-dark">
            <label>Cantidad productos</label>
            <input type="number" id="cantidad" name="cantidad" class="form-control " pattern="[0-9]" >
            </div>
            <div class="col-md-6 text-dark">
            <label>Cantidad servicios</label>
            <input type="text" id="cantidadServicio" readonly  name="cantidadServicio" value="1" class="form-control " >
            </div>
            <div class="col-md-6 text-dark">
        <label>Valor detalle</label>     
        <input type="text" id="valorDetalle" readonly class="form-control">
        </div>
        <div class="col-md-6 text-dark">
        <label>Valor servicio</label>     
        <input type="text" id="valorDetalleServicio" readonly class="form-control">
        </div>

         
        <input type="hidden" id="stockProducto" name="stockProducto" class="form-control">
       
        <input type="hidden" id="registrarVenta" name="registrarVenta" >
        
        <div class="col-md-6">
        <p align="center"><button type="button" onclick="registrarProducto()"  class="btn btn-dark">Agregar Producto</button></p>
        </div>
        <div class="col-md-6">
        <p align="center"> <button type="button" onclick="registrarServicio()"   class="btn btn-dark">Agregar Servicio</button></p>
        </div>
        </form>
        </nav>
  
        <div id="contenidoDetalle" >
        
        </div>
        <div id="contenido"   >

        </div>
        <div id="Total" class="text-dark">

        </div>

    </div>
        </div>
        </main>
        </div>
        <script src="js/scripts.js"></script>

</body>
 


<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>

<script >

function registrarProducto(){
  /*  let idProducto = $('#producto').val();
    consultarStock(idProducto);
    let stock = $('#stockProducto').val();
    let cantidad = $('#cantidad').val();
    if(cantidad>stock){
        alert('No tenemos stock suficiente');
    }
    else{*/
    $('#registrarVenta').val('productos');
    event.preventDefault();
    if($('#cliente').val()==""){
        Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Debe seleccionar el cliente'
  
})
    } else if($('#producto').val()==""){
        Swal.fire({
  icon: 'error',
  title: 'No ha seleccionado el producto',
  text: 'Debe seleccionar el producto'
  
})
    }
     if($('#cantidad').val()==""){
        Swal.fire({
  icon: 'error',
  title: 'Por favor ingrese la cantidad deseada',
  text: 'Debe ingresar la cantidad del producto'
  
})
    }else{
        $.ajax({
            url:'../controlador/controladorVenta.php',
            type:'post',
            data:$('#frmPedido').serialize(),
            //contentType:false,
            //processData:false,
            success: function(response){
                if(response=="stockinferior"){
                                    Swal.fire({
                icon: 'error',
                title: 'No hay stock suficiente',
                text: 'No hay la cantidad suficiente de productos'
                
                })
                }
                else{
                $('#venta').val(response);
                listarDetalleVenta();
               
                }
            }
      });
    }


};
function registrarServicio(){
    $('#registrarVenta').val('servicios');
        event.preventDefault();
    if($('#cliente').val()==""){
        Swal.fire({
  icon: 'error',
  title: 'Ojo',
  text: 'Debe seleccionar el cliente'
  
})
        //alert("Debe seleccionar el cliente");
    } else if($('#servicio').val()==""){
        Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Debe seleccionar el servicio'
  
})
    }
    else{
        $.ajax({
            url:'../controlador/controladorVenta.php',
            type:'post',
            data:$('#frmPedido').serialize(),
            //contentType:false,
            //processData:false,
            success: function(response){
                $('#venta').val(response);
                //listarDetalleVenta();
                listarDetalleServicio();
              

            }
      });
    }

};
function totalVenta(){
    let formData = new FormData();
    formData.append('idVenta',  $('#venta').val());
    formData.append('totalVenta','');
    $.ajax({
            url:'../controlador/controladorVenta.php',
            type:'post',
            data:formData,
            contentType:false,
            processData:false,
            success: function(response){
                console.log(response);   
               document.getElementById('Total').innerHTML = "$Total: "+response;
            }
      });
}

/*function totalServicio(){
    let formData = new FormData();
    formData.append('idVenta',  $('#venta').val());
    formData.append('totalVenta','');
    $.ajax({
            url:'../controlador/controladorVenta.php',
            type:'post',
            data:formData,
            contentType:false,
            processData:false,
            success: function(response){
                console.log(response);  
                 
            }
      });
}*/

  function listarDetalleVenta(){
      let formData = new FormData();
      formData.append('listarDetalleVenta',''); //Asignando parametros
      formData.append('venta',$('#venta').val()); //Asignando parametros
      $.ajax({
            url:'../controlador/controladorVenta.php',
            type:'post',
            data:formData,
            contentType:false,
            processData:false,
            success: function(response){
                document.getElementById('contenidoDetalle').innerHTML =response;
                totalVenta();
                
            }
      });
  }
  function listarDetalleServicio(){
      let formData = new FormData();
      formData.append('listarDetalleServicio',''); //Asignando parametros
      formData.append('servicio',$('#venta').val()); //Asignando parametros
      $.ajax({
            url:'../controlador/controladorServicio.php',
            type:'post',
            data:formData,
            contentType:false,
            processData:false,
            success: function(response){
                document.getElementById('contenido').innerHTML = response;
                totalVenta();
               
               
                
            }
      });
  }
 
 
  
  function eliminarDetalleVenta(idDetalleVenta){
        if(confirm('¿Esta seguro eliminar el producto del pedido?')){
            let formData = new FormData();
        formData.append('eliminarDetalleVenta',''); //Asignando parametros
        formData.append('idDetalleVenta',idDetalleVenta); //Asignando parametros
        $.ajax({
                url:'../controlador/controladorVenta.php',
                type:'post',
                data:formData,
                contentType:false,
                processData:false,
                success: function(response){
                   alert(response);
                   listarDetalleVenta();//Refrescar despues de eliminar

                    
                }
        });
        }
  }
  function actualizarDetalleVenta(idDetalleVenta,Cantidad){
    let formData = new FormData();
        formData.append('actualizarDetalleVenta',''); //Asignando parametros
        formData.append('idDetalleVenta',idDetalleVenta);
        formData.append('cantidad',Cantidad); //Asignando parametros
        $.ajax({
                url:'../controlador/controladorPedido.php',
                type:'post',
                data:formData,
                contentType:false,
                processData:false,
                success: function(response){
                   alert(response);
                   //listarDetallePedido();//Refrescar despues de eliminar

                    
                }
        });
  }

function consultarPrecio(idProducto){
    $('#precio').val('');
    $('#cantidad').val('');
    $('#valorDetalle').val('');
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
function consultarStock(idProducto){
    console.log(idProducto);
    let formData = new FormData();
    formData.append('idProducto',idProducto);
    formData.append('consultarStock','');
    $.ajax({
            url:'../controlador/controladorProducto.php',
            type:'post',
            data:formData,
            contentType:false,
            processData:false,
            success: function(response){
                $('#stockProducto').val(response);
                console.log(idProducto+"-"+response);   
            }
      });
}
function consultarValor(idServicio){
    $('#precioServicio').val('');
    $('#valorDetalleServicio').val('');
    let formData = new FormData();
    formData.append('idServicio',idServicio);
    formData.append('consultarValor','');
    $.ajax({
            url:'../controlador/controladorServicio.php',
            type:'post',
            data:formData,
            contentType:false,
            processData:false,
            success: function(response){
                $('#precioServicio').val(response);
                $('#valorDetalleServicio').val(response);
                
            }
      });
}

  function eliminarDetalleServicio(idDetalleServicio){
        if(confirm('¿Esta seguro eliminar el servicio del pedido?')){
            let formData = new FormData();
        formData.append('eliminarDetalleServicio',''); //Asignando parametros
        formData.append('idDetalleServicio',idDetalleServicio); //Asignando parametros
        $.ajax({
                url:'../controlador/controladorServicio.php',
                type:'post',
                data:formData,
                contentType:false,
                processData:false,
                success: function(response){
                   alert(response);
                   listarDetalleServicio();//Refrescar despues de eliminar

                    
                }
        });
        }
  }
  function actualizarDetalleVenta(idDetalleVenta,Cantidad){
    let formData = new FormData();
        formData.append('actualizarDetalleVenta',''); //Asignando parametros
        formData.append('idDetalleVenta',idDetalleVenta);
        formData.append('cantidad',Cantidad); //Asignando parametros
        $.ajax({
                url:'../controlador/controladorVenta.php',
                type:'post',
                data:formData,
                contentType:false,
                processData:false,
                success: function(response){
                   alert(response);
                   //listarDetallePedido();

                    
                }
        });
  }

  $('#cantidad').keyup(function(){
       $('#valorDetalle').val($('#cantidad').val() * $('#precio').val());
});
$('#cantidad').keypress(function(){
       $('#valorDetalle').val($('#cantidad').val() * $('#precio').val());
});




</script>
</html>