<!DOCTYPE html>
<html>
    <head>
        <title>Blog 0and6</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no">
    </head>
    <body>
        <header>
            <h1><a href="#">0and6</a></h1>
        </header>
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
                        <?php /* Aquí va un resumen */?>
                    </p>
                </div>
            </article>
<?php
}

?>
          
        </section>
        <footer>
            <span>2020 0and6.xyz</span>
        </footer>
        <link rel="stylesheet" href="/blog/estilos/estilos.css">

        
    </body>
</html>