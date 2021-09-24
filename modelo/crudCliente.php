
<?php

class crudCliente
{

    public function __construct(){}


    public function listarCliente(){
        $Db = Db::Conectar();//Cadena de conexion
        $sql= $Db->query('SELECT * FROM clientes ORDER BY Nombre ASC');
        $sql->execute();
        Db::CerrarConexion($Db);
        return $sql->fetchAll();
    
    }
    public function registroCliente($cliente)
    {
        $mensaje="";
        $Db =Db ::Conectar();//cadena de conexion
        $buscarExiste=$Db->prepare("SELECT Documento FROM clientes WHERE Documento=:documentoCliente");  
    $buscarExiste->bindValue('documentoCliente',$cliente->getDocumentoCliente());
     try{
         $buscarExiste->execute();
         if($buscarExiste->rowCount() > 0){
             $validarExiste="El cliente ya existe";

            return $validarExiste;
         }else{
        $sql = $Db->prepare('INSERT INTO clientes  (Documento,Nombre,Celular,EstadoCliente)
        VALUES (:documentoCliente,:nombreCliente,:celularCliente,:estadoCliente)');

        $sql->bindvalue('documentoCliente',$cliente->getDocumentoCliente());
        $sql->bindvalue('nombreCliente',$cliente->getNombreCliente());
        $sql->bindvalue('celularCliente',$cliente->getCelularCliente());
        $sql->bindvalue('estadoCliente',$cliente->getEstadoCliente());
        $sql->execute();
         }
        }
       
         catch (Exception  $e) 
        {
            $mensaje =$e->getMessage();
            
        }
        Db ::CerrarConexion($Db);
        return $mensaje;

        
    }
   // lo primero para hacer una edicion es buscar el cliente en la base de datos
 public function buscarCliente($documentoCliente)
   {
       $Db =Db ::Conectar();//cadena de conexion
       $sql = $Db->query("SELECT * FROM clientes
       WHERE Documento=$documentoCliente");//defirnir busqueda    ueda consulta
       $sql->execute();//ejecutar consulta
       Db ::CerrarConexion($Db);
       return $sql->fetch();//retorna un registro
   }

   public function actualizarCliente($cliente)
   {
       $mensaje = "";
       $Db =Db ::Conectar();//cadena de conexion
       $sql = $Db->prepare(' UPDATE   clientes SET
       Documento=:documentoCliente,
       Nombre=:nombreCliente,
       Celular=:celularCliente,
       EstadoCliente=:estadoCliente
     
       
       WHERE Documento=:documentoCliente');
      

      
       $sql->bindvalue('nombreCliente',$cliente->getNombreCliente());
       $sql->bindvalue('celularCliente',$cliente->getCelularCliente());
       $sql->bindvalue('estadoCliente',$cliente->getEstadoCliente());
      
       $sql->bindvalue('documentoCliente',$cliente->getDocumentoCliente());
       
       try {
           $sql->execute();
           $mensaje = "Actualizasion Exitoso";
       } catch (Exception  $e)
       {
           $mensaje =$e->getMessage();
           
       }
       Db ::CerrarConexion($Db);
       return $mensaje;
       
   }
   public function eliminarCliente($documentoCliente) {
       $mensaje ="";
       $Db = Db::Conectar();//Cadena de conexion
       $sql= $Db->prepare('DELETE FROM clientes
       WHERE Documento=:documentoCliente
       ');
        $sql->bindValue('documentoCliente', $documentoCliente);
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
   public function cambiarEstadoCliente($documentoCliente,$estadoCliente)
{

    
    $mensaje = "";
    $Db =Db ::Conectar();//cadena de conexion
   
    $sql = $Db->prepare(" UPDATE  clientes SET EstadoCliente=$estadoCliente WHERE Documento=$documentoCliente");
    

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