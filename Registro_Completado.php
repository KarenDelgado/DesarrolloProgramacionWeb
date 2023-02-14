<!DOCTYPE html>
<html>
<head>
	<title>REGISTRO | BTR</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="./css/Formato1.css">
    <link rel="icon" type="image/x-icon" href="./img/favicon.ico">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="./js/Archivo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
    <img class="fondo" src="./img/Fondo.jpg" alt="Fondo">
    <header>
        <div class="container">
            <a title="Inicio" href="index.html"><img class="logo" src="./img/Logo.png" alt="Logo Principal"></a>
        </div>
        <nav id="site-nav" class="site-nav">
            <ul>
                <li><a href="index.html"><i class="fa fa-home"></i> INICIO</a></li>
                <li><a href="Productos.html"><i class="fa fa-shopping-bag"></i> PRODUCTOS</a></li>
                <li><a href="Contacto.html"><i class="fas fa-headset"></i> CONTACTO</a></li>
                <li><a id="actual" href="Iniciar Sesion.php"><i class="fas fa-sign-in-alt"></i> INICIAR SESIÓN | REGISTRARSE</a></li>
            </ul>
        </nav>
        <div id="menu-toggle" class="menu-toggle" onClick="cambiarClase()">
            <div class="hamburger"></div>
        </div>
    </header>
    
    <?php
        include("conexion.php");
        $link=conexion();

        $nombre=$_POST['nombre'];
        $apellido_paterno=$_POST['apellido1'];
        $apellido_materno=$_POST['apellido2'];
        $celular=$_POST['celular'];
        $correo=$_POST['correo'];
        $contra=$_POST['contra'];
        $usuario=$_POST['nick'];
            
        $insertar = "insert into cliente (Nombre, Apellido_P, Apellido_M, Telefono, Correo, Contra, Nick) values ('$nombre','$apellido_paterno','$apellido_materno','$celular','$correo','$contra','$usuario')";     
            
        $verificar_usuario = mysqli_query($link, "select * from cliente where Nick = '$usuario'");
        
        
        if (mysqli_num_rows($verificar_usuario) > 0) {
            echo '<script src="js/sweetalert1.js"></script>';
            exit;
        } 
        
        $verificar_correo = mysqli_query($link, "select * from cliente where Correo = '$correo'");
        if (mysqli_num_rows($verificar_correo) > 0) {
            echo '<script src="js/sweetalert2.js"></script>';
            exit;
        }

        $resultado = mysqli_query($link, $insertar);
        if(!$resultado){
            echo 'Error al registrarse';
        } else {
            echo '';
        }

        mysqli_close($link);
        ?>

    <div class="encabezado">
        <h1><b>REGISTRO</b></h1>
        <h2>¡Muchas gracias!</h2>
        <h2>Tus datos se han registrado correctamente.<br>Inicia sesión para crear y recojer tu paquete.</h2>
        <a href="Iniciar Sesion.php" class="pMedio"><i class="fas fa-user-check"></i> Da clic para iniciar sesión</a>
        <div class="intro">
            <br><img class="envio" src="img/cheems_mmdisimo.png" alt="Cheems Poderoso">
        </div>
    </div>
    
    <div class="footer">
    <img class="logoFooter" src="./img/Logo.png" alt="Logo Footer">
        <h2>Copyright © Todos los derechos reservados.</h2>
    </div>
</body>
</html>