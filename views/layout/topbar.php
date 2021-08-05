<!--Comienca el main-->
<div class="main color-base">

<!--Comienza TopBar-->
<div class="topbar color-light">
    <div class="toggle" onclick="toggleMenu()">
        <span class="icon "><i class="las la-bars"></i></span>
    </div>
    
    <div class="profile">
        <div class="user">
            <img src="img/logo2.jpg" alt="">
        </div>
        <div class="username ">
            <small class="text-dark"><?php echo $_SESSION['usuario'] ?></small>
        </div>
    </div>
</div>
<!--Termina TopBar-->
<div class="container">