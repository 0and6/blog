<?php

include_once "database.php";

$db = new Database();

$url = $_SERVER['REQUEST_URI'];
$url = strtolower($url);
$parametros = explode("/", $url);
$indice = 2;

switch($parametros[$indice]):
    case "posts":
        $nombre = $parametros[$indice + 1];
        $sentencia = 'SELECT posts.titulo, posts.fecha_pub, posts.contenido, autores.nombre FROM posts inner join autores on posts.autor = autores.id WHERE url = ?';
        $resultado = $db->sentencia($sentencia, array($nombre));
        
        if(count($resultado) == 0) {
            echo "Error página no encontrada";
        } else {
            include "vistas/posts.php";
        }
    break;
    case $parametros[$indice] == "index.php":
    case $parametros[$indice] == "index.html":
    case $parametros[$indice] == "index.htm":
    case $parametros[$indice] == "index":
    case $parametros[$indice] == "":
                
        $sentencia = 'SELECT posts.titulo, posts.url, posts.fecha_pub, posts.contenido, autores.nombre FROM posts inner join autores on posts.autor = autores.id ORDER BY fecha_pub DESC';
        $resultado = $db->seleccionar($sentencia);
        include_once "vistas/principal.php";
    break;
    default:
        include "vistas/error_1.html";
    break;
endswitch;

?>