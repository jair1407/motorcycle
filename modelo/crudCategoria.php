<?php
class crudCategoria{
public function __construct(){}

public function listarCategoria(){
    $Db = Db::Conectar();//Cadena de conexion
    $sql= $Db->query('SELECT * FROM categorias ORDER BY NombreCategoria ASC');
    $sql->execute();
    Db::CerrarConexion($Db);
    return $sql->fetchAll();

}
public function registrarCategoria($categoria){
    $mensaje = "";
    $validarExiste="";
    $Db = Db::Conectar();//Cadena de conexion   
    $buscarExiste=$Db->prepare("SELECT NombreCategoria FROM categorias WHERE NombreCategoria=:nombre");  
    $buscarExiste->bindValue('nombre',$categoria->getNombreCategoria());


    try{
        $buscarExiste->execute();
             if($buscarExiste->rowCount() > 0){
                 $validarExiste="la categoria ya existe";

                return $validarExiste;
    }else{
        $sql= $Db->prepare('INSERT INTO categorias(NombreCategoria,Estado) VALUES(:nombre,:estadoCategoria)');
        $sql->bindValue('nombre',$categoria->getNombreCategoria());
        $sql->bindValue('estadoCategoria',$categoria->getEstadoCategoria());
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


public function buscarCategoria($idCategoria){
    $Db = Db::Conectar();//Cadena de conexion
    $sql= $Db->query("SELECT * FROM categorias WHERE IdCategoria=$idCategoria");
    $sql->execute();
    Db::CerrarConexion($Db);
   return  $sql->fetch();
}
public function actualizarCategoria($categoria) {
    $mensaje="";
    $Db = Db::Conectar();//Cadena de conexion
    $sql= $Db->prepare('UPDATE  categorias SET 
    NombreCategoria=:nombre,
    Estado=:estadoCategoria
    WHERE IdCategoria=:idCategoria');
     $sql->bindValue('idCategoria',$categoria->getIdCategoria());
     $sql->bindValue('nombre',$categoria->getNombreCategoria());
     $sql->bindValue('estadoCategoria',$categoria->getEstadoCategoria());
     
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


    public function cambiarEstadoCategoria($idCategoria,$estadoCategoria)
{

    
    $mensaje = "";
    $Db =Db ::Conectar();//cadena de conexion
   
    $sql = $Db->prepare(" UPDATE   categorias SET Estado=$estadoCategoria WHERE IdCategoria=$idCategoria");
    

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