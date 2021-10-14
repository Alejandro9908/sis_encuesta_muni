<?php 
    $rol = $_SESSION['rol'];

?>

<body>
    <div class="container-all">
        <!--Menu de navegacion-->
        <div class="navigation color-main">
            <ul>
                <li class="color-main">
                    <a href="#">
                        <span class="icon"><i class="las la-landmark"></i></span>
                        <span class="title">
                            <h2>Muni Gualán</h2>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="index.php">
                        <span class="icon"><i class="las la-chart-bar"></i></i></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="createBoleta.php">
                        <span class="icon"><i class="las la-file-medical"></i></span>
                        <span class="title">Nueva boleta</span>
                    </a>
                </li>
                <li>
                    <a href="indexPoblacion.php">
                        <span class="icon"><i class="las la-male"></i></i></span>
                        <span class="title">Reporte por población</span>
                    </a>
                </li>
                <li>
                    <a href="indexFamilia.php">
                        <span class="icon"><i class="las la-home"></i></span>
                        <span class="title">Reporte por familias</span>
                    </a>
                </li>
                <li>
                    <a href="indexComunidad.php">
                        <span class="icon"><i class="las la-map-marker"></i></span>
                        <span class="title">Comunidades</span>
                    </a>
                </li>
                <li>
                    <a href="showMiUsuario.php?id_usuario=<?php echo $_SESSION['id_usuario'] ?>">
                        <span class="icon"><i class="las la-user"></i></span>
                        <span class="title">Mi usuario</span>
                    </a>
                </li>
                <li>
                    <?php if($rol != 1){ ?>
                    <a href="indexUsuario.php">
                        <span class="icon"><i class="las la-users"></i></span>
                        <span class="title">Usuarios</span>
                    </a>
                    <?php } ?>
                </li>
                <li>
                    <a href="login.php?cerrar_sesion=true">
                        <span class="icon"><i class="las la-sign-out-alt"></i></span>
                        <span class="title">Cerrar Sesión</span>
                    </a>
                </li>
                <hr>
                
                <li>
                    <a href="#">
                        <span class="icon"><i class="las la-info-circle"></i></span>
                        <span class="title">Manual de usuario</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="las la-question-circle"></i></span>
                        <span class="title">Acerca de</span>
                    </a>
                </li>
            </ul>
        </div>
        <!--Termina menu de navegacion-->