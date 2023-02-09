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
	<title>CONTACTO | BTR</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
	<link rel="stylesheet" href="css/Formato1.css" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/Archivo.js"></script>
</head>
<body onload="nobackbutton();">
	<img src="./img/Fondo.jpg" alt="fondo" class="fondo">
    <header>
        <div class="container">
            <div class="name"> <img class="logo" src="./img/Logo.png" alt="Logo Principal"> &nbsp; </div>
        </div>
        <nav id="site-nav" class="site-nav">
            <ul>
                <li><a href="Inicio.php"><i class="fa fa-home"></i> INICIO</a></li>
                <li><a href="Productos.php"><i class="fa fa-shopping-bag"></i> PRODUCTOS</a></li>
                <li><a id="actual" href="Contacto.php"><i class="fas fa-headset"></i> CONTACTO</a></li>
                <li><a href="Construccion.php"><i class="fas fa-user"></i> <?php echo $usuario; ?></a></li>
                <li><a href="salir.php"><i class="fas fa-sign-out-alt"></i> CERRAR SESIÓN</a></li>
            </ul>
        </nav>
        <div id="menu-toggle" class="menu-toggle" onClick="cambiarClase()">
            <div class="hamburger"></div>
        </div>
    </header>
    
    <div class="encabezado">
        <br><br><br>
        <h1>CONTACTO</h1>
        <h2> Muchas gracias por tus comentarios.</h2>
        <div class="intro">
          <img class="envio" src="./img/cheems_operador.png" alt="Cheems Operador">
        </div>

        <?php
            include("conexion.php");
            $link=conexion();

            $comentario = mysqli_query($link, "SELECT Nombre, Apellido_P, Apellido_M, Correo FROM `cliente` WHERE Nick = '$usuario'");
            $mostrar = mysqli_fetch_array($comentario);
            
            $nombre = $mostrar['Nombre'];
            $apellido_paterno = $mostrar ['Apellido_P'];
            $apellido_materno = $mostrar ['Apellido_M'];
            $correo = $mostrar ['Correo'];

            /*echo 'Nombre: '.$nombre.', apellido_paterno: '.$apellido_paterno.', apellido_materno: '.$apellido_materno.', correo: '.$correo.' c:';*/
            /*$nombre=$_POST['nombre'];
            $apellido_paterno=$_POST['apellido1'];
            $apellido_materno=$_POST['apellido2'];
            $correo=$_POST['correo'];*/
            $estado = $_POST['estado'];
            $comentario = $_POST['comentario'];
                
            mysqli_query($link, "insert into comentario (nombre, apellido_p, apellido_m, correo, estado, comentario) values ('$nombre','$apellido_paterno','$apellido_materno','$correo','$estado','$comentario')");     
            mysqli_close($link);    
        ?>

        
        <p class="pMedio"><b>Email:</b> ihelpcontactos@gmail.com y tolamacontactos@gmail.com</p>
        <p class="pMedio"><b>Teléfono:</b> 3320 32 08 91</p>
        <br><p class="pMedio">Síguenos en nuestras redes sociales</p>
        <a title="Facebook" href="https://www.facebook.com/Reparacion-de-Celulares-Puebla-IHelp-115050856703997" target="_blank"><img src="./img/facebook.png" class="redes" alt="Facebook"></a>
        <a title="Instagram" href="https://www.instagram.com/beto_tolama69/" target="_blank"><img src="./img/instagram.png" class="redes" alt="Instagram"></a>
        
        <br><hr><br><br>
        <h1>VISITANOS</h1>
        <p class="pMedio">Ven y conoce nuestra tienda</p>
        <p class="pMedio">Calle 14 Oriente No. 205, Colonia San Juan Aquiahuac,<br>San Andrés Cholula, Puebla</p><br>
        <p class="pMedio">Horario de Lunes a Viernes</p>
        <p class="pMedio">11:00 a 19:00</p>
        <p class="pMedio">Sabados</p>
        <p class="pMedio">11:00 a 16:00</p><br>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d942.7942262650058!2d-98.29480887083848!3d19.05595809919372!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85cfc6317270ac7f%3A0x114be633c5c702a1!2sCalle%2014%20Ote%20205%2C%20San%20Juan%20Aquiahuac%2C%2072810%20San%20Andr%C3%A9s%20Cholula%2C%20Pue.!5e0!3m2!1ses-419!2smx!4v1615499711287!5m2!1ses-419!2smx"></iframe>
        <br><br>
    </div>
    
    <div class="footer">
        <img class="logoFooter" src="./img/Logo.png" alt="Logo Footer">
        <h2>Copyright © Todos los derechos reservados.</h2>
    </div>

    
</body>
</html>