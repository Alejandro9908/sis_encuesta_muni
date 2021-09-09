<?php 
    include_once 'controllers/sesiones.php';
    include_once 'views/layout/header.php';
    include_once 'views/layout/sidebar.php';
    include_once 'views/layout/topbar.php';
    include_once 'controllers/enfermedadController.php';
?>



<div class="content-wrapper">
    <div class="content-header">
        <h2>Nueva Boleta</h2>
    </div>
    <!--Termina content-heaer-->

    <div class="content">
        <div class="row">
            <!--Empieza estrutura familiar-->
            <div class="box color-light">
                <div class="box-header">
                    <h2>1. Estructura familiar</h2>
                    <form role="form" name="addPersona" id="addPersona" method="POST"
                        action="controllers/usuarioProcesos.php">
                    <div>
                        <label><input type="checkbox" id="cbox_entrevistado" value="1"> Entrevistado</label><br>
                        <input type="hidden" id="txt_entrevistado" name="txt_entrevistado">
                    </div>
                </div>
                <!--Formulario para añadir persona-->
                <div class="form-container">
                    <form role="form" name="addPersona" id="addPersona" method="POST"
                        action="controllers/usuarioProcesos.php">
                        <div class="form-row-4">
                            <div class="form-item">
                                <label for="txt_nombre" class="text-gray">Nombres</label>
                                <input type="text" id="txt_nombres" name="txt_nombres" required value="Ale"
                                    class="form-control" placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_nombre" class="text-gray">Primer apellido</label>
                                <input type="text" id="txt_primer_apellido" name="txt_primer_apellido" required value="Cas"
                                    class="form-control" placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_nombre" class="text-gray">Segundo apellido</label>
                                <input type="text" id="txt_segundo_apellido" name="txt_segundo_apellido" value="Pad"
                                    class="form-control" placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_sexo" class="text-gray">Sexo</label>
                                <select required class="form-control" name="txt_sexo" id="txt_sexo">
                                    <option value="" disabled selected>Seleccione una opción</option> 
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                            </div>
                            <div class="form-item">
                                <label for="txt_fecha_nacimiento" class="text-gray">Fecha de nacimiento</label>
                                <input type="date" id="txt_fecha_nacimiento" name="txt_fecha_nacimiento" value=""
                                    class="form-control" placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_edad" class="text-gray">Edad</label>
                                <input type="number" id="txt_edad" name="txt_edad" min="0" required value="21"
                                    class="form-control" placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_dpi" class="text-gray">DPI</label>
                                <input type="text" id="txt_dpi" name="txt_dpi" value="1234123451234"
                                    class="form-control" placeholder="" minlength="13" maxlength="13">
                            </div>
                            <div class="form-item">
                                <label for="txt_estado_civil" class="text-gray">Estado Civil</label>
                                <select required class="form-control" name="txt_estado_civil" id="txt_estado_civil">
                                    <option value="" disabled selected>Seleccione una opción</option>    
                                    <option value="soltero">Soltero</option>
                                    <option value="casado">Casado</option>
                                    <option value="divorciado">Divorciado</option>
                                </select>
                            </div>
                            <div class="form-item">
                                <label for="txt_escolaridad" class="text-gray">Escolaridad</label>
                                <select required class="form-control" name="txt_escolaridad" id="txt_escolaridad">
                                    <option value="" disabled selected>Seleccione una opción</option>
                                    <option value="sin estudios">Sin estudio</option>
                                    <option value="primaria">Nivel primario</option>
                                    <option value="basico">Nivel básico</option>
                                    <option value="diversificado">Nivel diversificado</option>
                                    <option value="universitario">Nivel universitario</option>
                                </select>
                            </div>
                            <div class="form-item">
                                <label for="txt_ocupacion" class="text-gray">Ocupacion</label>
                                <input type="text" id="txt_ocupacion" name="txt_ocupacion" value="Estudiante"
                                    class="form-control" placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_telefono" class="text-gray">Teléfono</label>
                                <input type="text" id="txt_telefono" name="txt_telefono" value="52525252"
                                    class="form-control" placeholder="" minlength="8" maxlength="8">
                            </div>
                            <div class="form-item" id="div-gestacion">
                                <label for="txt_gestacion" class="text-gray">Gestación</label>
                                <select class="form-control" name="txt_gestacion" id="txt_gestacion">
                                    <option value="0" selected>No</option>
                                    <option value="1">Si</option>
                                </select>
                            </div>
                            <div class="form-item" id="div-semanas-gestacion">
                                <label for="txt_semanas_gestacion" class="text-gray">Semanas de gestación</label>
                                <input type="number" id="txt_semanas_gestacion" name="txt_semanas_gestacion" required value="0"
                                    class="form-control" placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_ingreso_mensual" class="text-gray">Ingreso Mensual</label>
                                <input type="number" step="0.01" id="txt_ingreso_mensual" name="txt_ingreso_mensual" required value="3000"
                                    class="form-control" placeholder="" min="0.00">
                            </div>
                        </div>
                        <div class="form-row-2">
                            <div class="form-item">
                                <label for="txt_enfermedad" class="text-gray">Enfermedades <a href="#" id="addEnfermedad" class="btn color-primary" style="padding: 0px 2px;"><i class="las la-plus text-light"></i></a></label>
                                <select class="select-multiple" name="enfermedades[]" id="txt_enfermedad" multiple>
                
                                </select>
                            </div>
                            <div class="form-item">
                                <label for="txt_discapacidad" class="text-gray">Discapacidades <a href="#" id="addDiscapacidad" class="btn color-primary" style="padding: 0px 2px;"><i class="las la-plus text-light"></i></a></label>
                                <select class="select-multiple" name="discapacidades[]" id="txt_discapacidad" multiple>

                                </select>
                            </div>
                        </div>
                        <div class="form-footer">
                            <input type="hidden" name="registro" value="guardar">
                            <input type="submit" value="Añadir" class="color-primary text-light">
                            <input type="reset" value="Cancelar" class="color-danger text-light">
                        </div>
                    </form>
                </div>
                <!--Termina formulario para añadir persona-->

                <!--Empieza tabla de personas añadidas-->
                <div class="scroll-x">
                    <table class="table">
                        <thead>
                            <td>ENTREVISTADO</td>
                            <td>NOMBRE</td>
                            <td>DPI</td>
                            <td>OPCIONES</td>
                        </thead>
                        <tbody id="listaPersonas">
                        </tbody>
                    </table>
                </div>
                <!--termina tabla de personas añadidas-->
            </div>
            <!--Termina estructura familiar-->

            <!--empieza identificacion domiciliaria-->
            <div class="box color-light">
                <div class="box-header">
                    <h2>2. Identificación domiciliaria</h2>
                    <div>

                    </div>
                </div>
                <div class="form-contaniter">
                    <div class="form-row-2">
                        <div class="form-item">
                            <label for="txt_sector" class="text-gray">Sector</label>
                            <select class="form-control" name="txt_sector" id="txt_sector">
                                <option value="">Masculino</option>
                                <option value="">Femenino</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_comunidad" class="text-gray">Comunidad</label>
                            <select class="form-control" name="txt_comunidad" id="txt_comunidad">
                                <option value="">Masculino</option>
                                <option value="">Femenino</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_direccion" class="text-gray">Dirección</label>
                            <input type="text" id="txt_direccion" name="txt_direccion" required value="" class="form-control"
                                placeholder="">
                        </div>
                        <div class="form-item">
                            <label for="txt_numero_casa" class="text-gray">Numero de casa</label>
                            <input type="text" id="txt_numero_casa" name="txt_numero_casa" value="" class="form-control"
                                placeholder="">
                        </div>
                    </div>
                    <div class="form-row-3">
                        <div class="form-item">
                            <label for="txt_colindantes" class="text-gray">Colindantes</label>
                            <input type="text" id="txt_colindantes" name="txt_colindantes" value="" class="form-control"
                                placeholder="">
                        </div>
                        <div class="form-item">
                            <label for="txt_latitud" class="text-gray">Latitud</label>
                            <input type="text" id="txt_latitud" name="txt_latitud" value="" class="form-control"
                                placeholder="">
                        </div>
                        <div class="form-item">
                            <label for="txt_longitud" class="text-gray">Longitud</label>
                            <input type="text" id="txt_longitud" name="txt_longitud" value="" class="form-control"
                                placeholder="">
                        </div>
                    </div>
                    <div class="form-row-2">
                        <div class="form-item">
                            <label for="txt_telefono" class="text-gray">Telefono</label>
                            <input type="text" id="txt_telefono" name="txt_telefono" value="" class="form-control"
                                placeholder="">
                        </div>
                        <div class="form-item">
                            <label for="txt_transporte" class="text-gray">Medios de transporte para llegar al
                                domicilio <a href="#" id="addTransporte" class="btn color-primary" style="padding: 0px 2px;"><i class="las la-plus text-light"></i></a></label>
                            <select class="select-multiple" name="transportes[]" id="txt_transporte" multiple>

                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!--termina identificacion domiciliaria-->

            <!--empieza egresos-->
            <div class="box color-light">
                <div class="box-header">
                    <h2>3. Egresos mensuales de la familia</h2>
                    <div>
                        
                    </div>
                </div>
                <div class="form-contaniter">
                    <div class="form-row-4">
                        
                        <div class="form-item">
                            <label for="txt_alimentacion" class="text-gray">Alimentación</label>
                            <input type="number" step="0.01" id="txt_alimentacion" name="txt_alimentacion" required value="" class="form-control"
                                placeholder="" min="0.00">
                        </div>
                        <div class="form-item">
                            <label for="txt_gas" class="text-gray">Gas o combustible</label>
                            <input type="number" step="0.01" id="txt_gas" name="txt_gas" value="" class="form-control"
                                placeholder="" min="0.00">
                        </div>
        
                        <div class="form-item">
                            <label for="txt_renta" class="text-gray">Renta</label>
                            <input type="number" step="0.01" id="txt_renta" name="txt_renta" value="" class="form-control"
                                placeholder="" min="0.00">
                        </div>
                        <div class="form-item">
                            <label for="txt_agua" class="text-gray">Agua</label>
                            <input type="number" step="0.01" id="txt_agua" name="txt_agua" value="" class="form-control"
                                placeholder="" min="0.00">
                        </div>
                        <div class="form-item">
                            <label for="txt_electricidad" class="text-gray">Electricidad</label>
                            <input type="number" step="0.01" id="txt_electricidad" name="txt_electricidad" value="" class="form-control"
                                placeholder="" min="0.00">
                        </div>
                        <div class="form-item">
                            <label for="txt_telefono_residencial" class="text-gray">Telefono Residencial</label>
                            <input type="number" step="0.01" id="txt_telefono_residencial" name="txt_telefono_residencial" value="" class="form-control"
                                placeholder="" min="0.00">
                        </div>
                        <div class="form-item">
                            <label for="txt_telefono_celular" class="text-gray">Telefono Celular</label>
                            <input type="number" step="0.01" id="txt_telefono_celular" name="txt_telefono_celular" value="" class="form-control"
                                placeholder="" min="0.00">
                        </div>
                        <div class="form-item">
                            <label for="txt_transporte" class="text-gray">Transporte</label>
                            <input type="number" step="0.01" id="txt_transporte" name="txt_transporte" value="" class="form-control"
                                placeholder="" min="0.00">
                        </div>
                        <div class="form-item">
                            <label for="txt_educacion" class="text-gray">Educación</label>
                            <input type="number" step="0.01" id="txt_educacion" name="txt_educacion" value="" class="form-control"
                                placeholder="" min="0.00">
                        </div>
                        <div class="form-item">
                            <label for="txt_medicos" class="text-gray">Gastos Médicos</label>
                            <input type="number" step="0.01" id="txt_medicos" name="txt_medicos" value="" class="form-control"
                                placeholder="" min="0.00">
                        </div>
                        <div class="form-item">
                            <label for="txt_gastos_recreacion" class="text-gray">Recreación</label>
                            <input type="number" step="0.01" id="txt_gastos_recreacion" name="txt_gastos_recreacion" value="" class="form-control"
                                placeholder="" min="0.00">
                        </div>
                        <div class="form-item">
                            <label for="txt_cable" class="text-gray">Cable</label>
                            <input type="number" step="0.01" id="txt_cable" name="txt_cable" value="" class="form-control"
                                placeholder="" min="0.00">
                        </div>
                        <div class="form-item">
                            <label for="txt_ropa_calzado" class="text-gray">Ropa y Calzado</label>
                            <input type="number" step="0.01" id="txt_ropa_calzado" name="txt_ropa_calzado" value="" class="form-control"
                                placeholder="" min="0.00">
                        </div>
                        <div class="form-item">
                            <label for="txt_fondos_ahorro" class="text-gray">Fondos de ahorro</label>
                            <input type="number" step="0.01" id="txt_fondos_ahorro" name="txt_fondos_ahorro" value="" class="form-control"
                                placeholder="" min="0.00">
                        </div>
                        <div class="form-item">
                            <label for="txt_creditos" class="text-gray">Creditos</label>
                            <input type="number" step="0.01" id="txt_creditos" name="txt_creditos" value="" class="form-control"
                                placeholder="" min="0.00">
                        </div>
                    </div>
                    
                        
                        

                </div>
            </div>
            <!--termina egresos-->

            <!--empieza vivienda-->
            <div class="box color-light">
                <div class="box-header">
                    <h2>4. Vivienda</h2>
                    <div>
                        
                    </div>
                </div>
                <div class="form-contaniter">
                    <div class="form-row-4">
                        <div class="form-item">
                            <label for="txt_tenencia" class="text-gray">Tenencia</label>
                            <select class="form-control" name="txt_tenencia" id="txt_tenencia">
                                <option value="">Propia</option>
                                <option value="">Rentada</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_numero_dormitorios" class="text-gray">Numero de dormitorios</label>
                            <input type="number" id="txt_numero_dormitorios" name="txt_numero_dormitorios" value="" class="form-control"
                                placeholder="">
                        </div>
        
                        <div class="form-item">
                            <label for="txt_sala" class="text-gray">¿Cuenta con sala?</label>
                            <select class="form-control" name="txt_sala" id="txt_sala">
                                <option value="">Si</option>
                                <option value="">No</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_comedor" class="text-gray">¿Cuenta con comedor?</label>
                            <select class="form-control" name="txt_comedor" id="txt_comedor">
                                <option value="">Si</option>
                                <option value="">No</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_cocina" class="text-gray">¿Cuenta con cocina?</label>
                            <select class="form-control" name="txt_cocina" id="txt_cocina">
                                <option value="">Si</option>
                                <option value="">No</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_banio_privado" class="text-gray">¿Cuenta con baño privado?</label>
                            <select class="form-control" name="txt_banio_privado" id="txt_banio_privado">
                                <option value="">Si</option>
                                <option value="">No</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_banio_colectivo" class="text-gray">¿Cuenta con baño colectivo?</label>
                            <select class="form-control" name="txt_banio_colectivo" id="txt_banio_colectivo">
                                <option value="">Si</option>
                                <option value="">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row-1">
                        <div class="form-item">
                            <label for="txt_observaciones_vivienda" class="text-gray">Observaciones</label>
                            <input type="text" id="txt_observaciones_vivienda" name="txt_observaciones_vivienda" value="" class="form-control"
                                placeholder="">
                        </div>
                    </div>
                    <div class="form-row-4">
                        <div class="form-item">
                            <label for="txt_pared" class="text-gray">Material predominante pared <a href="#" class="btn color-primary" id="addPared" style="padding: 0px 2px;"><i class="las la-plus text-light"></i></a></label>
                            <select class="form-control" name="txt_pared" id="txt_pared">

                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_techo" class="text-gray">Material predominante techo <a href="#" class="btn color-primary" id="addTecho" style="padding: 0px 2px;"><i class="las la-plus text-light"></i></a></label>
                            <select class="form-control" name="txt_techo" id="txt_techo">

                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_piso" class="text-gray">Material predominante piso <a href="#" class="btn color-primary" id="addPiso" style="padding: 0px 2px;"><i class="las la-plus text-light"></i></a></label>
                            <select class="form-control" name="txt_piso" id="txt_piso">

                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_mobiliario" class="text-gray">Mobiliario y equipo <a href="#" id="addMobiliario" class="btn color-primary" style="padding: 0px 2px;"><i class="las la-plus text-light"></i></a></label>
                            <select class="select-multiple" name="mobiliarios[]" id="txt_mobiliario" multiple>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_servicio" class="text-gray">Servicio básico <a href="#" id="addServicio" class="btn color-primary" style="padding: 0px 2px;"><i class="las la-plus text-light"></i></a></label>
                            <select class="select-multiple" name="servicios[]" id="txt_servicio" multiple>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_sanitario" class="text-gray">Tipo de sanitario <a href="#" class="btn color-primary" style="padding: 0px 2px;"><i class="las la-plus text-light"></i></a></label>
                            <select class="select-multiple" name="sanitarios[]" id="txt_sanitario" multiple>
                                <option value="1">Lavable</option>
                                <option value="2">Letrina</option>
                                <option value="3">Pozo ciego</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_eliminacion_basura" class="text-gray">Eliminación de basura</label>
                            <input type="text" id="txt_eliminacion_basura" name="txt_eliminacion_basura" value="" class="form-control"
                                placeholder="">
                        </div>
                    </div>
                </div>
            </div>
            <!--termina vivienda-->

            <!--empieza salud-->
            <div class="box color-light">
                <div class="box-header">
                    <h2>5. Salud</h2>
                    <div>
                        
                    </div>
                </div>
                <div class="form-contaniter">
                    <div class="form-row-2">
                        <div class="form-item">
                            <label for="txt_servicio_medico" class="text-gray">Servicios Medicos <a href="#" id="addServicioMedico" class="btn color-primary" style="padding: 0px 2px;"><i class="las la-plus text-light"></i></a></label>
                            <select class="select-multiple" name="servicios_medicos[]" id="txt_servicio_medico" multiple>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_frecuencia_medico" class="text-gray">Fecuencia de uso de servicio medicos</label>
                            <select class="form-control" name="txt_frecuencia_medico" id="txt_frecuencia_medico">
                                <option value="">Mensualmente</option>
                                <option value="">Anualmente</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!--termina salud-->

            <!--empieza alimentacion-->
            <div class="box color-light">
                <div class="box-header">
                    <h2>6. Alimentación</h2>
                    <div>
                        
                    </div>
                </div>
                <div class="form-contaniter">
                    <div class="form-row-4">
                        <div class="form-item">
                            <label for="txt_carne_res" class="text-gray">Carne de res</label>
                            <select class="form-control" name="txt_carne_res" id="txt_carne_res">
                                <option value="4">Diario</option>
                                <option value="3">Cada tres días</option>
                                <option value="2">Una vez a la semana</option>
                                <option value="1">Cada vez al mes</option>
                                <option value="0">Nunca</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_carne_pollo" class="text-gray">Carne de pollo</label>
                            <select class="form-control" name="txt_carne_pollo" id="txt_carne_pollo">
                                <option value="4">Diario</option>
                                <option value="3">Cada tres días</option>
                                <option value="2">Una vez a la semana</option>
                                <option value="1">Cada vez al mes</option>
                                <option value="0">Nunca</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_carne_cerdo" class="text-gray">Carne de cerdo</label>
                            <select class="form-control" name="txt_carne_cerdo" id="txt_carne_cerdo">
                                <option value="4">Diario</option>
                                <option value="3">Cada tres días</option>
                                <option value="2">Una vez a la semana</option>
                                <option value="1">Cada vez al mes</option>
                                <option value="0">Nunca</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_carne_pescado" class="text-gray">Carne de pescado</label>
                            <select class="form-control" name="txt_carne_pescado" id="txt_carne_pescado">
                                <option value="4">Diario</option>
                                <option value="3">Cada tres días</option>
                                <option value="2">Una vez a la semana</option>
                                <option value="1">Cada vez al mes</option>
                                <option value="0">Nunca</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_leche" class="text-gray">Leche</label>
                            <select class="form-control" name="txt_leche" id="txt_leche">
                                <option value="4">Diario</option>
                                <option value="3">Cada tres días</option>
                                <option value="2">Una vez a la semana</option>
                                <option value="1">Cada vez al mes</option>
                                <option value="0">Nunca</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_cereales" class="text-gray">Cereales</label>
                            <select class="form-control" name="txt_cereales" id="txt_cereales">
                                <option value="4">Diario</option>
                                <option value="3">Cada tres días</option>
                                <option value="2">Una vez a la semana</option>
                                <option value="1">Cada vez al mes</option>
                                <option value="0">Nunca</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_huevos" class="text-gray">Huevos</label>
                            <select class="form-control" name="txt_huevos" id="txt_huevos">
                                <option value="4">Diario</option>
                                <option value="3">Cada tres días</option>
                                <option value="2">Una vez a la semana</option>
                                <option value="1">Cada vez al mes</option>
                                <option value="0">Nunca</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_frutas" class="text-gray">Frutas</label>
                            <select class="form-control" name="txt_frutas" id="txt_frutas">
                                <option value="4">Diario</option>
                                <option value="3">Cada tres días</option>
                                <option value="2">Una vez a la semana</option>
                                <option value="1">Cada vez al mes</option>
                                <option value="0">Nunca</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_verduras" class="text-gray">Verduras</label>
                            <select class="form-control" name="txt_verduras" id="txt_verduras">
                                <option value="4">Diario</option>
                                <option value="3">Cada tres días</option>
                                <option value="2">Una vez a la semana</option>
                                <option value="1">Cada vez al mes</option>
                                <option value="0">Nunca</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_leguminosas" class="text-gray">Leguminosas</label>
                            <select class="form-control" name="txt_leguminosas" id="txt_leguminosas">
                                <option value="4">Diario</option>
                                <option value="3">Cada tres días</option>
                                <option value="2">Una vez a la semana</option>
                                <option value="1">Cada vez al mes</option>
                                <option value="0">Nunca</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!--termina alimentacion-->

            <!--empieza recreacion-->
            <div class="box color-light">
                <div class="box-header">
                    <h2>7. Recreación y uso del tiempo libre</h2>
                    <div>
                        
                    </div>
                </div>
                <div class="form-contaniter">
                    <div class="form-row-1">
                        <div class="form-item">
                            <label for="txt_recreacion" class="text-gray">Activiades familiariares del fin de semana <a href="#" id="addRecreacion" class="btn color-primary" style="padding: 0px 2px;"><i class="las la-plus text-light"></i></a></label>
                            <select class="select-multiple" name="recreaciones[]" id="txt_recreacion" multiple>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!--termina recreacion-->

            <!--empieza observaciones-->
            <div class="box color-light">
                <div class="box-header">
                    <h2>8. Observaciones</h2>
                    <div>
                        
                    </div>
                </div>
                <div class="form-contaniter">
                    <div class="form-row-1">
                        <div class="form-item">
                            <label for="txt_observaciones_encuesta" class="text-gray">Observaciones</label>
                            <input type="text" id="txt_observaciones_encuesta" name="txt_observaciones_encuesta" required value=""
                            class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="form-row-2">
                        <div class="form-item">
                            <label for="txt_evaluador" class="text-gray">Evaluador</label>
                            <input type="text" id="txt_evaluador" name="txt_evaluador" required value=""
                            class="form-control" placeholder="">
                        </div>
                        <div class="form-item">
                            <label for="txt_fecha_evaluacion" class="text-gray">Fecha de evaluación</label>
                            <input type="date" id="txt_fecha_evaluacion" name="txt_fecha_evaluacion" required value=""
                            class="form-control" placeholder="">
                        </div>
                    </div>
                </div>
            </div>
            <!--termina observaciones-->

        </div>
        <!--Termina row-->

        <div class="content-footer">
            <div class="form-footer">
                <form role="form" name="crearBoleta" id="crearBoleta" method="POST" action="controllers/boletaProcesos.php">
                    <input type="hidden" name="registro" value="guardar">
                    <input type="submit" value="Guardar Boleta" class="color-primary text-light">
                    <input type="reset" value="Cancelar" class="color-danger text-light">
                </form>
            </div>
        </div>
        <!--Termina content-footer-->
    </div>
    <!--Termina content-->
</div>
<!--Termina content-wraper-->

<?php 
    include_once 'views/layout/footer.php';
?>