<?php
class CrudProducto{
public function __construct(){}

public function listarProducto(){
    $Db = Db::Conectar();//Cadena de conexion
    $sql= $Db->query('SELECT productos.*, marcas.NombreMarca,categorias.NombreCategoria FROM marcas INNER JOIN productos
    on marcas.IdMarca=productos.IdMarca INNER JOIN categorias on categorias.IdCategoria=productos.IdCategoria  ORDER BY Nombre ASC');
    
    $sql->execute();
    Db::CerrarConexion($Db);
    return $sql->fetchAll();

}
public function registrarProducto($producto){
    $mensaje = "";
    $validarExiste="";
    $Db = Db::Conectar();//Cadena de conexion
    $buscarExiste=$Db->prepare("SELECT Nombre FROM productos WHERE Nombre=:nombre");  
    $buscarExiste->bindValue('nombre',$producto->getNombreProducto());
     try{
         $buscarExiste->execute();
         if($buscarExiste->rowCount() > 0){
             $validarExiste="El producto ya existe";

            return $validarExiste;
         }else{
            $sql= $Db->prepare('INSERT INTO productos(Nombre,Precio,IdMarca,IdCategoria,Stock,Estado) VALUES(:nombreProducto,:precioProducto,:idMarca,:idCategoria,:stock,:estadoProducto)');
            $sql->bindValue('nombreProducto',$producto->getNombreProducto());
            $sql->bindValue('precioProducto',$producto->getPrecioProducto());
            $sql->bindValue('idMarca',$producto->getIdMarca());
            $sql->bindValue('idCategoria',$producto->getIdCategoria());
            $sql->bindValue('stock',$producto->getStock());
            $sql->bindValue('estadoProducto',$producto->getEstadoProducto());
            $sql->execute();
            
        }

        }  
   
    catch(Exception $e){
        $mensaje=$e->getMessage();

    }
    Db::CerrarConexion($Db);
    return $mensaje;

}
public function buscarProducto($idProducto){
    $Db = Db::Conectar();//Cadena de conexion
    $sql= $Db->query("SELECT * FROM productos WHERE IdProducto=$idProducto");
    $sql->execute();
    Db::CerrarConexion($Db);
   return  $sql->fetch();
}
public function actualizarProducto($producto) {
    $mensaje="";
    $Db = Db::Conectar();//Cadena de conexion
    $sql= $Db->prepare('UPDATE  productos SET 
    Nombre=:nombreProducto,
    Precio=:precioProducto,
    IdMarca=:idMarca,
    IdCategoria=:idCategoria,
    Stock=:stock,
    Estado=:estadoProducto
    WHERE IdProducto=:idProducto');
     $sql->bindValue('idProducto',$producto->getIdProducto());
     $sql->bindValue('nombreProducto',$producto->getNombreProducto());
     $sql->bindValue('precioProducto',$producto->getPrecioProducto());
     $sql->bindValue('idMarca',$producto->getIdMarca());
     $sql->bindValue('idCategoria',$producto->getIdCategoria());
     $sql->bindValue('stock',$producto->getStock());
     $sql->bindValue('estadoProducto',$producto->getEstadoProducto());
     
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



public function cambiarEstado($idProducto,$estadoProducto)
{

    
    $mensaje = "";
    $Db =Db ::Conectar();//cadena de conexion
   
    $sql = $Db->prepare(" UPDATE   productos SET Estado=$estadoProducto WHERE IdProducto=$idProducto");
    

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