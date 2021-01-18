<!DOCTYPE html>
<html>
    <head>
        <title>Blog 0and6</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <meta name="description" content="Blog personal dirigido a aficionados a la programacion, fisica, electronica y matematicas">
    </head>
    <body>
        <header>
            <h1><a href="https://0and6.xyz">0and6</a></h1>
        </header>
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
        <footer>
            <span class="negritas">2020 0and6.xyz</span>
        </footer>
        <link rel="stylesheet" href="/blog/estilos/estilos.css">
    </body>
</html> 