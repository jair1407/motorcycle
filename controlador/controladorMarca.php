<?php
require_once("conexion.php");
include("../modelo/crudMarca.php");
include("../modelo/Marca.php");

class ControladorMarca{
    public function __construct(){}//Constructor
    public function listarMarca(){//Metodo para hacer la peticion al modelo marcas
        $crudMarca= new  crudMarca();//Crear un objeto de la clase crud Marca
        return $crudMarca->listarMarca();//Retornando los valores del metodo listar marcas
    }
    public function registrarMarca($nombreMarca,$estadoMarca){
        $marca = new Marca();
        $marca->setNombreMarca($nombreMarca);
        $marca->setEstadoMarca($estadoMarca);
       
        
    
        $crudMarca = new crudMarca();
       return $crudMarca->registrarMarca($marca);
        header('Location:../vista/listarMarcas.php');
        
        }
       

        public function buscarMarca($idMarca){
            $crudMarca = new crudMarca();
            return $crudMarca->buscarMarca($idMarca);
        }
        public function actualizarMarca($idMarca,$nombre,$estadoMarca){
            $marca = new Marca();
            $marca->setIdMarca($idMarca);
            $marca->setNombreMarca($nombre);
            $marca->setEstadoMarca($estadoMarca);
            $crudMarca = new crudMarca();
          return  $crudMarca->actualizarMarca($marca);
           header('Location:../vista/listarMarcas.php');
    
        }

        public function cambiarEstadoMarca($idMarca,$estadoMarca)
        {
            $marca = new Marca();
            $marca->setIdMarca($idMarca);
            $marca->setEstadoMarca($estadoMarca);
            $crudMarca = new crudMarca();
    
            return $crudMarca->cambiarEstadoMarca($idMarca,$estadoMarca);
    
    
        }
}
$ControladorMarca=new ControladorMarca();
if(isset($_GET['registrarMarca'])){
    header('Location:../vista/registrarMarca.php');
}

if(isset($_POST['registrarMarca'])){
    $validacion=  $ControladorMarca->registrarMarca($_POST['nombreMarca'],$_POST['estadoMarca']);

    if($validacion == "la marca ya existe"){
        echo "<script>
                location.replace('../vista/registrarMarca.php');
                alert('la marca ya existe, por favor intente con otro.');
              </script>";
    }else{
        echo "<script>
                location.replace('../vista/listarMarcas.php');
                alert('Registro realizado con éxito.');
              </script>";
    }
    
}

if(isset($_POST['editarMarca'])){
    $ControladorMarca->buscarMarca($_POST['idMarca']);
    header('Location:../vista/editarMarca.php?idMarca='.$_POST['idMarca']);
}

if(isset($_POST['actualizarMarca'])){
    $ControladorMarca->actualizarMarca($_POST['idMarca'],$_POST['nombre'],$_POST['estadoMarca']);
    header('Location:../vista/listarMarcas.php');

}

if(isset($_POST['cambiarEstadoMarca'])){
    //echo "Eliminando producto".$_POST['idProducto'];
  echo  $ControladorMarca->cambiarEstadoMarca($_POST['idMarca'],$_POST['estadoMarca']);
}
?>
