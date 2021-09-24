<?php
    include "../controlador/conexion.php";
    include "../modelo/Acceso.php";
    $nombre="";
    $correo = $_POST['correo'];
    $p1 =$_POST['p1'];
    $p2 =$_POST['p2'];
    if($p1 == $p2){

    $salt = md5($p1);
    $passwordEncritado = crypt($p1,$salt);


$Db =Db ::Conectar();//cadena de conexion
$sql = $Db->query("UPDATE usuarios set Password='$passwordEncritado' where Correo='$correo' ");
//echo ("UPDATE usuarios set Password='$passwordEncritado' where Correo='$correo' ");
//insertar datos
$sql->execute();//ejecutar consulta
Db ::CerrarConexion($Db);

echo "<script> alert('Contraseña cambiada');location='index.html'</script>";

    }else{
      echo "<script> alert('Error de Cambio');location='reset.php'</script>";
    }
?>