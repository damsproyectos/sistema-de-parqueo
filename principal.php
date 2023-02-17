<?php 
include('app/config.php');
include('layout/admin/datos_usuario_sesion.php');
//session_start();
//if(isset($_SESSION['usuario_sesion'])){
  
    //echo"existe sesion";
    ?>
    
    <!--a href="<?php echo $URL;?>/login/cerrar_sesion.php">Cerrar Session</a-->
<!DOCTYPE html>
<html lang="es">
<head>
  <?php include('layout/admin/head.php');?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<?php include('layout/admin/menu.php');?>  

  <!-- Content Wrapper. Contains page content -->
  <!--div class="content-wrapper">
    < Content Header (Page header) >
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Starter Page</h1>
          </div><!- /.col ->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!- /.col ->
        </div><!- /.row ->
      </div><!- /.container-fluid ->
    </div>
    <!- /.content-header -->

     <!-- Main content >
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>

                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk of the card's
                  content.
                </p>

                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>

                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk of the card's
                  content.
                </p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
              </div>
            </div><!- /.card ->
          </div>
          <!- /.col-md-6 ->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h5 class="m-0">Featured</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Special title treatment</h6>

                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Featured</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Special title treatment</h6>

                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
          <!- /.col-md-6 ->
        </div>
        <!- /.row ->
      </div><!- /.container-fluid ->
    </div>
    
    <!- /.content -->

    <!--Inicio PARQUEO-->
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    </br>
     <div class="container">          
             <h2>Bienvenido al SISTEMA DE PARQUEO - HILARIWEB</h2> 
             </br>
             <div class="row">
               <div class="col-md-12">                    
                       <div class="card card-outline card-primary">
                           <div class="card-header">
                               <h3 class="card-title">Mapeo actual del parqueo</h3>
                               <div class="card-tools">
                                   <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                       <i class="fas fa-minus"></i>
                                    </button>
                               </div>

                           </div>

                           <div class="card-body" style="display: block;">

                           <div class="row">

                                <?php
                                //$contador = 0;
                                $query_mapeos = $pdo->prepare("SELECT * FROM tb_mapeos WHERE estado = '1' ");                  
                                $query_mapeos->execute();
                                $mapeos = $query_mapeos->fetchAll(PDO::FETCH_ASSOC);
                                foreach($mapeos as $mapeo){                      
                                    $id_map = $mapeo['id_map'];
                                    $nro_espacio = $mapeo['nro_espacio'];
                                    $estado_espacio = $mapeo['estado_espacio'];                      
                                    //$contador = $contador + 1;  
                                    if($estado_espacio == "LIBRE") { ?>
                                       <div class="col">
                                          <center>
                                              <h2><?php echo $nro_espacio;?></h2> 

                                              <button class="btn btn-success" style="width: 100%; height: 100px"          data-toggle="modal" data-target="#modal<?php echo $id_map;?>">
                                                  <p><?php echo $estado_espacio;?></p>
                                              </button> 
                                              
                                              <!-- Button trigger modal -->                                                  
                                                  <div class="modal fade" id="modal<?php echo $id_map;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalLabel">INGRESO DEL VEHÍCULO</h5>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                          </button>
                                                        </div>
                                                      <div class="modal-body">                                                          
                                                        <div class="form-group row">
                                                              <label for="staticEmail" class="col-sm-3 col-form-label">Placa: <span><b style="color: red">*</b></span></label>
                                                              <div class="col-sm-6">
                                                                <input type="text" style="text-transform: uppercase" class="form-control" id="placa_buscar<?php echo $id_map;?>">
                                                              </div>
                                                              <div class="col-sm-3">
                                                                <button class="btn btn-primary" id="btn_buscar_cliente<?php echo $id_map;?>" type="button">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                                      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                                                    </svg>
                                                                    Buscar
                                                                  </button>
                                                                  <script>
                                                                      $('#btn_buscar_cliente<?php echo $id_map;?>').click(function () {
                                                                          //alert("buscando");
                                                                          var placa = $('#placa_buscar<?php echo $id_map;?>').val();
                                                                          //alert(placa);
                                                                          var id_map = "<?php echo $id_map;?>";


                                                                          if(placa == ""){
                                                                                alert('Debe de llenar el campo placa');
                                                                                $('#placa_buscar<?php echo $id_map;?>').focus();                                                                
                                                                          }else{
                                                                          
                                                                                var url = 'clientes/controller_buscar_cliente.php';
                                                                                $.get(url , {placa:placa, id_map:id_map}, function(datos) {
                                                                                    $('#respuesta_buscar_cliente<?php echo $id_map;?>').html(datos);
                                                                                });                                                                        
                                                                          }
                                                                      });
                                                                  </script>
                                                                  <!--div-- id="respuesta_buscar_cliente<-?php echo $id_map;?>">
                                                                    
                                                                  </!--div-->
                                                              </div>
                                                        </div>
                                                        <div id="respuesta_buscar_cliente<?php echo $id_map;?>">
                                                                    
                                                        </div>          
                                                        <!--div class="form-group row">
                                                              <label for="staticEmail" class="col-sm-2 col-form-label">Nombre:</label>
                                                              <div class="col-sm-10">
                                                                <input type="text" class="form-control">
                                                              </div>
                                                        </!--div>

                                                        <div-- class="form-group row">
                                                              <label for="staticEmail" class="col-sm-2 col-form-label">NIT/CI:</label>
                                                              <div class="col-sm-10">
                                                                <input type="text" class="form-control">
                                                              </div>
                                                        </div-->

                                                        <div class="form-group row">
                                                              <label for="staticEmail" class="col-sm-4 col-form-label">Fecha de Ingreso:</label>
                                                              <div class="col-sm-8">
                                                                <?php
                                                                      date_default_timezone_set("America/Bogota");
                                                                      $fechaHora= date("Y-m-d h:i:s");
                                                                      $dia = date('d');
                                                                      $mes = date('m');
                                                                      $ano = date ('Y');                                                                  
                                                                ?>
                                                                <input type="date" class="form-control" id="fecha_ingreso<?php echo $id_map;?>" value="<?php echo $ano."-".$mes."-".$dia; ?>">
                                                              </div>
                                                        </div>

                                                        <div class="form-group row">
                                                              <label for="staticEmail" class="col-sm-4 col-form-label">Hora de Ingreso:</label>
                                                              <div class="col-sm-8">
                                                              <?php
                                                                  date_default_timezone_set("America/Bogota");
                                                                  $fechaHora= date("Y-m-d h:i:s");
                                                                  $hora = date('H');
                                                                  $minutos = date('i');                                                                                                                                 
                                                                ?>
                                                                <input type="time" class="form-control" id="hora_ingreso<?php echo $id_map;?>" value="<?php echo $hora.":".$minutos;?>">
                                                              </div>
                                                        </div>

                                                        <div class="form-group row">
                                                              <label for="staticEmail" class="col-sm-4 col-form-label">Cuviculo:</label>
                                                              <div class="col-sm-8">
                                                                  <input type="text" class="form-control" id="cuviculo<?php echo $id_map;?>" value="<?php echo $nro_espacio;?>">
                                                              </div>
                                                        </div>              

                                                            
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                          <button type="button" class="btn btn-primary" id="btn_registrar_ticket<?php echo $id_map;?>">Imprimir Ticket</button>
                                                          <script>
                                                              $('#btn_registrar_ticket<?php echo $id_map;?>').click(function () {
                                                                  //alert("hola ticket");
                                                                  var placa = $('#placa_buscar<?php echo $id_map;?>').val();
                                                                  var nombre_cliente = $('#nombre_cliente<?php echo $id_map;?>').val();
                                                                  var nit_ci = $('#nit_ci<?php echo $id_map;?>').val();
                                                                  var fecha_ingreso = $('#fecha_ingreso<?php echo $id_map;?>').val();
                                                                  var hora_ingreso = $('#hora_ingreso<?php echo $id_map;?>').val();
                                                                  var cuviculo = $('#cuviculo<?php echo $id_map;?>').val();
                                                                  //alert(placa+'-'+cuviculo);
                                                                  var user_sesion = "<?php echo $usuario_sesion; ?>";

                                                                  if(placa == "") {
                                                                      alert('Debe de llenar el campo placa...');
                                                                      $('#placa_buscar<?php echo $id_map;?>').focus();    
                                                                  }else if(nombre_cliente =="") {
                                                                        alert('Debe de llenar el campo nombre del cliente');
                                                                        $('#nombre_cliente<?php echo $id_map;?>').focus();
                                                                  }else if(nit_ci =="") {
                                                                        alert('Debe de llenar el campo Nit/Ci');
                                                                        $('#nit_ci<?php echo $id_map;?>').focus();
                                                                  }else{

                                                                        var url_1 = 'parqueo/controller_cambiar_estado_ocupado.php';
                                                                        $.get(url_1 , {cuviculo:cuviculo}, function(datos) {
                                                                            $('#respuesta_ticket').html(datos);
                                                                        });

                                                                        var url_2 = 'clientes/controller_registrar_clientes.php';
                                                                        $.get(url_2 , {nombre_cliente:nombre_cliente,nit_ci:nit_ci,placa:placa}, function(datos) {
                                                                            $('#respuesta_ticket').html(datos);
                                                                        });

                                                                        //alert("listo para el controlador");
                                                                        var url_3 = 'tickets/controller_registrar_ticket.php';
                                                                        $.get(url_3 , {placa:placa , nombre_cliente:nombre_cliente , nit_ci:nit_ci , fecha_ingreso:fecha_ingreso , hora_ingreso:hora_ingreso , cuviculo:cuviculo , user_sesion:user_sesion}, function(datos) {
                                                                            $('#respuesta_ticket').html(datos);
                                                                        });
                                                                  }                                                            

                                                              });
                                                          </script>
                                                        </div>
                                                        <div id="respuesta_ticket">

                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                            </center>
                                       </div>

                                    <?php                                    
                                    }

                                    if($estado_espacio == "OCUPADO") { ?>
                                      <div class="col">
                                    <center>
                                          <h2><?php echo $nro_espacio;?></h2>
                                          <button class="btn btn-danger" id="btn_ocupado<?php echo $id_map;?>" data-toggle="modal" data-target="#exampleModal<?php echo $id_map;?>">
                                              <img src="<?php echo $URL;?>/public/imagenes/auto1.png" width="60px"; height="85px"  alt="">
                                          </button>                                       
                                          
                                          <!--Inicio Consulta-->
                                          <?php

                                              $query_datos_cliente = $pdo->prepare("SELECT * FROM tb_tickets WHERE cuviculo = '$nro_espacio' AND estado = '1' ");                  
                                              $query_datos_cliente->execute();
                                              $datos_clientes = $query_datos_cliente->fetchAll(PDO::FETCH_ASSOC);
                                              foreach($datos_clientes as $datos_cliente){                      
                                              //$id_map = $datos_cliente['id_map'];
                                              $id_ticket = $datos_cliente['id_ticket'];
                                              $placa_auto = $datos_cliente['placa_auto'];
                                              $nombre_cliente = $datos_cliente['nombre_cliente'];
                                              $nit_ci = $datos_cliente['nit_ci'];
                                              $cuviculo = $datos_cliente['cuviculo'];
                                              $fecha_ingreso = $datos_cliente['fecha_ingreso'];
                                              $hora_ingreso = $datos_cliente['hora_ingreso'];
                                              $user_sesion = $datos_cliente['user_sesion'];
                                              }
                                          ?>
                                          <!--Fin Consulta-->

                                          <!-- Modal -->
                                          <div class="modal fade" id="exampleModal<?php echo $id_map;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Datos del Cliente</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">


                                                <!--INICIO COPIADO-->
                                                        <div class="form-group row">
                                                              <label for="staticEmail" class="col-sm-4 col-form-label">Placa:</label>
                                                              <div class="col-sm-8">
                                                                 <input type="text" style="text-transform: uppercase" class="form-control" value="<?php echo $placa_auto;?>" id="placa_buscar<?php echo $id_map;?>" disabled>
                                                              </div>                                                            
                                                        </div>
                                                        
                                                        <!--div-- id="respuesta_buscar_cliente<!?php echo $id_map;?>">
                                                                                                                         
                                                        </!--div-->
                                                        
                                                        <!--inicio copiado2-->
                                                        <div class="form-group row">
                                                              <label for="staticEmail" class="col-sm-4 col-form-label">Nombre:</label>
                                                           <div class="col-sm-8">
                                                                <input type="text" class="form-control" value="<?php echo $nombre_cliente;?>" id="nombre_cliente<?php echo $id_map;?>" disabled>
                                                           </div>
                                                       </div>

                                                        <div class="form-group row">
                                                          <label for="staticEmail" class="col-sm-4 col-form-label">NIT/CI:</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" value="<?php echo $nit_ci;?>" id="nit_ci<?php echo $id_map;?>" disabled>
                                                            </div>
                                                        </div>                                                
                                                        <!--fin copiado2-->
                                                        
                                                        
                                                                                                                
                                                        <div class="form-group row">
                                                              <label for="staticEmail" class="col-sm-4 col-form-label">Fecha de Ingreso:</label>
                                                              <div class="col-sm-8">
                                                                
                                                                <input type="text" class="form-control" value="<?php echo $fecha_ingreso;?>" id="fecha_ingreso<?php echo $id_map;?>" disabled>
                                                              </div>
                                                        </div>

                                                        <div class="form-group row">
                                                              <label for="staticEmail" class="col-sm-4 col-form-label">Hora de Ingreso:</label>
                                                              <div class="col-sm-8">
                                                                 <input type="time" class="form-control" value="<?php echo $hora_ingreso;?>" id="hora_ingreso<?php echo $id_map;?>" disabled>
                                                              </div>
                                                        </div>

                                                        <div class="form-group row">
                                                              <label for="staticEmail" class="col-sm-4 col-form-label">Cuviculo:</label>
                                                              <div class="col-sm-8">
                                                                  <input type="text" class="form-control" value="<?php echo $cuviculo;?>" id="cuviculo<?php echo $id_map;?>" disabled>
                                                              </div>
                                                        </div>      
                                                        <!--FIN COPIADO-->              


                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                  <button type="button" class="btn btn-primary">Volver a Imprimir</button>
                                                  <button type="button" class="btn btn-danger">Facturar</button>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <script>
                                              $('#btn_ocupado<?php echo $id_map;?>').click(function () {
                                                  //alert("mostrando datos");
                                              });
                                          </script>                                          
                                          <p><?php echo $estado_espacio;?></p>
                                    </center>
                                </div>
                                <?php                                                                       
                                   }
                                ?> 
                                  <?php
                                }
                                ?>
                                                                                                
                           </div>
                           
                           </div>

                       </div>                  

              
               </div>

             </div>
            

     </div>
 </div>
    <!--fin PARQUEO-->



  <!--/div-->
  <!-- /.content-wrapper -->

  <!-- Control Sidebar ->
  <aside class="control-sidebar control-sidebar-dark">
    <!- Control sidebar content goes here ->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!- /.control-sidebar -->
  <?php include('layout/admin/footer.php');?>
  
</div>
<?php include('layout/admin/footer_link.php');?>
</body>
</html>
    <!--?php
}else{
    echo "Para ingresar a ésta plataforma debe de iniciar sesión";
}

//echo "Bienvenido Administrador";

?>




