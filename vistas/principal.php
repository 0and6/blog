
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
                    <div class="info-cabecera">Fecha: <?php echo $fila['fecha_pub'] ?>. Autor: 
                        <a href="#" class="autor"><?php echo $fila['autor']?></a>. 
                        <a href="#" class="categorias"><?php echo $fila['categoria']?></a>.
                    </div>
                    
                </header>
                <div class="contenido">
                    <p>
                        <?php echo $fila['descripcion']; ?>
                    </p>
                </div>
            </article>
<?php
}

if(count($resultado) == 0) {
    ?>
            <article>
                <header class="info-resumen">
                    <h2>No hay tantas entradas</h2>
                </header>
                <div >
                    <p>Puede regresar a ver el contenido anterior</p>
                </div>
            </article>
    <?php
}

?>

        </section>
<?php
include_once "footer.php";
?>