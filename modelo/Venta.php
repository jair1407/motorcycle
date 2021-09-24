<?php
class Venta{
        private $id;
        private $documentoCliente;
        private $fecha;
       
        public function __construct()
        {
            
        }
        public function setIdVenta($id){
            $this->id=$id;
        }
        public function setDocumentoCliente($documentoCliente){
            $this->documentoCliente=$documentoCliente;
        }
        public function setFecha($fecha){
            $this->fecha=$fecha;
        }
        
        public function getVenta(){
             return $this->id;
        }
        public function getDocumentoCliente(){
            return $this->documentoCliente;
       }
       public function getFecha(){
        return $this->fecha;
      }
   





}


?>