<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ("../bo/personaBo.php");
require_once ("../domain/persona.php");

$obj_persona = new persona();
$obj_persona->setidPersona(3);
$obj_persona->setNombre("Luis");
$obj_persona->setApellido1("alfaro");
$obj_persona->setApellido2("castro");
$obj_persona->setFecha_Nacimiento("19950709");
$obj_persona->setCorreo_Electronico("luis@gmail.com");
$obj_persona->setDireccion("San Jose");
$obj_persona->setLastuser("esolis");
$obj_persona->setTelefono("22442100");
$bo_persona = new PersonaBo();

$operacion = 5; //variable para pruebas

switch ($operacion) {
    case 1: //Prueba para guardar en la base de datos
        $bo_persona->add($obj_persona);
        echo("<h1>Prueba de agregar exitosa</h1>");
    break;

    case 2: //Prueba para modificar en la base de datos
        $bo_persona->update($obj_persona);
        echo("<h1>Prueba de modificar exitosa</h1>");
    break;

    case 3: //Prueba para eliminar en la base de datos
        $bo_persona->delete($obj_persona);
        echo("<h1>Prueba de eliminar exitosa</h1>");
    break;

    case 4: //Prueba para consultar en la base de datos
        $personaConsultada = $bo_persona->searchById($obj_persona);
        echo("<h1>Prueba de consultar por ID exitosa exitosa</h1>");
        echo (json_encode($personaConsultada));
    break;

    case 5: //Prueba para consultar todos en la base de datos
        $resutlado = $bo_persona->getAll();
        echo("<h1>Prueba de consultar todos los registros exitosa</h1>");
        echo (json_encode($resutlado->GetArray()));
    break;

    default:
    break;
}

if (filter_input(INPUT_GET,'idPersona')!== null){
    echo("<BR><BR>El dato enviado es : " . filter_input(INPUT_GET,'idPersona'));
}


