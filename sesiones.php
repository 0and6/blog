<?php

class Sesiones {
    private $sesion;
    function __construct() {
        $this->sesion = false;
    }

    function activarSesion() {
        $this->sesion = true;
    }

    function desactivarSesion() {
        $this->sesion =false;
    }

    function esActiva() {
        return $this->sesion;
    }
}

?>