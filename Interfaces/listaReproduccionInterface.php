<?php
//        echo 'entra a interface';
 	include('../Controladores/controladorListaReproduccion.php');
        $contListaRepInterface = new ListaReproduccionInterface();
        $contListaRepInterface->realizarOperacion($_POST['opcion']);
        
        class ListaReproduccionInterface
        {
            var $id_coleccion;
            var $nombre;
            var $ruta_imagen;
            
            function  __construct()
            {

            }
                
            function realizarOperacion($opcion)
            {
                session_start();;
                if($opcion==1){
                    $this->id_coleccion = $_SESSION['login'];
                    $this->nombre = $_POST['nombre'];
                    $this->ruta_imagen = $_POST['ruta_imagen'];
                }
                 $contListReprod = new ControladorListaReproduccion($this->id_coleccion, $this->nombre, $this->ruta_imagen);
          
                 switch($opcion){
                    case 1: 
                        $contListReprod ->insertar();
                    break;		
                    
                    case 2:
                        $contListReprod->consultar($_SESSION['login']);
                    break;

                    case 3:
                        $contListReprod->listar();
                    break;

                    case 4:
                        $contListReprod->modificar($_SESSION['login'], $_POST['nombre'], $_POST['nombre_modif'], $_POST['r_imag_modif']);
                    break;
                    
                    case 5:
                        $contListReprod->agregarCancion($_SESSION['login'], $_POST['nombre_lista'], $_POST['id_cancion']);
                    break;
                    
                    case 6:
                        $contListReprod->listarCancionesPorListaRep($_SESSION['login']);
                    break;
                }
             }
                
    }
?>
