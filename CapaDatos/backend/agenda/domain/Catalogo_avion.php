<?php

require_once("baseDomain.php");

/**
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */
class Catalogo_avion extends BaseDomain implements \JsonSerializable{

    //attributes
    private $idCatalogo_Avion;
    private $año;
    private $Modelo;
    private $Marca;
    private $Cantidad_Filas;
    private $Asientos_por_Fila;

    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullCatalogo_avion() {
        $instance = new self();
        return $instance;
    }

    public static function createCatalogo_avion($idCatalogo_Avion, $Año, $Modelo, $Marca, $Cantidad_Filas, $Asientos_por_Fila, $ultUsuario, $ultModificacion, $lastUser, $lastModification) {
        $instance = new self();
        $instance->idCatalogo_Avion        = $idCatalogo_Avion;
        $instance->Año           = $Año;
        $instance->Modelo        = $Modelo;
        $instance->Marca        = $Marca;
        $instance->Cantidad_Filas           = $Cantidad_Filas;
        $instance->Asientos_por_Fila    = $Asientos_por_Fila;
        $instance->setLastUser($ultUsuario);
        $instance->setLastModification($ultModificacion);
        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    public function getidCatalogo_Avion() {
        return $this->idCatalogo_Avion;
    }

    public function setidCatalogo_Avion($idCatalogo_Avion) {
        $this->idCatalogo_Avion = $idCatalogo_Avion;
    }

    /****************************************************************************/

    public function getAño() {
        return $this->Año;
    }

    public function setAño($Año) {
        $this->Año = $Año;
    }

    /****************************************************************************/

    public function getModelo() {
        return $this->Modelo;
    }

    public function setModelo($Modelo) {
        $this->Modelo = $Modelo;
    }

    /****************************************************************************/

    public function getMarca() {
        return $this->Marca;
    }

    public function setMarca($Marca) {
        $this->Marca = $Marca;
    }

    /****************************************************************************/

    public function getCantidad_Filas() {
        return $this->Cantidad_Filas;
    }

    public function setCantidad_Filas($Cantidad_Filas) {
        $this->Cantidad_Filas = $Cantidad_Filas;
    }

    /****************************************************************************/

    public function getAsientos_por_Fila() {
        return $this->Asientos_por_Fila;
    }

    public function setAsientos_por_Fila($Asientos_por_Fila) {
        $this->Asientos_por_Fila = $Asientos_por_Fila;
    }

    /****************************************************************************/

    public function getUltUsuario() {
        return $this->ultUsuario;
    }

    public function setUltUsuario($ultUsuario) {
        $this->ultUsuario = $ultUsuario;
    }

    /****************************************************************************/
    //Convertir el obj a JSON
    /****************************************************************************/
    

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}

