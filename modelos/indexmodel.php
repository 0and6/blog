<?php



class IndexModel {

    private $db;

    function __construct() {
        $this->db = new Database();
    }
    
    function obtenerPostsTotales($limit, $offset) {
        $sentencia = "SELECT posts.titulo, posts.url, posts.fecha_pub, posts.descripcion,"
        . "autores.nombre as autor, autores.alias as alias, categorias.nombre as categoria, categorias.url as categoriaurl FROM posts inner" .
        " join autores on posts.autor = autores.id inner join categorias on posts.categorias = " 
        . "categorias.id ORDER BY fecha_pub DESC LIMIT ? OFFSET ?";
        return $this->db->paginacionEntradas($sentencia, $limit, $offset);
        
    }

    function obtenerPostsTotalesAutor($alias) {
        $sentencia = "SELECT posts.titulo, posts.url, posts.fecha_pub, posts.descripcion,"
        . " autores.nombre as autor, autores.alias as alias, categorias.nombre as categoria, categorias.url as categoriaurl from posts inner join autores on posts.autor = "
        . "autores.id  inner join categorias on posts.categorias = categorias.id "
        . " where autores.alias = ? ORDER by posts.fecha_pub DESC";

        return $this->db->sentencia($sentencia, array($alias));
    }

    function entradasTotales() {
        $sentencia = "SELECT count(id) FROM posts";
        $resultado = $this->db->seleccionar($sentencia)->fetchAll();
        return intval($resultado[0][0]);
    }

    function entradasTotalesCategoria($categoria) {
        $sentencia = "SELECT count(posts.id) FROM posts inner join categorias on posts.categorias = categorias.id"
            . " where categorias.nombre = ?";
        return $this->db->sentencia($sentencia, array($categoria));
    }

    function entradasTotalesAutor($alias) {
        $sentencia = "SELECT count(posts.id) FROM posts inner join autores on posts.autor = autores.id"
            . " where autores.alias = ?";
        return $this->db->sentencia($sentencia, array($alias));
    }


    function obtenerPostsTotalesCategoria($categoria) {
        $sentencia = "SELECT posts.titulo, posts.url, posts.fecha_pub, posts.descripcion,"
            . " autores.nombre as autor, autores.alias as alias, categorias.nombre as categoria, categorias.url as categoriaurl from posts inner join autores on posts.autor = "
            . "autores.id  inner join categorias on posts.categorias = categorias.id "
            . " where categorias.nombre = ? ORDER by posts.fecha_pub DESC";
        return $this->db->sentencia($sentencia, array($categoria));
    }

    function obtenerEditarPost() {
        return 'SELECT posts.titulo, posts.fecha_pub, posts.contenido, '
        .' posts.url, posts.descripcion FROM posts inner join autores on posts.autor = autores.id '
        .' inner join categorias on posts.categorias = categorias.id WHERE posts.id = ?';
    }

    function obtenerPosts($nombre) {
        $sentencia = 'SELECT posts.titulo, posts.fecha_pub, posts.contenido, autores.nombre as autor,'
        .' autores.alias as alias, categorias.nombre as categoria, categorias.url as categoriaurl FROM posts inner join autores on posts.autor = autores.id '
        .' inner join categorias on posts.categorias = categorias.id WHERE posts.url = ?';
        return $this->db->sentencia($sentencia, array($nombre));
    }
}
?>