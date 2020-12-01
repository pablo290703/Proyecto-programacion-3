<div class="row">
    <div class="col-md-12">
        <form role="form" onsubmit="return false;" id="formPersona" action="../backend/controller/personaController.php">
            <div class="row">
                <!-- ******************************************************** -->
                <!-- Campos de formulario      -->
                <!-- ******************************************************** -->
                <div class="col-md-12">

                    <div class="form-group" id="groupidPersona">
                        <label for="txtidPersona">idPersona</label>
                        <input type="text" class="form-control" id="txtidPersona"  placeholder="Cédula">
                    </div>
                    <div class="form-group" id="groupnombre">
                        <label for="txtNombre">Nombre</label>
                        <input type="text" class="form-control" id="txtNombre"  placeholder="Nombre">
                    </div>
                    <div class="form-group" id="groupapellido1">
                        <label for="txtApellido1">Primer Apellido</label>
                        <input type="text" class="form-control" id="txtApellido1"  placeholder="Primer Apellido">
                    </div>
                    <div class="form-group" id="groupapellido2">
                        <label for="txtApellido2">Segundo Apellido</label>
                        <input type="text" class="form-control" id="txtApellido2"  placeholder="Segundo Apellido">
                    </div>
                    <div class="form-group" id="groupfecNacimiento">
                        <label for="txtFecha_Nacimiento">Fecha Nacimiento</label>
                        <input type="text" class="form-control" id="txtFecha_Nacimiento"  placeholder="Fec. Nacimiento">
                    </div>
                    <div class="form-group" id="groupsexo">
                        <label for="txtCorreo_Electronico">Correo_Electronico</label>
                        <input type="text" class="form-control" id="txtsexo"  placeholder="Correo_Elecctronico">
                    </div>
                    <div class="form-group" id="groupobservaciones">
                        <label for="txtDireccion">Direccion</label>
                        <input type="text" class="form-control" id="txtobservaciones"  placeholder="Direccion">
                    </div>
                    
                    <div class="form-group" id="groupobservaciones">
                        <label for="txtTelefono">Telefono</label>
                        <input type="text" class="form-control" id="txtobservaciones"  placeholder="Telefono">
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="typeAction" value="add_persona" />
                        <button type="submit" class="btn btn-primary" id="enviar">Guardar</button>
                        <button type="reset" class="btn btn-danger" id="cancelar">Cancelar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<br>
<h3>Tabla con informacion de persona</h3>

<br><br>
<div class="row">
    <div class="col-md-12">
        <table id="dt_persona"  class="table  table-hover dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>CEDULA</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO1</th>
                    <th>APELLIDO2</th>
                    <th>FEC. NACIMIENTO</th>
                    <th>CORREO_ELECTRONICO</th>
                    <th>DIRRECION</th>
                    <th>TELEFONO</th>
                     <th>ACCION</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<br><br><br><br>
<?php
include_once("template/templateFooter.php");

