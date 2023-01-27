<?php

include ('../app/config.php');

$nombres = $_GET['nombres'];
$email = $_GET['email'];
$password_user = $_GET['password_user'];

date_default_timezone_set("America/Bogota");
$fechaHora= date("Y-m-d h:i:s");

//echo $nombres."-".$email."-".$password_user;
$sentencia = $pdo->prepare("INSERT INTO tb_usuarios
       (nombres, email, password_user, fyh_creacion, estado) 
VALUES (:nombres, :email, :password_user, :fyh_creacion, :estado)");

$sentencia->bindParam('nombres', $nombres);
$sentencia->bindParam('email', $email);
$sentencia->bindParam('password_user', $password_user);
$sentencia->bindParam('fyh_creacion',  $fechaHora);
$sentencia->bindParam('estado', $estado_del_registro);

//$sentencia->execute();

if($sentencia->execute()){
    echo "registro satisfactorio";
    //header('index.php');
    ?>
    <!--script>location.href = "index.php";</script-->
    <script>location.href = "../roles/asignar.php";</script>
    <?php
}else{
    echo "no se pudo registrar a la base de datos";
}
?>