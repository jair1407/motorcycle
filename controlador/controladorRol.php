<?php 

include("../modelo/Rol.php");
include("../modelo/crudRol.php");
require_once("conexion.php");

class controladorRol
{

    public function __construct(){}


    public function listarRol()
    {
        $crudRol= new crudRol(); 
        return $crudRol->listarRol();

    }
}
$ControladorRol = new controladorRol();//crear un objeto de la clase