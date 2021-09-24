<?php
require_once("conexion.php");
require_once("../modelo/Acceso.php");
require_once("../modelo/crudAcceso.php");
class ControladorAcceso{
public function __construct()
{

}
public function listarUsuario(){
    //Metodo para hacer la peticion al modelo productos
    $crudAcceso= new  crudAcesso();//Crear un objeto de la clase crud Producto
    return $crudAcceso->listarUsuario();//Retornando los valores del metodo listar productos

}


public function registrarUsuario($nombreUsuario,$passwordEncritado,$rol,$estado,$correo){
    $salt = md5($_POST['password']);
    $passwordEncritado = crypt($_POST['password'],$salt);
    $usuario = new Acesso();
    $usuario->setNombre($nombreUsuario);
    $usuario->setPassword($passwordEncritado);
    $usuario->setRol($rol);
    $usuario->setEstado($estado);
    $usuario->setCorreo($correo);

    $crudAcceso = new crudAcesso();
    return $crudAcceso->registrarUsuario($usuario);
    header('Location:../vista/listaUsuarios.php');


    }
    public function buscarUsuario($IdUsuario){
        $crudAcceso = new crudAcesso();
         return $crudAcceso->buscarUsuario($IdUsuario);
    }
    public function actualizarUsuario($IdUsuario,$nombre,$passwordEncritado,$rol,$estado,$correo){
        $salt = md5($_POST['password']);
        $passwordEncritado = crypt($_POST['password'],$salt);
        $usuario = new Acesso ();
        $usuario->setIdUsuario($IdUsuario);
        $usuario->setNombre($nombre);
        $usuario->setPassword($passwordEncritado);
        $usuario->setRol($rol);
        $usuario->setEstado($estado);
        $usuario->setCorreo($correo);
      

        $crudAcceso = new crudAcesso();
      return  $crudAcceso->actualizarUsuario($usuario);
       header('Location:../vista/listaUsuarios.php');

    }

public function validarAcceso($nombreUsuario,$passwordEncritado){
    $salt = md5($_POST['password']);
    $passwordEncritado = crypt($_POST['password'],$salt);
    $acceso = new Acesso();
    $acceso->setNombre($nombreUsuario);
    $acceso->setPassword($passwordEncritado);
    $crudAcceso = new crudAcesso();
    return $crudAcceso->validarAcesso($acceso);
}
public function eliminarUsuario($IdUsuario){
    $crudAcceso = new crudAcesso();
     return $crudAcceso->eliminarUsuario($IdUsuario);
    
}
public function cambiarEstado($IdUsuario,$estado)
{
    $usuario = new Acesso();
    $usuario->setIdUsuario($IdUsuario);
    $usuario->setEstado($estado);
    $crudAcceso = new crudAcesso();

    return $crudAcceso->cambiarEstado($IdUsuario,$estado);


}
}
$controladorAcesso = new controladorAcceso();

if(isset($_POST['validarAcesso'])){
$usuario=($controladorAcesso->validarAcceso($_POST['nombreUsuario'],$_POST['password']));
if($usuario->getExiste()==1){
    
    session_start();
    $_SESSION['nombreUsuario']=$usuario->getNombre();
    $_SESSION['IdRol']=$usuario->getRol();
    header('Location:../vista/dashboard.php');



}
else{
   
   echo "<script> alert('Usuario y/o contraseña incorrectos');location='../vista/index.html'</script>";
}
 

}
 if(isset($_GET['cerrarSesion'])){
    session_start();
    // var_dump($_SESSION[]);
    session_destroy();
    header('Location:../index.html');
}
$Controlador=new ControladorAcceso();



if(isset($_GET['registrarUsuario'])){
    header('Location:../vista/registrarUsuario.php');
}
if(isset($_POST['registrarUsuario'])){
   $validacion=$Controlador->registrarUsuario($_POST['nombre'],$_POST['password'],$_POST['rol'],$_POST['estado'],$_POST['correo']);

   if($validacion == "El usuario ya existe"){
    echo "<script>
            location.replace('../vista/registroUsuario.php');
            alert('El correo ya existe, por favor intente con otro.');
          </script>";
}else{
    echo "<script>
            location.replace('../vista/listaUsuarios.php');
            alert('Registro realizado con éxito.');
          </script>";
}

}

if(isset($_POST['eliminarUsuario'])){

    echo $Controlador->eliminarUsuario($_POST['IdUsuario']);

}

if(isset($_POST['editarUsuario'])){
    $Controlador->buscarUsuario($_POST['IdUsuario']);
    header('Location:../vista/editarUsuario.php?IdUsuario='.$_POST['IdUsuario']);

}

if(isset($_POST['actualizarUsuario'])){
    $Controlador->actualizarUsuario($_POST['IdUsuario'],$_POST['nombre'],$_POST['password'],$_POST['idRol'],$_POST['estado'],$_POST['correo']);
    header('Location:../vista/listaUsuarios.php');

}
if(isset($_POST['cambiarEstado'])){
    //echo "Eliminando producto".$_POST['idProducto'];
  echo  $Controlador->cambiarEstado($_POST['IdUsuario'],$_POST['estado']);
}
?>