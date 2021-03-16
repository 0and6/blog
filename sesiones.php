<?php

class Sesiones {
    private $sesion;
    function __construct() {
        $this->sesion = false;
    }

    function activarSesion($nombre) {
        if(session_status() == PHP_SESSION_NONE)
            session_start();
        $_SESSION['nombre'] = $nombre;
    }

    function desactivarSesion() {
        session_destroy();
    }

    function esActiva() {
        if(session_status() == PHP_SESSION_ACTIVE && isset($_SESSION['nombre'])) {
            return true;
        }
        return false;
    }
}

?>