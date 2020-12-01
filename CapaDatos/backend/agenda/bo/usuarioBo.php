<?php


require_once("../domain/usuario.php");
require_once("../dao/usuarioDao.php");

/**
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */

class UsuarioBo {

    private $usuarioDao;

    public function __construct() {
        $this->usuarioDao = new UsuarioDao();
    }

    public function getUsuarioDao() {
        return $this->usuarioDao;
    }

    public function setUsuarioDao(UsuarioDao $usuarioDao) {
        $this->usuarioDao = $usuarioDao;
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(Usuario $usuario) {
        try {
            if (!$this->usuarioDao->exist($usuario)) {
                $this->usuarioDao->add($usuario);
            } else {
                throw new Exception("El usuario ya existe en la base de datos!!");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //modifica a una persona a la base de datos
    //***********************************************************

    public function update(Usuario $usuario) {
        try {
            $this->usuarioDao->update($usuario);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //eliminar a una persona a la base de datos
    //***********************************************************

    public function delete(Usuario $usuario) {
        try {
            $this->usuarioDao->delete($usuario);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consulta a una persona a la base de datos
    //***********************************************************

    public function searchById(Usuario $usuario) {
        try {
            return $this->usuarioDao->searchById($usuario);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consultar todas las persona de la base de datos
    //***********************************************************

    public function getAll() {
        try {
            return $this->usuarioDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

}
