<?php
require_once("conexion.php");
include("../modelo/crudServicio.php");
include("../modelo/Servicio.php");
include("../modelo/detalleServicio.php");

class ControladorServicio{
    public function __construct(){}//Constructor
    public function listarServicio(){//Metodo para hacer la peticion al modelo pedidos
        $crudServicio= new  crudServicio();//Crear un objeto de la clase crud Pedido
        return $crudServicio->listarServicio();//Retornando los valores del metodo listar pedidos
    }
    public function registrarServicio($nombre,$descripcion,$precio,$estadoServicio){
        $servicio = new Servicio();
        $servicio->setNombre($nombre);
        $servicio->setDescripcion($descripcion);
        $servicio->setPrecio($precio);
        $servicio->setEstadoServicio($estadoServicio);
        
        
    
        $crudServicio = new crudServicio();
       return $crudServicio->registrarServicio($servicio);
        header('Location:../vista/listarServicios.php');
        
        
       
    
        }
        public function buscarServicio($idServicio){
            $crudServicio = new crudServicio();
             return $crudServicio->buscarServicio($idServicio);
        }
        public function actualizarServicio($idServicio,$nombre,$descripcion,$precio,$estadoServicio){
            $servicio = new Servicio();
            $servicio->setIdServicio($idServicio);
            $servicio->setNombre($nombre);
            $servicio->setDescripcion($descripcion);
            $servicio->setPrecio($precio);
            $servicio->setEstadoServicio($estadoServicio);
           
            $crudServicio = new crudServicio();
          return  $crudServicio->actualizarServicio($servicio);
           header('Location:../vista/listarServicios.php');
    
        }
        public function eliminarServicio($idServicio){
            $crudServicio = new crudServicio();
             return $crudServicio->eliminarServicio($idServicio);
        }
        public function registrarDetalleServicio($idVenta,$idServicio,$cantidad,$valorUnitario){
            $detalleServicio = new detalleServicio();
            $detalleServicio->setIdVenta($idVenta);
            $detalleServicio->setIdServicio($idServicio);
            $detalleServicio->setCantidad($cantidad);
            $detalleServicio->setValorUnitario($valorUnitario);
            $crudServicio= new  crudServicio();//Crear un objeto de la clase crud Producto
            return $crudServicio->registrarDetalleServicio($detalleServicio);
    
    
        }
        public function listarDetalleServicio($idVenta){//Metodo para hacer la peticion al modelo pedidos
            $crudServicio= new  crudServicio();//Crear un objeto de la clase crud Pedido
            return $crudServicio->listarDetalleServicio($idVenta);//Retornando los valores del metodo listar pedidos
        }
        public function eliminarDetalleServicio($idDetalleServicio){//Metodo para hacer la peticion al modelo pedidos
            $crudServicio= new  crudServicio();//Crear un objeto de la clase crud Pedido
            return $crudServicio->eliminarDetalleServicio($idDetalleServicio);//Retornando los valores del metodo listar pedidos
        }
        public function actualizarDetalleServicio($idDetalleServicio,$cantidad){//Metodo para hacer la peticion al modelo pedidos
            $crudServicio= new  crudServicio();//Crear un objeto de la clase crud Pedido
            return $crudServicio->actualizarDetalleServicio($idDetalleServicio,$cantidad);//Retornando los valores del metodo listar pedidos
        }
        public function totalServicio($idVenta){
            $crudServicio = new crudServicio();
            return $crudServicio->totalServicio($idVenta);
    
        }
        public function cambiarEstadoServicio($idServicio,$estadoServicio)
        {
            $servicio = new Servicio();
            $servicio->setIdServicio($idServicio);
            $servicio->setEstadoServicio($estadoServicio);
            $crudServicio = new crudServicio();
            return $crudServicio->cambiarEstadoServicio($idServicio,$estadoServicio);
    
    
        }



}
$ControladorServicio =new ControladorServicio();


if(isset($_GET['registrarServicio'])){
    header('Location:../vista/registrarServicio.php');
}
if(isset($_POST['registrarServicio'])){
    $validacion= $ControladorServicio->registrarServicio($_POST['nombre'],$_POST['descripcion'],$_POST['precio'],$_POST['estadoServicio']);
    if($validacion == "El servicio ya existe"){
        echo "<script>
                location.replace('../vista/registrarServicio.php');
                alert('El servicio ya existe, por favor intente con otro.');
              </script>";
    }else{
        echo "<script>
                location.replace('../vista/listarServicios.php');
                alert('Registro  éxitoso.');
              </script>";
    }
}
if(isset($_POST['editarServicio'])){
    $ControladorServicio->buscarServicio($_POST['idServicio']);
    header('Location:../vista/editarServicio.php?idServicio='.$_POST['idServicio']);
   
}
if(isset($_POST['actualizarServicio'])){
    $ControladorServicio->actualizarServicio($_POST['idServicio'],$_POST['nombre'],$_POST['descripcion'],$_POST['precio'],$_POST['estadoServicio']);
    header('Location:../vista/listarServicios.php');


}
if(isset($_POST['eliminarServicio'])){
    //echo "Eliminando producto".$_POST['idProducto'];
    $ControladorServicio->eliminarServicio($_POST['idServicio']);
}
else if(isset($_POST['listarDetalleServicio'])){
    $idVenta = $_POST['servicio'];
      require_once('../vista/listarDetalleServicio.php');
     
       
}
 else if(isset($_POST['eliminarDetalleServicio'])){
    echo $ControladorServicio->eliminarDetalleServicio($_POST['idDetalleServicio']);
    
 }else if(isset($_POST['actualizarDetalleServicio'])){
   echo  $ControladorServicio->actualizarDetalleServicio($_POST['idDetalleServicio'],$_POST['cantidad']);
    
 }
   

if(isset($_POST['consultarValor'])){
    echo $ControladorServicio->buscarServicio($_POST['idServicio'])['Precio'];
     
 }
 else if(isset($_POST['totalServicio'])){
    echo  $ControladorServicio->totalServicio($_POST['idVenta'])['SumaServicio'];
     
  }

  if(isset($_POST['cambiarEstadoServicio'])){
    
  echo  $ControladorServicio->cambiarEstadoServicio($_POST['idServicio'],$_POST['estadoServicio']);
}

    ?>