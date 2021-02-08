
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


    $db->sentencia("INSERT INTO posts(titulo, descripcion, contenido, url, autor, categorias, fecha_pub) values(?,?,?, ?,1, '1', ?)", array($_POST['titulo'], $_POST['descripcion'], $_POST['contenido'], $_POST['url'], $_POST['fecha']));

}
?>
<section id="entradas">
    <p>Vamos a crear una nueva entrada</p>      
    <form action="#" method="POST">
        <label for="titulo">Titulo</label><br><input type="text" name="titulo" value="<?php echo $titulo;?>" required>
        <br>
        <label for="contenido">Contenido</label><br><textarea name="contenido" required></textarea>
        <br>
        <label for="descripcion">Descripcion</label>
        <br>
        <textarea name="descripcion" id="" required></textarea>
        <br>

        <label for="fecha">Fecha</label>
        <br>
        <input type="date" name="fecha" id="" required></input>
        <br>

        <label for="url">Url</label><br><input type="text" name="url" required>
        <input type="submit">
    </form>
</section>
<?php
include_once "footer.php";
?>