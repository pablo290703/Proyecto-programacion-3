<?php

require_once("../../utlis/adodb5/adodb.inc.php");
require_once("../domain/usuario.php");

/**
 * 
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */

//this attribute enable to see the SQL's executed in the data base
//$this->labAdodb->debug=true;

class UsuarioDao {

    private $labAdodb;
    
    public function __construct() {
        $driver = 'mysqli';
        $this->labAdodb = newAdoConnection($driver);
        $this->labAdodb->setCharset('utf8');
        $this->labAdodb->setConnectionParameter('CharacterSet', 'WE8ISO8859P15');
        $this->labAdodb->Connect("localhost", "root", "twin2020", "mydb");
        
        $this->labAdodb->debug=true;
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(Usuario $usuario) {

        
        try {
            $sql = sprintf("insert into Usuario (idUsuario, Contraseña, Fecha_Registro, Fecha_Actualizacion, Persona_idPersona,Tipo_Usuario) 
                                          values (%s,%s,%s,%s,%s,%s)",
                    $this->labAdodb->Param("idUsuario"),
                    $this->labAdodb->Param("Contraseña"),
                    $this->labAdodb->Param("Fecha_Registro"),
                    $this->labAdodb->Param("Fecha_Actualizacion"),
                    $this->labAdodb->Param("Persona_idPersona"),
                    $this->labAdodb->Param("Tipo_Usuario"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idUsuario"]       = $usuario->getidUsuario();
            $valores["Contraseña"]          = $usuario->getContraseña();
            $valores["Fecha_Registro"]       = $usuario->getFecha_Registro();
            $valores["Fecha_Actualizacion"]       = $usuario->getFecha_Actualizacion();
            $valores["Persona_idPersona"]   = $usuario->getPersona_idPersona();
            $valores["Tipo_Usuario"]            = $usuario->getTipo_Usuario();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //verifica si una persona existe en la base de datos por ID
    //***********************************************************

    public function exist(Usuario $usuario) {

        
        $exist = false;
        try {
            $sql = sprintf("select * from Usuario where  idUsuario = %s ",
                            $this->labAdodb->Param("idUsuario"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idUsuario"] = $usuario->getidUsuario();

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

    public function update(Usuario $usuario) {

        
        try {
            $sql = sprintf("update Usuario set Contraseña = %s, 
                                                Fecha_Registro = %s, 
                                                Fecha_Actualizacion = %s, 
                                                Tipo_Usuario = %s,
                                               
                            where idUsuario = %s",
                    $this->labAdodb->Param("Contraseña"),
                    $this->labAdodb->Param("Fecha_Registro"),
                    $this->labAdodb->Param("Fecha_Actualizacion"),
                    $this->labAdodb->Param("Tipo_Usuario"),
                    $this->labAdodb->Param("idUsuario"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Contraseña"]          = $usuario->getContraseña();
            $valores["Fecha_Registro"]       = $usuario>getFecha_Registro();
            $valores["Fecha_Actualizacion"]       = $usuario->getFecha_Actualizacion();
            $valores["Tipo_Usuario"]       = $usuario->getTipo_Usuario();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //elimina una persona en la base de datos
    //***********************************************************

    public function delete(Usuario $usuario) {

        
        try {
            $sql = sprintf("delete from Usuario where  idUsuario = %s",
                            $this->labAdodb->Param("idUsuario"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idUsuario"] = $usuario->getidUsuario();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //busca a una persona en la base de datos
    //***********************************************************

    public function searchById(Usuario $usuario) {

        
        $returnUsuario = null;
        try {
            $sql = sprintf("select * from Usuario where  idUsuario = %s",
                            $this->labAdodb->Param("idUsuario"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idUsuario"] = $usuario->getidUsuario();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnUsuario = Usuario::createNullUsuario();
                $returnUsuario->setidUsuario($resultSql->Fields("idUsuario")); 
                $returnUsuario->setContraseña($resultSql->Fields("Contraseña"));
                $returnUsuario->setFecha_Registro($resultSql->Fields("Fecha_Registro"));
                $returnUsuario->setFecha_Actualizacion($resultSql->Fields("Fecha_Actualizacion"));
                $returnUsuario->setPersona_idPersona($resultSql->Fields("Persona_idPersona"));
                $returnUsuario->setTipo_Usuario($resultSql->Fields("Tipo_Usuario"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase PersonasDao), error:'.$e->getMessage());
        }
        return $returnUsuario;
    }

    //***********************************************************
    //obtiene la información de los usuarios     en la base de datos
    //***********************************************************
    
    public function getAll() {

        
        try {
            $sql = sprintf("select * from Usuario");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

}
