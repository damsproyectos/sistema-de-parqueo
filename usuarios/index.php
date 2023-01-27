
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
              <table border="1" class="table table-bordered table-sm table-striped">
                  <th><center>Nro<center></th>
                  <th>Nombre de Usuario</th>
                  <th>Email</th>
                  <th><center>Acción</center></th>
                  
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
              </table>

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
