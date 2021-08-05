<?php 
    include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoCensoMuni/routes.php');
    include_once (CONTROLLER_PATH."sesiones.php");
    include_once 'views/layout/header.php';
    include_once 'views/layout/sidebar.php';
    include_once 'views/layout/topbar.php';

    
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
                        20,153
                    </div>
                </div>
                <div class="cardIcon"><i class="las la-user-alt text-success"></i></div>
            </div>



            <div class="card color-light">
                <div>
                    <div class="cardTitle text-gray">
                        Viviendas
                    </div>
                    <div class="cardContent text-gray-dark">
                        5,153
                    </div>
                </div>
                <div class="cardIcon"><i class="las la-home text-danger"></i></div>
            </div>

            <div class="card color-light">
                <div>
                    <div class="cardTitle text-gray">
                        Señores
                    </div>
                    <div class="cardContent text-gray-dark">
                        20,153
                    </div>
                </div>
                <div class="cardIcon"><i class="las la-hiking text-warning"></i></div>
            </div>

            <div class="card color-light">
                <div>
                    <div class="cardTitle text-gray">
                        Graduados
                    </div>
                    <div class="cardContent text-gray-dark">
                        20,153
                    </div>
                </div>
                <div class="cardIcon"><i class="las la-user-graduate text-info"></i></div>
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