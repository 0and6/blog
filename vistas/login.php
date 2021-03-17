<?php
include_once "header.php";
?>

<section id="entradas">


<h1>Iniciar sesión</h1>
<?php
if( isset($mensaje) ) {
    echo $mensaje;
}

?>
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