<?php

require_once("../../utlis/adodb5/adodb.inc.php");
require_once("../domain/reservaciones.php");

/**
 * 
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */

//this attribute enable to see the SQL's executed in the data base
//$this->labAdodb->debug=true;

class ReservacionesDao {

    private $labAdodb;
    
    public function __construct() {
        $driver = 'mysqli';
        $this->labAdodb = newAdoConnection($driver);
        $this->labAdodb->setCharset('utf8');
        $this->labAdodb->setConnectionParameter('CharacterSet', 'WE8ISO8859P15');
        $this->labAdodb->Connect("localhost", "root", "twin2020", "mydb");
        
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(Reservaciones $reservaciones) {

        
        try {
            $sql = sprintf("insert into Reservaciones (idReservaciones,usuario_idUsuario, vuelo_idVuelo,Fecha_Reservacion,Numero_Fila, Numero_Asiento) 
                                          values (%s,%s,%s,%s,%s,%s)",
                    $this->labAdodb->Param("idReservaciones"),
                    $this->labAdodb->Param("usuario_idUsuario"),
                    $this->labAdodb->Param("vuelo_idVuelo"),
                    $this->labAdodb->Param("Fecha_Reservacion"),
                    $this->labAdodb->Param("Numero_Fila"),
                    $this->labAdodb->Param("Numero_Asiento"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idReservaciones"]       = $reservaciones->getidReservaciones();
            $valores["usuario_idUsuario"]          = $reservaciones->getusuario_idUsuario();
            $valores["vuelo_idVuelo"]       = $reservaciones->getvuelo_idVuelo();
            $valores["Fecha_Reservacion"]       = $reservaciones->getFecha_Reservacion();
            $valores["Numero_Fila"]   = $reservaciones->getNumero_Fila();
            $valores["Numero_Asiento"]            = $reservaciones->getNumero_Asiento();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //verifica si una persona existe en la base de datos por ID
    //***********************************************************

    public function exist(Reservaciones $reservaciones) {

        
        $exist = false;
        try {
            $sql = sprintf("select * from Reservaciones where  idReservaciones = %s ",
                            $this->labAdodb->Param("idReservaciones"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idReservaciones"] = $reservaciones->getidReservaciones();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //modifica una persona en la base de datos
    //***********************************************************

    public function update(Reservaciones $reservaciones) {

        
        try {
            $sql = sprintf("update Reservaciones set Fecha_Reservacion =%s,
                                                     Numero_Fila = %s,
                                                     Numero_Asiento = %s,
                                             
                            where idReservaciones = %s",
                    $this->labAdodb->Param("idReservaciones"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["Fecha_Reservacion"]       = $reservaciones->getFecha_Reservacion();
            $valores["Numero_Fila"]       = $reservaciones->getNumero_Fila();
            $valores["Numero_Asiento"]       = $reservaciones->getNumero_Asiento();
            $valores["idReservaciones"]       = $reservaciones->getidReservaciones();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //elimina una persona en la base de datos
    //***********************************************************

    public function delete(Reservaciones $reservaciones) {

        
        try {
            $sql = sprintf("delete from Reservaciones where  idReservaciones = %s",
                            $this->labAdodb->Param("idReservaciones"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idReservaciones"] = $reservaciones->getidReservaciones();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //busca a una persona en la base de datos
    //***********************************************************

    public function searchById(Reservaciones $reservaciones) {

        
        $returnReservaciones = null;
        try {
            $sql = sprintf("select * from Reservaciones where  idReservaciones = %s",
                            $this->labAdodb->Param("idReservaciones"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idReservaciones"] = $reservaciones->getidReservaciones();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnReservaciones = Reservaciones::createNullReservaciones();
                $returnReservaciones->setidReservaciones($resultSql->Fields("idReservaciones"));
                $returnReservaciones->setusuario_idUsuario($resultSql->Fields("usuario_idUsuario"));
                $returnReservaciones->setvuelo_idVuelo($resultSql->Fields("vuelo_idVuelo"));
                $returnReservaciones->setFecha_Reservacion($resultSql->Fields("Fecha_Reservacion"));
                $returnReservaciones->setNumero_Fila($resultSql->Fields("Numero_Fila"));
                $returnReservaciones->setNumero_Asiento($resultSql->Fields("Numero_Asiento"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase PersonasDao), error:'.$e->getMessage());
        }
        return $returnReservaciones;
    }

    //***********************************************************
    //obtiene la información de las personas en la base de datos
    //***********************************************************
    
    public function getAll() {

        
        try {
            $sql = sprintf("select * from Rservaciones");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

}