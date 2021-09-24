<?php

class Producto{
    private $id;
    private $nombre;
    private $precio;
    private $idMarca;
    private $idCategoria;
    private $stock;
    private $estado;

    public function __construct()
    {
        
    }
    public function setIdProducto($id){
        $this->idProducto=$id;
    }
    public function setNombreProducto($nombre){
        $this->nombreProducto=$nombre;
    }
    public function setPrecio($precio){
        $this->precioProducto=$precio;
    }
    public function setIdMarca($idMarca){
        $this->idMarca=$idMarca;
    }
    public function setIdCategoria($idCategoria){
        $this->idCategoria=$idCategoria;
    }
    public function setStock($stock){
        $this->stock=$stock;
    }
    public function setEstado($estado){
        $this->estadoProducto=$estado;
    }
    public function getIdProducto(){
        return $this->idProducto;
    }
    public function getNombreProducto(){
        return $this->nombreProducto;
    }
    
    public function getPrecioProducto(){
        return $this->precioProducto;
    }
    public function getIdMarca(){
        return $this->idMarca;
    }
    public function getIdCategoria(){
        return $this->idCategoria;
    }
    public function getStock(){
        return $this->stock;
    }
    public function getEstadoProducto(){
        return $this->estadoProducto;
    }










}
?>