<?php
include_once "header.php";

$loginModel = new LoginModel();
if(isset($_POST['usuario']) || isset($_POST['contrasenia'])) {
    //echo $_POST['usuario'] . "   " . password_hash($_POST['contrasenia'], PASSWORD_DEFAULT);
    $resultado = $loginModel->verificarUsuario($_POST['usuario']);
    //print_r($resultado);
    if(count($resultado) == 1) {
        if(password_verify($_POST['contrasenia'], $resultado[0]['contrasenia'])) {
            echo "usuario correcto";
        } else {
            echo "contrasenia incorrecta";
        }
    } else {
        echo "El usuario no existe";
    }
}

?>

<section id="entradas">

<h1>Iniciar sesión</h1>
<form action="#" method="POST">
    <label for="usuario">Usuario:</label>           <br>
    <input type="text" name="usuario">              <br>
    <label for="contrasenia">Contraseña:</label>    <br>
    <input type="password" name="contrasenia">          <br>

    <input type="submit" name="enviar" value="Enviar" id="">
</form>

</section>
<?php
include_once "footer.php";
?>