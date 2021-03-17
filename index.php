<?php

include_once "database.php";
include_once "modelos/indexmodel.php";
include_once "modelos/loginmodel.php";
include_once "sesiones.php";

$model = new IndexModel();
$sesiones = new Sesiones();

$configs = include('config.php');
$url = $_SERVER['REQUEST_URI'];
$url = strtolower($url);
$url = strtok($url, "?");
$parametros = explode("/", $url);
$indice = 2;

$limit = 6;
$offset = 0;
$entradasTotales = 0;
$pagina = 1;

session_start();
switch($parametros[$indice]):
    case "posts":
        $nombre = count($parametros) >= ($indice + 2) ? $parametros[$indice + 1] : "none";
        $resultado = $model->obtenerPosts($nombre);
        if(count($resultado) == 0) {
            $mensaje = "La entrada no existe o la url esta mal";
            include "vistas/error_1.php";
        } else {
            require "vistas/posts.php";
        }
    break;

    case "categoria":
        $categoria = count($parametros) >= ($indice + 2) ? $parametros[$indice + 1] : "none";
        $pagina = count($parametros) >= ($indice + 3) ? intval($parametros[$indice + 2]) : 1;
        if($pagina < 1) $pagina = 1;
        $entradasTotales = $model->entradasTotalesCategoria($categoria)[0][0];

        $offset = ($pagina - 1) * $limit;
        
        $resultado = $model->obtenerPostsTotalesCategoria($categoria, $limit, $offset);
        $mensaje = "Sección de categorias: $categoria"; 
        include_once "vistas/principal.php";
        break;
    case $parametros[$indice] == "index.php":
    case $parametros[$indice] == "index.html":
    case $parametros[$indice] == "index.htm":
    case $parametros[$indice] == "index":
    case $parametros[$indice] == "":
        $entradasTotales = $model->entradasTotales();
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
        if($sesiones->esActiva()) {
            include "vistas/publicar.php";
        } else {
            include "controladores/loginControlador.php";
        }
        break;
    case "editar":
        if($sesiones->esActiva()) {
            $entrada = isset($parametros[$indice + 1]) ? $parametros[$indice + 1] : 1;
            $resultado = $model->obtenerEditarPost($entrada);
            include "vistas/editar.php";
        } else {
            include "controladores/loginControlador.php";
        }
        break;
    case "autor":
        $alias = count($parametros) >= ($indice + 2) ? $parametros[$indice + 1] : "none";
        $pagina = count($parametros) >= ($indice + 3) ? intval($parametros[$indice + 2]) : 1;
        if($pagina < 1) $pagina = 1;

        $entradasTotales = $model->entradasTotalesAutor($alias)[0][0];
        $offset = ($pagina - 1) * $limit;
        
        $resultado = $model->obtenerPostsTotalesAutor($alias, $limit, $offset);

        $mensaje = "Sección de autores: $alias"; 
        include_once "vistas/principal.php";
        break;
    case "cerrarsesion":
        $sesiones->desactivarSesion();
        header('Location: '. $configs[url] . '/index');
        break;
    default:
        $sentencia = $model->obtenerPostsTotales();
        $resultado = $db->paginacionEntradas($sentencia, $limit, $offset);
        include_once "vistas/principal.php";
    break;
endswitch;

?>