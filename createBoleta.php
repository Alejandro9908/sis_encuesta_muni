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
            <div class="box color-light">
                <div class="box-header">
                    <h2>1. Estructura familiar</h2>
                    <div>
                        <a href="#" class="btn color-primary text-light agregar_persona">Añadir persona</a>
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
                                <input type="text" id="txt_usuario" name="txt_usuario" required value=""
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
                                <label for="txt_usuario" class="text-gray">Enfermedades</label>
                                <select class="select-multiple" name="transportes[]" id="txt_transporte" multiple>
                                    <option value="1">Bus</option>
                                    <option value="2">Carro</option>
                                    <option value="3">Moto</option>
                                </select>
                            </div>
                            <div class="form-item">
                                <label for="txt_usuario" class="text-gray">Discapacidades</label>
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
            <!--Termina box-->

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
                                placeholder="Ingresar nombre completo">
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Numero de casa</label>
                            <input type="text" id="txt_nombre" name="txt_nombre" value="" class="form-control"
                                placeholder="Ingresar nombre completo">
                        </div>
                    </div>
                    <div class="form-row-3">
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Colindantes</label>
                            <input type="text" id="txt_nombre" name="txt_nombre" value="" class="form-control"
                                placeholder="Ingresar nombre completo">
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Latitud</label>
                            <input type="text" id="txt_nombre" name="txt_nombre" value="" class="form-control"
                                placeholder="Ingresar nombre completo">
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Longitud</label>
                            <input type="text" id="txt_nombre" name="txt_nombre" value="" class="form-control"
                                placeholder="Ingresar nombre completo">
                        </div>
                    </div>
                    <div class="form-row-2">
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Telefono</label>
                            <input type="text" id="txt_nombre" name="txt_nombre" value="" class="form-control"
                                placeholder="Ingresar nombre completo">
                        </div>
                        <div class="form-item">
                            <label for="txt_nombre" class="text-gray">Medios de transporte para llegar al
                                domicilio</label>
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