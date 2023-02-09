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
        <h1><b>PRODUCTOS</b></h1>
        <p class="pMedio">FEATURED COLLECTION</p><br><br>

        <div id="productos">
            <div class="ajustar">
                <img src="img/productos/producto1.png" class="fotoProducto"><br><br>
                <b class="titulo_productos">Hoodie Black</b><br>
                <b class="titulo_productos">$1000 MXN</b>
                <div class="comprar">
                    <button id="btn-abrir-popup1" class="ver_mas">VER MAS</button>
                </div>
            </div>
            <div class="ajustar">
                <img src="img/productos/producto2.png" class="fotoProducto"><br><br>
                <b class="titulo_productos">Hoodie White</b><br>
                <b class="titulo_productos">$1000 MXN</b>
                <div class="comprar">
                    <button id="btn-abrir-popup2" class="ver_mas">VER MAS</button>
                </div>
            </div>
            <div class="ajustar">
                <img src="img/productos/producto3.png" class="fotoProducto"><br><br>
                <b class="titulo_productos">Sudadera Black</b><br>
                <b class="titulo_productos">$950 MXN</b>
                <div class="comprar">
                    <button id="btn-abrir-popup3" class="ver_mas">VER MAS</button>
                </div>
            </div>
        </div>
        <div id="productos">
            <div class="ajustar">
                <img src="img/productos/producto4.png" class="fotoProducto"><br><br>
                <b class="titulo_productos">Sudadera Red</b><br>
                <b class="titulo_productos">$950 MXN</b>
                <div class="comprar">
                    <button id="btn-abrir-popup4" class="ver_mas">VER MAS</button>
                </div>
            </div>
            <div class="ajustar">
                <img src="img/productos/producto8.png" class="fotoProducto"><br><br>
                <b class="titulo_productos">Gorra Tan</b><br>
                <b class="titulo_productos">$550 MXN</b>
                <div class="comprar">
                    <button id="btn-abrir-popup8" class="ver_mas">VER MAS</button>
                </div>
            </div>
            <div class="ajustar">
                <img src="img/productos/producto9.png" class="fotoProducto"><br><br>
                <b class="titulo_productos">Gorro Red</b><br>
                <b class="titulo_productos">$550 MXN</b>
                <div class="comprar">
                    <button id="btn-abrir-popup9" class="ver_mas">VER MAS</button>
                </div>
            </div>
        </div>
        <div id="productos">
            <div class="ajustar">
                <img src="img/productos/producto5.png" class="fotoProducto"><br><br>
                <b class="titulo_productos">Playera Manga Larga White</b><br>
                <b class="titulo_productos">$950 MXN</b>
                <div class="comprar">
                    <button id="btn-abrir-popup5" class="ver_mas">VER MAS</button>
                </div>
            </div>
            <div class="ajustar">
                <img src="img/productos/producto7.png" class="fotoProducto"><br><br>
                <b class="titulo_productos">Playera Manga Corta Black</b><br>
                <b class="titulo_productos">$750 MXN</b>
                <div class="comprar">
                    <button id="btn-abrir-popup7" class="ver_mas">VER MAS</button>
                </div>
            </div>
            <div class="ajustar">
                <img src="img/productos/producto6.png" class="fotoProducto"><br><br>
                <b class="titulo_productos">Playera Manga Corta Tan</b><br>
                <b class="titulo_productos">$750 MXN</b>
                <div class="comprar">
                    <button id="btn-abrir-popup6" class="ver_mas">VER MAS</button>
                </div>
            </div>
        </div>
        <br><br>

        <!-- Producto 1-->
        <div class="overlay" id="overlay1">
            <div class="popup" id="popup1">
                <a href="#" id="btn-cerrar-popup1" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
                <b class="titulo_productos_modal">Hoodie Black</b><br>
                <form action="Preorden.php" method="POST" onsubmit="return validar_p1();">
                    <div class="datos_ventana">
                        <div>
                            <img src="img/productos/producto1.png" class="fotoProducto_ventana">
                        </div>
                        <div>
                            <input type="text" name="idproducto" value="1" class="dato">
                            <p class="detalle_productos">Sudadera de manga larga color negro, con detalle de estampado, capucha, bolsillo delantero tipo canguro y de algodón.</p><br>
                            <p class="costo_producto">$1000 MXN</p><br>
                            <input type="number" id="cantidad_p1" name="cantidad" min="1" max="10" onKeyDown="return false" placeholder="Ingresa la cantidad"><br><br>
                            <input type="submit" class="btn-submit" value="ENCARGAR">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Producto 2-->
        <div class="overlay" id="overlay2">
            <div class="popup" id="popup2">
                <a href="#" id="btn-cerrar-popup2" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
                <b class="titulo_productos_modal">Hoodie White</b><br>
                <form action="Preorden.php" method="POST" onsubmit="return validar_p2();">
                    <div class="datos_ventana">
                        <div>
                            <img src="img/productos/producto2.png" class="fotoProducto_ventana">
                        </div>
                        <div>
                            <input type="text" name="idproducto" value="2" class="dato">
                            <p class="detalle_productos">Sudadera de manga larga color blanco, con detalle de estampado, capucha, bolsillo delantero tipo canguro y de algodón.</p><br>
                            <p class="costo_producto">$1000 MXN</p><br>
                            <input type="number" id="cantidad_p2" name="cantidad" min="1" max="10" onKeyDown="return false" placeholder="Ingresa la cantidad"><br><br>
                            <input type="submit" class="btn-submit" value="ENCARGAR">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Producto 3-->
        <div class="overlay" id="overlay3">
            <div class="popup" id="popup3">
                <a href="#" id="btn-cerrar-popup3" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
                <b class="titulo_productos_modal">Sudadera Black</b><br>
                <form action="Preorden.php" method="POST" onsubmit="return validar_p3();">
                    <div class="datos_ventana">
                        <div>
                            <img src="img/productos/producto3.png" class="fotoProducto_ventana">
                        </div>
                        <div>
                            <input type="text" name="idproducto" value="3" class="dato">
                            <p class="detalle_productos">Sudadera básica manga larga color negro, con detalle de estampado frontal y en las mangas, de algodón.</p><br>
                            <p class="costo_producto">$950 MXN</p><br>
                            <input type="number" id="cantidad_p3" name="cantidad" min="1" max="10" onKeyDown="return false" placeholder="Ingresa la cantidad"><br><br>
                            <input type="submit" class="btn-submit" value="ENCARGAR">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Producto 4-->
        <div class="overlay" id="overlay4">
            <div class="popup" id="popup4">
                <a href="#" id="btn-cerrar-popup4" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
                <b class="titulo_productos_modal">Sudadera Red</b><br>
                <form action="Preorden.php" method="POST" onsubmit="return validar_p4();">
                    <div class="datos_ventana">
                        <div>
                            <img src="img/productos/producto4.png" class="fotoProducto_ventana">
                        </div>
                        <div>
                            <input type="text" name="idproducto" value="4" class="dato">
                            <p class="detalle_productos">Sudadera básica manga larga color rojo, con detalle de estampado frontal y en las mangas, de algodón.</p><br>
                            <p class="costo_producto">$950 MXN</p><br>
                            <input type="number" id="cantidad_p4" name="cantidad" min="1" max="10" onKeyDown="return false" placeholder="Ingresa la cantidad"><br><br>
                            <input type="submit" class="btn-submit" value="ENCARGAR">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Producto 5-->
        <div class="overlay" id="overlay5">
            <div class="popup" id="popup5">
                <a href="#" id="btn-cerrar-popup5" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
                <b class="titulo_productos_modal">Playera Manga Larga White</b><br>
                <form action="Preorden.php" method="POST" onsubmit="return validar_p5();">
                    <div class="datos_ventana">
                        <div>
                            <img src="img/productos/producto5.png" class="fotoProducto_ventana">
                        </div>
                        <div>
                            <input type="text" name="idproducto" value="5" class="dato">
                            <p class="detalle_productos">Playera manga larga color blanco, con firma en las mangas y logo en la parte frontal, de algodón.</p><br>
                            <p class="costo_producto">$950 MXN</p><br>
                            <input type="number" id="cantidad_p5" name="cantidad" min="1" max="10" onKeyDown="return false" placeholder="Ingresa la cantidad"><br><br>
                            <input type="submit" class="btn-submit" value="ENCARGAR">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Producto 6-->
        <div class="overlay" id="overlay6">
            <div class="popup" id="popup6">
                <a href="#" id="btn-cerrar-popup6" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
                <b class="titulo_productos_modal">Playera Manga Corta Tan</b><br>
                <form action="Preorden.php" method="POST" onsubmit="return validar_p6();">
                    <div class="datos_ventana">
                        <div>
                            <img src="img/productos/producto6.png" class="fotoProducto_ventana">
                        </div>
                        <div>
                            <input type="text" name="idproducto" value="6" class="dato">
                            <p class="detalle_productos">Playera manga corta color camel, con logo minimalista en la parte frontal, de algodón.</p><br>
                            <p class="costo_producto">$750 MXN</p><br>
                            <input type="number" id="cantidad_p6" name="cantidad" min="1" max="10" onKeyDown="return false" placeholder="Ingresa la cantidad"><br><br>
                            <input type="submit" class="btn-submit" value="ENCARGAR">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Producto 7-->
        <div class="overlay" id="overlay7">
            <div class="popup" id="popup7">
                <a href="#" id="btn-cerrar-popup7" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
                <b class="titulo_productos_modal">Playera Manga Corta Black</b><br>
                <form action="Preorden.php" method="POST" onsubmit="return validar_p7();">
                    <div class="datos_ventana">
                        <div>
                            <img src="img/productos/producto7.png" class="fotoProducto_ventana">
                        </div>
                        <div>
                            <input type="text" name="idproducto" value="7" class="dato">
                            <p class="detalle_productos">Playera manga corta color negro, con diseño y logo en la parte frontal, de algodón.</p><br>
                            <p class="costo_producto">$750 MXN</p><br>
                            <input type="number" id="cantidad_p7" name="cantidad" min="1" max="10" onKeyDown="return false" placeholder="Ingresa la cantidad"><br><br>
                            <input type="submit" class="btn-submit" value="ENCARGAR">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Producto 8-->
        <div class="overlay" id="overlay8">
            <div class="popup" id="popup8">
                <a href="#" id="btn-cerrar-popup8" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
                <b class="titulo_productos_modal">Gorra Tan</b><br>
                <form action="Preorden.php" method="POST" onsubmit="return validar_p8();">
                    <div class="datos_ventana">
                        <div>
                            <img src="img/productos/producto8.png" class="fotoProducto_ventana">
                        </div>
                        <div>
                            <input type="text" name="idproducto" value="8" class="dato">
                            <p class="detalle_productos">Gorra unisex de color camel con el logo bordado en tonos grises, ajustable, de algodón.</p><br>
                            <p class="costo_producto">$550 MXN</p><br>
                            <input type="number" id="cantidad_p8" name="cantidad" min="1" max="10" onKeyDown="return false" placeholder="Ingresa la cantidad"><br><br>
                            <input type="submit" class="btn-submit" value="ENCARGAR">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Producto 9-->
        <div class="overlay" id="overlay9">
            <div class="popup" id="popup9">
                <a href="#" id="btn-cerrar-popup9" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
                <b class="titulo_productos_modal">Gorro Red</b><br>
                <form action="Preorden.php" method="POST" onsubmit="return validar_p9();">
                    <div class="datos_ventana">
                        <div>
                            <img src="img/productos/producto9.png" class="fotoProducto_ventana">
                        </div>
                        <div>
                            <input type="text" name="idproducto" value="9" class="dato">
                            <p class="detalle_productos">Gorro unisex de color rojo con el logo bordado en tonos grises, ajustable, de algodón.</p><br>
                            <p class="costo_producto">$550 MXN</p><br>
                            <input type="number" id="cantidad_p9" name="cantidad" min="1" max="10" onKeyDown="return false" placeholder="Ingresa la cantidad"><br><br>
                            <input type="submit" class="btn-submit" value="ENCARGAR">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="js/popup.js"></script>
    <div class="footer">
        <img class="logoFooter" src="img/Logo.png">
        <h2>Copyright © Todos los derechos reservados.</h2>
    </div>
</body>
</html>