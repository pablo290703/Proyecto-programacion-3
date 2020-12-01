<?php


require_once("../domain/persona.php");
require_once("../dao/personaDao.php");

/**
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */

class PersonaBo {

    private $personaDao;

    public function __construct() {
        $this->personaDao = new PersonaDao();
    }

    public function getPersonaDao() {
        return $this->personaDao;
    }

    public function setPersonaDao(PersonaDao $personaDao) {
        $this->personaDao = $personaDao;
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(Persona $persona) {
        try {
            if (!$this->personaDao->exist($persona)) {
                $this->personaDao->add($persona);
            } else {
                throw new Exception("El Persona ya existe en la base de datos!!");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //modifica a una persona a la base de datos
    //***********************************************************

    public function update(Persona $persona) {
        try {
            $this->personaDao->update($persona);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //eliminar a una persona a la base de datos
    //***********************************************************

    public function delete(Persona $persona) {
        try {
            $this->personaDao->delete($persona);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consulta a una persona a la base de datos
    //***********************************************************

    public function searchById(Persona $persona) {
        try {
            return $this->personaDao->searchById($persona);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consultar todas las persona de la base de datos
    //***********************************************************

    public function getAll() {
        try {
            return $this->personaDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

}