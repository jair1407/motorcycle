<?php
class crudMarca{
public function __construct(){}

public function listarMarca(){
    $Db = Db::Conectar();//Cadena de conexion
    $sql= $Db->query('SELECT * FROM marcas ORDER BY NombreMarca ASC');
    $sql->execute();
    Db::CerrarConexion($Db);
    return $sql->fetchAll();

}

public function registrarMarca($marca){
    $mensaje = "";
    $validarExiste="";
    $Db = Db::Conectar();//Cadena de conexion   
    $buscarExiste=$Db->prepare("SELECT NombreMarca FROM marcas WHERE NombreMarca=:nombreMarca");  
    $buscarExiste->bindValue('nombreMarca',$marca->getNombreMarca());

    try{
        $buscarExiste->execute();
             if($buscarExiste->rowCount() > 0){
                 $validarExiste="la marca ya existe";

                return $validarExiste;
    }else{
        $sql= $Db->prepare('INSERT INTO marcas(NombreMarca,EstadoMarca) VALUES(:nombreMarca,:estadoMarca)');
        $sql->bindValue('nombreMarca',$marca->getNombreMarca());
        $sql->bindValue('estadoMarca',$marca->getEstadoMarca());
        $sql->execute();
        $mensaje="Registro Exitoso";

    }
}
    catch(Exception $e){
        $mensaje=$e->getMessage();

    }
    Db::CerrarConexion($Db);
    return $mensaje;

}

public function buscarMarca($idMarca){
    $Db = Db::Conectar();//Cadena de conexion
    $sql= $Db->query("SELECT * FROM marcas WHERE IdMarca=$idMarca");
    $sql->execute();
    Db::CerrarConexion($Db);
   return  $sql->fetch();
}
public function actualizarMarca($marca) {
    $mensaje="";
    $Db = Db::Conectar();//Cadena de conexion
    $sql= $Db->prepare('UPDATE  marcas SET 
    NombreMarca=:nombre,
    EstadoMarca=:estadoMarca
    WHERE IdMarca=:idMarca');
     $sql->bindValue('idMarca',$marca->getIdMarca());
     $sql->bindValue('nombre',$marca->getNombreMarca());
     $sql->bindValue('estadoMarca',$marca->getEstadoMarca());
     
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

public function cambiarEstadoMarca($idMarca,$estadoMarca)
{

    
    $mensaje = "";
    $Db =Db ::Conectar();//cadena de conexion
   
    $sql = $Db->prepare(" UPDATE  marcas SET EstadoMarca=$estadoMarca WHERE IdMarca=$idMarca");
    

    try {
        $sql->execute();
        $mensaje = "Cambio De estado Exitoso";
    } catch (Exception  $e) 
    {
        $mensaje =$e->getMessage();
        
    }
    Db ::CerrarConexion($Db);
    return $mensaje;
    
    
}



}
?>