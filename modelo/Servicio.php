<?php
class Servicio{
        private $id;
        private $nombre;
        private $descripcion;
        private $precio;
        private $estado;
        public function __construct()
        {
            
        }
        public function setIdServicio($id){
            $this->id=$id;
        }
        public function setNombre($nombre){
            $this->nombre=$nombre;
        }
        public function setDescripcion($descripcion){
            $this->descripcion=$descripcion;
        }
        
        public function setPrecio($precio){
            $this->precio=$precio;
        }
        
        public function getIdServicio(){
             return $this->id;
        }
        public function getNombre(){
            return $this->nombre;
       }
       public function getDescripcion(){
        return $this->descripcion;
   }
       public function getPrecio(){
        return $this->precio;
      }
      public function setEstadoServicio($estado){
          $this->estadoServicio=$estado;

      }
      public function getEstadoServicio(){
          return $this->estadoServicio;
      }
   





}


?>