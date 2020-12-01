<?php

require_once("../../utlis/adodb5/adodb.inc.php");
require_once("../domain/vuelo.php");

/**
 * 
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */

//this attribute enable to see the SQL's executed in the data base
//$this->labAdodb->debug=true;

class VueloDao {

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

    public function add(Vuelo $vuelo) {

        
        try {
            $sql = sprintf("insert into Vuelo (idVuelo,Fecha_Hora, ruta_idRuta, catalogo_avion_idCatalogo_Avion) 
                                          values (%s,%s,%s,%s)",
                    $this->labAdodb->Param("idVuelo"),
                    $this->labAdodb->Param("Fecha_Hora"),
                    $this->labAdodb->Param("ruta_idRuta"),
                    $this->labAdodb->Param("catalogo_avion_idCatalogo_Avion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idVuelo"]       = $vuelo->getidVuelo();
            $valores["Fecha_Hora"]          = $vuelo->getFecha_Hora();
            $valores["ruta_idRuta"]       = $vuelo->getruta_idRuta();
            $valores["catalogo_avion_idCatalogo_Avion"]       = $vuelo->getcatalogo_avion_idCatalogo_Avion();
           
            

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //verifica si una persona existe en la base de datos por ID
    //***********************************************************

    public function exist(Vuelo $vuelo) {

        
        $exist = false;
        try {
            $sql = sprintf("select * from Vuelo where  idVuelo = %s ",
                            $this->labAdodb->Param("idVuelo"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idVuelo"] = $vuelo->getidVuelo();

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

    public function update(Vuelo $vuelo) {

        
        try {
            $sql = sprintf("update Vuelo set 
                            where idVuelo = %s",
                  
                    $this->labAdodb->Param("idVuelo"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idVuelo"]       = $vuelo->getidVuelo();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //elimina una persona en la base de datos
    //***********************************************************

    public function delete(Vuelo $vuelo) {

        
        try {
            $sql = sprintf("delete from Vuelo where  idVuelo = %s",
                            $this->labAdodb->Param("idVuelo"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idVuelo"] = $vuelo->getidVuelo();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //busca a una persona en la base de datos
    //***********************************************************

    public function searchById(Vuelo $vuelo) {

        
        $returnVuelo = null;
        try {
            $sql = sprintf("select * from Vuelo where  idVuelo = %s",
                            $this->labAdodb->Param("idVuelo"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idVuelo"] = $vuelo->getidVuelo();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnVuelo = Vuelo::createNullVuelo();
                $returnVuelo->setidVuelo($resultSql->Fields("idVuelo")); 
                $returnVuelo->setFecha_Hora($resultSql->Fields("Fecha_Hora"));
                $returnVuelo->setruta_idRuta($resultSql->Fields("ruta_idRuta"));
                $returnVuelo->setcatalogo_avion_idCatalogo_Avion($resultSql->Fields("catalogo_avion_idCatalogo_Avion"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase PersonasDao), error:'.$e->getMessage());
        }
        return $returnVuelo;
    }

    //***********************************************************
    //obtiene la información de las personas en la base de datos
    //***********************************************************
    
    public function getAll() {

        
        try {
            $sql = sprintf("select * from Vuelo");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

}
