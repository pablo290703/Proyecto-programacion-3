<?php


require_once("../domain/vuelo.php");
require_once("../dao/vueloDao.php");

/**
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */

class VueloBo {

    private $vueloDao;

    public function __construct() {
        $this->vueloDao = new VueloDao();
    }

    public function getVueloDao() {
        return $this->vueloDao;
    }

    public function setVueloDao(VueloDao $vueloDao) {
        $this->vueloDao = $vueloDao;
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(Vuelo $vuelo) {
        try {
            if (!$this->vueloDao->exist($vuelo)) {
                $this->vueloDao->add($vuelo);
            } else {
                throw new Exception("El vuelo ya existe en la base de datos!!");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //modifica a una persona a la base de datos
    //***********************************************************

    public function update(Vuelo $vuelo) {
        try {
            $this->vueloDao->update($vuelo);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //eliminar a una persona a la base de datos
    //***********************************************************

    public function delete(Vuelo $vuelo) {
        try {
            $this->vueloDao->delete($vuelo);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consulta a una persona a la base de datos
    //***********************************************************

    public function searchById(Vuelo $vuelo) {
        try {
            return $this->vueloDao->searchById($vuelo);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consultar todas las persona de la base de datos
    //***********************************************************

    public function getAll() {
        try {
            return $this->vueloDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

}

