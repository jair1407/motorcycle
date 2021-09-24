<?php
require_once("conexion.php");
include("../modelo/crudCompras.php");
include("../modelo/Compras.php");

class ControladorCompras{
    public function __construct(){}//Constructor
    public function listarCompra(){//Metodo para hacer la peticion al modelo productos
        $CrudCompras= new  CrudCompras();//Crear un objeto de la clase crud Producto
        return $CrudCompras->listarCompra();//Retornando los valores del metodo listar productos
    }

    public function registrarCompra($Identrada,$Idproducto,$cantidad){
        $CrudCompras = new CrudCompras();
       $respuesta= $CrudCompras->registrarCompra($Identrada,$Idproducto,$cantidad);
    
        header('Location:../vista/listarCompras.php');
      
        
        
       
    
        }
    public function buscarCompra($idCompra){
        $crudCompra = new crudCompras();
         return $crudCompra->buscarCompra($idCompra);
    }
    public function actualizarProducto($idCompra,$Entrada,$producto,$cantidad){
        $compras = new Compras();
        $compras->setIdCompra($idCompra);
        $compras->setId($Entrada);
        $compras->setProducto($producto);
        $compras->setCantidad($cantidad);
        
        

        $crudCompra = new CrudCompras();
      return  $crudCompra->actualizarCompra($compras);
       header('Location:../vista/listarCompras.php');

    }
    public function eliminarCompra($idCompra){
        $crudCompra = new CrudCompras();
         return $crudCompra->eliminarCompra($idCompra);
    }
   
    
    
    

}
$controladorCompra=new ControladorCompras();
//var_dump($Controlador->listarProducto());
if(isset($_GET['registrarCompra'])){
    header('Location:../vista/registrarCompras.php');
}
if(isset($_POST['registrarCompra'])){
    
    $controladorCompra->registrarCompra($_POST['Identrada'],$_POST['Idproducto'],$_POST['cantidad']);
   

    
    
}
if(isset($_POST['editarCompra'])){
    $controladorCompra->buscarCompra($_POST['IdCompra']);
    header('Location:../vista/editarCompra.php?idCompra='.$_POST['IdCompra']);
   
}
if(isset($_POST['actualizarCompra'])){
    $controladorCompra->actualizarProducto($_POST['IdCompra'],$_POST['entrada'],$_POST['producto'],$_POST['cantidad']);
    header('Location:../vista/listarCompras.php');


}
if(isset($_POST['eliminarCompra'])){
    //echo "Eliminando producto".$_POST['idProducto'];
    $controladorCompra->eliminarCompra($_POST['idCompra']);
    header('Location:../vista/listarCompras.php');

}








 



?>