<?php
include('../app/config.php');
$placa = $_GET['placa'];

$placa = strtoupper($placa);//convierte todo a mayúscula

//echo "buscando la placa".$placa;


$id_cliente = '';
$nombre_cliente = '';                      
$nit_ci_cliente = '';

$query_buscars = $pdo->prepare("SELECT * FROM tb_clientes WHERE estado = '1' AND placa_auto = '$placa' ");                  
$query_buscars->execute();
$buscars = $query_buscars->fetchAll(PDO::FETCH_ASSOC);
foreach($buscars as $buscar){                      
    $id_cliente = $buscar['id_cliente'];
    $nombre_cliente = $buscar['nombre_cliente'];                      
    $nit_ci_cliente = $buscar['nit_ci_cliente'];                 
}                  

/*$id_cliente = $buscar['id_cliente'];
$nombre_cliente = $buscar['nombre_cliente'];                      
$nit_ci_cliente = $buscar['nit_ci_cliente'];*/

if($nombre_cliente == "") {
    //echo "el cliente es nuevo";
    ?>

<div class="form-group row">
     <label for="staticEmail" class="col-sm-2 col-form-label">Nombre:</label>
     <div class="col-sm-10">
          <input type="text" class="form-control">
     </div>
</div>

<div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">NIT/CI:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control">
    </div>
</div>

<?php
}else{
    //echo $nombre_cliente."-".$nit_ci_cliente;
?>
    <div class="form-group row">
         <label for="staticEmail" class="col-sm-2 col-form-label">Nombre:</label>
         <div class="col-sm-10">
                <input type="text" class="form-control" value="<?php echo $nombre_cliente; ?>">
         </div>
    </div>

    <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">NIT/CI:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="<?php echo $nit_ci_cliente; ?>">
            </div>
    </div>
<?php
}
?>