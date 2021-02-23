<?php
$title = $resultado[0]['titulo'];
include_once "header.php";
?>
<section id="entradas">
    <article class="articulo">
        <header class="cabecera">
            <h2 class="titulo-cabecera"><?php echo $resultado[0]['titulo'];?></h2>
            <div class="info-cabecera">Publicado el <?php echo $resultado[0]['fecha_pub']?> por <a href="#" class="autor"><?php echo $resultado[0]['nombre']?></a>. <a href="#" class="categorias">Arduino</a>.</div>
            <br>
        </header>
        <div class="contenido">
        <?php
            echo $resultado[0]['contenido'];
        ?>
        </div>
    </article>
</section>
<?php
include_once "footer.php";
?>