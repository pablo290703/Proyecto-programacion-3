<?php

require_once("baseDomain.php");

/**
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */
class Vuelo extends BaseDomain implements \JsonSerializable{

    //attributes
    private $idVuelo;
    private $Fecha_Hora;
    private $ruta_idRuta;
    private $catalogo_avion_idCatalogo_Avion;


    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullVuelo() {
        $instance = new self();
        return $instance;
    }

    public static function createVuelo($idVuelo, $Fecha_Hora,$ruta_idRuta,$catalogo_avion_idCatalogo_Avion) {
        $instance = new self();
        $instance->idVuelo        = $idVuelo;
        $instance->Fecha_Hora           = $Fecha_Hora;
        $instance->ruta_idRuta        = $ruta_idRuta;
        $instance->catalogo_avion_idCatalogo_Avion        = $catalogo_avion_idCatalogo_Avion;
        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    public function getidVuelo() {
        return $this->idVuelo;
    }

    public function setidVuelo($idVuelo) {
        $this->idVuelo = $idVuelo;
    }

    /****************************************************************************/

    public function getFecha_Hora() {
        return $this->Fecha_Hora;
    }

    public function setFecha_Hora($Fecha_Hora) {
        $this->Fecha_Hora = $Fecha_Hora;
    }

    /****************************************************************************/

    public function getruta_idRuta() {
        return $this->ruta_idRuta;
    }

    public function setruta_idRuta($ruta_idRuta) {
        $this->ruta_idRuta= $ruta_idRuta;
    }

    /****************************************************************************/

    public function getcatalogo_avion_idCatalogo_Avion() {
        return $this->catalogo_avion_idCatalogo_Avion;
    }

    public function setcatalogo_avion_idCatalogo_Avion ($catalogo_avion_idCatalogo_Avion) {
        $this->catalogo_avion_idCatalogo_Avion= $catalogo_avion_idCatalogo_Avion;
    }

    /****************************************************************************/
    //Convertir el obj a JSON
    /****************************************************************************/
    

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}


