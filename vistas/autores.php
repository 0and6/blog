
<?php
include_once "header.php";
?>
        <section id="entradas">
        <h1>Seccion de autores <?php echo $alias?></h1>
<?php

forEach($resultado as $fila) {
?>
            <article class="resumen">
                <header class="info-resumen">
                    <h2><a href="<?php echo $configs['url'];?>/posts/<?php echo $fila['url']; ?>"><?php echo $fila['titulo']?></a></h2>
                    <div class="info-cabecera">Fecha: <?php echo $fila['fecha_pub'] ?>. Autor: 
                        <a href="<?php echo $configs['url'];?>/autor/<?php echo $fila['alias'] ?>" class="autor"><?php echo $fila['autor']?></a>. 
                        <a href="<?php echo $configs['url'];?>/categoria/<?php echo $fila['categoriaurl'] ?>" class="categorias"><?php echo $fila['categoria']?></a>.
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

$paginaAnterior = $pagina+1;
$paginaSiguiente = $pagina-1;
$ultimaPagina = intdiv($entradasTotales, $limit);
if(($limit * $pagina) > $entradasTotales && count($resultado) == 0) {
    echo "<div class='p-siguiente'><a href='$configs[url]/autor/1'>Primera página</a></div>";
    echo "<div class='p-anterior'><a href='$configs[url]/autor/$ultimaPagina'>Última página</a></div>";
} else if(($limit * $pagina) > $entradasTotales) {
    echo "<div class='p-siguiente'><a href='$configs[url]/autor/$paginaSiguiente'>Página siguiente</a></div>";
} else {
    if($pagina > 1) {
        
        echo "<div class='p-siguiente'><a href='$configs[url]/autor/$paginaSiguiente'>Página siguiente</a></div>";
    }
    
    echo "<div class='p-anterior'><a href='$configs[url]/autor/$paginaAnterior'>Página anterior</a></div>";
}

?>

        </section>
<?php
include_once "footer.php";
?>