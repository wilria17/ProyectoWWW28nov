<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ListaReproduccion
 *
 * @author felipe
 */
class ListaReproduccion {
    var $id_coleccion;
    var $nombre;
    var $ruta_imagen;
    
     function __construct($id_coleccion, $nombre, $ruta_imagen) 
    {
         $this->id_coleccion=$id_coleccion;
         $this->nombre=$nombre;
         $this->ruta_imagen=$ruta_imagen;
         
     }
     
    public function getId() {
        return $this->$id_coleccion;
    }

    public function setId($id) {
        $this->id_coleccion = $id;
    }
    
     public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function getRutaImagen() {
        return $this->ruta_imagen;
    }

    public function setRutaImagen($nombre) {
        $this->nombre = $ruta_imagen;
    }
    
}

?>
