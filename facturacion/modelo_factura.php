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
        <b>FACTURA Nro.</b> 00001
        ------------------------------------------------------------------------------
        <div style="text-align: left">            
            <b>DATOS DEL CLIENTE</b> <br>
            <b>SE??OR(A): </b> FREDDY EDDY HILARI MICHUA <br>
            <b>NIT/CI.: </b> 12345678 <br>
            <b>Fecha de la factura: </b> La Paz, 11 de octubre 2022 <br>
        ------------------------------------------------------------------------------ <br> 
            <b>De: </b> 11/10/2022 <b> Hora: </b>18:00 <br>
            <b>A: </b> 11/10/2022 <b> Hora: </b>20:00 <br>
            <b>Tiempo: </b> 2 horas en el cuviculo 10<br>            
        ------------------------------------------------------------------------------ <br>
                <table border="1" cellpadding="1"> 
                    <tr>
                        <td style="text-align: center" width="125px"><b>Detalle</b></td>
                        <td style="text-align: center" width="40px"><b>Precio</b></td>
                        <td style="text-align: center" width="40px"><b>Cantidad</b></td>
                        <td style="text-align: center" width="40px"><b>Total</b></td>
                    </tr>
                    <tr>
                        <td>Servicio de parqueo de 2 horas</td>                      
                        <td style="text-align: center"><b>$10</b></td>
                        <td style="text-align: center"><b>1</b></td>
                        <td style="text-align: center"><b>$10</b></td>                      
                    </tr>               
                </table>
                <p style="text-align: right"><b>Monto Total:</b> $10</p>                
                <p style="text-align: left"><b>Son:</b> Diez 00/100 Pesos</p>
                <br>
                ------------------------------------------------------------------------------ <br>
                 <b>USUARIO: </b> FREDDY EDDY HILARI MICHUA               
            
                 <p style="text-align: center"> <img src="http://t3.gstatic.com/licensed-image?q=tbn:ANd9GcSh-wrQu254qFaRcoYktJ5QmUhmuUedlbeMaQeaozAVD4lh4ICsGdBNubZ8UlMvWjKC"  width="100px" alt="" ></p>
                 <p style="text-align: center">"ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PA??S, EL USO IL??CITO DE ??STA SER?? SANCIONADO DE ACUERDO A LA LEY"</p>
                 <p style="text-align: center"><b>GRACIAS POR SU PREFERENCIA</b></p>     
        </div>        
        
    </p>
</div>
';



// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');





//Close and output PDF document
$pdf->Output('example_002.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
