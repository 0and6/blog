<?php

include_once "database.php";
$db = new Database();
$configs = include('config.php');
$url = $_SERVER['REQUEST_URI'];
$url = strtolower($url);
$parametros = explode("/", $url);
$indice = 2;

$limit = 6;
$offset = 0;
$entradasTotales = 0;
$sentencia = "SELECT count(id) FROM posts";
$entradasTotales = $db->seleccionar($sentencia)->fetchAll();
$entradasTotales = intval($entradasTotales[0][0]);
$pagina = 1;

switch($parametros[$indice]):
    case "posts":
        $nombre = count($parametros) >= 4 ? $parametros[$indice + 1] : "none";      
        $sentencia = 'SELECT posts.titulo, posts.fecha_pub, posts.contenido, autores.nombre as autor,'
                .' autores.alias as alias, categorias.nombre as categoria, categorias.url as categoriaurl FROM posts inner join autores on posts.autor = autores.id '
                .' inner join categorias on posts.categorias = categorias.id WHERE posts.url = ?';
        $resultado = $db->sentencia($sentencia, array($nombre));
        if(count($resultado) == 0) {
            $mensaje = "La entrada no existe o la url esta mal";
            include "vistas/error_1.php";
        } else {
            require "vistas/posts.php";
        }
    break;

    case "categoria":
        $categoria = count($parametros) >= 4 ? $parametros[$indice + 1] : "none";
        $sentencia = "SELECT posts.titulo, posts.url, posts.fecha_pub, posts.descripcion,"
        . " autores.nombre as autor, autores.alias as alias, categorias.nombre as categoria, categorias.url as categoriaurl from posts inner join autores on posts.autor = "
        . "autores.id  inner join categorias on posts.categorias = categorias.id "
        . " where categorias.nombre = ? ORDER by posts.fecha_pub DESC";
        $resultado = $db->sentencia($sentencia, array($categoria));
        include_once "vistas/categorias.php";

        break;
    case $parametros[$indice] == "index.php":
    case $parametros[$indice] == "index.html":
    case $parametros[$indice] == "index.htm":
    case $parametros[$indice] == "index":
    case $parametros[$indice] == "":
        $sentencia = "SELECT posts.titulo, posts.url, posts.fecha_pub, posts.descripcion,"
                . "autores.nombre as autor, autores.alias as alias, categorias.nombre as categoria, categorias.url as categoriaurl FROM posts inner" .
                " join autores on posts.autor = autores.id inner join categorias on posts.categorias = " 
                . "categorias.id ORDER BY fecha_pub DESC LIMIT ? OFFSET ?";
        
        $resultado = $db->paginacionEntradas($sentencia, $limit, $offset);
        include_once "vistas/principal.php";
    break;
    case "pagina":
        
        $sentencia = "SELECT posts.titulo, posts.url, posts.fecha_pub, posts.descripcion,"
                . "autores.nombre as autor, autores.alias as alias, categorias.nombre as categoria, categorias.url as categoriaurl FROM posts inner" .
                " join autores on posts.autor = autores.id inner join categorias on posts.categorias = " 
                . "categorias.id ORDER BY fecha_pub DESC LIMIT ? OFFSET ?";
        if(isset($parametros[$indice+1]) && !empty($parametros[$indice+1]) && $parametros[$indice+1] > 0) {
            $offset = ($parametros[$indice+1] - 1) * $limit;
            $pagina = $parametros[$indice+1];
        }
        $resultado = $db->paginacionEntradas($sentencia, $limit, $offset);
        
        //$resultado = $db->seleccionar($sentencia);

        include_once "vistas/principal.php";
        break;
    case "publicar":
        include "vistas/publicar.php";
        break;
    case "editar":
        $entrada = $parametros[$indice + 1];

        $sentencia = 'SELECT posts.titulo, posts.fecha_pub, posts.contenido, '
            .' posts.url, posts.descripcion FROM posts inner join autores on posts.autor = autores.id '
            .' inner join categorias on posts.categorias = categorias.id WHERE posts.id = ?';
        $resultado = $db->sentencia($sentencia, array($entrada));
        include "vistas/editar.php";
        break;
    case "autor":
        $alias = count($parametros) >= 4 ? $parametros[$indice + 1] : "none";  
        $sentencia = "SELECT posts.titulo, posts.url, posts.fecha_pub, posts.descripcion,"
        . " autores.nombre as autor, autores.alias as alias, categorias.nombre as categoria, categorias.url as categoriaurl from posts inner join autores on posts.autor = "
        . "autores.id  inner join categorias on posts.categorias = categorias.id "
        . " where autores.alias = ? ORDER by posts.fecha_pub DESC";
        $resultado = $db->sentencia($sentencia, array($alias));
        include_once "vistas/autores.php";
        break;
    default:
        $sentencia = "SELECT posts.titulo, posts.url, posts.fecha_pub, posts.descripcion,"
        . "autores.nombre as autor, autores.alias as alias, categorias.nombre as categoria, categorias.url as categoriaurl FROM posts inner" .
        " join autores on posts.autor = autores.id inner join categorias on posts.categorias = " 
        . "categorias.id ORDER BY fecha_pub DESC LIMIT ? OFFSET ?";

        $resultado = $db->paginacionEntradas($sentencia, $limit, $offset);
        include_once "vistas/principal.php";
    break;
endswitch;

?>