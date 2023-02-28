<?php

include('../app/config.php');

$cantidad = $_GET['cantidad'];
$detalle = $_GET['detalle'];
$precio = $_GET['precio'];

date_default_timezone_set("America/Bogota");
$fechaHora= date("Y-m-d h:i:s");

$sentencia = $pdo->prepare('INSERT INTO tb_precios
(cantidad,detalle,precio, fyh_creacion, estado)
VALUES ( :cantidad,:detalle,:precio,:fyh_creacion,:estado)');

$sentencia->bindParam(':cantidad',$cantidad);
$sentencia->bindParam(':detalle',$detalle);
$sentencia->bindParam(':precio',$precio);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_del_registro);

if($sentencia->execute()){
//echo 'success';
//header('Location:' .$URL.'/');
?>
    <script>location.href = "index.php";</script>
<?php
}else{
echo 'error al registrar a la base de datos';
}

?>