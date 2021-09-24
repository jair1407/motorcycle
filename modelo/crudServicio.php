<?php
class crudServicio{
public function __construct(){}

public function listarServicio(){
    $Db = Db::Conectar();//Cadena de conexion
    $sql= $Db->query('SELECT * FROM servicios ORDER BY Nombre ASC');
    $sql->execute();
    Db::CerrarConexion($Db);
    return $sql->fetchAll();

}
public function registrarServicio($servicio){
$mensaje = "";
$Db=Db::Conectar();
$buscarExiste=$Db->prepare("SELECT Nombre FROM servicios WHERE Nombre=:nombre");  
    $buscarExiste->bindValue('nombre',$servicio->getNombre());
     try{
         $buscarExiste->execute();
         if($buscarExiste->rowCount() > 0){
             $validarExiste="El servicio ya existe";

            return $validarExiste;
         }else{
$idVenta = -1;
$sql= $Db->prepare('INSERT INTO 
servicios(Nombre,Descripcion,Precio,Estado) VALUES 
(:Nombre,:Descripcion,:Precio,:estadoServicio)');
$sql->bindValue('Nombre',$servicio->getNombre());
$sql->bindValue('Descripcion',$servicio->getDescripcion());
$sql->bindValue('Precio',$servicio->getPrecio());
$sql->bindValue('estadoServicio',$servicio->getEstadoServicio());
$sql->execute();
         }
}catch(Exception $e){
echo $e->getMessage();
}


Db::CerrarConexion($Db);
return $idVenta;
}

public function buscarServicio($idServicio){
    $Db = Db::Conectar();//Cadena de conexion
    $sql= $Db->query("SELECT * FROM servicios WHERE IdServicio=$idServicio");
    $sql->execute();
    Db::CerrarConexion($Db);
   return  $sql->fetch();
}
public function actualizarServicio($servicio) {
    $mensaje="";
    $Db = Db::Conectar();//Cadena de conexion
    $sql= $Db->prepare('UPDATE  servicios SET 
    Nombre=:nombre,
    Descripcion=:descripcion,
    Precio=:precio,
    Estado=:estadoServicio
    WHERE IdServicio=:idServicio');
     $sql->bindValue('idServicio',$servicio->getIdServicio());
     $sql->bindValue('nombre',$servicio->getNombre());
     $sql->bindValue('descripcion',$servicio->getDescripcion());
     $sql->bindValue('precio',$servicio->getPrecio());
     $sql->bindValue('estadoServicio',$servicio->getEstadoServicio());
     
     
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
public function eliminarServicio($idServicio) {
    $mensaje ="";
    $Db = Db::Conectar();//Cadena de conexion
    $sql= $Db->prepare('DELETE FROM  servicios 
    WHERE IdServicio=:idServicio');
     $sql->bindValue('idServicio', $idServicio);
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
public function registrarDetalleServicio($detalleVenta){
    $mensaje = "";
    $Db=Db::Conectar();

    $sql= $Db->prepare('INSERT INTO 
    detalle_servicios(IdVenta,IdServicio,Cantidad,ValorUnitario) VALUES 
    (:idVenta,:idServicio,:cantidad,:valorUnitario)');
    $sql->bindValue('idVenta',$detalleVenta->getIdVenta());
    $sql->bindValue('idServicio',$detalleVenta->getIdServicio());
    $sql->bindValue('cantidad',$detalleVenta->getCantidad());
    $sql->bindValue('valorUnitario',$detalleVenta->getValorUnitario());
    
    try{
     
        $sql->execute();
    }catch(Exception $e){
    echo $e->getMessage();
    }
}
public function listarDetalleServicio($idVenta){
    $Db = Db::Conectar();//Cadena de conexion
    $sql= $Db->query("SELECT detalle_servicios.*,
    servicios.Nombre 
    FROM detalle_servicios 
    INNER JOIN servicios ON detalle_servicios.IdServicio=servicios.IdServicio
    WHERE IdVenta=$idVenta ORDER BY IdDetalleServicio ASC ");
    $sql->execute();
    Db::CerrarConexion($Db);
    return $sql->fetchAll();

}
public function eliminarDetalleServicio($idDetalleServicio){
    $mensaje = "";
    $Db=Db::Conectar();
    $sql= $Db->prepare('DELETE FROM detalle_servicios WHERE IdDetalleServicio=:idDetalleServicio');
    $sql->bindValue('idDetalleServicio',$idDetalleServicio);

    try{
        $sql->execute();
     echo "Eliminacion exitosa";
    }catch(Exception $e){
    echo $e->getMessage();
    }
    Db::CerrarConexion($Db);
    return $mensaje;
}
public function actualizarDetalleServicio($idDetalleServicio,$cantidad){
    $mensaje = "";
    $Db=Db::Conectar();
    $sql= $Db->prepare('UPDATE  detalle_servicios SET
    Cantidad=:cantidad WHERE IdDetalleServicio=:idDetalleServicio');
     $sql->bindValue('cantidad',$cantidad);
    $sql->bindValue('idDetalleServicio',$idDetalleServicio);
    try{
    $sql->execute();
     $mensaje= "Actualizacion exitosa";
    }catch(Exception $e){
    echo $e->getMessage();
    }
    Db::CerrarConexion($Db);
    return $mensaje;
}
public function totalServicio($idVenta){
    $Db=Db::Conectar();
    $sql= $Db->query("SELECT (sum(ValorUnitario*Cantidad)) AS SumaServicio from detalle_servicios WHERE IdVenta=$idVenta");
     try{
         $sql->execute();
         return $sql->fetch();
     }catch(Exception $e){
         echo $e->getMessage();
     }
     Db::CerrarConexion($Db);
     
     
   
 }
 public function cambiarEstadoServicio($idServicio,$estadoServicio)
 {
 
     
     $mensaje = "";
     $Db =Db ::Conectar();//cadena de conexion
    
     $sql = $Db->prepare(" UPDATE   servicios SET Estado=$estadoServicio WHERE IdServicio=$idServicio");
     
 
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