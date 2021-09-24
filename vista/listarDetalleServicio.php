<?php

require_once("../controlador/controladorServicio.php");
$listaDetalleServicio = $ControladorServicio->listarDetalleServicio($idVenta);


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Detalle de servicios</title>
  <link rel="icon" type="image/png" href="../assets/img/logo.png">
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
 

</head>
<body>

<div class="container mt-4">
<div class="card border-info">
<div class="card-header bg-dark text-white">
   Detalle de servicio <?php echo $idVenta ?>
</div>
</div>

<div class="card-body">
<table  class="table">
<thead>
<tr>
<th>Id</th>
<th>Servicio</th>
<th>Cantidad</th>
<th>Valor unitario</th>
<th>Valor detalle servicio</th>
<th>Acciones</th>
</tr>
</thead>
<tbody>
<?php
$totalDetalleServicio = 0;
foreach($listaDetalleServicio as $detalleServicio) 
{
    
    $totalDetalleServicio= $totalDetalleServicio + $detalleServicio['Cantidad'] * $detalleServicio['ValorUnitario'];
?>
<tr>
<td><?php echo $detalleServicio['IdDetalleServicio'];?></td>
<td><?php echo $detalleServicio['IdServicio']."-".$detalleServicio['Nombre']?></td>
<td><input type="text" id="cantidad<?php echo $detalleServicio['IdDetalleServicio'];?>" value="<?php echo $detalleServicio['Cantidad'];?>"
onkeyup="actualizarDetalleVenta(<?php echo $detalleServicio['IdDetalleServicio'];?>,this.value)"
onkeypress="actualizarDetalleVenta(<?php echo $detalleServicio['IdDetalleServicio'];?>,this.value)"
onkeydown="actualizarDetalleVenta(<?php echo $detalleServicio['IdDetalleServicio'];?>,this.value)"
onblur="listarDetalleServicio()"
/></td>
<td align="right">$<?php echo number_format( $detalleServicio['ValorUnitario'],2,",",".");?></td>
<td align="right">$<?php echo number_format( $detalleServicio['Cantidad'] *$detalleServicio['ValorUnitario'],2,",",".");?></td>
<td><button type="button" onclick="eliminarDetalleServicio(<?php echo $detalleServicio['IdDetalleServicio'];?>)">Eliminar</button></td>

</tr>

<?php

}
?>
<tr>
<td colspan="4" align="right">$Total servicios:</td>
<td align="right"><?php echo number_format( $totalDetalleServicio,2,",",".") ?></td>
</tr>

</tbody>


</table>
</div>

</div>

    
</body>

</html>