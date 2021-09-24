<?php

class Marca
{
private $idMarca;
private $nombre;
private $estado;

public function __construct(){}

public function setIdMarca($idMarca)
{
    $this->idMarca=$idMarca;
}
public function setNombreMarca($nombre)
{
    $this->nombreMarca=$nombre;
}

public function getIdMarca()
{
    return $this->idMarca;
}
public function getNombreMarca()
{
    return $this->nombreMarca;
}
public function setEstadoMarca($estado){
   $this->estadoMarca=$estado;
}
public function getEstadoMarca(){
    return $this->estadoMarca;
}



}

?>