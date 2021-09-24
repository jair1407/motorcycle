<?php
class crudVenta{
public function __construct(){}

public function listarVenta(){
    $Db = Db::Conectar();//Cadena de conexion
    $sql= $Db->query('SELECT ventas.*,clientes.Nombre FROM ventas INNER JOIN clientes on 
    DocumentoCliente=Documento ORDER BY Fecha DESC');
    $sql->execute();
    Db::CerrarConexion($Db);
    return $sql->fetchAll();

}
public function registrarVenta($venta){
$mensaje = "";
$Db=Db::Conectar();
$idVenta = -1;
$sql= $Db->prepare('INSERT INTO 
ventas(DocumentoCliente,Fecha) VALUES 
(:documentoCliente,NOW())');
$sql->bindValue('documentoCliente',$venta->getDocumentoCliente());

try{
    $sql->execute();
    $idVenta=$Db->lastInsertId();
}catch(Exception $e){
echo $e->getMessage();
}


Db::CerrarConexion($Db);
return $idVenta;
}
public function registrarDetalleVenta($detalleVenta){
    $mensaje = "";
    $Db=Db::Conectar();
    $idDetalleVenta = -1;
    $sql= $Db->prepare('INSERT INTO 
    detalle_ventas(IdVenta,IdProducto,Cantidad,ValorUnitario) VALUES 
    (:idVenta,:idProducto,:cantidad,:valorUnitario)');
    $sql->bindValue('idVenta',$detalleVenta->getIdDetalleVenta());
    $sql->bindValue('idProducto',$detalleVenta->getIdProducto());
    $sql->bindValue('cantidad',$detalleVenta->getCantidad());
    $sql->bindValue('valorUnitario',$detalleVenta->getValorUnitario());
    $cantidad=$detalleVenta->getCantidad();
    $idProducto=$detalleVenta->getIdProducto();
    try{
        $sqlActualizarStock ="";
        $sql->execute();
        $sqlActualizarStock= $Db->prepare("UPDATE productos SET Stock=Stock-$cantidad WHERE IdProducto= $idProducto");
        $sqlActualizarStock->execute();
        $idDetalleVenta=$Db->lastInsertId();//Cpturar el ultimo ingresado
    }catch(Exception $e){
    echo $e->getMessage();
    }
    
    
    Db::CerrarConexion($Db);
    return $idDetalleVenta;
    }
    public function listarDetalleVenta($idVenta){
        $Db = Db::Conectar();//Cadena de conexion
        $sql= $Db->query("SELECT detalle_ventas.*,
        productos.Nombre AS NombreProducto
        FROM detalle_ventas 
        INNER JOIN productos ON detalle_ventas.IdProducto=productos.IdProducto
        WHERE IdVenta=$idVenta ORDER BY IdDetalleVenta ASC");
        $sql->execute();
        Db::CerrarConexion($Db);
        return $sql->fetchAll();

    }
    public function eliminarDetalleVenta($idDetalleVenta){
        $mensaje = "";
        $Db=Db::Conectar();
        $sql= $Db->prepare('DELETE FROM detalle_ventas WHERE IdDetalleVenta=:idDetalleVenta');
        $sql->bindValue('idDetalleVenta',$idDetalleVenta);
    
        try{
            $sql->execute();
         echo "Eliminacion exitosa";
        }catch(Exception $e){
        echo $e->getMessage();
        }
        Db::CerrarConexion($Db);
        return $mensaje;
    }
    public function actualizarDetalleVenta($idDetalleVenta,$cantidad){
        $mensaje = "";
        $Db=Db::Conectar();
        $sql= $Db->prepare('UPDATE  detalle_ventas SET
        Cantidad=:cantidad WHERE IdDetalleVenta=:idDetalleVenta');
         $sql->bindValue('cantidad',$cantidad);
        $sql->bindValue('idDetallePedido',$idDetalleVenta);
        try{
        $sql->execute();
         $mensaje= "Actualizacion exitosa";
        }catch(Exception $e){
        echo $e->getMessage();
        }
        Db::CerrarConexion($Db);
        return $mensaje;
    }
    public function totalVenta($idVenta){
       $Db=Db::Conectar();
       $sql= $Db->query("SELECT (sum(ValorUnitario*Cantidad)) AS SumaVentas from detalle_ventas WHERE IdVenta=$idVenta");
        try{
            $sql->execute();
            return $sql->fetch();
            
        }catch(Exception $e){
            echo $e->getMessage();

        }
        Db::CerrarConexion($Db);
        
        
      
    }
  
        
   

}
?>