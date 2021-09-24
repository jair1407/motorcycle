<?php
require_once("conexion.php");
include("../modelo/crudEntrada.php");
include("../modelo/entrada.php");

class controladorEntrada{
    public function __construct(){}//Constructor
    public function listarEntrada(){//Metodo para hacer la peticion al modelo marcas
        $crudEntrada= new  crudEntrada();//Crear un objeto de la clase crud Marca
        return $crudEntrada->listarEntrada();//Retornando los valores del metodo listar marcas
    }
    public function registrarEntrada($fecha,$descripcion){
        $entrada = new Entrada();
        $entrada->setFecha($fecha);
        $entrada->setDescripcion($descripcion);
        
    
        $crudEntrada = new crudEntrada();
        $crudEntrada->registrarEntrada($entrada);
        header('Location:../vista/registrarCompras.php');
        
        }
        public function eliminarEntrada($id){
            $crudEntrada = new crudEntrada(); 
            return $crudEntrada->eliminarEntrada($id);
       }

        public function buscarEntrada($id){
            $crudEntrada = new crudEntrada();
            return $crudEntrada->buscarEntrada($id);
        }
        public function actualizarEntrada($id,$fecha,$descripcion){
            $entrada = new Entrada();
            $entrada->setId($id);
            $entrada->setFecha($fecha);
            $entrada->setDescripcion($descripcion);
            $crudEntrada = new crudEntrada();
          return  $crudEntrada->actualizarEntrada($entrada);
           header('Location:../vista/listarMarcas.php');
    
        }
}
$controladorEntrada=new controladorEntrada();
if(isset($_GET['registrarEntrada'])){
    header('Location:../vista/registrarEntrada.php');
}
if(isset($_POST['registrarEntrada'])){
    $controladorEntrada->registrarEntrada($_POST['fecha'],$_POST['descripcion']);
    echo $_POST['fecha'];
}
if(isset($_POST['editarEntrada'])){
    $controladorEntrada->buscarEntrada($_POST['id']);
    header('Location:../vista/editarEntrada.php?id='.$_POST['id']);
}

if(isset($_POST['actualizarEntrada'])){
    $controladorEntrada->actualizarEntrada($_POST['id'],$_POST['fecha'],$_POST['descripcion']);
    header('Location:../vista/listarEntradas.php');

}
if(isset($_POST['eliminarEntradas'])){
    //echo "Eliminando producto".$_POST['idProducto'];
  echo  $controladorEntrada->eliminarEntrada($_POST['id']);
}
?>
