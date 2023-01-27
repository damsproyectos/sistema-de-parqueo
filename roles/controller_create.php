<?php
include ('../app/config.php');
$nombre = $_GET['nombre'];

date_default_timezone_set("America/Bogota");
$fechaHora= date("Y-m-d h:i:s");

//echo $nombres."-".$email."-".$password_user;
$sentencia = $pdo->prepare("INSERT INTO tb_roles
       (nombre, fyh_creacion, estado) 
VALUES (:nombre, :fyh_creacion, :estado)");

$sentencia->bindParam('nombre', $nombre);
$sentencia->bindParam('fyh_creacion',  $fechaHora);
$sentencia->bindParam('estado', $estado_del_registro);

//$sentencia->execute();

if($sentencia->execute()){
    echo "registro satisfactorio";
    //header('index.php');
    ?>
    <script>location.href = "index.php";</script>
    <?php
}else{
    echo "no se pudo registrar a la base de datos";
}
?>