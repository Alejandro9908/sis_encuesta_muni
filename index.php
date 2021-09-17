<?php 
    //include ("constantes.php");

    include_once ('routes.php');
    include_once ("controllers/sesiones.php");
    include_once 'views/layout/header.php';
    include_once 'views/layout/sidebar.php';
    include_once 'views/layout/topbar.php';
    include_once ('controllers/conteoController.php');

    $controlador = new conteoController();
    

    /*if(!isset($_GET['b'])){
        $_GET['b'] = "";
    }

    $buscar = $_GET['b'];*/

    $total_registros_persona = $controlador->contarRegistrosPersonas("%%","%%");
    $total_registros_mujeres = $controlador->contarRegistrosMujeres("%%","%%");
    $total_registros_hombres = $controlador->contarRegistrosHombres("%%","%%");
    $total_registros_familia = $controlador->contarRegistrosFamilias("%%","%%");


?>



<div class="content-wrapper">
    <div class="content-header">
        <h2>Dashboard</h2>
    </div>
    <!--Termina content-heaer-->
    <div class="content">

        <div class="cardBox">

            <div class="card color-light">
                <div>
                    <div class="cardTitle text-gray">
                        Personas
                    </div>
                    <div class="cardContent text-gray-dark">
                        <?php echo $total_registros_persona; ?>
                    </div>
                </div>
                <div class="cardIcon"><i class="las la-user-alt text-success"></i></div>
            </div>

            <div class="card color-light">
                <div>
                    <div class="cardTitle text-gray">
                        Familias
                    </div>
                    <div class="cardContent text-gray-dark">
                        <?php echo $total_registros_familia; ?>
                    </div>
                </div>
                <div class="cardIcon"><i class="las la-user-friends text-danger"></i></div>
            </div>

            <div class="card color-light">
                <div>
                    <div class="cardTitle text-gray">
                        Hombres
                    </div>
                    <div class="cardContent text-gray-dark">
                        <?php echo $total_registros_hombres; ?>
                    </div>
                </div>
                <div class="cardIcon"><i class="las la-male text-warning"></i></div>
            </div>

            <div class="card color-light">
                <div>
                    <div class="cardTitle text-gray">
                        Mujeres
                    </div>
                    <div class="cardContent text-gray-dark">
                        <?php echo $total_registros_mujeres; ?>
                    </div>
                </div>
                <div class="cardIcon"><i class="las la-female text-info"></i></div>
            </div>

        </div>
        <!--Termina CardBox-->

        <div class="row">
            <div class="box scroll color-light">
                <div class="box-header">
                    <h2>Tabla</h2>
                    <a href="#" class="btn color-success text-light">Ver todo</a>
                </div>
                <table class="table">
                    <thead>
                        <td>Column1</td>
                        <td>Column2</td>
                        <td>Column3</td>
                        <td>Column4</td>
                    </thead>
                    <tbody>
                        <tr>
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
                        </tr>
                        <tr>
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
                        </tr>
                    </tbody>
                </table>

                <div class="box-footer">

                </div>
            </div>

            <div class="box scroll color-light">
                <div class="box-header">
                    <h3>Tabla</h3>
                    <a href="#" class="btn color-info">Ver todo</a>
                </div>

                <table class="table">
                    <thead>
                        <td>Column1</td>
                        <td>Column2</td>
                        <td>Column3</td>

                    </thead>
                    <tbody>
                        <tr>
                            <td>dato1</td>
                            <td>dato1</td>
                            <td>dato1</td>

                        </tr>
                        <tr>
                            <td>dato1</td>
                            <td>dato1</td>
                            <td>dato1</td>

                        </tr>
                        <tr>
                            <td>dato1</td>
                            <td>dato1</td>
                            <td>dato1</td>

                        </tr>
                        <tr>
                            <td>dato1</td>
                            <td>dato1</td>
                            <td>dato1</td>

                        </tr>
                    </tbody>
                </table>

                <div class="box-footer">

                </div>
            </div>
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