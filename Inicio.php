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
	<title>INICIO | BTR</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/Formato1.css">
    <link rel="stylesheet" type="text/css" href="./css/Formato2.css">
    <link rel="icon" type="image/x-icon" href="./img/favicon.ico">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="./js/Archivo.js"></script>
</head>
<body>
<img class="fondo" src="./img/Fondo.jpg" alt="Fondo">
    <header>
        <div class="container">
            <a title="Inicio" href="Inicio.php"><img class="logo" src="./img/Logo.png" alt="Logo Principal"></a>
        </div>
        <nav id="site-nav" class="site-nav">
            <ul>
                <li><a id="actual" href="Inicio.php"><i class="fa fa-home"></i> INICIO</a></li>
                <li><a href="Productos.php"><i class="fa fa-shopping-bag"></i> PRODUCTOS</a></li>
                <li><a href="Contacto.php"><i class="fas fa-headset"></i> CONTACTO</a></li>
                <li><a href="Usuario.php"><i class="fas fa-user"></i> <?php echo $usuario; ?></a></li>
                <li><a href="salir.php"><i class="fas fa-sign-out-alt"></i> CERRAR SESIÓN</a></li>
            </ul>
        </nav>
        <div id="menu-toggle" class="menu-toggle" onClick="cambiarClase()">
            <div class="hamburger"></div>
        </div>
    </header>
    
    <div class="encabezado">
        <img id="principal" src="./img/Inicio.png" alt="Portada Principal">
        <hr>
        <h1><b>TOP VENTAS</b></h1>
        <div id="top">
            <div class="ventas">
                <img class="top_img" src="./img/top/producto1.png" alt="Hoodie Black"><br>
                <b class="top_etiqueta">Hoodie Black </b>
            </div>
            <div class="ventas">
                <img class="top_img" src="./img/top/producto5.png" alt="Long Sleeve White"><br>
                <b class="top_etiqueta">Long Sleeve White </b>
            </div>
            <div class="ventas">
                <img class="top_img" src="./img/top/producto9.png" alt="Beanie Red"><br>
                <b class="top_etiqueta">Beanie Red </b>
            </div>
        </div>
        <div>
            <a href="Productos.php" class="ver_mas">VER MAS PRODUCTOS</a>
        </div>    
    </div>
   
    <div class="footer">
        <img class="logoFooter" src="./img/Logo.png" alt="Logo Footer">
        <h2>Copyright © Todos los derechos reservados.</h2>
    </div>
</body>
</html>