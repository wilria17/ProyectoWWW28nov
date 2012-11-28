<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author felipe
 */
class Usuario {

    var $login;
    var $password;
    var $nombres;
    var $apellidos;
    
    var $correo;
    var $fecha_reg;

    function __construct($login, $password, $nombres, $apellidos, $correo, $fecha_reg) 
     {

        $this->login = $login;
        $this->password = $password;
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        
        $this->correo = $correo;
        $this->fecha_reg = $fecha_reg;
    }

    public function getLogin() {
        return $this->login;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getNombres() {
        return $this->nombres;
    }

    public function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    

    public function getCorreo() {
        return $this->correo;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function getFechaReg() {
        return $this->fecha_reg;
    }

    public function setFechaReg($fecha_reg) {
        $this->fecha_reg = $fecha_reg;
    }

    //put your code here
}

?>
