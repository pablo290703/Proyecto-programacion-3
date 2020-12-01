<?php

require_once("../../utlis/adodb5/adodb.inc.php");
require_once("../domain/persona.php");

/**
 * 
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */

//this attribute enable to see the SQL's executed in the data base
//$this->labAdodb->debug=true;

class PersonaDao {

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

    public function add(Persona $persona) {

        
        try {
            $sql = sprintf("insert into Persona (idPersona, Nombre, Apellido1, Apellido2, Fecha_Nacimiento, Correo_Electronico, Direccion, Lastuser, LASTMODIFICATION, Telefono) 
                                          values (%s,%s,%s,%s,%s,%s,%s,%s,CURDATE(),%s)",
                    $this->labAdodb->Param("idPersona"),
                    $this->labAdodb->Param("Nombre"),
                    $this->labAdodb->Param("Apellido1"),
                    $this->labAdodb->Param("Apellido2"),
                    $this->labAdodb->Param("Fecha_Nacimiento"),
                    $this->labAdodb->Param("Correo_Electronico"),
                    $this->labAdodb->Param("Direccion"),
                    $this->labAdodb->Param("LASTUSER"),
                    $this->labAdodb->Param("Telefono"));
                    
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idPersona"]       = $persona->getidPersona();
            $valores["Nombre"]          = $persona->getNombre();
            $valores["Apellido1"]       = $persona->getApellido1();
            $valores["Apellido2"]       = $persona->getApellido2();
            $valores["Fecha_Nacimiento"]   = $persona->getFecha_Nacimiento();
            $valores["Correo_Electronico"]    = $persona->getCorreo_Electronico();
            $valores["Direccion"]   = $persona->getDireccion();
            $valores["LASTUSER"]        = $persona->getLastUser();
            $valores["Telefono"]   = $persona->getTelefono();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //verifica si una persona existe en la base de datos por ID
    //***********************************************************

    public function exist(Persona $persona) {

        
        $exist = false;
        try {
            $sql = sprintf("select * from Persona where  idPersona = %s ",
                            $this->labAdodb->Param("idPersona"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idPersona"] = $persona->getidPersona();

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

    public function update(Persona $persona) {

        
        try {
            $sql = sprintf("update Persona set  Nombre = %s, 
                                                Apellido1 = %s, 
                                                Apellido2 = %s, 
                                                Fecha_Nacimiento = %s, 
                                                Correco_Electronico = %s, 
                                                Direccion = %s, 
                                                LASTUSER = %s, 
                                                LASTMODIFICATION = CURDATE() 
                                                Telefono = %s,
                            where idPersona = %s",
                    $this->labAdodb->Param("Nombre"),
                    $this->labAdodb->Param("Apellido1"),
                    $this->labAdodb->Param("Apellido2"),
                    $this->labAdodb->Param("Fecha_Nacimiento"),
                    $this->labAdodb->Param("Correo_Electronico"),
                    $this->labAdodb->Param("Direccion"),
                    $this->labAdodb->Param("LASTUSER"),
                    $this->labAdodb->Param("Telefono"),
                    $this->labAdodb->Param("idPersona"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Nombre"]          = $persona->getNombre();
            $valores["Apellido1"]       = $persona->getApellido1();
            $valores["Apellido2"]       = $persona->getApellido2();
            $valores["Fecha_Nacimiento"]   = $persona->getFecha_Nacimiento();
            $valores["Correo_Electronico"]            = $persona->getCorreo_Electronico();
            $valores["Direccion"]   = $persona->getDireccion();
            $valores["LASTUSER"]        = $persona->getLastUser();
            $valores["Telefono"]   = $persona->getTelefono();
            $valores["idPersona"]       = $persona->getidPersona();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //elimina una persona en la base de datos
    //***********************************************************

    public function delete(Persona $persona) {

        
        try {
            $sql = sprintf("delete from Persona where  idPersona = %s",
                            $this->labAdodb->Param("idPersona"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idPersona"] = $persona->getidPersona();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //busca a una persona en la base de datos
    //***********************************************************

    public function searchById(Persona $persona) {

        
        $returnPersona = null;
        try {
            $sql = sprintf("select * from Persona where  idPersona = %s",
                            $this->labAdodb->Param("idPersona"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idPersona"] = $persona->getidPersona();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnPersonas = Persona::createNullPersona();
                $returnPersonas->setidPersona($resultSql->Fields("idPersona"));
                $returnPersonas->setNombre($resultSql->Fields("Nombre"));
                $returnPersonas->setApellido1($resultSql->Fields("Apellido1"));
                $returnPersonas->setApellido2($resultSql->Fields("Apellido2"));
                $returnPersonas->setFecha_Nacimiento($resultSql->Fields("Fecha_Nacimiento"));
                $returnPersonas->setCorreo_Electronico($resultSql->Fields("Correo_Electronico"));
                $returnPersonas->setDireccion($resultSql->Fields("Direccion"));
                $returnPersonas->setTelefono($resultSql->Fields("Telefono"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase PersonasDao), error:'.$e->getMessage());
        }
        return $returnPersonas;
    }

    //***********************************************************
    //obtiene la información de las personas en la base de datos
    //***********************************************************
    
    public function getAll() {

        
        try {
            $sql = sprintf("select * from Persona");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

}