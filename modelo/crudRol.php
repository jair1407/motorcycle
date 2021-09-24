<?php

class crudRol
{

    public function __construct(){}


    public function listarRol(){
        $Db = Db::Conectar();//Cadena de conexion
        $sql= $Db->query('SELECT * FROM roles ORDER BY Nombre ASC');
        $sql->execute();
        Db::CerrarConexion($Db);
        return $sql->fetchAll();
    
    }
}





?>