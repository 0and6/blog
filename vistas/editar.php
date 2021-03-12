
<?php
include_once "header.php";
include_once "database.php";
?>


<?php
$db = new Database();

$titulo = "";
if(isset($_POST['titulo'])) {
    echo "Vamos a editar la entrada";

    $sentencia = "UPDATE posts SET titulo = ?, contenido = ?, descripcion = ?, url = ? WHERE id = ?";

    $db->sentencia($sentencia, array($_POST['titulo'], $_POST['contenido'], $_POST['descripcion'], $_POST['url'], $entrada));
    echo "entrada editada con exito";
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