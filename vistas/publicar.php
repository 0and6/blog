
<?php
include_once "header.php";
include_once "database.php";
?>


<?php
$db = new Database();
$titulo = "";


if(isset($_POST['titulo'])) {
    $titulo = $_POST['titulo'];
    echo $_POST['titulo'];

    $sentencia = "INSERT INTO posts(titulo, descripcion, contenido, url, autor, categorias, fecha_pub) values(?,?,?, ?,1, '1', ?)";
    $db->sentencia($sentencia, array($_POST['titulo'], $_POST['descripcion'], $_POST['contenido'], $_POST['url'], $_POST['fecha']));

}
?>
<section id="entradas">
    <p>Vamos a crear una nueva entrada</p>      
    <form action="#" method="POST">
        <?php
        include "formulario.php";
        ?>
    </form>
</section>
<?php
include_once "footer.php";
?>