<?php
require_once("conexion.php");
include("../modelo/crudVenta.php");
include("../modelo/Venta.php");
include("../modelo/detalleVenta.php");
include("controladorServicio.php");
include("controladorProducto.php");
class ControladorVenta{
    public function __construct(){}//Constructor
    public function listarVenta(){//Metodo para hacer la peticion al modelo pedidos
        $crudVenta= new  crudVenta();//Crear un objeto de la clase crud Pedido
        return $crudVenta->listarVenta();//Retornando los valores del metodo listar pedidos
    }
    public function registrarVenta($cliente){
        $venta = new Venta();
        $venta->setDocumentoCliente($cliente);
        
        
        


        $crudVenta= new  CrudVenta();//Crear un objeto de la clase crud Producto
        return $crudVenta->registrarVenta($venta);
    }
    public function registrarDetalleVenta($idVenta,$idProducto,$cantidad,$valorUnitario){
        $detalleVenta = new detalleVenta();
        $detalleVenta->setIdDetalleVenta($idVenta);
        $detalleVenta->setIdProducto($idProducto);
        $detalleVenta->setCantidad($cantidad);
        $detalleVenta->setValorUnitario($valorUnitario);
        $crudVenta= new  crudVenta();//Crear un objeto de la clase crud Producto
        return $crudVenta->registrarDetalleVenta($detalleVenta);


    }
   
    
    public function listarDetalleVenta($idVenta){//Metodo para hacer la peticion al modelo pedidos
        $crudVenta= new  crudVenta();//Crear un objeto de la clase crud Pedido
        return $crudVenta->listarDetalleVenta($idVenta);//Retornando los valores del metodo listar pedidos
    }
    public function eliminarDetalleVenta($idDetalleVenta){//Metodo para hacer la peticion al modelo pedidos
        $crudVenta= new  crudVenta();//Crear un objeto de la clase crud Pedido
        return $crudVenta->eliminarDetalleVenta($idDetalleVenta);//Retornando los valores del metodo listar pedidos
    }
    public function actualizarDetalleVenta($idDetalleVenta,$cantidad){//Metodo para hacer la peticion al modelo pedidos
        $crudVenta= new  crudVenta();//Crear un objeto de la clase crud Pedido
        return $crudVenta->actualizarDetalleVenta($idDetalleVenta,$cantidad);//Retornando los valores del metodo listar pedidos
    }
    public function totalVenta($idVenta){
        $crudVenta = new crudVenta();
        return $crudVenta->totalVenta($idVenta);

    }
    
   

}

$ControladorVenta =new ControladorVenta();

if(isset($_GET['registrarProducto'])){
    header('Location:../vista/registrarVenta.php');
}
if(isset($_POST['registrarVenta'])){
 if ($_POST['registrarVenta']=='productos') {
    $idVenta=$_POST['venta'];
  
   
   $stock=$ControladorProducto->buscarProducto($_POST['producto'])['Stock'];
   if($_POST['cantidad']>$stock){
       echo "stockinferior";
   }else{
    if($idVenta==""){
        $idVenta=$ControladorVenta->registrarVenta($_POST['cliente']);
        
        }
 
   
   $ControladorVenta->registrarDetalleVenta($idVenta,$_POST['producto'],$_POST['cantidad'],$_POST['precio']);

   echo $idVenta;
    }
  
   
   
 }else if(isset($_POST['registrarVenta'])){
    if ($_POST['registrarVenta']=='servicios') {
    $idVenta=$_POST['venta'];
    if($idVenta==""){
        
    $idVenta=$ControladorVenta->registrarVenta($_POST['cliente']);
    
    }
    $ControladorServicio = new ControladorServicio();
   $ControladorServicio->registrarDetalleServicio($idVenta,$_POST['servicio'],$_POST['cantidadServicio'],$_POST['precioServicio']);
    ($ControladorServicio);
    echo $idVenta;
    if($_POST['servicio']<1 && $_POST['venta'] <1){
        $idVenta=="";

    }
    
    
 
}
 }
    
}

else if(isset($_POST['listarDetalleVenta'])){
    $idVenta = $_POST['venta'];
      require_once('../vista/listarDetalleVenta.php');
     
       
} else if(isset($_POST['eliminarDetalleVenta'])){
   echo $ControladorVenta->eliminarDetalleVenta($_POST['idDetalleVenta']);
   
}else if(isset($_POST['actualizarDetalleVenta'])){
  echo  $ControladorVenta->actualizarDetalleVenta($_POST['idDetalleVenta'],$_POST['cantidad']);
   
}
else if(isset($_POST['totalVenta'])){
    echo  $ControladorVenta->totalVenta($_POST['idVenta'])['SumaVentas']+ $ControladorServicio->totalServicio($_POST['idVenta'])['SumaServicio'];
     
  }
  




    ?>