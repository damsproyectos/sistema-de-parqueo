
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
              <h2>Creación de un Nuevo Usuario</h2>
              <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card" style="border: 1px solid #606060">
                                <div class="card-header" style="background-color: #007bff; color: #ffffff;">
                                    <h4>Nuevo Usuario</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Nombres</label>
                                        <input type="text" class="form-control" id="nombres">
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="text" class="form-control" id="password_user">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" id="btn_guardar">Guardar</button>
                                        <a href="<?php echo $URL;?>/usuarios/" class="btn btn-default">Cancelar</a>
                                    </div>
                                    <div id="respuesta">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                    </div>
              </div>
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

<!--AJAX-Jquery-->
<script>
    $('#btn_guardar').click(function() {
       //alert('click');
       var nombres = $('#nombres').val();
       var email = $('#email').val();
       var password_user = $('#password_user').val();
       //alert(nombres +"-"+email);
       if(nombres == ""){
            alert('Debe de llenar el campo nombres');
            $('#nombres').focus();        
       }else if(email == ""){
            alert('Debe de llenar el campo de email');
            $('#email').focus();
       }else if(password_user == ""){
            alert('Debe de llenar el campo de password');
            $('#password_user').focus();
       }else{
       
            var url = 'controller_create.php';
            $.get(url , {nombres:nombres , email:email , password_user:password_user}, function(datos) {
                $('#respuesta').html(datos);
            }); 
    
       }
    });
</script>