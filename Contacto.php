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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body onload="carga_estados();">
	<img src="img/Fondo.jpg" alt="fondo" class="fondo">
    <header>
        <div class="container">
            <div class="name"> <img class="logo" src="img/Logo.png"> &nbsp; </div>
        </div>
        <nav id="site-nav" class="site-nav">
            <ul>
                <li><a href="Inicio.php"><i class="fa fa-home"></i> INICIO</a></li>
                <li><a href="Productos.php"><i class="fa fa-shopping-bag"></i> PRODUCTOS</a></li>
                <li><a id="actual" href="Contacto.php"><i class="fas fa-headset"></i> CONTACTO</a></li>
                <li><a href="Usuario.php"><i class="fas fa-user"></i> <?php echo $usuario; ?></a></li>
                <li><a href="salir.php"><i class="fas fa-sign-out-alt"></i> CERRAR SESIÓN</a></li>
            </ul>
        </nav>
        <div id="menu-toggle" class="menu-toggle" onClick="cambiarClase()">
            <div class="hamburger"></div>
        </div>
    </header>
    
    <div class="encabezado">
        <br><br>
        <h1><b>CONTACTO</b></h1>
        <p class="pEntrada">Tus comentarios son muy importantes para nosotros. Mandanos un mensaje si tiene quejas, suguerencias, recomendaciones o aportaciones a nuestros servicios y productos.</p><br>
        <div class="formulario">
        <form action="Comentario_Enviado.php" method="POST" onsubmit="return validar3();">
            <div class="row">
                <div class="col-25">
                    <label>Usuario:</label>
                </div>
                <div class="col-75">
                    <input type="text" name="nombre" id="nombre" class="duser" onkeypress="return soloLetras(event)" value="<?php echo $usuario; ?>" disabled><br>
                </div>
            </div>
            
            <div class="row">
                <div class="col-25">
                    <label>Estado:</label>
                </div>
                <div class="col-75">
                    <select id="estado" name="estado" size="1" placeholder="Elige un estado.."></select><br>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label>Comentarios:</label>
                </div>
                <div class="col-75">
                    <textarea name="comentario" id="comentario" style="height:180px" placeholder="Ingresa tu comentario(s).." ></textarea><br>
                </div>
            </div>
            
            <div class="intro">
                <br><input type="submit" value="Enviar"> 
                <input type="reset" value="Limpiar">
            </div>
            <br><br>
        </form>
        </div>
        
        <p class="pMedio"><b>Email:</b> info@btrofficial.com</p>
        <br><p class="pMedio">Síguenos en nuestras redes sociales</p>
        <a title="Facebook" href="https://www.facebook.com/bigtimerush" target="_blank"><img src="img/facebook.png" class="redes"></a>
        <a title="Twitter" href="https://twitter.com/bigtimerush" target="_blank"><img src="img/twitter.png" class="redes"></a>
        <a title="Instagram" href="https://www.instagram.com/bigtimerush/?hl=en" target="_blank"><img src="img/instagram.png" class="redes"></a>
        <a title="Youtube" href="https://www.youtube.com/user/BIGtimeRUSH" target="_blank"><img src="img/youtube.png" class="redes"></a>
        
        <br><hr><br><br>
        <h1><b>VISITANOS</b></h1>
        <p class="pMedio">Ven y conoce nuestra tienda</p>
        <p class="pMedio">Calle 14 Oriente No. 205, Colonia San Juan Aquiahuac,<br>San Andrés Cholula, Puebla</p><br>
        <p class="pMedio">Horario de Lunes a Viernes</p>
        <p class="pMedio">11:00 a 19:00</p>
        <p class="pMedio">Sabados</p>
        <p class="pMedio">11:00 a 16:00</p><br>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3765.4844094312434!2d-98.24696698583861!3d19.304775249759693!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85cfd9698a4320ef%3A0x3d4bd230384fb07f!2sC.%206%203306%2C%20La%20Loma%20Xicohtencatl%2C%20Xicoht%C3%A9ncatl%2C%2090070%20Tlaxcala%20de%20Xicoht%C3%A9ncatl%2C%20Tlax.!5e0!3m2!1ses-419!2smx!4v1638503528376!5m2!1ses-419!2smx"></iframe>
        <br><br>
    </div>
    
    <div class="footer">
        <img class="logoFooter" src="img/Logo.png">
        <h2>Copyright © Todos los derechos reservados.</h2>
    </div>
</body>
</html>