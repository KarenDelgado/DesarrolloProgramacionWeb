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
	<title>PRODUCTOS | BTR</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
	<link rel="stylesheet" href="css/Formato1.css" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/Archivo.js"></script>
</head>
<body onload="nobackbutton();">
	<img src="img/Fondo.jpg" alt="fondo" class="fondo">
    <header>
        <div class="container">
            <div class="name"> <img class="logo" src="img/Logo.png"> &nbsp; </div>
        </div>
        <nav id="site-nav" class="site-nav">
            <ul>
                <li><a href="Inicio.php"><i class="fa fa-home"></i> INICIO</a></li>
                <li><a id="actual" href="Productos.php"><i class="fa fa-shopping-bag"></i> PRODUCTOS</a></li>
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
        <br><br>
        <h1><b>PEDIDO REALIZADO</b></h1>

        <?php
            /*echo $_POST['producto'];*/
            include("conexion.php");
            $link=conexion();

            $id = $_POST['id_producto'];
            $preorden = mysqli_query($link, "SELECT Nombre, Precio, Cantidad FROM `producto` WHERE id_producto = '$id'");
            $ver = mysqli_fetch_array($preorden);

            $comprador = mysqli_query($link, "SELECT * FROM `cliente` WHERE Nick = '$usuario'");
            $mostrar = mysqli_fetch_array($comprador);
            
            $id_comprador = $mostrar['id_cliente'];
            
            $nombre = $ver['Nombre'];
            $precio = $ver ['Precio'];
            $stock = $ver ['Cantidad'];
            $cantidad = $_POST['cantidad_producto'];
            $total = $cantidad * $precio;
            $numorden = $_POST['orden'];
            $fecha_actual = date('Y-m-d');
            $restante = $stock - $cantidad;
            /*echo 'Nombre: '.$nombre.', precio: '.$precio.', descripcion: '.$desc.', marca: '.$marca.' c:';*/
            $insertar = "insert into pedido (id_cliente, id_producto, fecha_pedido, precio_total, unidades, codigo) values ('$id_comprador','$id','$fecha_actual','$total','$cantidad','$numorden')"; 
            $actualizar = "update `producto` set `Cantidad`= '$restante' WHERE `id_producto` = '$id'";
            
            $verificar_codigo = mysqli_query($link, "select * from pedido where codigo = '$numorden'");
            
            if (mysqli_num_rows($verificar_codigo) > 0) {
                echo '<script src="js/sweetalert5.js"></script>';
                exit;
            } 
        
            $resultado1 = mysqli_query($link, $insertar);
            $resultado2 = mysqli_query($link, $actualizar);
            mysqli_close($link);
        ?>

        <p class="pMedio">¡Gracias por tu pedido!<br>Puede pasar a recorgerlo en nuestra sucursal de acuerdo al horario disponible.</p><br>

        <div class="preorden">
                <?php
                    //Agregamos la libreria para genera códigos QR
                    require "phpqrcode/qrlib.php";    
                    
                    //Declaramos una carpeta temporal para guardar la imagenes generadas
                    $dir = 'codes/';
                    
                    //Si no existe la carpeta la creamos
                    if (!file_exists($dir))
                        mkdir($dir);
                    
                    //Parametros de Condiguración
                    
                    $tamaño = 10; //Tamaño de Pixel
                    $level = 'H'; //Precisión Baja
                    $framSize = 3; //Tamaño en blanco
                    $contenido = $_POST['orden']; //Texto
                    
                    //Declaramos la ruta y nombre del archivo a generar
                    $filename = $dir.'orden '.$contenido.'.png';
                 

                        //Enviamos los parametros a la Función para generar código QR 
                    QRcode::png($contenido, $filename, $level, $tamaño, $framSize); 
                    
                        //Mostramos la imagen generada
                    echo '<div class="ajustar"><img src="'.$dir.basename($filename).'" class="img_orden"></div>';  
                ?>
            <div class="ajustar">
                <p class="detalle_preorden"><strong>Número de orden: </strong>  <?php echo $numorden; ?> </p>
                <p class="detalle_preorden"><strong>Detalles del pedido: </strong><?php echo $nombre; ?>, <?php 
                        if($cantidad == 1){
                            echo $cantidad.' Pieza';
                        } else {
                            echo $cantidad.' Piezas';
                        }
                    ?>, $<?php echo $precio; ?> MXN c/u 
                </p>
                <p class="detalle_preorden"><strong>Total: </strong>$<?php echo $total; ?> MXN</p>
                <p class="detalle_preorden"><strong>Nota: </strong>No olvides guardar el codigo QR o el número de orden para recoger tu pedido</p>
            </div>
        </div>

        <br><br><br><a href="Productos.php" class="ver_mas">SIGUE VIENDO NUESTROS PRODUCTOS</a><br><br>

    </div><br>

    <div class="footer">
        <img class="logoFooter" src="img/Logo.png">
        <h2>Copyright © Todos los derechos reservados.</h2>
    </div>
</body>
</html>