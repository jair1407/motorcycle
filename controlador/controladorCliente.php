<?php 

include("../modelo/Cliente.php");
include("../modelo/crudCliente.php");
require_once("conexion.php");

class controladorCliente
{

    public function __construct(){}


    public function listarCliente()
    {
        $crudCliente= new crudCliente(); 
        return $crudCliente->listarCliente();

    }
    public function registroCliente($documentoCliente,$nombreCliente,$celularCliente,$estadoCliente)
    {
        $cliente = new Cliente();//crear objeto de tipo cliente
        $crudCliente= new crudCliente(); 
        
        $cliente->setDocumentoCliente($documentoCliente);
        $cliente->setNombreCliente($nombreCliente);
        $cliente->setCelularCliente($celularCliente);
        $cliente->setEstadoCliente($estadoCliente);
        
      
        
       return $crudCliente->registroCliente($cliente);

        header('location: ../vista/listarClientes.php');
    }
    public function buscarCliente($documentoCliente)
    {
        $crudCliente= new crudCliente(); 
        return $crudCliente->buscarCliente($documentoCliente);

    }
    public function actualizarCliente($documentoCliente,$nombreCliente,$celularCliente,$estadoCliente)
    {
        $cliente = new Cliente();//crear objeto de tipo cliente
        
        
        
        $cliente->setDocumentoCliente($documentoCliente);
        $cliente->setNombreCliente($nombreCliente);//asignar valores a los atributos
        $cliente->setCelularCliente($celularCliente);//asignar valores a los atributos
        $cliente->setEstadoCliente($estadoCliente);//asignar valores a los atributos
       
       
        

        $crudCliente= new crudCliente();
        $crudCliente->actualizarCliente($cliente);

        header('location: ../vista/listarClientes.php');
    }
    public function eliminarCliente($documentoCliente){
        $crudCliente= new crudCliente(); 
         return $crudCliente->eliminarCliente($documentoCliente);
    }
    public function cambiarEstadoCliente($documentoCliente,$estadoCliente)
    {
        $cliente = new Cliente();//crear objeto de tipo cliente

        
        $cliente->setDocumentoCliente($documentoCliente);
        $cliente->setEstadoCliente($estadoCliente);//asignar valores a los atributos

        $crudCliente= new crudCliente();
       return $crudCliente->cambiarEstadoCliente($documentoCliente,$estadoCliente);

      
    }


}
$ControladorCliente = new controladorCliente();//crear un objeto de la clase 


if(isset($_GET['registroCliente']))
{
    header('location: ../vista/registroCliente.php');
    //header sirve para reedirecionar
}
if(isset($_POST['registroCliente']))
{
    $validacion =  $ControladorCliente->registroCliente($_POST['documentoCliente'],$_POST['nombreCliente'],$_POST['celularCliente'],$_POST['estadoCliente']);
    if($validacion == "El cliente ya existe"){
        echo "<script>
                location.replace('../vista/registroCliente.php');
                alert('El cliente ya esta registrado.');
              </script>";
    }else{
        echo "<script>
                location.replace('../vista/listarClientes.php');
                alert('Registro realizado con éxito.');
              </script>";
    }
}
if(isset($_POST['editarCliente']))
{
    header('location: ../vista/editarCliente.php?documentoCliente='.$_POST['documentoCliente']);

}
if(isset($_POST['actualizarCliente']))
{
    $ControladorCliente->actualizarCliente($_POST['documentoCliente'],$_POST['nombreCliente'],$_POST['celularCliente'],$_POST['estadoCliente']);
    
}
if(isset($_POST['eliminarCliente'])){
    //echo "Eliminando producto".$_POST['idProducto'];
  echo  $ControladorCliente->eliminarCliente($_POST['documentoCliente']);
}

if(isset($_POST['cambiarEstadoCliente'])){
    //echo "Eliminando producto".$_POST['idProducto'];
  echo  $ControladorCliente->cambiarEstadoCliente($_POST['documentoCliente'],$_POST['estadoCliente']);
}



?>