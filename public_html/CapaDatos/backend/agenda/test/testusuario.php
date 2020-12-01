<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ("../bo/usuarioBo.php");
require_once ("../domain/usuario.php");

$obj_usuario = new usuario();
$obj_usuario->setidUsuario("1");
$obj_usuario->setContraseña("1234");
$obj_usuario->setFecha_Registro("141120");
$obj_usuario->setFecha_Actualizacion("141120");
$obj_usuario->setPersona_idPersona(3);
$obj_usuario->setTipo_Usuario("Cliente");


$bo_usuario = new UsuarioBo();

$operacion = 1; //variable para pruebas

switch ($operacion) {
    case 1: //Prueba para guardar en la base de datos
        $bo_usuario->add($obj_usuario);
        echo("<h1>Prueba de agregar exitosa</h1>");
    break;

    case 2: //Prueba para modificar en la base de datos
        $bo_usuario->update($obj_usuario);
        echo("<h1>Prueba de modificar exitosa</h1>");
    break;

    case 3: //Prueba para eliminar en la base de datos
        $bo_usuario->delete($obj_usuario);
        echo("<h1>Prueba de eliminar exitosa</h1>");
    break;

    case 4: //Prueba para consultar en la base de datos
        $usuarioConsultada = $bo_usuario->searchById($obj_usuario);
        echo("<h1>Prueba de consultar por ID exitosa exitosa</h1>");
        echo (json_encode($usuarioConsultada));
    break;

    case 5: //Prueba para consultar todos en la base de datos
        $resutlado = $bo_usuario->getAll();
        echo("<h1>Prueba de consultar todos los registros exitosa</h1>");
        echo (json_encode($resutlado->GetArray()));
    break;

    default:
    break;
}


