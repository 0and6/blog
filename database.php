<?php

class Database {
    //private $configs;
    private $conexion;    
    public function __construct() {
        $configs = include('config.php');
        $this->conexion = pg_connect("host=$configs[host] port=5432 dbname=$configs[nombre_db] user=$configs[usuario_db] password=$configs[contrasenia_db]");
    }

    public function seleccionar($sentencia) {
        return pg_query($this->conexion, $sentencia);
    }

    public function seleccionar_param($sentencia, $parametros) {
        return pg_query_params($this->conexion, $sentencia, $parametros);
    }

    public function insertar($tabla, $parametros) {
        pg_insert($this->conexion, $tabla, $parametros);
    }

    public function __destruct() {
        pg_close($this->conexion);
    }
}


?>