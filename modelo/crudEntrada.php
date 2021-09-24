<?php
class crudEntrada{
public function __construct(){}

public function listarEntrada(){
    $Db = Db::Conectar();//Cadena de conexion
    $sql= $Db->query('SELECT * FROM entradas ORDER BY Fecha DESC');
    $sql->execute();
    Db::CerrarConexion($Db);
    return $sql->fetchAll();

}
public function registrarEntrada($entrada){
    $mensaje = "";
    $Db = Db::Conectar();//Cadena de conexion
    $sql= $Db->prepare('INSERT INTO entradas(Fecha,Descripcion) VALUES(NOW(),:descripcion)');
    $sql->bindValue('descripcion',$entrada->getDescripcion());
    
    try{
        $sql->execute();
        $mensaje="Registro Exitoso";
    }
    catch(Exception $e){
        $mensaje=$e->getMessage();

    }
    Db::CerrarConexion($Db);
    return $mensaje;

}
public function buscarEntrada($idEntrada){
    $Db = Db::Conectar();//Cadena de conexion
    $sql= $Db->query("SELECT * FROM entradas WHERE IdEntrada=$idEntrada");
    $sql->execute();
    Db::CerrarConexion($Db);
   return  $sql->fetch();
}
public function actualizarEntrada($entrada) {
    $mensaje="";
    $Db = Db::Conectar();//Cadena de conexion
    $sql= $Db->prepare('UPDATE  entradas SET 
    Descripcion=:descripcion
    WHERE IdEntrada=:idEntrada');
     $sql->bindValue('idEntrada',$entrada->getId());
     $sql->bindValue('descripcion',$entrada->getDescripcion());
     
     try{
        $sql->execute();
        $mensaje="Actualizacion Exitoso";
    }
    catch(Exception $e){
        $mensaje=$e->getMessage();
        

    }
    Db::CerrarConexion($Db);
    return $mensaje;

}
public function eliminarEntrada($idEntrada) {
    $mensaje ="";
    $Db = Db::Conectar();//Cadena de conexion
    $sql= $Db->prepare('DELETE FROM entradas
    WHERE IdEntrada=:idEntrada
    ');
     $sql->bindValue('idEntrada', $idEntrada);
     try{
        $sql->execute();
        $mensaje="Eliminacion Exitosa";
    }
    catch(Exception $e){
        $mensaje=$e->getMessage();

    }
    Db::CerrarConexion($Db);
    return $mensaje;
}

}
?>