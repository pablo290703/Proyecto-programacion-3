<?php

require_once("baseDomain.php");

/**
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */
class Persona extends BaseDomain implements \JsonSerializable{

    //attributes
    private $idPersona;
    private $Nombre;
    private $Apellido1;
    private $Apellido2;
    private $Fecha_Nacimiento;
    private $Correo_Electronico;
    private $Direccion;
    private $Telefono;
    

    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullPersona() {
        $instance = new self();
        return $instance;
    }

    public static function createPersonas($idPersona, $Nombre, $Apellido1, $Apellido2, $Fecha_Nacimiento, $Correo_Electronico, $Direccion,$Telefono, $ultUsuario, $ultModificacion, $lastUser, $lastModification) {
        $instance = new self();
        $instance->idPersona       = $idPersona;
        $instance->Nombre           = $Nombre;
        $instance->Apellido1        = $Apellido1;
        $instance->Apellido2        = $Apellido2;
        $instance->Fecha_Nacimiento    = $Fecha_Nacimiento;
        $instance->Correo_Electronico            = $Correo_Electronico;
        $instance->Direccion    = $Direccion;
        $instance->Telefono   = $Telefono;
        $instance->setLastUser($ultUsuario);
        $instance->setLastModification($ultModificacion);
        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    public function getidPersona() {
        return $this->idPersona;
    }

    public function setidPersona($idPersona) {
        $this->idPersona = $idPersona;
    }

    /****************************************************************************/

    public function getNombre() {
        return $this->Nombre;
    }

    public function setNombre($Nombre) {
        $this->Nombre = $Nombre;
    }

    /****************************************************************************/

    public function getApellido1() {
        return $this->Apellido1;
    }

    public function setApellido1($Apellido1) {
        $this->Apellido1 = $Apellido1;
    }

    /****************************************************************************/

    public function getApellido2() {
        return $this->Apellido2;
    }

    public function setApellido2($Apellido2) {
        $this->Apellido2 = $Apellido2;
    }

    /****************************************************************************/

    public function getFecha_Nacimiento() {
        return $this->Fecha_Nacimiento;
    }

    public function setFecha_Nacimiento($Fecha_Nacimiento) {
        $this->Fecha_Nacimiento = $Fecha_Nacimiento;
    }

    /****************************************************************************/

    public function getCorreo_Electronico() {
        return $this->Correo_Electronico;
    }

    public function setCorreo_Electronico($Correo_Electronico) {
        $this->Correo_Electronico = $Correo_Electronico;
    }

    /****************************************************************************/

    public function getDireccion() {
        return $this->Direccion;
    }

    public function setDireccion($Direccion) {
        $this->Direccion = $Direccion;
    }

    /****************************************************************************/
        public function getTelefono() {
        return $this->Telefono;
    }

    public function setTelefono($Telefono) {
        $this->Telefono = $Telefono;
    }
    
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


