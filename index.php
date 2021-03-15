<?php

include_once "database.php";
include_once "modelos/indexmodel.php";

$model = new IndexModel();

$configs = include('config.php');
$url = $_SERVER['REQUEST_URI'];
$url = strtolower($url);
$parametros = explode("/", $url);
$indice = 2;

$limit = 2;
$offset = 0;
$entradasTotales = 0;
$pagina = 1;

switch($parametros[$indice]):
    case "posts":
        $nombre = count($parametros) >= 4 ? $parametros[$indice + 1] : "none";
        $resultado = $model->obtenerPosts($nombre);
        if(count($resultado) == 0) {
            $mensaje = "La entrada no existe o la url esta mal";
            include "vistas/error_1.php";
        } else {
            require "vistas/posts.php";
        }
    break;

    case "categoria":
        $categoria = count($parametros) >= 4 ? $parametros[$indice + 1] : "none";
        $pagina = count($parametros) >= 5 ? intval($parametros[$indice + 2]) : 1;
        echo "Pagina $pagina";
        $entradasTotales = $model->entradasTotalesCategoria($categoria);
        $entradasTotales = $entradasTotales[0][0];
        echo "El numero total de entradas de esta categoria es $entradasTotales";
        $resultado = $model->obtenerPostsTotalesCategoria($categoria);
        include_once "vistas/categorias.php";
        break;
    case $parametros[$indice] == "index.php":
    case $parametros[$indice] == "index.html":
    case $parametros[$indice] == "index.htm":
    case $parametros[$indice] == "index":
    case $parametros[$indice] == "":
        $resultado = $model->obtenerPostsTotales($limit, $offset);
        include_once "vistas/principal.php";
    break;
    case "pagina":
        //$pagina = count($parametros) >= 4 ? $parametros[$indice + 1] : "0";
        
        $entradasTotales = $model->entradasTotales();
        //$sentencia = obtenerPostsTotales();
        if(isset($parametros[$indice+1]) && !empty($parametros[$indice+1]) && $parametros[$indice+1] > 0) {
            $offset = ($parametros[$indice+1] - 1) * $limit;
            $pagina = $parametros[$indice+1];
        }
        $resultado = $model->obtenerPostsTotales($limit, $offset);
        include_once "vistas/principal.php";
        break;
    case "publicar":
        include "vistas/publicar.php";
        break;
    case "editar":
        $entrada = $parametros[$indice + 1];
        $sentencia = $model->obtenerEditarPost();
        $resultado = $db->sentencia($sentencia, array($entrada));
        include "vistas/editar.php";
        break;
    case "autor":
        $alias = count($parametros) >= 4 ? $parametros[$indice + 1] : "none";
        $pagina = count($parametros) >= 5 ? intval($parametros[$indice + 2]) : 1;
        
        $entradasTotales = $model->entradasTotalesAutor($alias)[0][0];
        $resultado = $model->obtenerPostsTotalesAutor($alias);
        include_once "vistas/autores.php";
        break;
    default:
        $sentencia = $model->obtenerPostsTotales();
        $resultado = $db->paginacionEntradas($sentencia, $limit, $offset);
        include_once "vistas/principal.php";
    break;
endswitch;

?>