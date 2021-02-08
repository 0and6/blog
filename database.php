<?php

class Database {
    //private $configs;
    private $conexion;    
    private $mbd;
    public function __construct() {
        $configs = include('config.php');
        //$this->conexion = pg_connect("host=$configs[host] port=5432 dbname=$configs[nombre_db] user=$configs[usuario_db] password=$configs[contrasenia_db]");
        try {
            $this->mbd = new PDO("mysql:host=$configs[host];dbname=$configs[nombre_db]", $configs['usuario_db'], $configs['contrasenia_db']);
        } catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function seleccionar($sentencia) {
        return $this->mbd->query($sentencia);
    }

    public function sentencia($sentencia, $parametros) {
        //return pg_query_params($this->conexion, $sentencia, $parametros);
        $sentencia = $this->mbd->prepare($sentencia);
        $sentencia->execute($parametros);
        return $sentencia->fetchAll();
    }

    

    public function __destruct() {
        //pg_close($this->conexion);
        $this->mbd = null;
    }
}
?>