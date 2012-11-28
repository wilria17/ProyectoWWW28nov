<?php
	//session_start();
//        echo 'cancionInterface';
 	include('../Controladores/controladorCancion.php');
         $cancionInerface = new cancionInerface();
         $cancionInerface->realizarOperacion($_POST['opcion']);
        class cancionInerface
        {
            var $titulo;
            var $interprete;
            var $genero;
            var $album;
            var $precio;
            var $url;
            var $usuario;
            function  __construct()
            {

            }
                
            function realizarOperacion($opcion)
            {
                if($opcion==1){
                    session_start();
                    $this->titulo = $_POST['titulo'];
                    $this->interprete = $_POST['interprete'];
                    $this->genero = $_POST['genero'];
                    $this->album = $_POST['album'];
                    $this->precio = $_POST['precio'];
                    $this->url = $_POST['url'];
                    $this->usuario = $_SESSION['login'];
                }
                 $controlCancion = new ControladorCancion($this->titulo, $this->interprete, $this->genero, $this->album, $this->precio, $this->url, $this->usuario);
          
                switch($opcion){
                    case 1: 
                        $controlCancion->insertar();
                    break;		
                    
                    case 2:
                        $controlCancion->consultar($_POST['id']);
                    break;

                    case 3:
//                        echo 'Case 3';                        
                        $controlCancion->listar();
                    break;

                    case 4:
                        //$controlCancion->eliminar($);
                    break;
                }
             }
                
    }
?>