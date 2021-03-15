
<?php
include_once "header.php";
?>
        <section id="entradas">
        <h1>Seccion de categorias <?php echo $categoria?></h1>
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

$paginaAnterior = 0;
$paginaSiguiente = 0;

if( $entradasTotales > ($pagina*$limit) ) {
    $paginaAnterior = $pagina+1;
    if($pagina > 1) {
        $paginaSiguiente = $pagina-1;
    }
} else {
    $paginaSiguiente = 1;
    $paginaAnterior = intdiv($entradasTotales, $limit);
}

if($paginaSiguiente > 0) {
    echo "<div class='p-siguiente'><a href='$configs[url]/categoria/$categoria/$paginaSiguiente'>Página siguiente</a></div>";
}
if($paginaAnterior > 0) {
    echo "<div class='p-siguiente'><a href='$configs[url]/categoria/$categoria/$paginaAnterior'>Página anterior</a></div>";
}

?>

        </section>
<?php
include_once "footer.php";
?>