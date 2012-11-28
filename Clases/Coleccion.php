<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Coleccion
 *
 * @author felipe
 */
class Coleccion {

    var $id_usuario;
    var $lista_canciones=array();
    var $listas_reprod=array();

    function __construct($id_usuario, $lista_canciones, $listas_reprod) 
    {

        $this->id_usuario = $id_usuario;
        $this->lista_canciones = $lista_canciones;
        $this->listas_reprod = $listas_reprod;
    }
    
     public function getIdUsuario() {
        return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }
     public function getListaCanciones() {
        return $this->lista_canciones;
    }

    public function setListaCanciones($lista_canciones) {
        $this->lista_canciones = $lista_canciones;
    }
     public function getListasReproduccion() {
        return $this->listas_reprod;
    }

    public function setListasReproduccion($listasReproduccion) {
        $this->listas_reprod = $listasReproduccion;
    }

    //put your code here
}

?>
