<?php
class Rol{

private $idRol;
private $nombre;

public function __construct(){}
public function setIdRol($idRol){
    $this->idRol =$idRol;
}public function setNombreRol($nombre){
    $this->nombre =$nombre;
}
public function getIdRol(){
    return $this->idRol;
}
public function getNombreRol(){
    return $this->nombre;
}
}
?>