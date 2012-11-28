<?php

include('../Clases/Conexion.php');
include('../Clases/ListaReproduccion.php');

 $conect = new Conexion();
 $conect->conectar();
// $contListaReproduccion = new ControladorListaReproduccion('123', 'Otra mas', 'Mi ruta5');
// $contListaReproduccion->insertar();
 
class ControladorListaReproduccion {

    var $listaReproduccion;

    function __construct($id_coleccion, $nombre, $ruta_imagen)
    {
        $this->listaReproduccion = new ListaReproduccion($id_coleccion, $nombre, $ruta_imagen);
    }

    public function insertar() {
        $id_coleccion = $this->listaReproduccion->id_coleccion;
        $nombre = $this->listaReproduccion->nombre;
        $ruta_imagen = $this->listaReproduccion->ruta_imagen;

        $sentencia = "INSERT INTO  Lista_de_Reproduccion (id_coleccion, nombre, ruta_imagen) VALUES('$id_coleccion', '$nombre', '$ruta_imagen')";
        echo $sentencia;
        $execute = mysql_query($sentencia) or die('Error al crear la lista');

        if ($execute) {
            echo "La lista se creó correctamente";
        }
    }

    public function consultar($id_coleccion, $nombre) {
        $sentencia = "SELECT * FROM Lista_de_Reproduccion WHERE id_coleccion='$id_coleccion' AND nombre='$nombre'";
        $consulta = mysql_query($sentencia) or die('Error al consultar');
        echo $sentencia;
        $datosLista = array();
        while ($fila = mysql_fetch_array($consulta))
        {
           $datosLista[0] = $fila['id_coleccion'];
           $datosLista[1] = $fila['nombre'];
           $datosLista[2] = $fila['ruta_imagen'];
        }
        echo json_encode($datosLista);
    }
    
    function modificar($id_coleccion, $nombre, $nombre_modif, $r_imag_modif)
    {
        $sentencia = "UPDATE Lista_de_Reproduccion SET nombre='$nombre_modif', ruta_imagen='$r_imag_modif' WHERE id_coleccion='$id_coleccion' AND nombre='$nombre'";
        $consulta = mysql_query($sentencia) or die ('No se pudo modificar');
        
    }
    
    
    function listar()
    {
        $sentencia = "SELECT * FROM Lista_de_Reproduccion order by nombre";
        $consulta = mysql_query($sentencia) or die('No se pudo generar la lista');
        $datosLista = array();
        $cont=0;
        while($fila=  mysql_fetch_array($consulta))
        {
            $datosLista[$cont][0] =$fila['id_coleccion'];
            $datosLista[$cont][1] =$fila['nombre'];
            $datosLista[$cont][2] =$fila['ruta_imagen'];
            $cont++;
        }
        echo json_encode($datosLista);
    }
    function agregarCancion($id_coleccion, $nombre_lista, $id_cancion)
    {
      
        $sentencia = "INSERT INTO Canciones_por_lista_reprod (id_coleccion, nombre_lista, id_cancion) VALUES('$id_coleccion', '$nombre_lista', '$id_cancion')";
        echo $sentencia;
        $execute = mysql_query($sentencia) or die('Error al agregar la canción');

        if ($execute) {
            echo "La cancion se agregó correctamente";
        }        
    }
    
    function listarCancionesPorListaRep($id_coleccion)
    {
        $sentencia = "SELECT * FROM canciones_por_lista_reprod WHERE id_coleccion='$id_coleccion' order by id_coleccion, nombre_lista, id_cancion";
        $consulta = mysql_query($sentencia) or die('No se pudo generar la lista');
        $datos_por_lista = array();
//        $todas_las_listas = array();
//        $listaActual="";
        $cont=0;
        while($fila=  mysql_fetch_array($consulta))
        {
            $datos_por_lista[$cont][0] =$fila['id_coleccion'];
            $datos_por_lista[$cont][1] =$fila['nombre_lista'];
            $datos_por_lista[$cont][2] =$fila['id_cancion'];
       
//            if($listaActual=="")
//            {
//                $listaActual=$fila['nombre_lista'];
//            }elseif (!($listaActual==$fila['nombre_lista']))
//            {
//                $todas_las_listas[] = $datos_por_lista;
//                $datos_por_lista = array();
//                $listaActual=="";
//            }
            
            $cont++;
        }
        echo json_encode($datos_por_lista);
    }
}

?>
