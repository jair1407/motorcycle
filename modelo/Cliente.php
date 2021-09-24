<?php 

class Cliente
{
    private $idCliente;
    private $documento;
    private $nombre;
    private $celular;
    private $estado;
    

    public function __construct(){}

    public function setIdCliente($idCliente)
    {
        $this->idCliente=$idCliente;
    }
    public function setDocumentoCliente($documento)
    {
        $this->documentoCliente=$documento;
    }
    public function setNombreCliente($nombre)
    {
        $this->nombreCliente=$nombre;
    }
    public function setCelularCliente($celular)
    {
        $this->celularCliente=$celular;
    }
    

    public function  getIdCliente()
    {
        return $this->idCliente;
    }
    public function  getNombreCliente()
    {
        return $this->nombreCliente;
    }
    public function  getDocumentoCliente()
    {
        return $this->documentoCliente;
    }
   
    public function  getCelularCliente()
    {
        return $this->celularCliente;
    }
    public function setEstadoCliente($estado){
        $this->estadoCliente=$estado;
    }
    public function getEstadoCliente(){
        return $this->estadoCliente;
    }
   







}




?>