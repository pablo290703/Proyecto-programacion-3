<?php

require_once("../bo/personaBo.php");
require_once("../domain/persona.php");


/**
 * This class contain all services methods of the table Persona
 * @author ChGari
 * Date Last  modification: Fri Jul 24 11:28:43 CST 2020
 * Comment: It was created
 *
 */
//************************************************************
// Persona Controller 
//************************************************************

if (filter_input(INPUT_POST, 'action') != null) {
    $action = filter_input(INPUT_POST, 'action');

    try {
        $myPersonaBo = new PersonaBo();
        $myPersona = Persona::createNullPersona();

        //***********************************************************
        //choose the action
        //***********************************************************

        if ($action === "add_persona" or $action === "update_persona") {
            //se valida que los parametros hayan sido enviados por post
            if ((filter_input(INPUT_POST, 'idPersona') != null) && (filter_input(INPUT_POST, 'Nombre') != null) && (filter_input(INPUT_POST, 'Apellido1') != null) && (filter_input(INPUT_POST, 'Apellido2') != null) && (filter_input(INPUT_POST, 'Fecha_Nacimiento') != null) && (filter_input(INPUT_POST, 'Correo_Electronico') != null) && (filter_input(INPUT_POST, 'Direccion') != null) && (filter_input(INPUT_POST, 'Telefono') != null)) {
                $myPersona->setidPersona(filter_input(INPUT_POST, 'idPersona'));
                $myPersona->setNombre(filter_input(INPUT_POST, 'Nombre'));
                $myPersona->setApellido1(filter_input(INPUT_POST, 'Apellido1'));
                $myPersona->setApellido2(filter_input(INPUT_POST, 'Apellido2'));
                $myPersona->setFecha_Nacimiento(filter_input(INPUT_POST, 'Fecha_Nacimiento'));
                $myPersona->setCorreo_Electronico(filter_input(INPUT_POST, 'Correo_Electronico'));
                $myPersona->setDireccion(filter_input(INPUT_POST, 'Direccion'));
                $myPersona->setTelefono(filter_input(INPUT_POST, 'Telefono'));
                $myPersona->setLastUser('112540148');
                if ($action == "add_persona") {
                    $myPersonaBo->add($myPersona);
                    echo('M~Registro Incluido Correctamente');
                }
                if ($action == "update_persona") {
                    $myPersonaBo->update($myPersona);
                    echo('M~Registro Modificado Correctamente');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "showAll_persona") {//accion de consultar todos los registros
            $resultDB   = $myPersonaBo->getAll();
            $json       = json_encode($resultDB->GetArray());
            $resultado = '{"data": ' . $json . '}';
            if($resultDB->RecordCount() === 0){
                $resultado = '{"data": []}';
            }
            echo $resultado;
        }

        //***********************************************************
        //***********************************************************

        
        if ($action === "show_persona") {//accion de mostrar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'idPersona') != null) {
                $myPersona->setidPersona(filter_input(INPUT_POST, 'idPersona'));
                $myPersona = $myPersonaBo->searchById($myPersona);
                if ($myPersona != null) {
                    echo json_encode(($myPersona));
                } else {
                    echo('E~NO Existe un cliente con el ID especificado');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "delete_persona") {//accion de eliminar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'idPersona') != null) {
                $myPersona->setidPersona(filter_input(INPUT_POST, 'idPersona'));
                $myPersonaBo->delete($myPersona);
                echo('M~Registro Fue Eliminado Correctamente');
            }
        }

        //***********************************************************
        //se captura cualquier error generado
        //***********************************************************
    } catch (Exception $e) { //exception generated in the business object..
        echo("E~" . $e->getMessage());
    }
} else {
    echo('M~Parametros no enviados desde el formulario'); //se codifica un mensaje para enviar
}



