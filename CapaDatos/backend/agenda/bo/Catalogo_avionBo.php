<?php


require_once("../domain/catalogo_avion.php");
require_once("../dao/catalogo_avionDao.php");

/**
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */

class Catalogo_avionBo {

    private $catalogo_avionDao;

    public function __construct() {
        $this->catalogo_avionDao = new Catalogo_avionDao();
    }

    public function getCatalogo_avionDao() {
        return $this->catalogo_avionDao;
    }

    public function setCatalogo_avionDao(Catalogo_avionDao $catalogo_avionDao) {
        $this->catalogo_avionDao = $catalogo_avionDao;
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(Catalogo_avion $catalogo_avion) {
        try {
            if (!$this->catalogo_avionDao->exist($catalogo_avion)) {
                $this->catalogo_avionDao->add($catalogo_avion);
            } else {
                throw new Exception("El catalogo_avion ya existe en la base de datos!!");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //modifica a una persona a la base de datos
    //***********************************************************

    public function update(Catalogo_avion $catalogo_avion) {
        try {
            $this->catalogo_avionDao->update($catalogo_avion);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //eliminar a una persona a la base de datos
    //***********************************************************

    public function delete(Catalogo_avion $catalogo_avion) {
        try {
            $this->catalogo_avionDao->delete($catalogo_avion);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consulta a una persona a la base de datos
    //***********************************************************

    public function searchById(Catalogo_avion $catalogo_avion) {
        try {
            return $this->catalogo_avionDao->searchById($catalogo_avion);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consultar todas las persona de la base de datos
    //***********************************************************

    public function getAll() {
        try {
            return $this->catalogo_avionDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

}

