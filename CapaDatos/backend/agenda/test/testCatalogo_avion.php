<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ("../bo/catalogo_avionBo.php");
require_once ("../domain/catalogo_avion.php");

$obj_catalogo_avion = new catalogo_avion();
$obj_catalogo_avion->setidCatalogo_Avion(3  );
$obj_catalogo_avion->setAño("20001110");
$obj_catalogo_avion->setModelo("xlm");
$obj_catalogo_avion->setMarca("Comercial");
$obj_catalogo_avion->setCantidad_Filas("50");
$obj_catalogo_avion->setAsientos_por_Fila("4");


$bo_catalogo_avion = new Catalogo_avionBo();

$operacion = 1; //variable para pruebas

switch ($operacion) {
    case 1: //Prueba para guardar en la base de datos
        $bo_catalogo_avion->add($obj_catalogo_avion);
        echo("<h1>Prueba de agregar exitosa</h1>");
    break;

    case 2: //Prueba para modificar en la base de datos
        $bo_catalogo_avion->update($obj_catalogo_avion);
        echo("<h1>Prueba de modificar exitosa</h1>");
    break;

    case 3: //Prueba para eliminar en la base de datos
        $bo_catalogo_avion->delete($obj_catalogo_avion);
        echo("<h1>Prueba de eliminar exitosa</h1>");
    break;

    case 4: //Prueba para consultar en la base de datos
        $catalogo_avionConsultada = $bo_catalogo_avion->searchById($obj_catalogo_avion);
        echo("<h1>Prueba de consultar por ID exitosa exitosa</h1>");
        echo (json_encode($catalogo_avionConsultada));
    break;

    case 5: //Prueba para consultar todos en la base de datos
        $resutlado = $bo_catalogo_avion->getAll();
        echo("<h1>Prueba de consultar todos los registros exitosa</h1>");
        echo (json_encode($resutlado->GetArray()));
    break;

    default:
    break;
}




