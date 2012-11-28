<?php

include('../Controladores/controladorUsuario.php');

$interfaceUsuario = new usuarioInterface();
$interfaceUsuario->Accion();
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuarioInterface
 *
 * @author felipe
 */
class usuarioInterface {

    var $accion;
    var $login;
    var $nombres;
    var $password;
    var $password2;
    var $apellidos;
    var $correo;
    var $fecha_reg;

    function __construct() {
        $this->accion = $_POST['accion'];
        $this->login = $_POST['login'];
        $this->nombres = $_POST['nombres'];
        $this->password = $_POST['password'];
        $this->password2 = $_POST['password2'];
        $this->apellidos = $_POST['apellidos'];
        $this->correo = $_POST['correo'];
        $this->fecha_reg = date("d-m-Y H:i:s");
    }

    public function Accion() {


        if ($this->accion == 'disponibilidad') {

            if (strlen($this->login) == 0) {

                echo "vacio";
            } else {

                $controlUsuario = new controladorUsuario();
                $controlUsuario->Consultar($this->login);
            }
        } else if ($this->accion == 'valida-Ingresar') {
            
        } else if ($this->accion == 'registrar') {
            $controlUsuario = new controladorUsuario($this->login, $this->password, $this->nombres, $this->apellidos, $this->correo, $this->fecha_reg);
            $controlUsuario->Insertar();
        } else if ($this->accion == 'Ingresar') {

            $login = $_POST['id'];
            $password = $_POST['pass'];
            $controlUsuario = new controladorUsuario($login, $password, $this->nombres, $this->apellidos, $this->correo, $this->fecha_reg);
            $controlUsuario->Validar($login, $password);
        } else {
            echo 'No se';
        }
    }

    //put your code here
}

?>
