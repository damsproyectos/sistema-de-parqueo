<?php

include ('../app/config.php');

$id_informacion = $_GET['id_informacion'];
$estado_inactivo = "0";
//$sentencia = $_GET['id_user'];
//$sentencia = $pdo->prepare("DELETE FROM tb_usuarios WHERE id = '$id_user'");
date_default_timezone_set("America/Bogota");
$fechaHora= date("Y-m-d h:i:s");

$sentencia = $pdo->prepare("UPDATE tb_informaciones SET
estado = :estado,
fyh_eliminacion = :fyh_eliminacion
WHERE id_informacion = :id_informacion");

$sentencia->bindParam(':estado', $estado_inactivo);
$sentencia->bindParam(':fyh_eliminacion', $fechaHora);
$sentencia->bindParam(':id_informacion', $id_informacion);

if($sentencia->execute()) {
    echo "se eliminó el registro de la manera correcta";
    ?>
    <script>location.href = "informaciones.php";</script>
    <?php
}else{
    echo "error al eliminar el registro";
}


?>