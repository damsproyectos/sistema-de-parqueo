<?php include('app/config.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--bootstrap CSS-->
    <!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"-->
    <link href="public/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">    
    <title>Document</title>
    
</head>
<body style="background-image: url('public/imagenes/piso.jpg');
            background-repeat:no-repeat;
            z-index: -3;
            background-size: 100vw 100vh">
    
<nav class="navbar navbar-expand-lg bg-info">
 
    <div class="container-fluid">
           <!--LOGO BootStrap-->
    <a class="navbar-brand" href="#">
      <img src="<?php echo $URL;?>/public/imagenes/auto1.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
      PARQUEADERO DAMS
    </a>   
     <!--MENÚ NAVEGACIÓN BootStrap-->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">INICIO</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">SOBRE NOSOTROS</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            PROMOCIONES
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">MENSUALES</a></li>
            <li><a class="dropdown-item" href="#">DÍAS</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">FICHAS</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">CONTACTANOS</a>
        </li>        
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
        <!--button class="btn btn-outline-success" type="submit">Search</button-->
      </form>
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Ingresar
      </button>
    </div>
  </div>
</nav>

<br>
<!--Vista de Parqueaderos-->
<div class="container">
    <!--table>
      <CÚBICULO 1>
      <tr>
        <td width="100px"> 
          <p>
            <center>
              <h3><b>1</b></h3>
              <img src="public/imagenes/auto1.png" width="50px" alt="">
            </center>             
          </p>
        </td>

        <td width="100px"> 
          <p>
            <center>
              <h3><b>2</b></h3>
              <img src="public/imagenes/auto1.png" width="50px" alt="">
            </center>             
          </p>
        </td>

        <td width="100px"> 
          <p>
            <center>
              <h3><b>3</b></h3>
              <img src="public/imagenes/auto1.png" width="50px" alt="">
            </center>             
          </p>
        </td>

        <td width="100px"> 
          <p>
            <center>
              <h3><b>4</b></h3>
              <img src="public/imagenes/auto1.png" width="50px" alt="">
            </center>             
          </p>
        </td>

        <td width="100px"> 
          <p>
            <center>
              <h3><b>5</b></h3>
              <img src="public/imagenes/auto1.png" width="50px" alt="">
            </center>             
          </p>
        </td>

        <td width="100px"> 
          <p>
            <center>
              <h3><b>6</b></h3>
              <img src="public/imagenes/auto1.png" width="50px" alt="">
            </center>             
          </p>
        </td>

        <td width="100px"> 
          <p>
            <center>
              <h3><b>7</b></h3>
              <img src="public/imagenes/auto1.png" width="50px" alt="">
            </center>             
          </p>
        </td>

        <td width="100px"> 
          <p>
            <center>
              <h3><b>8</b></h3>
              <img src="public/imagenes/auto1.png" width="50px" alt="">
            </center>             
          </p>
        </td>

        <td width="100px"> 
          <p>
            <center>
              <h3><b>9</b></h3>
              <img src="public/imagenes/auto1.png" width="50px" alt="">
            </center>             
          </p>
        </td>

        <td width="100px"> 
          <p>
            <center>
              <h3><b>10</b></h3>
              <img src="public/imagenes/auto1.png" width="50px" alt="">
            </center>             
          </p>
        </td>
      </tr>

      <CÚBICULO 2>
      <tr>
        <td width="100px"> 
          <p>
            <center>
              <h3><b>11</b></h3>
              <img src="public/imagenes/auto1.png" width="50px" alt="">
            </center>             
          </p>
        </td>

        <td width="100px"> 
          <p>
            <center>
              <h3><b>12</b></h3>
              <img src="public/imagenes/auto1.png" width="50px" alt="">
            </center>             
          </p>
        </td>

        <td width="100px"> 
          <p>
            <center>
              <h3><b>13</b></h3>
              <img src="public/imagenes/auto1.png" width="50px" alt="">
            </center>             
          </p>
        </td>

        <td width="100px"> 
          <p>
            <center>
              <h3><b>14</b></h3>
              <img src="public/imagenes/auto1.png" width="50px" alt="">
            </center>             
          </p>
        </td>

        <td width="100px"> 
          <p>
            <center>
              <h3><b>15</b></h3>
              <img src="public/imagenes/auto1.png" width="50px" alt="">
            </center>             
          </p>
        </td>

        <td width="100px"> 
          <p>
            <center>
              <h3><b>16</b></h3>
              <img src="public/imagenes/auto1.png" width="50px" alt="">
            </center>             
          </p>
        </td>

        <td width="100px"> 
          <p>
            <center>
              <h3><b>17</b></h3>
              <img src="public/imagenes/auto1.png" width="50px" alt="">
            </center>             
          </p>
        </td>

        <td width="100px"> 
          <p>
            <center>
              <h3><b>18</b></h3>
              <img src="public/imagenes/auto1.png" width="50px" alt="">
            </center>             
          </p>
        </td>

        <td width="100px"> 
          <p>
            <center>
              <h3><b>19</b></h3>
              <img src="public/imagenes/auto1.png" width="50px" alt="">
            </center>             
          </p>
        </td>

        <td width="100px"> 
          <p>
            <center>
              <h3><b>20</b></h3>
              <img src="public/imagenes/auto1.png" width="50px" alt="">
            </center>             
          </p>
        </td>    
      </tr>
    </table-->
         
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
              <button class="btn btn-success" style="width: 100%; height: 100px">
                  <p><?php echo $estado_espacio;?></p>
              </button>                         
          </center>
       </div>
    <?php                                    
    }

    if($estado_espacio == "OCUPADO") { ?>
      <div class="col">
    <center>
          <h2><?php echo $nro_espacio;?></h2>
          <button class="btn btn-danger">
              <img src="<?php echo $URL;?>/public/imagenes/auto1.png" width="60px"; height="85px"  alt="">
          </button>                                          
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


    <!--BOOSTRAP JS-->
    <!-- <script src="<!?= $URL . '/assets/bootstrap/bootstrap.min.js' ?>"></script> -->
    <!--Optional JavaScript-->
    <!--jQuery first, then popper.js, then Bootstrap JS-->

    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script-->
    <!--script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script-->
    <!--script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script-->
    
    <!--script src="public/js/jquery.min.js"></script-->

    <script src="public/js/jquery-3.6.1.min.js"></script>
    <script src="public/js/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="public/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
     
</body>
</html>





<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Inicio de Sesión</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="">Usuario/Email</label>
                  <input type="email" id="usuario" class="form-control">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                  <label for="">Contraseña</label>
                  <input type="password" id="password" class="form-control">
              </div>
            </div>
        </div>
        <div id="respuesta"-->
          
        </div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btn_ingresar">Ingresar</button>
      </div>
    </div>
  </div>
</div>

<!--AJAX trabaja con Jquery, Java Script-->
<script>
  $('#btn_ingresar').click(function(){
        login();
  });

  $('#password').keypress(function(e){
        //alert('estas presionando enter');
        if(e.which == 13){
          login();
        }
  });

  function login(){
          //alert('hola');
        var usuario = $('#usuario').val();
        var password_user = $('#password').val();
        //alert(usuario + password_user);
       
        if(usuario == ""){
          alert('Debe Introducir su Usuario...');
          $('#usuario').focus();
        }else if(password_user == ""){
          alert('Debe Introducir su Contraseña...');
          $('#password').focus();
        }else{
          var url = 'login/controller_login.php'
          $.post(url , {usuario:usuario , password_user:password_user}, function(datos){
            //alert('se envió correctamente');
            //alert(datos);
            $('#respuesta').html(datos);
          });
        }
  }
</script>

<!--
  //const usuario       = document.getElementById('usuario');
  //const password      = document.getElementById('password');
  //const btn_ingresar  = document.getElementById('btn_ingresar');

  // El error que teniamos en esta funcion era que no le habia agregado la coma entre el 'click' y la funcion osea 'click', function() {
  // password.addEventListener('keypress', function(event) {
 // btn_ingresar.addEventListener('click', function() {

    // const value_user      = usuario.value
    // const value_password  = password.value

    /*if (usuario.value == "") {
      alert('Debe Introducir su Usuario...');
      usuario.focus();
    } else if (password.value == "") {
      alert('Debe Introducir su Contraseña...');
      password.focus();
    } else {
      var url = 'login/controller_login.php'

      // Esta es una opcion de pasarle los valores al servidor ya que tenemos las constantes declaradas que empiezan por value_ linea 326
      // $.post(url , {usuario:value_user , password_user:value_password}, function(datos){
      //       //alert('se envio correctamente');
      //       //alert(datos);
      //    $('#respuesta').html(datos);
      // });

      // pero como ya los tenemos definidos en la linea 320 por ejemplo ya podemos acceder a esos valores sin tener que declararlos dentro de la funcion ejemplo:
      $.post(url , {usuario:usuario.value , password_user:password.value}, function(datos){
            //alert('se envio correctamente');
            //alert(datos);
         $('#respuesta').html(datos);
      });

      // mira las diferencias y trata de comprenderlas de cierta forma es un poco mas corta si se sabe utilizar
    }
  });


/*$("#btn_ingresar").click(function(e){
  //alert('Hola');
  var usuario = $('#usuario').val();
  var password_user = $('#password').val();
  //alert(usuario + password_user);

  if(usuario == ""){
    alert('Debe Introducir su Usuario...');
    $('#usuario').focus();

  }else if(password_user ==""){
    alert('Debe Introducir su Contraseña...');    
    $('#password').focus();
  }else{
    var url = 'login/controller_login.php'
    $.post(url , {usuario:usuario , password_user:password_user}, function(datos){
        //alert('se envio correctamente');
        //alert(datos);
     $('#respuesta').html(datos);
  });
  }  
});*/

// $('#btn_ingresar').click( e => login() );
/*$('#btn_ingresar').click(function(event){
  login();
});

$('#password').keypress(function(event){
  if(event.which == 13){
    login();
  }
});

function login(){
  var usuario = $('#usuario').val();
  var password_user = $('#password').val();

  if(usuario == ""){
    alert('Debe introducir su usuario...');
    $('#usuario').focus();
  }else if(password_user == ""){
    alert('Debe Introducir su contraseña...');
    $('#password').focus();
  }else{
    var url = 'login/controller_login.php'
    $.post(url, {usuario:usuario , password_user:password_user}, function(datos){
      $('#respuesta').html(datos);
    });
  }
}
</script-->