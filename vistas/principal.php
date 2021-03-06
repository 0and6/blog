<?php
include_once "header.php";
?>
        <section id="entradas">
        <?php 
        if(isset($mensaje))
            echo "<h1>$mensaje</h1>";
        ?>
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


$paginaSiguiente = 0;
$paginaAnterior = 0;

if( $pagina > intdiv($entradasTotales, $limit) + $entradasTotales%$limit) {
    echo "<div class='p-siguiente'><a href='$configs[url]/$urlbutton/1'>Primera página</a></div>";
    $paginaAnterior = intdiv($entradasTotales, $limit);
    if($paginaAnterior > 1) {
        echo "<div class='p-siguiente'><a href='$configs[url]/$urlbutton/$paginaAnterior'>Última página</a></div>";
    }
} else if($entradasTotales > ($pagina * $limit)) {
    if( $pagina > 1 ) {
        $paginaSiguiente = $pagina - 1;
    echo "<div class='p-siguiente'><a href='$configs[url]/$urlbutton/$paginaSiguiente'>Página siguiente</a></div>";
    }
    $paginaAnterior = $pagina + 1;
    echo "<div class='p-siguiente'><a href='$configs[url]/$urlbutton/$paginaAnterior'>Página anterior</a></div>";
} else if($pagina > 1) {
    $paginaSiguiente = $pagina - 1;
    echo "<div class='p-siguiente'><a href='$configs[url]/$urlbutton/$paginaSiguiente'>Pagina siguiente</a></div>";
}
?>
        </section>
<?php
include_once "footer.php";
?>