<?php
class Compras{
        private $idCompra;
        private $id;
        private $producto;
        private $cantidad;
       
        public function __construct()
        {
            
        }
        public function setIdCompra($idCompra){
            $this->idCompra=$idCompra;
        }
        public function setId($id){
            $this->id=$id;
        }
        public function setProducto($producto){
            $this->producto=$producto;
        }
        
        
        public function setCantidad($cantidad){
            $this->cantidad=$cantidad;
        }
       
        public function getIdCompra(){
            return $this->idCompra;
       }
        
        public function getId(){
             return $this->id;
        }
        public function getProducto(){
            return $this->producto;
       }
     
       public function getCantidad(){
        return $this->cantidad;
   }
    
   





}


?>