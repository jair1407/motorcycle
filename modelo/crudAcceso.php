<?php
class crudAcesso{

    public function __construct(){}
    public function validarAcesso($usuario){
        $Db = Db::Conectar();//Cadena de conexion
        $sql= $Db->prepare("SELECT usuarios.*,roles.Nombre AS NombreRol FROM usuarios INNER JOIN 
        roles on usuarios.IdRol=roles.IdRol
        WHERE NombreUsuario=:nombre AND Password=:password AND Estado=1");
        $sql->bindValue('nombre',$usuario->getNombre());
        $sql->bindValue('password',$usuario->getPassword());
        $sql->execute();
        try{
            $sql->execute();
            $usuario->getExiste(0);
           if($sql->rowCount()>0)
           {
               $datosUsuario= $sql->fetch();
               $usuario->setPassword('');
               $usuario->setExiste(1);
               $usuario->setRol($datosUsuario['IdRol']);

           }
        }
        catch(Exception $e){
           echo $e->getMessage();
    
        }
        Db::CerrarConexion($Db);
        return $usuario;


    }
    public function listarUsuario(){
        $Db = Db::Conectar();//Cadena de conexion
        $sql= $Db->query('SELECT usuarios.*,roles.Nombre AS NombreRol FROM usuarios INNER JOIN 
        roles on usuarios.IdRol=roles.IdRol');
        $sql->execute();
        Db::CerrarConexion($Db);
        return $sql->fetchAll();
    
    }
    
    public function buscarUsuario($IdUsuario){
        $Db = Db::Conectar();//Cadena de conexion
        $sql= $Db->query("SELECT * FROM usuarios WHERE IdUsuario='$IdUsuario'");
        $sql->execute();
        Db::CerrarConexion($Db);
       return  $sql->fetch();
    }
    public function actualizarUsuario($usuario) {
        $mensaje="";
        $Db = Db::Conectar();//Cadena de conexion
        $sql= $Db->prepare('UPDATE  usuarios SET
        NombreUsuario=:nombre,
        Password=:password,
        IdRol=:rol,
        Estado=:estado,
        Correo=:correo
        WHERE IdUsuario=:IdUsuario');
     $sql->bindValue('nombre',$usuario->getNombre());
     $sql->bindValue('password',$usuario->getPassword());
     $sql->bindValue('rol',$usuario->getRol());
     $sql->bindValue('correo',$usuario->getCorreo());
     $sql->bindValue('estado',$usuario->getEstado());
     $sql->bindValue('IdUsuario',$usuario->getIdUsuario());
         
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
    
    public function registrarUsuario($usuario){
        $mensaje = "";
        $validarExiste="";
        $Db = Db::Conectar();//Cadena de conexion   
        $buscarExiste=$Db->prepare("SELECT Correo FROM usuarios WHERE Correo=:correo");  
        $buscarExiste->bindValue('correo',$usuario->getCorreo());
         try{
             $buscarExiste->execute();
             if($buscarExiste->rowCount() > 0){
                 $validarExiste="El usuario ya existe";

                return $validarExiste;
             }else{
                $sql= $Db->prepare('INSERT INTO usuarios(NombreUsuario,Password,IdRol,Estado,Correo) VALUES(:nombre,:password,:rol,:estado,:correo)');
                $sql->bindValue('nombre',$usuario->getNombre());
                $sql->bindValue('password',$usuario->getPassword());
                $sql->bindValue('rol',$usuario->getRol());
                $sql->bindValue('correo',$usuario->getCorreo());
                $sql->bindValue('estado',$usuario->getEstado());
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
    public function eliminarUsuario($IdUsuario) {

        $Db = Db::Conectar();//Cadena de conexion
        $sql= $Db->prepare('DELETE FROM  usuarios
        WHERE IdUsuario=:IdUsuario');
$sql->bindValue('IdUsuario', $IdUsuario);
try{
            $sql->execute();
            
        }
        catch(Exception $e){
            
    
        }
        Db::CerrarConexion($Db);
       
    
    }
    public function cambiarEstado($IdUsuario,$estado)
{

    
    $mensaje = "";
    $Db =Db ::Conectar();//cadena de conexion
   
    $sql = $Db->prepare(" UPDATE   usuarios SET Estado=$estado WHERE IdUsuario=$IdUsuario");
    

    try {
        $sql->execute();
        $mensaje = "Cambio De estado usuario Exitoso";
    } catch (Exception  $e) 
    {
        $mensaje =$e->getMessage();
        
    }
    Db ::CerrarConexion($Db);
    return $mensaje;
    
    
}

    
    }



    ?>