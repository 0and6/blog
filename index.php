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
                .' categorias.nombre as categoria FROM posts inner join autores on posts.autor = autores.id '
                .' inner join categorias on posts.categorias = categorias.id WHERE url = ?';
        $resultado = $db->sentencia($sentencia, array($nombre));
        if(count($resultado) == 0) {
            $mensaje = "La entrada no existe o la url esta mal";
            include "vistas/error_1.php";
        } else {
            include "vistas/posts.php";
        }
    break;
    case $parametros[$indice] == "index.php":
    case $parametros[$indice] == "index.html":
    case $parametros[$indice] == "index.htm":
    case $parametros[$indice] == "index":
    case $parametros[$indice] == "":
        $sentencia = "SELECT posts.titulo, posts.url, posts.fecha_pub, posts.descripcion,"
                . "autores.nombre as autor, categorias.nombre as categoria FROM posts inner" .
                " join autores on posts.autor = autores.id inner join categorias on posts.categorias = " 
                . "categorias.id ORDER BY fecha_pub DESC LIMIT ? OFFSET ?";
        
        $resultado = $db->paginacionEntradas($sentencia, $limit, $offset);
        include_once "vistas/principal.php";
    break;
    case "pagina":
        
        $sentencia = "SELECT posts.titulo, posts.url, posts.fecha_pub, posts.descripcion,"
                . "autores.nombre as autor, categorias.nombre as categoria FROM posts inner" .
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
    default:
        $sentencia = "SELECT posts.titulo, posts.url, posts.fecha_pub, posts.descripcion,"
        . "autores.nombre as autor, categorias.nombre as categoria FROM posts inner" .
        " join autores on posts.autor = autores.id inner join categorias on posts.categorias = " 
        . "categorias.id ORDER BY fecha_pub DESC LIMIT ? OFFSET ?";

        $resultado = $db->paginacionEntradas($sentencia, $limit, $offset);
        include_once "vistas/principal.php";
    break;
endswitch;

?>