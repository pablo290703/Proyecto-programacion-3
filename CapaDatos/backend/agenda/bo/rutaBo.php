<?php


require_once("../domain/ruta.php");
require_once("../dao/rutaDao.php");

/**
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */

class RutaBo {

    private $rutaDao;

    public function __construct() {
        $this->rutaDao = new RutaDao();
    }

    public function getRutaDao() {
        return $this->rutaDao;
    }

    public function setRutaDao(RutaDao $rutaDao) {
        $this->rutaDao = $rutaDao;
    }

    //***********************************************************
    //agrega a una ruta a la base de datos
    //***********************************************************

 public function add(Ruta $ruta) {
        try {
            if (!$this->rutaDao->exist($ruta)) {
                $this->rutaDao->add($ruta);
            } else {
                throw new Exception("La ruta ya existe en la base de datos!!");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
    //***********************************************************
    //modifica a una ruta a la base de datos
    //***********************************************************

    public function update(Ruta $ruta) {
        try {
            $this->rutaDao->update($ruta);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //eliminar a una ruta a la base de datos
    //***********************************************************

    public function delete(Ruta $ruta) {
        try {
            $this->rutaDao->delete($ruta);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consulta a una ruta a la base de datos
    //***********************************************************

    public function searchById(Ruta $ruta) {
        try {
            return $this->rutaDao->searchById($ruta);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consultar todas las ruta de la base de datos
    //***********************************************************

    public function getAll() {
        try {
            return $this->rutaDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

}
