<?php

include("../modelo/crudCategoria.php");
include("../modelo/Categoria.php");
require_once("conexion.php");
class ControladorCategoria{
    public function __construct(){}//Constructor
    public function listarCategoria(){//Metodo para hacer la peticion al modelo productos
        $crudCategoria= new  crudCategoria();//Crear un objeto de la clase crud Producto
        return $crudCategoria->listarCategoria();//Retornando los valores del metodo listar productos
    }

    public function registrarCategoria($nombre,$estadoCategoria){
        $categoria = new Categoria();
        $categoria->setNombreCategoria($nombre);
        $categoria->setEstadoCategoria($estadoCategoria);

        $crudCategoria = new crudCategoria();
       return $crudCategoria->registrarCategoria($categoria);
        header('Location:../vista/listarCategorias.php');

        }
        public function buscarCategoria($idCategoria){
            $crudCategoria = new crudCategoria();
return $crudCategoria->buscarCategoria($idCategoria);
        }
        public function actualizarCategoria($idCategoria,$nombre,$estadoCategoria){
            $categoria = new Categoria();
            $categoria->setIdCategoria($idCategoria);
            $categoria->setNombreCategoria($nombre);
            $categoria->setEstadoCategoria($estadoCategoria);

            $crudCategoria = new crudCategoria();
          return  $crudCategoria->actualizarCategoria($categoria);
           header('Location:../vista/listarCategoria.php');

        }
       
        
        public function cambiarEstadoCategoria($idCategoria,$estadoCategoria)
        {
            $categoria = new Categoria();
            $categoria->setIdCategoria($idCategoria);
            $categoria->setEstadoCategoria($estadoCategoria);
            $crudCategoria = new crudCategoria();
    
            return $crudCategoria->cambiarEstadoCategoria($idCategoria,$estadoCategoria);
    
    
        }




}
$ControladorCategoria=new ControladorCategoria();
if(isset($_GET['registrarCategoria'])){
    header('Location:../vista/registrarCategoria.php');
}
if(isset($_POST['registrarCategoria'])){
    $validacion= $ControladorCategoria->registrarCategoria($_POST['nombre'],$_POST['estadoCategoria']);
     
     if($validacion == "la categoria ya existe"){
         echo "<script>
                 location.replace('../vista/registrarCategoria.php');
                 alert('La categoria ya existe, por favor intente con otro.');
               </script>";
     }else{
         echo "<script>
                 location.replace('../vista/listarCategorias.php');
                 alert('Registro realizado con éxito.');
               </script>";
     }
 
 }
if(isset($_POST['editarCategoria'])){
    $ControladorCategoria->buscarCategoria($_POST['idCategoria']);
    header('Location:../vista/editarCategoria.php?idCategoria='.$_POST['idCategoria']);

}
if(isset($_POST['actualizarCategoria'])){
    $ControladorCategoria->actualizarCategoria($_POST['idCategoria'],$_POST['nombre'],$_POST['estadoCategoria']);
    header('Location:../vista/listarCategorias.php');

}



if(isset($_POST['cambiarEstadoCategoria'])){
    //echo "Eliminando producto".$_POST['idProducto'];
  echo  $ControladorCategoria->cambiarEstadoCategoria($_POST['idCategoria'],$_POST['estadoCategoria']);
}
?>
