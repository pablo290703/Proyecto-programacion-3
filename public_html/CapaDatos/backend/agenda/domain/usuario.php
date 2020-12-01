<?php

require_once("baseDomain.php");

/**
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */
class Usuario extends BaseDomain implements \JsonSerializable{

    //attributes
    private $idUsuario;
    private $Contraseña;
    private $Fecha_Registro;
    private $Fecha_Actualizacion;
    private $Persona_idPersona;
    private $Tipo_Usuario;


    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullUsuario() {
        $instance = new self();
        return $instance;
    }

    public static function createPersonas($idUsuario, $Contraseña, $Fecha_Registro, $Fecha_Actualizacion, $Persona_idPersona, $Tipo_Usuario, $ultUsuario, $ultModificacion) {
        $instance = new self();
        $instance->idUsuario        = $idUsuario;
        $instance->Contraseña          = $Contraseña;
        $instance->Fecha_Registro        = $Fecha_Registro;
        $instance->Fecha_Actualizacion        = $Fecha_Actualizacion;
        $instance->Persona_idPersona    = $Persona_idPersona;
        $instance->Tipo_Usuario             = $Tipo_Usuario;
        $instance->setLastUser($ultUsuario);
        $instance->setLastModification($ultModificacion);
        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    public function getidUsuario () {
        return $this->idUsuario ;
    }

    public function setidUsuario ($idUsuario ) {
        $this->idUsuario  = $idUsuario ;
    }

    /****************************************************************************/

    public function getContraseña() {
        return $this->Contraseña;
    }

    public function setContraseña($Contraseña) {
        $this->Contraseña = $Contraseña;
    }

    /****************************************************************************/

    public function getFecha_Registro() {
        return $this->Fecha_Registro;
    }

    public function setFecha_Registro($Fecha_Registro) {
        $this->Fecha_Registro = $Fecha_Registro;
    }

    /****************************************************************************/

    public function getFecha_Actualizacion() {
        return $this->Fecha_Actualizacion;
    }

    public function setFecha_Actualizacion($Fecha_Actualizacion) {
        $this->Fecha_Actualizacion = $Fecha_Actualizacion;
    }

    /****************************************************************************/

    public function getPersona_idPersona() {
        return $this->Persona_idPersona;
    }

    public function setPersona_idPersona($Persona_idPersona) {
        $this->Persona_idPersona = $Persona_idPersona;
    }

    /****************************************************************************/

    public function getTipo_Usuario() {
        return $this->Tipo_Usuario;
    }

    public function setTipo_Usuario($Tipo_Usuario) {
        $this->Tipo_Usuario = $Tipo_Usuario;
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
