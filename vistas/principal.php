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
while ($row = pg_fetch_row($resultado)) {
    //echo "id: $row[0] titulo: $row[1] descripcion: $row[2]";
    //echo "<br />\n";
    $url = strtolower(str_replace(" ", "-", $row[1]));
?>
            <article class="resumen">
                <header class="info-resumen">
                    <h2><a href="/blog/posts/23-12-2020/<?php echo $url; ?>.html"><?php echo $row[1]?></a></h2>
                    <div class="info-cabecera">Publicado el 23 de diciembre de 2020 por <a href="#" class="autor">Armando Martinez</a>. <a href="#" class="categorias">Soleda Etla</a>.</div>
                    
                </header>
                <div class="contenido">
                    <p>
                        <?php echo $row[2]?>
                    </p>
                </div>
            </article>
<?php
}

?>
            <article class="resumen">
                <header class="info-resumen">
                    <h2><a href="/blog/posts/23-12-2020/cuando-jaime-torres-bodet-estuvo-en-soledad-etla-oaxaca.html">Cuando Jaime Torres Bodet estuvo en Soledad Etla Oaxaca</a></h2>
                    <div class="info-cabecera">Publicado el 23 de diciembre de 2020 por <a href="#" class="autor">Armando Martinez</a>. <a href="#" class="categorias">Soleda Etla</a>.</div>
                    
                </header>
                <div class="contenido">
                    <p>De septiembre a diciembre de 1944, no había podido sino asomarme a tres Estados de la República: 
                        los de Durango, Zacatecas y Veracruz. Era muy poco, dada la urgencia de conocer personalmente y... 
                    </p>
                </div>
            </article>

            
            <article class="resumen">
                <header class="info-resumen">
                    <h2><a href="/blog/posts/23-12-2020/hola-mundo.html">Hola mundo</a></h2>
                    <div class="info-cabecera">Publicado el 23 de diciembre de 2020 por <a href="#" class="autor">Armando Martinez</a>. <a href="#" class="categorias">Experiencias profesionales</a>, <a href="#" class="categorias">migración</a>, <a href="#" class="categorias">personal</a>.</div>
                    
                </header>
                <div class="contenido">
                    <p>Este es un resumen de la primer entrada de este blog, con el tiempo
                    se pueden tener una mayor cantidad de entradas conforme tenga mas ideas...</p>
                </div>
            </article>
        </section>
        <footer>
            <span>2020 0and6.xyz</span>
        </footer>
        <link rel="stylesheet" href="estilos.css">
    </body>
</html>