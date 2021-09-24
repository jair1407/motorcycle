<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include('../controlador/conexion.php');
require '../vendor/autoload.php';


$correo = $_POST['correo'];
$codigo= rand(1000,9999);//esta parte coge un numero aleatorio de 1000 hasta 9999
$bytes = random_bytes(5);//luego lo guardo en esya linea y solo guarda 5
$token =bin2hex($bytes);//luego guardo los 5 numeros en esta variable y los cobierto

$queryusuario = "SELECT * FROM usuarios WHERE Correo = $correo";
$Db =Db ::Conectar();//cadena de conexion
$sql = $Db->query("SELECT * FROM usuarios WHERE Correo = '$correo'");//defirnir busqueda    ueda consulta
$sql->execute();//ejecutar consulta
Db ::CerrarConexion($Db);
$prueba= $sql->rowCount();//retorna un registro
$nr = $prueba;
if ($nr == 1)
{
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function


//Load Composer's autoloader


//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);


    if($mail){
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'pruebamotorcycle@gmail.com';                     //SMTP username
    $mail->Password   = 'Tiesto94';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;

    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('pruebamotorcycle@gmail.com', 'MotorCycle');
    $mail->addAddress($correo, 'jair');     //Add a recipient


    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Recuperacion de password';
    $mail->Body    = 'Tu código es:  <b>'.$codigo.'</b> <b><a href="http://localhost//ppMotorCycle/vista/reset.php?correo='.$correo.'&token='.$token.'"> 
    para restablecer da click aquí </a> </p>
<p> <small>Si usted no envío este código, favor de omitir</small></b>';
    $mail->AltBody = '';
    $mail->send();
    //echo 'Message has been sent';
    echo "<script> alert('Código enviado, revisa tu correo');location='reset.php?correo=$correo&token=$token'</script>";
}

$Db =Db ::Conectar();//cadena de conexion
$sql = $Db->query("INSERT INTO passwords(Correo,token,codigo) values('$correo','$token','$codigo') ");//insertar datos 
echo '<p>Verifica tu correo,  para restablecer tu cuenta</p>';
$sql->execute();//ejecutar consulta
Db ::CerrarConexion($Db);}
else{
    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
echo "<script> alert('El correo no existe, por favor verifique');location='index.html'</script>";
}


?>