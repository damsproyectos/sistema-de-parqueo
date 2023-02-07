<?php
include('../app/config.php');

 $nombre_cliente = $_GET['nombre_cliente'];
 $nit_ci = $_GET['nit_ci'];
 $cuviculo = $_GET['cuviculo'];
 $fecha_ingreso = $_GET['fecha_ingreso'];
 $hora_ingreso = $_GET['hora_ingreso'];
 $user_sesion = $_GET['user_sesion'];

 date_default_timezone_set("America/Bogota");
$fechaHora= date("Y-m-d h:i:s");
 
 $sentencia = $pdo->prepare('INSERT INTO tb_tickets
 (nombre_cliente,nit_ci,cuviculo,fecha_ingreso,hora_ingreso,user_sesion, fyh_creacion, estado)
 VALUES (:nombre_cliente,:nit_ci,:cuviculo,:fecha_ingreso,:hora_ingreso,:user_sesion,:fyh_creacion,:estado)');
 
 $sentencia->bindParam(':nombre_cliente',$nombre_cliente);
 $sentencia->bindParam(':nit_ci',$nit_ci);
 $sentencia->bindParam(':cuviculo',$cuviculo);
 $sentencia->bindParam(':fecha_ingreso',$fecha_ingreso);
 $sentencia->bindParam(':hora_ingreso',$hora_ingreso);
 $sentencia->bindParam(':user_sesion',$user_sesion);
 $sentencia->bindParam('fyh_creacion',$fechaHora);
 $sentencia->bindParam('estado',$estado_del_registro);
 
 if($sentencia->execute()){
 echo 'success';
 //header('Location:' .$URL.'/');
 ?>
 <script>location.href = "principal.php";</script>
<?php
 }else{
 echo 'error al registrar a la base de datos';
 }
?>