<?php
class Entrada{

private $id;
private $fecha;
private $descripcion;
public function __construct(){}
public function setId($id){
    $this->id =$id;
}public function setFecha($fecha){
    $this->fecha =$fecha;
}
public function setDescripcion($descripcion){
    $this->descripcion =$descripcion;
}
public function getId(){
    return $this->id;
}
public function getFecha(){
    return $this->fecha;
}
public function getDescripcion(){
    return $this->descripcion;
}
}
?>