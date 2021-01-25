
<?php
include_once "header.php";
?>


<?php
$titulo = "";
if(isset($_POST['titulo'])) {
    $titulo = $_POST['titulo'];
    echo $_POST['titulo'];
}
?>
<section id="entradas">
    <p>Vamos a crear una nueva entrada</p>      
    <form action="#" method="POST">
        <label for="titulo">Titulo</label><br><input type="text" name="titulo" value="<?php echo $titulo;?>">
        <br>
        <label for="contenido">Contenido</label><br><textarea name="contenido"></textarea>
        <br>
        <label for="descripcion">Descripcion</label>
        <br>
        <textarea name="descripcion" id=""></textarea>
        <br>
        <input type="submit">
    </form>
</section>
<?php
include_once "footer.php";
?>