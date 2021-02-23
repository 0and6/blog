<?php

include_once "database.php";

$db = new Database();

$url = $_SERVER['REQUEST_URI'];
$url = strtolower($url);
$parametros = explode("/", $url);
$indice = 2;

$limit = 2;
$offset = 0;

switch($parametros[$indice]):
    case "posts":
        $nombre = count($parametros) >= 4 ? $parametros[$indice + 1] : "none";      
        $sentencia = 'SELECT posts.titulo, posts.fecha_pub, posts.contenido, autores.nombre FROM posts inner join autores on posts.autor = autores.id WHERE url = ?';
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
        
        $sentencia = "SELECT posts.titulo, posts.url, posts.fecha_pub, posts.descripcion, autores.nombre FROM posts inner join autores on posts.autor = autores.id ORDER BY fecha_pub DESC LIMIT ? OFFSET ?";
        
        $resultado = $db->paginacionEntradas($sentencia, $limit, $offset);
        include_once "vistas/principal.php";
    break;
    case "pagina":
        $sentencia = "SELECT posts.titulo, posts.url, posts.fecha_pub, posts.descripcion, autores.nombre FROM posts inner join autores on posts.autor = autores.id ORDER BY fecha_pub DESC LIMIT ? OFFSET ?";
        if(isset($parametros[$indice+1]) && !empty($parametros[$indice+1])) {
            $offset = ($parametros[$indice+1] - 1) * 2;
        }
        $resultado = $db->paginacionEntradas($sentencia, $limit, $offset);
        
        //$resultado = $db->seleccionar($sentencia);

        include_once "vistas/principal.php";
        break;
    case "publicar":
        include "vistas/publicar.php";
        break;
    default:
        $mensaje = "La página no existe, recurso no encontrado";
        include "vistas/error_1.php";
    break;
endswitch;

?>