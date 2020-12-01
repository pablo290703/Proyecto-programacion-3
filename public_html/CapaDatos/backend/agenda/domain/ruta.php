<?php

require_once("baseDomain.php");

/**
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */
class Ruta extends BaseDomain implements \JsonSerializable{

    //attributes
    private $idRuta;
    private $Trayecto;
    private $Duración;
    private $Precio;
   

    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullRuta() {
        $instance = new self();
        return $instance;
    }

    public static function createRuta($idRuta, $Trayecto, $Duración, $Precio) {
        $instance = new self();
        $instance->idRuta       = $idRuta;
        $instance->Trayecto           = $Trayecto;
        $instance->Duración        = $Duración;
        $instance->Precio        = $Precio;
       
        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    public function getidRuta() {
        return $this->idRuta;
    }

    public function setidRuta($idRuta) {
        $this->idRuta = $idRuta;
    }

    /****************************************************************************/

    public function getTrayecto() {
        return $this->Trayecto;
    }

    public function setTrayecto($Trayecto) {
        $this->Trayecto = $Trayecto;
    }

    /****************************************************************************/

    public function getDuración() {
        return $this->Duración;
    }

    public function setDuración($Duración) {
        $this->Duración = $Duración;
    }

    /****************************************************************************/

    public function getPrecio() {
        return $this->Precio;
    }

    public function setPrecio($Precio) {
        $this->Precio= $Precio;
    }


    /****************************************************************************/
    //Convertir el obj a JSON
    /****************************************************************************/
    

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}


