<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ("../bo/rutaBo.php");
require_once ("../domain/ruta.php");

$obj_ruta = new ruta();
$obj_ruta->setidRuta(600);
$obj_ruta->setTrayecto("Mexico-Panama");
$obj_ruta->setDuración("023558");
$obj_ruta->setPrecio("250000");



$bo_ruta = new RutaBo();

$operacion = 5; //variable para pruebas

switch ($operacion) {
    case 1: //Prueba para guardar en la base de datos
        $bo_ruta->add($obj_ruta);
        echo("<h1>Prueba de agregar exitosa</h1>");
    break;

    case 2: //Prueba para modificar en la base de datos
        $bo_ruta->update($obj_ruta);
        echo("<h1>Prueba de modificar exitosa</h1>");
    break;

    case 3: //Prueba para eliminar en la base de datos
        $bo_ruta->delete($obj_ruta);
        echo("<h1>Prueba de eliminar exitosa</h1>");
    break;

    case 4: //Prueba para consultar en la base de datos
        $rutaConsultada = $bo_ruta->searchById($obj_ruta);
        echo("<h1>Prueba de consultar por ID exitosa</h1>");
        echo (json_encode($rutaConsultada));
    break;

    case 5: //Prueba para consultar todos en la base de datos
        $resutlado = $bo_ruta->getAll();
        echo("<h1>Prueba de consultar todos los registros exitosa</h1>");
        echo (json_encode($resutlado->GetArray()));
    break;

    default:
    break;
}






