<?php

include('../app/config.php');

session_start();

$usuario_user = $_POST['usuario'];
$password_user = $_POST['password_user'];
$form_login = "";

if($_POST['form_login']) {
    $form_login = 'true';
}

//echo "ajax";
//echo $usuario."-".$password_user;

$email_tabla = ''; $password_tabla = '';

$query_login = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email = '$usuario_user' AND password_user = '$password_user' AND estado = '1' ");
//print_r($query_login);
$query_login->execute();
$usuarios = $query_login->fetchAll(PDO::FETCH_ASSOC);
foreach($usuarios as $usuario){
    //$id = $usuario['id'];
    //echo $nombres = $usuario['nombres'];
    $email_tabla = $usuario['email'];
    $password_tabla = $usuario['password_user'];
}

if(($usuario_user == $email_tabla) && ($password_user == $password_tabla)){
    if($form_login=="") { ?>
        <div class="alert alert-success" role="alert">
             Usuario Correcto
        </div>
        <script>location.href = "principal.php";</script>

        <?php
    }else { ?>
          <div class="alert alert-success" role="alert">
             Usuario Correcto
        </div>
        <script>location.href = "../principal.php";</script>      

        <?php
    }
    //echo "Usuario correcto";
    ?>
     <!--div class="alert alert-success" role="alert">
             Usuario Correcto
    </!--div>
    <script>location.href = "principal.php";</script>

    <?php
    $_SESSION['usuario_sesion'] = $email_tabla;
}else{
    //echo "Error al introducir sus datos";
    ?>
     <div class="alert alert-danger" role="alert">
             Error al introducir sus datos
    </div>
    <script>$('#password').val("");$('#password').focus();</script>
    <?php
}

/*if($usuario == "companydams@gmail.com"){
    ?>
   
}else{
    
}*/

?>





<!--//include('../app/config.php');

//session_start();

//$usuario = $_POST['usuario'];
/*$usuario_user = $_POST['usuario'];
$password_user = $_POST['password_user'];

//echo $usuario." - ".$password_user;
$email_tabla = ''; $password_tabla = '';

//p$query_login = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email = '$usuario_user' AND password_user = '$password_user' AND estado = '1' ");
$query_login = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email = '$usuario_user' AND password_user = '$password_user' AND estado = '1' ");
$query_login->execute();
$usuarios = $query_login->fetchAll(PDO::FETCH_ASSOC);
foreach($usuarios as $usuario){
    //$id = $usuario['id'];
    //$nombres = $usuario['nombres'];
    $email_tabla = $usuario['email'];
    $password_tabla = $usuario['password_user'];
}

if(($usuario_user == $email_tabla) && ($password_user == $password_tabla)){
   ?>
    <div class="alert alert-success" role="alert">
              Usuario Correcto
    </div>
    REEDIRECCIONAMIENTO DE PÁGINAS-->
    <!--script>location.href="principal.php";</script>    
   <!-?php
   //$_SESSION['usuario_sesion'] = $email_tabla;
}else{
    ?>
    <div class="alert alert-danger" role="alert">
         Error al introducir sus datos
    </div>
    <script>$('#password').val(""); $('#password').focus();</script>
    <1?php
    //echo "Error al introducir sus datos";
    
}

//print_r($query_login);

//if( $usuario == "companydams@gmail.com"){
    //?>
    <!div class="alert alert-success" role="alert">
              Usuario correcto
    </div-->
    <!--php
//}else{
    ?>
    <!div class="alert alert-danger" role="alert">
              Usuario Incorrecto
    </div-->
    <!--php
//}

?>