<?php



class LoginModel {

    private $db;

    function __construct() {
        $this->db = new Database();
    }
    
    function verificarUsuario($usuario) {
        $sentencia = "SELECT nombre, alias, contrasenia FROM autores WHERE alias = ?";
        return $this->db->sentencia($sentencia, array($usuario));
    }

    function modificarContrasenia($usuario, $pass) {
        $sentencia = "UPDATE autores SET contrasenia = ? WHERE alias = ?";
        $this->db->sentencia($sentencia, array($pass, $usuario));
    }
}
?>