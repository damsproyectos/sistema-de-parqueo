<?php
include('../app/config.php');
include('literal.php');


date_default_timezone_set("America/Bogota");
$fechaHora= date("Y-m-d h:i:s");
$dia = date("d");
$mes = date('m');
if($mes=="1")$mes = "Enero";
if($mes=="2")$mes = "Febrero";
if($mes=="3")$mes = "Marzo";
if($mes=="4")$mes = "Abril";
if($mes=="5")$mes = "Mayo";
if($mes=="6")$mes = "Junio";
if($mes=="7")$mes = "Julio";
if($mes=="8")$mes = "Agosto";
if($mes=="9")$mes = "Septiembre";
if($mes=="10")$mes = "Octubre";
if($mes=="11")$mes = "Noviembre";
if($mes=="12")$mes = "Diciembre";
$ano = date('Y');



$id_informacion = $_GET['id_informacion'];
$nro_factura = $_GET['nro_factura'];
$id_cliente = $_GET['id_cliente'];



////////////////Recuperar el departamento o ciudad de la tabla informaciones
$query_info = $pdo->prepare("SELECT * FROM tb_informaciones WHERE id_informacion = '$id_informacion' AND estado = '1' ");                  
$query_info->execute();
$infos = $query_info->fetchAll(PDO::FETCH_ASSOC);
foreach($infos as $info){               
   $departamento_ciudad = $info['departamento_ciudad'];                                                           
}
//echo $fecha_factura = $departamento_ciudad.", ".$dia." de ".$mes." de ".$ano;
$fecha_factura = $departamento_ciudad.", ".$dia." de ".$mes." de ".$ano;

$fecha_ingreso = $_GET['fecha_ingreso'];
$hora_ingreso = $_GET['hora_ingreso'];
//echo $fecha_salida = date('d/m/Y');
//$fecha_salida = date('d/m/Y');
$fecha_salida = date('Y-m-d');
$fecha_salida_para_calcular = date('Y/m/d');
//echo $hora_salida = date('H:i');
$hora_salida = date('H:i');


///////////NUEVA CALCULO DE TIEMPO SIN IMPORTAR HORAS NEGATIVAS ENTRE EL TIEMPO DE ANTRADA Y SALIDA/////////
//echo $fecha_hora_ingreso = $fecha_ingreso." ".$hora_ingreso;
$fecha_hora_ingreso = $fecha_ingreso." ".$hora_ingreso;
$fecha_hora_salida = $fecha_salida." ".$hora_salida;

/*$fecha1 = new DateTime('2023-03-16 18:42');
$fecha2 = new DateTime('2023-03-20 08:42');
$diff = $fecha1->diff($fecha2);*/

//echo $diff->days;
//echo $diff->h;
//echo $diff->days." dias con ".$diff->h." horas";

$fecha_hora_ingreso = new DateTime($fecha_hora_ingreso);
$fecha_hora_salida = new DateTime($fecha_hora_salida);
$diff = $fecha_hora_ingreso->diff($fecha_hora_salida);

//echo $tiempo = $diff->days." dias con ".$diff->h." horas con ".$diff->i." minutos";
$tiempo = $diff->days." dias con ".$diff->h." horas con ".$diff->i." minutos";
////////////////////////////////////////////////////////////////////////////////////////////////////////



/*///////////Algoritmo para calcular los DÍAS del carro en el Parqueadero//////////////////
$dato1 = new DateTime($fecha_ingreso);
$dato2 = new DateTime($fecha_salida_para_calcular);
$dias_calculado = $dato1->diff($dato2);
$dias_calculado->days;
//echo $dias_calculado->days.' días ';
///////////////////////////////////////////////////////////////////////////////////*/


/*///////////Algoritmo para calcular Tiempo del carro en el Parqueadero//////////////////
/////la propiedad strtotime me permite traer la hora.  "c"= cambio
$c_hora_ingreso = strtotime($hora_ingreso);
$c_hora_salida = strtotime($hora_salida);
$diferencia_hora = ($c_hora_salida - $c_hora_ingreso)/3600;
//echo $diferencia_hora = ($c_hora_salida - $c_hora_ingreso)/3600;
////Propiedad round redondear la hora, para que no me dé decimales o ajustar decimales
//round($diferencia_hora, 2); 
//echo round($diferencia_hora, 2); 
//echo $hora_calculado = (int)$diferencia_hora;
$hora_calculado = ((int)$diferencia_hora);
$diferencia_minutos = ($c_hora_salida - $c_hora_ingreso)/60;
$calculando = $hora_calculado * 60;
//echo $calculando = $hora_calculado * 60;
$minutos_calculado = $diferencia_minutos - $calculando;
//echo $tiempo =$dias_calculado->days. " días con " .$hora_calculado." horas con ".$minutos_calculado." minutos ";
if (($dias_calculado->days)=="0") {
    //echo $tiempo = $hora_calculado." horas con ".$minutos_calculado." minutos ";
    $tiempo = $hora_calculado." horas con ".$minutos_calculado." minutos ";
}else {
    //echo $tiempo =$dias_calculado->days. " días con " .$hora_calculado." horas con ".$minutos_calculado." minutos ";
    $tiempo =$dias_calculado->days. " días con " .$hora_calculado." horas con ".$minutos_calculado." minutos ";
}
//$tiempo =$dias_calculado->days. " días con " .$hora_calculado." horas con ".$minutos_calculado." minutos ";
///////////////////////////////////////////////////////////////////////////////////*/


$cuviculo = $_GET['cuviculo'];
//echo $detalle = "Servicio de parqueo de ".$tiempo;
$detalle = "Servicio de parqueo de ".$tiempo;


/////////Calcula el precio del cliente en horas/////////////////
$query_precios = $pdo->prepare("SELECT * FROM tb_precios WHERE cantidad = '$diff->h' AND detalle = 'horas' AND estado = '1' ");                  
$query_precios->execute();
$datos_precios = $query_precios->fetchAll(PDO::FETCH_ASSOC);
foreach($datos_precios as $datos_precio){             
    $precio_hora = $datos_precio['precio'];
    //echo $precio_hora = $datos_precio['precio'];
}
//echo $precio;
//////////////////////////////////////////////////////////////
//$precio = $precio;



/////////Calcula el precio del cliente en DÍAS/////////////////
$precio_dia = 0;
$query_precios_dias = $pdo->prepare("SELECT * FROM tb_precios WHERE cantidad = '$diff->days' AND detalle = 'DIAS' AND estado = '1' ");                  
$query_precios_dias->execute();
$datos_precios_dias = $query_precios_dias->fetchAll(PDO::FETCH_ASSOC);
foreach($datos_precios_dias as $datos_precios_dia){             
     $precio_dia = $datos_precios_dia['precio'];
     //echo $precio_dia = $datos_precios_dia['precio'];
}
//////////////////////////////////////////////////////

//echo $precio_final = $precio_dia + $precio_hora;
$precio_final = $precio_dia + $precio_hora;
$cantidad = "1";
//echo $total = ($precio_final * $cantidad);
$total = ($precio_final * $cantidad);
//echo $monto_total = $total;
$monto_total = $total;
//echo $monto_literal = numtoletras($monto_total);
$monto_literal = numtoletras($monto_total);
//echo $user_sesion = $_GET['user_sesion'];
$user_sesion = $_GET['user_sesion'];

/////////////////////////////Rescatando los datos del cliente///////////////////////////////////////////////
$query_clientes = $pdo->prepare("SELECT * FROM tb_clientes WHERE id_cliente = '$id_cliente' AND estado = '1' ");                  
$query_clientes->execute();
$datos_clientes = $query_clientes->fetchAll(PDO::FETCH_ASSOC);
    foreach($datos_clientes as $datos_cliente){                      
        //$contador_cliente = $contador_cliente + 1;            
        $id_cliente = $datos_cliente['id_cliente'];
        $nombre_cliente = $datos_cliente['nombre_cliente'];
        $nit_ci_cliente = $datos_cliente['nit_ci_cliente'];
        $placa_auto = $datos_cliente['placa_auto'];
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////

//$qr = $_GET['qr'];
//echo $qr = "Factura realizada por el sistema de parqueo, al cliente ".$nombre_cliente." con CI/NIT: ".$nit_ci_cliente." con el vehículo con número placa ".$placa_auto." y esta factura se generó en ".$fecha_factura." a hr: ".$hora_salida;

$qr = "Factura realizada por el sistema de parqueo, al cliente ".$nombre_cliente." con CI/NIT: ".$nit_ci_cliente." con el vehículo con número placa ".$placa_auto." y esta factura se generó en ".$fecha_factura." a hr: ".$hora_salida;

$sentencia = $pdo->prepare('INSERT INTO tb_facturaciones
(id_informacion,nro_factura,id_cliente,fecha_factura,fecha_ingreso,hora_ingreso,fecha_salida,hora_salida,tiempo,cuviculo,detalle,precio,cantidad,total,monto_total,monto_literal,user_sesion,qr, fyh_creacion, estado)
VALUES ( :id_informacion,:nro_factura,:id_cliente,:fecha_factura,:fecha_ingreso,:hora_ingreso,:fecha_salida,:hora_salida,:tiempo,:cuviculo,:detalle,:precio,:cantidad,:total,:monto_total,:monto_literal,:user_sesion,:qr,:fyh_creacion,:estado)');

$sentencia->bindParam(':id_informacion',$id_informacion);
$sentencia->bindParam(':nro_factura',$nro_factura);
$sentencia->bindParam(':id_cliente',$id_cliente);
$sentencia->bindParam(':fecha_factura',$fecha_factura);
$sentencia->bindParam(':fecha_ingreso',$fecha_ingreso);
$sentencia->bindParam(':hora_ingreso',$hora_ingreso);
$sentencia->bindParam(':fecha_salida',$fecha_salida);
$sentencia->bindParam(':hora_salida',$hora_salida);
$sentencia->bindParam(':tiempo',$tiempo);
$sentencia->bindParam(':cuviculo',$cuviculo);
$sentencia->bindParam(':detalle',$detalle);
$sentencia->bindParam(':precio',$precio_final);
$sentencia->bindParam(':cantidad',$cantidad);
$sentencia->bindParam(':total',$total);
$sentencia->bindParam(':monto_total',$monto_total);
$sentencia->bindParam(':monto_literal',$monto_literal);
$sentencia->bindParam(':user_sesion',$user_sesion);
$sentencia->bindParam(':qr',$qr);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_del_registro);

if($sentencia->execute()){
    echo 'success';
//header('Location:' .$URL.'/');

//////////////////////////ACTUALIZAR ESTADO LIBRE/////////////////////////////////////////////////////////
$estado_espacio = "LIBRE";
date_default_timezone_set("America/Bogota");
$fechaHora= date("Y-m-d h:i:s");
$sentencia = $pdo->prepare("UPDATE tb_mapeos SET
estado_espacio = :estado_espacio,
fyh_actualizacion = :fyh_actualizacion
WHERE nro_espacio = :nro_espacio");
$sentencia->bindParam(':estado_espacio', $estado_espacio);
$sentencia->bindParam(':fyh_actualizacion', $fechaHora);
$sentencia->bindParam(':nro_espacio', $cuviculo);
//if($sentencia->execute()) {
$sentencia->execute();    
////////////////////////////////////////////////////////////////////////////////////////////////////////////


//////////////////////////ACTUALIZAR EN LA TABLA TICKET ESTADO LIBRE/////////////////////////////////////////////////////////
$estado_espacio_ticket = "LIBRE";
$sentencia_ticket = $pdo->prepare("UPDATE tb_tickets SET
estado_ticket = :estado_ticket WHERE fecha_ingreso = :fecha_ingreso AND hora_ingreso = :hora_ingreso");
$sentencia_ticket->bindParam(':estado_ticket', $estado_espacio_ticket);
$sentencia_ticket->bindParam(':fecha_ingreso', $fecha_ingreso);
$sentencia_ticket->bindParam(':hora_ingreso', $hora_ingreso);
$sentencia_ticket->execute();    
////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

    <script>location.href = "facturacion/factura.php";</script>

<?php
}else{
echo 'error al registrar a la base de datos';
}

?>