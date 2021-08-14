<?php 
    
    include_once 'controllers/sesiones.php';
    include_once 'views/layout/header.php';
    include_once 'views/layout/sidebar.php';
    include_once 'views/layout/topbar.php';
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
                    <div>
                        <!--boton a la derecha-->
                    </div>
                </div>
                <!--Formulario para añadir persona-->
                <div class="form-container">
                    <form role="form" name="crearRegistro" id="crearRegistro" method="POST"
                        action="controllers/usuarioProcesos.php">
                        <div class="form-row-4">
                            <div class="form-item">
                                <label for="txt_nombre" class="text-gray">Nombre Completo</label>
                                <input type="text" id="txt_nombre" name="txt_nombre" required value=""
                                    class="form-control" placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_usuario" class="text-gray">Sexo</label>
                                <select class="form-control" name="txt_rol" id="txt_rol">
                                    <option value="">Masculino</option>
                                    <option value="">Femenino</option>
                                </select>
                            </div>
                            <div class="form-item">
                                <label for="txt_usuario" class="text-gray">Fecha de nacimiento</label>
                                <input type="date" id="txt_usuario" name="txt_usuario" required value=""
                                    class="form-control" placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_usuario" class="text-gray">Edad</label>
                                <input type="text" id="txt_usuario" name="txt_usuario" required value=""
                                    class="form-control" placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_usuario" class="text-gray">DPI</label>
                                <input type="text" id="txt_usuario" name="txt_usuario" required value=""
                                    class="form-control" placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_usuario" class="text-gray">Estado Civil</label>
                                <input type="text" id="txt_usuario" name="txt_usuario" required value=""
                                    class="form-control" placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_usuario" class="text-gray">Escolaridad</label>
                                <input type="text" id="txt_usuario" name="txt_usuario" required value=""
                                    class="form-control" placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_usuario" class="text-gray">Ocupacion</label>
                                <input type="text" id="txt_usuario" name="txt_usuario" required value=""
                                    class="form-control" placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_usuario" class="text-gray">Teléfono</label>
                                <input type="text" id="txt_usuario" name="txt_usuario" required value=""
                                    class="form-control" placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_usuario" class="text-gray">Gestación</label>
                                <input type="text" id="txt_usuario" name="txt_usuario" required value=""
                                    class="form-control" placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_usuario" class="text-gray">Semanas</label>
                                <input type="text" id="txt_usuario" name="txt_usuario" required value=""
                                    class="form-control" placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_usuario" class="text-gray">Ingreso Mensual</label>
                                <input type="text" id="txt_usuario" name="txt_usuario" required value=""
                                    class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="form-row-2">
                            <div class="form-item">
                                <label for="txt_usuario" class="text-gray">Enfermedades <a href="indexUsuario.php" class="btn color-primary" style="padding: 0px 2px;"><i class="las la-plus text-light"></i></a></label>
                                <select class="select-multiple" name="transportes[]" id="txt_transporte" multiple>
                                    <option value="1">Bus</option>
                                    <option value="2">Carro</option>
                                    <option value="3">Moto</option>
                                </select>
                            </div>
                            <div class="form-item">
                                <label for="txt_usuario" class="text-gray">Discapacidades <a href="indexUsuario.php" class="btn color-primary" style="padding: 0px 2px;"><i class="las la-plus text-light"></i></a></label>
                                <select class="select-multiple" name="transportes[]" id="txt_transporte" multiple>
                                    <option value="1">Bus</option>
                                    <option value="2">Carro</option>
                                    <option value="3">Moto</option>
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
                            <td>NOMBRE</td>
                            <td>SEXO</td>
                            <td>EDAD</td>
                            <td>FECHA NACIMIENTO</td>
                            <td>DPI</td>
                            <td>ESTADO CIVIL</td>
                            <td>ESCOLARIDAD</td>
                            <td>OCUPACION</td>
                            <td>TELEFONO</td>
                            <td>DISCAPACIDADES</td>
                            <td>INGRESO MENSUAL</td>
                            <td>ENFERMEDADES</td>
                            <td>GESTACION</td>
                            <td>OPCIONES</td>
                        </thead>
                        <tbody>
                            <tr>
                                <td>dato1</td>
                                <td>dato1</td>
                                <td>dato1</td>
                                <td>dato1</td>
                                <td>dato1</td>
                                <td>dato1</td>
                                <td>dato1</td>
                                <td>dato1</td>
                                <td>dato1</td>
                                <td>dato1</td>
                                <td>dato1</td>
                                <td>dato1</td>
                                <td>dato1</td>
                            </tr>
                            <tr>
                                <td>dato1</td>
                                <td>dato1</td>
                                <td>dato1</td>
                                <td>dato1</td>
                                <td>dato1</td>
                                <td>dato1</td>
                                <td>dato1</td>
                                <td>dato1</td>
                                <td>dato1</td>
                                <td>dato1</td>
                                <td>dato1</td>
                                <td>dato1</td>
                                <td>dato1</td>
                            </tr>
                            <tr>
                                <td>dato1</td>
                                <td>dato1</td>
                                <td>dato1</td>
                                <td>dato1</td>
                                <td>dato1</td>
                                <td>dato1</td>
                                <td>dato1</td>
                                <td>dato1</td>
                                <td>dato1</td>
                                <td>dato1</td>
                                <td>dato1</td>
                                <td>dato1</td>
                                <td>dato1</td>
                            </tr>
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
                        <a href="#" class="btn color-primary text-light agregar_persona">Añadir persona</a>
                    </div>
                </div>
                <div class="form-contaniter">
                    <div class="form-row-2">
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Sector</label>
                            <select class="form-control" name="txt_rol" id="txt_rol">
                                <option value="">Masculino</option>
                                <option value="">Femenino</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Comunidad</label>
                            <select class="form-control" name="txt_rol" id="txt_rol">
                                <option value="">Masculino</option>
                                <option value="">Femenino</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Dirección</label>
                            <input type="text" id="txt_nombre" name="txt_nombre" required value="" class="form-control"
                                placeholder="">
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Numero de casa</label>
                            <input type="text" id="txt_nombre" name="txt_nombre" value="" class="form-control"
                                placeholder="">
                        </div>
                    </div>
                    <div class="form-row-3">
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Colindantes</label>
                            <input type="text" id="txt_nombre" name="txt_nombre" value="" class="form-control"
                                placeholder="">
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Latitud</label>
                            <input type="text" id="txt_nombre" name="txt_nombre" value="" class="form-control"
                                placeholder="">
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Longitud</label>
                            <input type="text" id="txt_nombre" name="txt_nombre" value="" class="form-control"
                                placeholder="">
                        </div>
                    </div>
                    <div class="form-row-2">
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Telefono</label>
                            <input type="text" id="txt_nombre" name="txt_nombre" value="" class="form-control"
                                placeholder="">
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Medios de transporte para llegar al
                                domicilio <a href="indexUsuario.php" class="btn color-primary" style="padding: 0px 2px;"><i class="las la-plus text-light"></i></a></label>
                            <select class="select-multiple" name="transportes[]" id="txt_transporte" multiple>
                                <option value="1">Bus</option>
                                <option value="2">Carro</option>
                                <option value="3">Moto</option>
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
                            <label for="txt_nombre" class="text-gray">Alimentación</label>
                            <input type="number" id="txt_nombre" name="txt_nombre" required value="" class="form-control"
                                placeholder="">
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Gas o combustible</label>
                            <input type="number" id="txt_nombre" name="txt_nombre" value="" class="form-control"
                                placeholder="">
                        </div>
        
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Renta</label>
                            <input type="number" id="txt_nombre" name="txt_nombre" value="" class="form-control"
                                placeholder="">
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Agua</label>
                            <input type="number" id="txt_nombre" name="txt_nombre" value="" class="form-control"
                                placeholder="">
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Electricidad</label>
                            <input type="number" id="txt_nombre" name="txt_nombre" value="" class="form-control"
                                placeholder="">
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Telefono Residencial</label>
                            <input type="number" id="txt_nombre" name="txt_nombre" value="" class="form-control"
                                placeholder="">
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Telefono Celular</label>
                            <input type="number" id="txt_nombre" name="txt_nombre" value="" class="form-control"
                                placeholder="">
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Transporte</label>
                            <input type="number" id="txt_nombre" name="txt_nombre" value="" class="form-control"
                                placeholder="">
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Educación</label>
                            <input type="number" id="txt_nombre" name="txt_nombre" value="" class="form-control"
                                placeholder="">
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Gastos Médicos</label>
                            <input type="number" id="txt_nombre" name="txt_nombre" value="" class="form-control"
                                placeholder="">
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Recreación</label>
                            <input type="number" id="txt_nombre" name="txt_nombre" value="" class="form-control"
                                placeholder="">
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Cable</label>
                            <input type="number" id="txt_nombre" name="txt_nombre" value="" class="form-control"
                                placeholder="">
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Ropa y Calzado</label>
                            <input type="number" id="txt_nombre" name="txt_nombre" value="" class="form-control"
                                placeholder="">
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Fondos de ahorro</label>
                            <input type="number" id="txt_nombre" name="txt_nombre" value="" class="form-control"
                                placeholder="">
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Creditos</label>
                            <input type="number" id="txt_nombre" name="txt_nombre" value="" class="form-control"
                                placeholder="">
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
                            <label for="txt_nombre" class="text-gray">Tenencia</label>
                            <select class="form-control" name="txt_rol" id="txt_rol">
                                <option value="">Propia</option>
                                <option value="">Rentada</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Numero de dormitorios</label>
                            <input type="number" id="txt_nombre" name="txt_nombre" value="" class="form-control"
                                placeholder="">
                        </div>
        
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">¿Cuenta con sala?</label>
                            <select class="form-control" name="txt_rol" id="txt_rol">
                                <option value="">Si</option>
                                <option value="">No</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">¿Cuenta con comedor?</label>
                            <select class="form-control" name="txt_rol" id="txt_rol">
                                <option value="">Si</option>
                                <option value="">No</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">¿Cuenta con cocina?</label>
                            <select class="form-control" name="txt_rol" id="txt_rol">
                                <option value="">Si</option>
                                <option value="">No</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">¿Cuenta con baño privado?</label>
                            <select class="form-control" name="txt_rol" id="txt_rol">
                                <option value="">Si</option>
                                <option value="">No</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">¿Cuenta con baño colectivo?</label>
                            <select class="form-control" name="txt_rol" id="txt_rol">
                                <option value="">Si</option>
                                <option value="">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row-1">
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Observaciones</label>
                            <input type="text" id="txt_nombre" name="txt_nombre" value="" class="form-control"
                                placeholder="">
                        </div>
                    </div>
                    <div class="form-row-4">
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Material predominante pared <a href="indexUsuario.php" class="btn color-primary" style="padding: 0px 2px;"><i class="las la-plus text-light"></i></a></label>
                            <select class="form-control" name="txt_rol" id="txt_rol">
                                <option value="">Propia</option>
                                <option value="">Rentada</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Material predominante techo <a href="indexUsuario.php" class="btn color-primary" style="padding: 0px 2px;"><i class="las la-plus text-light"></i></a></label>
                            <select class="form-control" name="txt_rol" id="txt_rol">
                                <option value="">Propia</option>
                                <option value="">Rentada</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Material predominante piso <a href="indexUsuario.php" class="btn color-primary" style="padding: 0px 2px;"><i class="las la-plus text-light"></i></a></label>
                            <select class="form-control" name="txt_rol" id="txt_rol">
                                <option value="">Propia</option>
                                <option value="">Rentada</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_usuario" class="text-gray">Mobiliario y equipo <a href="indexUsuario.php" class="btn color-primary" style="padding: 0px 2px;"><i class="las la-plus text-light"></i></a></label>
                            <select class="select-multiple" name="muebles[]" id="txt_transporte" multiple>
                                <option value="1">Closet</option>
                                <option value="2">Sofá</option>
                                <option value="3">Mesa y sillas</option>
                                <option value="4">Cama</option>
                                <option value="5">Gabinete</option>
                                <option value="6">Television</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_usuario" class="text-gray">Servicio básico <a href="indexUsuario.php" class="btn color-primary" style="padding: 0px 2px;"><i class="las la-plus text-light"></i></a></label>
                            <select class="select-multiple" name="muebles[]" id="txt_transporte" multiple>
                                <option value="1">Agua</option>
                                <option value="2">Drenaje</option>
                                <option value="3">Luz</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_usuario" class="text-gray">Tipo de sanitario <a href="indexUsuario.php" class="btn color-primary" style="padding: 0px 2px;"><i class="las la-plus text-light"></i></a></label>
                            <select class="select-multiple" name="muebles[]" id="txt_transporte" multiple>
                                <option value="1">Lavable</option>
                                <option value="2">Letrina</option>
                                <option value="3">Pozo ciego</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Eliminación de basura</label>
                            <input type="text" id="txt_nombre" name="txt_nombre" value="" class="form-control"
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
                            <label for="txt_nombre" class="text-gray">Servicios de salud <a href="indexUsuario.php" class="btn color-primary" style="padding: 0px 2px;"><i class="las la-plus text-light"></i></a></label>
                            <select class="form-control" name="txt_rol" id="txt_rol">
                                <option value="">Propia</option>
                                <option value="">Rentada</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Fecuencia de uso de servicio medicos</label>
                            <select class="form-control" name="txt_rol" id="txt_rol">
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
                            <label for="txt_nombre" class="text-gray">Carne de res</label>
                            <select class="form-control" name="txt_rol" id="txt_rol">
                                <option value="">Diario</option>
                                <option value="">Cada tres días</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Carne de pollo</label>
                            <select class="form-control" name="txt_rol" id="txt_rol">
                                <option value="">Diario</option>
                                <option value="">Cada tres días</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Carne de cerdo</label>
                            <select class="form-control" name="txt_rol" id="txt_rol">
                                <option value="">Diario</option>
                                <option value="">Cada tres días</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Carne de pescado</label>
                            <select class="form-control" name="txt_rol" id="txt_rol">
                                <option value="">Diario</option>
                                <option value="">Cada tres días</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Leche</label>
                            <select class="form-control" name="txt_rol" id="txt_rol">
                                <option value="">Diario</option>
                                <option value="">Cada tres días</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Cereales</label>
                            <select class="form-control" name="txt_rol" id="txt_rol">
                                <option value="">Diario</option>
                                <option value="">Cada tres días</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Huevos</label>
                            <select class="form-control" name="txt_rol" id="txt_rol">
                                <option value="">Diario</option>
                                <option value="">Cada tres días</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Frutas</label>
                            <select class="form-control" name="txt_rol" id="txt_rol">
                                <option value="">Diario</option>
                                <option value="">Cada tres días</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Verduras</label>
                            <select class="form-control" name="txt_rol" id="txt_rol">
                                <option value="">Diario</option>
                                <option value="">Cada tres días</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Leguminosas</label>
                            <select class="form-control" name="txt_rol" id="txt_rol">
                                <option value="">Diario</option>
                                <option value="">Cada tres días</option>
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
                            <label for="txt_nombre" class="text-gray">Activiades familiariares del fin de semana <a href="indexUsuario.php" class="btn color-primary" style="padding: 0px 2px;"><i class="las la-plus text-light"></i></a></label>
                            <select class="select-multiple" name="transportes[]" id="txt_transporte" multiple>
                                <option value="">Practicar deporte</option>
                                <option value="">Video juegos</option>
                                <option value="">Visitar familiares y amigos</option>
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
                            <label for="txt_usuario" class="text-gray">Observaciones</label>
                            <input type="text" id="txt_usuario" name="txt_usuario" required value=""
                            class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="form-row-2">
                        <div class="form-item">
                            <label for="txt_usuario" class="text-gray">Evaluador</label>
                            <input type="text" id="txt_usuario" name="txt_usuario" required value=""
                            class="form-control" placeholder="">
                        </div>
                        <div class="form-item">
                            <label for="txt_usuario" class="text-gray">Fecha de evaluación</label>
                            <input type="date" id="txt_usuario" name="txt_usuario" required value=""
                            class="form-control" placeholder="">
                        </div>
                    </div>
                </div>
            </div>
            <!--termina observaciones-->

        </div>
        <!--Termina row-->

        <div class="content-footer">

        </div>
        <!--Termina content-footer-->
    </div>
    <!--Termina content-->
</div>
<!--Termina content-wraper-->

<?php 
    include_once 'views/layout/footer.php';
?>