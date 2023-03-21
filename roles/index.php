<?php 
include('../app/config.php');
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
    
     </br>
      <div class="container">          
              <h2>Listado de Roles</h2> 
              </br>


              <!-----------------LIBRERÍA DATATABLES_PAGINACIÓN-----------------> 
              <script>
                  $(document).ready(function() {
                        $('#table_id').DataTable( {
                          "pageLength": 5,
                          "language": {
                              "emptyTable": "No hay informacion",
                              "info": "Mostrando _START_ a _END_ de _TOTAL_ Roles",
                              "infoEmpty": "Mostrando 0 a 0 de 0 Roles",
                              "infoFiltered": "(filtrado de _MAX_ total Roles)",
                              "infoPostfix": "",
                              "thousands": ",",
                              "lengthMenu": "Mostrar _MENU_ Roles",
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
              
              <div class="row">
                <div class="col-md-6">
                <table id="table_id" border="1" class="table table-bordered table-sm table-striped">
                  <thead>
                    <th><center>Nro<center></th>
                    <th>Nombres</th>                  
                    <th><center>Acción</center></th>
                  </thead>
                  
                  <tbody>
                      <?php
                      $contador = 0;
                      $query_roles = $pdo->prepare("SELECT * FROM tb_roles WHERE estado = '1' ");                  
                      $query_roles->execute();
                      $roles = $query_roles->fetchAll(PDO::FETCH_ASSOC);
                      foreach($roles as $role){                      
                          $id_rol = $role['id_rol'];
                          $nombre = $role['nombre'];                      
                          $contador = $contador + 1;                      
                          ?>
                          <tr>
                          <td><center><?php echo $contador;?></center></td>
                          <td><?php echo $nombre;?></td>                      
                          <td>
                              <center>                          
                              <a href="delete.php? id=<?php echo $id_rol;?>"class="btn btn-danger">Borrar</a>
                              </center>
                          </td>                       
                          </tr>
                          <?php
                      }                  
                      ?>
                  </tbody>
              </table>
              </div>

              </div>
              <!-----------------LIBRERÍA DATATABLES_PAGINACIÓN----------------->
             

      </div>
  </div>
 
  <?php include('../layout/admin/footer.php');?>
  
</div>
<?php include('../layout/admin/footer_link.php');?>
</body>
</html>
