
<?php include('../app/config.php');
      include('../layout/admin/datos_usuario_sesion.php');
?>

<!DOCTYPE html>

<html lang="es">
<head>
  <?php include('../layout/admin/head.php');?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<?php include('../layout/admin/menu.php');?>  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) >
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
      </br>
      <div class="container">          
              <h2>Listado de Usuarios</h2> 
              </br>


              <!-----------------LIBRERÍA DATATABLES_PAGINACIÓN----------------->  
              <script>
                  /*$(document).ready( function () {
                        $('#table_id').DataTable();
                    } );*/

                    $(document).ready(function() {
                        $('#table_id').DataTable( {
                          "pageLength": 5,
                          "language": {
                              "emptyTable": "No hay informacion",
                              "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
                              "infoEmpty": "Mostrando 0 a 0 de 0 Usuarios",
                              "infoFiltered": "(filtrado de _MAX_ total Usuarios)",
                              "infoPostfix": "",
                              "thousands": ",",
                              "lengthMenu": "Mostrar _MENU_ Usuarios",
                              "loadingRecords": "Cargando...",
                              "processing": "Procesando...",
                              "search": "Buscador:",
                              "zeroRecords": "sin resultados encontrados",
                              "paginate": {
                                "first": "Primero",
                                "last": "ultimo",
                                "next": "siguiente",
                                "previous": "Anterior"
                              }
                            }
                        });
                    });
              </script>       
              <br>
              <table id="table_id" border="1" class="table table-bordered table-sm table-striped">
                  <thead>                      
                    <th><center>Nro<center></th>
                    <th>Nombre de Usuario</th>
                    <th>Email</th>
                    <th><center>Acción</center></th>
                  </thead>
                  
                  <tbody>
                        <?php
                      $contador = 0;
                      $query_usuario = $pdo->prepare("SELECT * FROM tb_usuarios WHERE estado = '1' ");

                      //print_r($query_login);
                      $query_usuario->execute();
                      $usuarios = $query_usuario->fetchAll(PDO::FETCH_ASSOC);
                      foreach($usuarios as $usuario){
                      //$id = $usuario['id'];
                      //echo $nombres = $usuario['nombres'];
                      $id = $usuario['id'];
                      $nombres = $usuario['nombres'];
                      $email = $usuario['email'];
                      $contador = $contador + 1;
                      //echo $email;
                      ?>
                      <tr>
                          <td><center><?php echo $contador;?></center></td>
                          <td><?php echo $nombres;?></td>
                          <td><?php echo $email;?></td>
                          <td>
                          <center>
                          <a href="update.php?id=<?php echo $id;?>" class="btn btn-success">Editar</a>
                          <a href="delete.php?id=<?php echo $id;?>"class="btn btn-danger">Borrar</a>
                          </center>
                          </td>                      
                      </tr>
                        <?php
                      }                  
                      ?>
                  </tbody>
                  
              </table>
          <!-----------------LIBRERÍA DATATABLES----------------->             
          <hr>            
          <a href="generar_reporte.php" class="btn btn-primary">Generar Reporte
            <i class="fa fa">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-bar-graph" viewBox="0 0 16 16">
                <path d="M10 13.5a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-6a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v6zm-2.5.5a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1zm-3 0a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-1z"/>
                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
              </svg>
            </i>
          </a>
      </div>

  </div>
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
  <?php include('../layout/admin/footer.php');?>
  
</div>
<?php include('../layout/admin/footer_link.php');?>
</body>
</html>
