<?php 
class detalleVenta{

    private $idDetalleVenta;
    private $idVenta;
    private $idProducto;
    private $cantidad;
    private $valorUnitario;
    public function __construct()
    {
        
    }
    public function setIdDetalleVenta($idDetalleVenta){
        $this->idDetalleVenta=$idDetalleVenta;
    }
    public function setIdVenta($idVenta){
        $this->idVenta=$idVenta;
    }
    public function setIdProducto($idProducto){
        $this->idProducto=$idProducto;
    }
    public function setCantidad($cantidad){
        $this->cantidad=$cantidad;
    }
    public function setValorUnitario($valorUnitario){
        $this->valorUnitario=$valorUnitario;
    }

    public function getIdDetalleVenta(){
      return  $this->idDetalleVenta;
    }
    public function getIdVenta(){
       return $this->idVenta;
    }
    public function getIdProducto(){
        return $this->idProducto;
    }
    public function getCantidad(){
       return $this->cantidad;
    }
    public function getValorUnitario(){
       return $this->valorUnitario;
    }




}

?>