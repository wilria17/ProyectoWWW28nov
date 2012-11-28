<?php

include('../Clases/Conexion.php');
include('../Clases/Usuario.php');

class controladorUsuario {

    var $usuario;

    function __construct($login, $password, $nombres, $apellidos, $correo, $fecha_reg) {
        $this->usuario = new Usuario($login, $password, $nombres, $apellidos, $correo, $fecha_reg);
    }

    public function Insertar() {
        $respuesta = "Error al Insertar";
        $login = $this->usuario->login;
        $password = $this->usuario->password;
        $nombres = $this->usuario->nombres;
        $apellidos = $this->usuario->apellidos;
        
        $correo = $this->usuario->correo;
        $fecha_reg = $this->usuario->fecha_reg;
        $sentencia = "INSERT INTO  Usuario (login,password,nombres,apellidos,correo) VALUES('$login', '$password', '$nombres', '$apellidos','$correo')";
        $conexionBD = new Conexion();
        $conexionBD->conectar();

//        echo $sentencia;
        $execute = mysql_query($sentencia);



        if ($execute && mysql_affected_rows() == 1) {
            session_start();
            $_SESSION["login"] = $login;
            $_SESSION["nombres"] = $nombres;
            $_SESSION["password"] = $password;
            $_SESSION["apellidos"] = $apellidos;
           
            $_SESSION["correo"] = $correo;
            $_SESSION["fecha_reg"] = $fecha_reg;
            $respuesta = "Registro exitoso";
            echo $respuesta;

            $_SESSION['autentificado'] = "1";


            header("Location: ../vistas/bienvenido.php");
        } else {


            header("Location: ../index.php");
        }
    }

    public function Validar($login, $password) {
        $conexionBD = new Conexion();
        $conexionBD->conectar();
        $sentencia = "SELECT * FROM Usuario WHERE login='$login' && password ='$password'";
        $execute = mysql_query($sentencia);
        $filas = mysql_num_rows($execute);
        if ($filas == 1) {
            session_start();
            while ($row = mysql_fetch_array($execute)) {
                $_SESSION['autentificado'] = "1";
                $_SESSION["login"] = $row["login"];
                $_SESSION["nombres"] = $row ["nombres"];
                $_SESSION["apellidos"] = $row ["apellidos"];
                $_SESSION["correo"] = $row ["correo"];
                
                $_SESSION["fecha_reg"] = $row ["fecha_reg"];
            }
            header("Location: ../vistas/bienvenido.php");
        } else {

            header("Location: ../error.php");
        }
    }

    public function Consultar($login) {
        $conexionBD = new Conexion();
        $conexionBD->conectar();
        $sentencia = "SELECT * FROM Usuario WHERE login='$login'";
        $execute = mysql_query($sentencia);
        $filas = mysql_num_rows($execute);
//        session_start();
        if ($filas == 1) {
            
            
            echo "Login ya existe";
//            $_SESSION['respuesta'] = "Login ya existe";
        }
        else
        {
            echo "Login Disponible";
//           $_SESSION['respuesta'] = "Login Disponible"; 
            
        }
    }

    public function PasarDatos() {
        $_SESSION["login"] = $login;
        $_SESSION["nombres"] = $nombres;
        $_SESSION["password"] = $password;
        $_SESSION["apellidos"] = $apellidos;
        
        $_SESSION["correo"] = $correo;
        $_SESSION["fecha_reg"] = $fecha_reg;
    }

}

?>
