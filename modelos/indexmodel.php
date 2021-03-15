<?php

function obtenerPostsTotales() {
    return "SELECT posts.titulo, posts.url, posts.fecha_pub, posts.descripcion,"
    . "autores.nombre as autor, autores.alias as alias, categorias.nombre as categoria, categorias.url as categoriaurl FROM posts inner" .
    " join autores on posts.autor = autores.id inner join categorias on posts.categorias = " 
    . "categorias.id ORDER BY fecha_pub DESC LIMIT ? OFFSET ?";
}

function obtenerPostsTotalesAutor() {
    return "SELECT posts.titulo, posts.url, posts.fecha_pub, posts.descripcion,"
    . " autores.nombre as autor, autores.alias as alias, categorias.nombre as categoria, categorias.url as categoriaurl from posts inner join autores on posts.autor = "
    . "autores.id  inner join categorias on posts.categorias = categorias.id "
    . " where autores.alias = ? ORDER by posts.fecha_pub DESC";

}


function obtenerPostsTotalesCategoria() {
    return "SELECT posts.titulo, posts.url, posts.fecha_pub, posts.descripcion,"
        . " autores.nombre as autor, autores.alias as alias, categorias.nombre as categoria, categorias.url as categoriaurl from posts inner join autores on posts.autor = "
        . "autores.id  inner join categorias on posts.categorias = categorias.id "
        . " where categorias.nombre = ? ORDER by posts.fecha_pub DESC";
}

function obtenerEditarPost() {
    return 'SELECT posts.titulo, posts.fecha_pub, posts.contenido, '
    .' posts.url, posts.descripcion FROM posts inner join autores on posts.autor = autores.id '
    .' inner join categorias on posts.categorias = categorias.id WHERE posts.id = ?';
}

function obtenerPost() {
    return 'SELECT posts.titulo, posts.fecha_pub, posts.contenido, autores.nombre as autor,'
    .' autores.alias as alias, categorias.nombre as categoria, categorias.url as categoriaurl FROM posts inner join autores on posts.autor = autores.id '
    .' inner join categorias on posts.categorias = categorias.id WHERE posts.url = ?';
}
?>