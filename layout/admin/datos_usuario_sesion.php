<?php


//$nombre_usuario_sesion = "Freddy Hilari Michua";

session_start();
if(isset($_SESSION['usuario_sesion'])){
  //include('layout/admin/datos_usuario_sesion.php');
  $usuario_sesion = $_SESSION['usuario_sesion'];

  $query_usuario_sesion = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email = '$usuario_sesion' AND estado = '1' ");
  
                    //print_r($query_login);
                    $query_usuario_sesion->execute();
                    $usuarios_sesions = $query_usuario_sesion->fetchAll(PDO::FETCH_ASSOC);
                    foreach($usuarios_sesions as $usuarios_sesion){
                        //$id = $usuario['id'];
                        //echo $nombres = $usuario['nombres'];
                        $id_user_sesion = $usuarios_sesion['id'];
                        $nombres_sesion = $usuarios_sesion['nombres'];
                        $email_sesion = $usuarios_sesion['email'];
                        $rol_sesion = $usuarios_sesion['rol'];
                    }    
    
}else{
    echo "Para ingresar a ésta plataforma debe de iniciar sesión";
    header('Location: '.$URL.'/login');
}

//echo "Bienvenido Administrador";

?>

