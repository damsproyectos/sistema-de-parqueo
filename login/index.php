<?php 
    include('../app/config.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $URL;?>/app/templeates/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo $URL;?>/app/templeates/AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $URL;?>/app/templeates/AdminLTE-3.2.0/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<center>
    <img src="<?php echo $URL;?>/public/imagenes/auto1.png" width="300px" alt="">
</center>
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>PARQUEADERO</b>DAMS</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Inicio de Sesión</p>

      <form action="controller_login.php" method="post">

        <input type="text" name="form_login" value="form_login" hidden>

        <div class="input-group mb-3">
          <input type="email" name="usuario" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password_user" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">          
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo $URL;?>/app/templeates/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo $URL;?>/app/templeates/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $URL;?>/app/templeates/AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
</body>
</html>
