<?php

require_once("baseDomain.php");

/**
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */
class Reservaciones extends BaseDomain implements \JsonSerializable{

    //attributes
    private $idReservaciones;
    private $usuario_idUsuario;
    private $vuelo_idVuelo;
    private $Fecha_Reservacion;
    private $Numero_Fila;
    private $Numero_Asiento;
  

    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullReservaciones() {
        $instance = new self();
        return $instance;
    }

    public static function createReservaciones($idReservaciones, $usuario_idUsuario, $vuelo_idVuelo, $Fecha_Reservacion, $Numero_Fila,$Numero_Asiento) {
        $instance = new self();
        $instance->idReservaciones       = $idReservaciones;
        $instance->usuario_idUsuario           = $usuario_idUsuario;
        $instance->vuelo_idVuelo        = $vuelo_idVuelo;
        $instance->Fecha_Reservacion        = $Fecha_Reservacion;
        $instance->Numero_Fila    = $Numero_Fila;
        $instance->Numero_Asiento           = $Numero_Asiento;
      
        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    public function getidReservaciones() {
        return $this->idReservaciones;
    }

    public function setidReservaciones($idReservaciones) {
        $this->idReservaciones = $idReservaciones;
    }

    /****************************************************************************/

    public function getusuario_idUsuario() {
        return $this->usuario_idUsuario;
    }

    public function setusuario_idUsuario($usuario_idUsuario) {
        $this->usuario_idUsuario = $usuario_idUsuario;
    }

    /****************************************************************************/

    public function getvuelo_idVuelo() {
        return $this->vuelo_idVuelo;
    }

    public function setvuelo_idVuelo($vuelo_idVuelo) {
        $this->vuelo_idVuelo = $vuelo_idVuelo;
    }

    /****************************************************************************/

    public function getFecha_Reservacion() {
        return $this->Fecha_Reservacion;
    }

    public function setFecha_Reservacion ($Fecha_Reservacion) {
        $this->Fecha_Reservacion= $Fecha_Reservacion;
    }

    /****************************************************************************/

    public function getNumero_Fila() {
        return $this->Numero_Fila;
    }

    public function setNumero_Fila($Numero_Fila) {
        $this->Numero_Fila = $Numero_Fila;
    }

    /****************************************************************************/

    public function getNumero_Asiento() {
        return $this->Numero_Asiento;
    }

    public function setNumero_Asiento ($Numero_Asiento) {
        $this->Numero_Asiento = $Numero_Asiento;
    }


  
    /****************************************************************************/
    //Convertir el obj a JSON
    /****************************************************************************/
    

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}


