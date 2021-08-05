<?php
    session_start();
    $cerrar_sesion = (isset($_GET['cerrar_sesion']));
    if($cerrar_sesion){
      session_destroy();
    }
    include_once 'views/layout/header.php';
?>

<body>
    <div class="fondo-gradient">
        <div class="box-login">
            <div class="lheader">
                <h1 class="text-primary">Iniciar Sesión</h1>
            </div>
            <div class="lcontent">
                <form role="form" name="loginUsuario" id="loginUsuario" method="POST" action="controllers/usuarioProcesos.php" class="form">
                    <div class="form-item-log">
                        <label for="txt_usuario" class="text-gray">Usuario</label>
                        <input type="text" id="txt_usuario" name="txt_usuario" placeholder="Ingrese su usuario">
                    </div>
                    <div class="form-item-log">
                        <label for="txt_password" class="text-gray">Constraseña</label>
                        <input type="password" id="txt_password" name="txt_password"  placeholder="Constraseña de usuario">
                    </div>
                    <div class="form-btn">
                        <input type="hidden" name="registro" value="login">
                        <input type="submit" value="Acceder" class="enviar color-primary text-light">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/funcionesPlantilla.js"></script>
    <script src="js/app.js"></script>
    <script src="js/usuarioEventos.js"></script>
</body>

</html>