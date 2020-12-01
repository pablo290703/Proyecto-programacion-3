<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ("../bo/reservacionesBo.php");
require_once ("../domain/reservaciones.php");

$obj_reservaciones = new reservaciones();
$obj_reservaciones->setidReservaciones(1);
$obj_reservaciones->setusuario_idUsuario("1");
$obj_reservaciones->setvuelo_idVuelo(1);
$obj_reservaciones->setFecha_Reservacion("20200312");
$obj_reservaciones->setNumero_Fila("2");
$obj_reservaciones->setNumero_Asiento("3");


$bo_reservaciones = new ReservacionesBo();

$operacion = 1; //variable para pruebas

switch ($operacion) {
    case 1: //Prueba para guardar en la base de datos
        $bo_reservaciones->add($obj_reservaciones);
        echo("<h1>Prueba de agregar exitosa</h1>");
    break;

    case 2: //Prueba para modificar en la base de datos
        $bo_reservaciones->update($obj_reservaciones);
        echo("<h1>Prueba de modificar exitosa</h1>");
    break;

    case 3: //Prueba para eliminar en la base de datos
        $bo_reservaciones->delete($obj_reservaciones);
        echo("<h1>Prueba de eliminar exitosa</h1>");
    break;

    case 4: //Prueba para consultar en la base de datos
        $reservacionesConsultada = $bo_reservaciones->searchById($obj_reservaciones);
        echo("<h1>Prueba de consultar por ID exitosa exitosa</h1>");
        echo (json_encode($reservacionesConsultada));
    break;

    case 5: //Prueba para consultar todos en la base de datos
        $resutlado = $bo_reservaciones->getAll();
        echo("<h1>Prueba de consultar todos los registros exitosa</h1>");
        echo (json_encode($resutlado->GetArray()));
    break;

    default:
    break;
}





