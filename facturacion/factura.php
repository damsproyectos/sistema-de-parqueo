<?php

// Include the main TCPDF library (search for installation path).
require_once('../app/templeates/TCPDF-main/tcpdf.php');
include('../app/config.php');

//Cargar el encabezado
$query_informacions = $pdo->prepare("SELECT * FROM tb_informaciones WHERE estado = '1' ");
$query_informacions->execute();
$informacions = $query_informacions->fetchAll(PDO::FETCH_ASSOC);
foreach($informacions as $informacion){                      
    $id_informacion = $informacion['id_informacion'];
    $nombre_parqueo = $informacion['nombre_parqueo'];
    $actividad_empresa = $informacion['actividad_empresa'];
    $sucursal = $informacion['sucursal'];
    $direccion = $informacion['direccion'];
    $zona = $informacion['zona'];
    $telefono = $informacion['telefono'];
    $departamento_ciudad = $informacion['departamento_ciudad'];
    $pais = $informacion['pais'];
}

////////////////////////////////////Rescatar la información de la Factura//////////////////////////////
$query_facturas = $pdo->prepare("SELECT * FROM tb_facturaciones WHERE estado = '1' ");
$query_facturas->execute();
$facturas = $query_facturas->fetchAll(PDO::FETCH_ASSOC);
foreach($facturas as $factura){                      
    $id_facturacion = $factura['id_facturacion'];
    $id_informacion = $factura['id_informacion'];
    $nro_factura = $factura['nro_factura'];
    $id_cliente = $factura['id_cliente'];
    $fecha_factura = $factura['fecha_factura'];
    $fecha_ingreso = $factura['fecha_ingreso'];
    $hora_ingreso = $factura['hora_ingreso'];
    $fecha_salida = $factura['fecha_salida'];
    $hora_salida = $factura['hora_salida'];
    $tiempo = $factura['tiempo'];
    $cuviculo = $factura['cuviculo'];
    $detalle = $factura['detalle'];
    $precio = $factura['precio'];
    $cantidad = $factura['cantidad'];
    $total = $factura['total'];
    $monto_total = $factura['monto_total'];
    $monto_literal = $factura['monto_literal'];
    $user_sesion = $factura['user_sesion'];
    $qr = $factura['qr'];
}
////////////////////////////////////////////////////////////////////////////////////////////////////////


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

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(79, 180), true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Sistema de Parqueo');
$pdf->setTitle('Sistema de Parqueo');
$pdf->setSubject('Sistema de Parqueo');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(5, 5, 5);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, 5);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->setFont('Helvetica', '', 7);

// add a page
$pdf->AddPage();




// create some HTML content
$html = '
<div>
    <p style="text-align: center">
        <b>'.$nombre_parqueo.'</b> <br>
        '.$actividad_empresa.' <br>        
        SUCURSAL No '.$sucursal.' <br>
        '.$direccion.' <br>
        ZONA: '.$zona.' <br>
        TELEFONO: '.$telefono.' <br>
        '.$departamento_ciudad.' - '.$pais.' <br>
        ------------------------------------------------------------------------------
        <b>FACTURA Nro.</b> '.$nro_factura.'
        ------------------------------------------------------------------------------
        <div style="text-align: left">            
            <b>DATOS DEL CLIENTE</b> <br>
            <b>SEÑOR(A): </b> '.$nombre_cliente.' <br>
            <b>NIT/CI.: </b> '.$nit_ci_cliente.' <br>
            <b>Fecha de la factura: </b> '.$fecha_factura.' <br>
        ------------------------------------------------------------------------------ <br> 
            <b>De: </b> '.$fecha_ingreso.' <b> Hora: </b>'.$hora_ingreso.'<br>
            <b>A: </b>'.$fecha_salida.'<b> Hora: </b>'.$hora_salida.'<br>
            <b>Tiempo: </b>'.$tiempo.'<br>            
        ------------------------------------------------------------------------------ <br>
                <table border="1" cellpadding="1"> 
                    <tr>
                        <td style="text-align: center" width="125px"><b>Detalle</b></td>
                        <td style="text-align: center" width="40px"><b>Precio</b></td>
                        <td style="text-align: center" width="40px"><b>Cantidad</b></td>
                        <td style="text-align: center" width="40px"><b>Total</b></td>
                    </tr>
                    <tr>
                        <td>'.$detalle.'</td>                      
                        <td style="text-align: center"><b>'.$precio.'</b></td>
                        <td style="text-align: center"><b>'.$cantidad.'</b></td>
                        <td style="text-align: center"><b>'.$total.'</b></td>                      
                    </tr>               
                </table>
                <p style="text-align: right"><b>Monto Total:</b>'.$monto_total.'</p>                
                <p style="text-align: left"><b>Son:</b>'.$monto_literal.'</p>
                <br>
                ------------------------------------------------------------------------------ <br>
                 <b>USUARIO: </b>'.$user_sesion.'<br><br><br><br><br><br><br>               
            
                 <p style="text-align: center"> </p>
                 <p style="text-align: center">"ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAÍS, EL USO ILÍCITO DE ÉSTA SERÁ SANCIONADO DE ACUERDO A LA LEY"</p>
                 <p style="text-align: center"><b>GRACIAS POR SU PREFERENCIA</b></p>     
        </div>        
        
    </p>
</div>
';




// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');


// set style for barcode
$style = array(
    'border' => 0,
    'vpadding' => '3',
    'hpadding' => '3',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 1, // width of a single module in points
    'module_height' => 1 // height of a single module in points
);

//QRCODE,L : QR-CODE Low error correction
//$pdf->write2DBarcode($QR, type: 'QRCODE,L',  x: 20, y: 30, w: 50, h: 50, $style, 'N');
//$QR = $qr;
//$pdf->write2DBarcode($QR, 'www.tcpdf.org', 'QRCODE,L', 25, 100, 30, 30, $style, 'N');
$pdf->write2DBarcode($qr, 'QRCODE,L', 25, 103, 30, 30, $style);

//$pdf->Text(20, 25, 'QRCODE L');




//Close and output PDF document
$pdf->Output('Factura.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+


//<img src="http://t3.gstatic.com/licensed-image?q=tbn:ANd9GcSh-wrQu254qFaRcoYktJ5QmUhmuUedlbeMaQeaozAVD4lh4ICsGdBNubZ8UlMvWjKC"  width="100px" alt="">