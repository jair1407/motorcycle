<?php 
class detalleServicio{

    private $idDetalleServicio;
    private $idVenta;
    private $idServicio;
    private $cantidad;
    private $valorUnitario;
    public function __construct()
    {
        
    }
    public function setIdDetalleServicio($idDetalleServicio){
        $this->idDetalleServicio=$idDetalleServicio;
    }
    public function setIdVenta($idVenta){
        $this->idVenta=$idVenta;
    }
    public function setIdServicio($idServicio){
        $this->idServicio=$idServicio;
    }
    public function setCantidad($cantidad){
        $this->cantidad=$cantidad;
    }
    public function setValorUnitario($valorUnitario){
        $this->valorUnitario=$valorUnitario;
    }

    public function getIdDetalleServicio(){
      return  $this->idDetalleServicio;
    }
    public function getIdVenta(){
       return $this->idVenta;
    }
    public function getIdServicio(){
        return $this->idServicio;
    }
    public function getCantidad(){
       return $this->cantidad;
    }
    public function getValorUnitario(){
       return $this->valorUnitario;
    }




}

?>