
<?php
include_once "header.php";
?>
        <section id="entradas">

<?php

forEach($resultado as $fila) {
?>
            <article class="resumen">
                <header class="info-resumen">
                    <h2><a href="/blog/posts/<?php echo $fila['url']; ?>"><?php echo $fila['titulo']?></a></h2>
                    <div class="info-cabecera">Fecha: <?php echo $fila['fecha_pub'] ?>. Autor: <a href="#" class="autor"><?php echo $fila['nombre']?></a>. <a href="#" class="categorias">Soleda Etla</a>.</div>
                    
                </header>
                <div class="contenido">
                    <p>
                        <?php echo $fila['descripcion']; ?>
                    </p>
                </div>
            </article>
<?php
}

?>

        </section>
<?php
include_once "footer.php";
?>