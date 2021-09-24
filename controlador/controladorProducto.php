<?php
require_once("conexion.php");
include("../modelo/crudProducto.php");
include("../modelo/Producto.php");

class ControladorProducto{
    public function __construct(){}//Constructor
    public function listarProducto(){//Metodo para hacer la peticion al modelo productos
        $crudProducto= new  CrudProducto();//Crear un objeto de la clase crud Producto
        return $crudProducto->listarProducto();//Retornando los valores del metodo listar productos
    }

    public function registrarProducto($nombreProducto,$precioProducto,$idMarca,$idCategoria,$stock,$estadoProducto){
    $producto = new Producto();
    $producto->setNombreProducto($nombreProducto);
    $producto->setPrecio($precioProducto);
    $producto->setIdMarca($idMarca);
    $producto->setIdCategoria($idCategoria);
    $producto->setStock($stock);
    $producto->setEstado($estadoProducto);
    

    $crudProducto = new CrudProducto();    
    return $crudProducto->registrarProducto($producto);
    header('Location:../vista/listarProductos.php');
    
    
   

    }
    public function buscarProducto($idProducto){
        $crudProducto = new CrudProducto();
         return $crudProducto->buscarProducto($idProducto);
    }
    public function actualizarProducto($idProducto,$nombreProducto,$precioProducto,$idMarca,$idCategoria,$stock,$estadoProducto){
        $producto = new Producto();
        $producto->setIdProducto($idProducto);
        $producto->setNombreProducto($nombreProducto);
        $producto->setPrecio($precioProducto);
        $producto->setIdMarca($idMarca);
        $producto->setIdCategoria($idCategoria);
        $producto->setStock($stock);
        $producto->setEstado($estadoProducto);

        $crudProducto = new CrudProducto();
      return  $crudProducto->actualizarProducto($producto);
       header('Location:../vista/listarProductos.php');

    }
    
   

    public function cambiarEstado($idProducto,$estadoProducto)
    {
        $producto=new Producto();
        $producto->setIdProducto($idProducto);
        $producto->setEstado($estadoProducto);
        $crudProducto= new crudProducto();

        return $crudProducto->cambiarEstado($idProducto,$estadoProducto);


    }
    
    
    

}
$ControladorProducto=new ControladorProducto();
//var_dump($Controlador->listarProducto());
if(isset($_GET['registrarProducto'])){
    header('Location:../vista/registrarProducto.php');
}
if(isset($_POST['registrarProducto'])){
    $validacion=$ControladorProducto->registrarProducto($_POST['nombre'],$_POST['precio'],$_POST['IdMarca'],$_POST['IdCategoria'],$_POST['stock'],$_POST['estadoProducto']);
    
    if($validacion == "El producto ya existe"){
        echo "<script>
                location.replace('../vista/registrarProducto.php');
                alert('El producto ya existe, por favor intente con otro.');
              </script>";
    }else{
        echo "<script>
                location.replace('../vista/listarProductos.php');
                alert('Registro realizado con éxito.');
              </script>";
    }
}

if(isset($_POST['editarProducto'])){
    $ControladorProducto->buscarProducto($_POST['idProducto']);
    header('Location:../vista/editarProducto.php?idProducto='.$_POST['idProducto']);
   
}
if(isset($_POST['actualizarProducto'])){
    $ControladorProducto->actualizarProducto($_POST['idProducto'],$_POST['nombre'],$_POST['precio'],$_POST['idMarca'],$_POST['idCategoria'],$_POST['stock'],$_POST['estadoProducto']);
    header('Location:../vista/listarProductos.php');


}

if(isset($_POST['consultarPrecio'])){
   echo $ControladorProducto->buscarProducto($_POST['idProducto'])['Precio'];
    
}
if(isset($_POST['consultarStock'])){
    echo $ControladorProducto->buscarProducto($_POST['idProducto'])['Stock'];
     
 }



if(isset($_POST['cambiarEstado'])){
    //echo "Eliminando producto".$_POST['idProducto'];
  echo  $ControladorProducto->cambiarEstado($_POST['idProducto'],$_POST['estadoProducto']);
}





 



?>