<?php

class Categoria
{

private $idCategoria;
private $nombre;
private $estado;

public function __construct(){}

public function setIdCategoria($idCategoria)
{
    $this->idCategoria=$idCategoria;
}

public function setNombreCategoria($nombre)
{
    $this->nombreCategoria=$nombre;

}

public function getIdCategoria()
{
    return $this->idCategoria;
}
public function getNombreCategoria()
{
    return $this->nombreCategoria;
}
public function setEstadoCategoria($estado)
{
    $this->estadoCategoria=$estado;

}
 
public function getEstadoCategoria(){
    return $this->estadoCategoria;
}





}

?>