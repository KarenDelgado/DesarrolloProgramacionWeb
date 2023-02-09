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
    <!--<script src="js/Archivo.js"></script>-->
</head>
<body>
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
        <h1><b>PRE ORDEN</b></h1>
        <?php
            /*echo $_POST['producto'];*/
            include("conexion.php");
            $link=conexion();

            $id = $_POST['idproducto'];
            $preorden = mysqli_query($link, "SELECT Nombre, Precio FROM `producto` WHERE id_producto = '$id'");
            $ver = mysqli_fetch_array($preorden);
            
            $nombre = $ver['Nombre'];
            $precio = $ver ['Precio'];
            $cantidad = $_POST['cantidad'];
            $total = $cantidad * $precio;
            /*echo 'Nombre: '.$nombre.', precio: '.$precio.', descripcion: '.$desc.', marca: '.$marca.' c:';*/
            
            mysqli_close($link);
        ?>
        <p class="titulo_productos_preorden">COTIZACIÓN DEL PEDIDO</p>
        <form action="Orden.php" method="POST">
            <div id="preorden">
                <div class="ajustar">
                    <?php
                    if($id == 1){
                        echo '<img src="img/productos/producto1.png" class="img_preorden">';
                    } else if($id == 2){
                        echo '<img src="img/productos/producto2.png" class="img_preorden">';
                    } else if($id == 3){
                        echo '<img src="img/productos/producto3.png" class="img_preorden">';
                    } else if($id == 4){
                        echo '<img src="img/productos/producto4.png" class="img_preorden">';
                    } else if($id == 5){
                        echo '<img src="img/productos/producto5.png" class="img_preorden">';
                    } else if($id == 6){
                        echo '<img src="img/productos/producto6.png" class="img_preorden">';
                    } else if($id == 7){
                        echo '<img src="img/productos/producto7.png" class="img_preorden">';
                    } else if($id == 8){
                        echo '<img src="img/productos/producto8.png" class="img_preorden">';
                    } else if($id == 9){
                        echo '<img src="img/productos/producto9.png" class="img_preorden">';
                    } else {
                        echo '<img src="img/cheems_mmdisimo.png">';
                    }
                    ?>
                    <input type="text" name="id_producto" value="<?php echo $id; ?>" class="dato">
                </div>
                <div class="ajustar">
                    <p class="detalle_preorden"><strong>Número de orden: </strong><input type="text" class="dato" name="orden" value="<?php $i = rand(100000,999999); echo $i; ?>" >  <?php echo $i; ?></p><br>
                    <p class="detalle_preorden"><strong>Producto: </strong><?php echo $nombre; ?></p><br>
                    <p class="detalle_preorden"><strong>Precio por unidad: </strong>$<?php echo $precio; ?> MXN</p><br>
                    <p class="detalle_preorden"><input type="text" name="cantidad_producto" value="<?php echo $cantidad; ?>" class="dato">
                        <strong>Cantidad ordenada: </strong><?php 
                        if($cantidad == 1){
                            echo $cantidad.' Pieza';
                        } else {
                            echo $cantidad.' Piezas';
                        }
                    ?></p><br>
                    <p class="detalle_preorden"><strong>Total: </strong>$<?php echo $total; ?> MXN</p><br>
                    <input type="submit" value="REALIZAR PEDIDO">
                </div>
            </div>
        </form><br><br>
        <a href="Productos.php" class="ver_mas">REGRESAR A PRODUCTOS</a><br><br><br>

    </div>

    <div class="footer">
        <img class="logoFooter" src="img/Logo.png">
        <h2>Copyright © Todos los derechos reservados.</h2>
    </div>
</body>
</html>