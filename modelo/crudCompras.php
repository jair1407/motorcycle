<?php
class CrudCompras{
public function __construct(){}

public function listarCompra(){
    $Db = Db::Conectar();//Cadena de conexion
    $sql= $Db->query('SELECT  detallecompra.*,entradas.Descripcion,productos.Nombre FROM entradas
    INNER JOIN detallecompra on detallecompra.IdEntrada=entradas.IdEntrada
    INNER JOIN productos on detallecompra.IdProducto=productos.IdProducto ORDER BY Idcompra ');
   
    $sql->execute();
    Db::CerrarConexion($Db);
    return $sql->fetchAll();

}
public function registrarCompra($Identrada,$Idproducto,$cantidad){
    $mensaje = "";
    $Db = Db::Conectar();//Cadena de conexion
  
    try{
    foreach($Idproducto as $key=>$value){
      
     $sql= $Db->prepare('INSERT INTO detallecompra(IdEntrada,IdProducto,cantidad)
      VALUES(:entrada,:producto,:cantidad)');
    $sql->bindValue('entrada',$Identrada[$key]);
    $sql->bindValue('producto',$value);
    $sql->bindValue('cantidad',$cantidad[$key]);
    $sql->execute();
    $sqlActualizarStock ="";
    $sqlActualizarStock= $Db->prepare("UPDATE productos SET Stock=Stock+$cantidad[$key] WHERE IdProducto= $value");
    $sqlActualizarStock->execute();
        }
      
        
        $mensaje="Registro Exitoso";
    }
    catch(Exception $e){
        $mensaje=$e->getMessage();

    }
    Db::CerrarConexion($Db);
    return $mensaje;

}
public function buscarCompra($idCompra){
    $Db = Db::Conectar();//Cadena de conexion
    $sql= $Db->query("SELECT * FROM detallecompra WHERE idCompra=$idCompra");
    $sql->execute();
    Db::CerrarConexion($Db);
   return  $sql->fetch();
}
public function actualizarCompra($compras) {
    $mensaje="";
    $Db = Db::Conectar();//Cadena de conexion
    $sql= $Db->prepare('UPDATE  detallecompra SET 
    Entradas_idEntradas=:entradas,
    Productos_idProductos=:producto,
    cantidad=:cantidad
    WHERE idCompra=:idCompra');
     $sql->bindValue('idCompra',$compras->getId());
     $sql->bindValue('producto',$compras->getProducto());
     $sql->bindValue('cantidad',$compras->getCantidad());
     
     
     
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
public function eliminarCompra($idCompra) {
    $mensaje ="";
    $Db = Db::Conectar();//Cadena de conexion
    $sql= $Db->prepare('DELETE FROM  detallecompra 
    WHERE idCompra=:idCompra');
     $sql->bindValue('idCompra', $idCompra);
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