<?php

require_once("../../utlis/adodb5/adodb.inc.php");
require_once("../domain/catalogo_avion.php");

/**
 * 
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */

//this attribute enable to see the SQL's executed in the data base
//$this->labAdodb->debug=true;

class Catalogo_avionDao {

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

    public function add(Catalogo_avion $catalogo_avion) {

        
        try {
            $sql = sprintf("insert into Catalogo_avion (idCatalogo_Avion, Año, Modelo, Marca,Cantidad_Filas, Asientos_por_Fila) 
                                          values (%s,%s,%s,%s,%s,%s)",
                    $this->labAdodb->Param("idCatalogo_Avion"),
                    $this->labAdodb->Param("Año"),
                    $this->labAdodb->Param("Modelo"),
                    $this->labAdodb->Param("Marca"),
                    $this->labAdodb->Param("Cantidad_Filas"),
                    $this->labAdodb->Param("Asientos_por_Fila"));
                    
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idCatalogo_Avion"]       = $catalogo_avion->getidCatalogo_Avion();
            $valores["Año"]          = $catalogo_avion->getAño();
            $valores["Modelo"]       = $catalogo_avion->getModelo();
            $valores["Marca"]       = $catalogo_avion->getMarca();
            $valores["Cantidad_Filas"]            = $catalogo_avion->getCantidad_Filas();
            $valores["Asientos_por_Fila"]   = $catalogo_avion->getAsientos_por_Fila();
           

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase Catalogo_avionDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //verifica si una persona existe en la base de datos por ID
    //***********************************************************

    public function exist(Catalogo_avion $catalogo_avion) {

        
        $exist = false;
        try {
            $sql = sprintf("select * from Catalogo_avion where  idCatalogo_Avion = %s ",
                            $this->labAdodb->Param("idCatalogo_Avion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idCatalogo_Avion"] = $catalogo_avion->getidCatalogo_Avion();

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

    public function update(Catalogo_avion $catalogo_avion) {

        
        try {
            $sql = sprintf("update Catalogo_avion set Año = %s, 
                                                Modelo = %s, 
                                                Marca= %s, 
                                                Cantidad_Filas = %s, 
                                                Asientos_por_Fila = %s, 
                                             
                            where idCatalogo_Avion = %s",
                    $this->labAdodb->Param("Año"),
                    $this->labAdodb->Param("Modelo"),
                    $this->labAdodb->Param("Marca"),
                    $this->labAdodb->Param("Cantidad_Filas"),
                    $this->labAdodb->Param("Asientos_por_Fila"),
                    $this->labAdodb->Param("idCatalogo_Avion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Año"]          = $catalogo_avion->getAño();
            $valores["Modelo"]       = $catalogo_avion->getModelo();
            $valores["Marca"]       = $catalogo_avion->getMarca();
            $valores["Cantidad_Filas"]            = $catalogo_avion->getCantidad_Filas();
            $valores["Asientos_por_Fila"]   = $catalogo_avion->getAsientos_por_Fila();
            $valores["idCatalogo_Avion"]       = $catalogo_avion->getidCatalogo_Avion();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase Catalogo_avionDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //elimina una persona en la base de datos
    //***********************************************************

    public function delete(Catalogo_avion $catalogo_avion) {

        
        try {
            $sql = sprintf("delete from Catalogo_avion where  idCatalogo_Avion = %s",
                            $this->labAdodb->Param("idCatalogo_Avion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idCatalogo_Avion"] = $catalogo_avion->getidCatalogo_Avion();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase Catalogo_avionDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //busca a una persona en la base de datos
    //***********************************************************

    public function searchById(Catalogo_avion $catalogo_avion) {

        
        $returnCatalogo_avion = null;
        try {
            $sql = sprintf("select * from Catalogo_avion where  idCatalogo_Avion = %s",
                            $this->labAdodb->Param("idCatalogo_Avion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idCatalogo_Avion"] = $catalogo_avion->getidCatalogo_Avion();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnCatalogo_avion = Catalogo_avion::createNullCatalogo_avion();
                $returnCatalogo_avion->setidCatalogo_Avion($resultSql->Fields("idCatalogo_Avion"));
                $returnCatalogo_avion->setAño($resultSql->Fields("Año"));
                $returnCatalogo_avion->setModelo($resultSql->Fields("Modelo"));
                $returnCatalogo_avion->setMarca($resultSql->Fields("Marca"));
                $returnCatalogo_avion->setCantidad_Filas($resultSql->Fields("Cantidad_Filas"));
                $returnCatalogo_avion->setAsientos_por_Fila($resultSql->Fields("Asientos_por_Fila"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase Catalogo_AvionDao), error:'.$e->getMessage());
        }
        return $returnCatalogo_avion;
    }

    //***********************************************************
    //obtiene la información de las personas en la base de datos
    //***********************************************************
    
    public function getAll() {

        
        try {
            $sql = sprintf("select * from Catalogo_avion");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase Catalogo_avionDao), error:'.$e->getMessage());
        }
    }

}

