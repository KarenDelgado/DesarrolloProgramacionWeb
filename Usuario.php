<?php

session_start();
$usuario = $_SESSION['username'];

if(!isset($usuario)){
    header("location: Iniciar Sesion.php");
} 
?>

<!DOCTYPE html>
<html>
<head>
	<title>USUARIO | BTR</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
	<link rel="stylesheet" href="css/Formato1.css" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/Archivo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body onload="nobackbutton();">
    <img class="fondo" src="./img/Fondo.jpg" alt="Fondo">
    <header>
        <div class="container">
            <a title="Inicio" href="Inicio.php"><img class="logo" src="./img/Logo.png" alt="Logo Principal"></a>
        </div>
        <nav id="site-nav" class="site-nav">
            <ul>
                <li><a href="Inicio.php"><i class="fa fa-home"></i> INICIO</a></li>
                <li><a href="Productos.php"><i class="fa fa-shopping-bag"></i> PRODUCTOS</a></li>
                <li><a href="Contacto.php"><i class="fas fa-headset"></i> CONTACTO</a></li>
                <li><a id="actual" href="Usuario.php"><i class="fas fa-user"></i> <?php echo $usuario; ?></a></li>
                <li><a href="salir.php"><i class="fas fa-sign-out-alt"></i> CERRAR SESIÓN</a></li>
            </ul>
        </nav>
        <div id="menu-toggle" class="menu-toggle" onClick="cambiarClase()">
            <div class="hamburger"></div>
        </div>
    </header>
    
    <div class="encabezado">
        <h1 id="saludo_usuario">BIENVENIDO <?php echo $usuario; ?></h1>
        <p class="pEntrada">Puede modificar sus datos sí así lo desea y consultar detalles de los pedidos que ha realizado.</p><br>
        <img id="perfil" src="./img/cheems_perfil.jpg" alt="Perfil Cheems">
        <h2>DATOS PERSONALES</h2>
        <div class="formulario" id="vista_datos">
            <?php
            include("conexion.php");
            $link=conexion();

            $datos_usuario = mysqli_query($link, "SELECT id_cliente, Telefono, Correo, Contra FROM `cliente` WHERE Nick = '$usuario'");
            $cargar_usuario = mysqli_fetch_array($datos_usuario);
            $cel = $cargar_usuario['Telefono'];
            $correo = $cargar_usuario['Correo'];
            $pass = $cargar_usuario['Contra'];
            ?>

            <div class="row">
                <div class="col-25">
                    <label>Usuario:</label>
                </div>
                <div class="col-75">
                    <input type="text" class="duser" value="<?php echo $usuario; ?>" disabled><br>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label>Correo:</label>
                </div>
                <div class="col-75">
                    <input type="text" class="duser" value="<?php echo $correo; ?>" disabled><br>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label>Contraseña:</label>
                </div>
                <div class="col-75">
                    <input type="password" class="duser" value="<?php echo $pass; ?>" disabled><br>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label>Teléfono:</label>
                </div>
                <div class="col-75">
                    <input type="text" class="duser" value="<?php echo $cel; ?>" disabled>
                </div>
            </div>
        </div>
    </div> 
    
    <div class="footer">
        <img class="logoFooter" src="./img/Logo.png" alt="Logo Footer">
        <h2>Copyright © Todos los derechos reservados.</h2>
    </div>
</body>
</html>