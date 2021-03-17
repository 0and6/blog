<?php
$loginModel = new LoginModel();
if(isset($_POST['usuario']) || isset($_POST['contrasenia'])) {
    //echo $_POST['usuario'] . "   " . password_hash($_POST['contrasenia'], PASSWORD_DEFAULT);
    $resultado = $loginModel->verificarUsuario($_POST['usuario']);
    //print_r($resultado);
    if(count($resultado) == 1) {
        if(password_verify($_POST['contrasenia'], $resultado[0]['contrasenia'])) {
            echo "usuario correcto";
            $sesiones->activarSesion($resultado[0]['nombre']);
            $redirect = 'Location: ' . $configs['url'] . '/' . $parametros[$indice]; 
            //header('Location: /blog/editar');
            header($redirect);
        } else {
            $mensaje = "contrasenia incorrecta";
            
        }
    } else {
        $mensaje = "El usuario no existe";
        
    }
}
include_once "vistas/login.php";
?>