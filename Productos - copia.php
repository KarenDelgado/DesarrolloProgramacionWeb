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
	<link rel="stylesheet" type="text/css" href="./css/Formato1.css">
    <link rel="stylesheet" type="text/css" href="./base.css">
    <link rel="icon" type="image/x-icon" href="./img/favicon.ico">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/Archivo.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
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
                <li><a id="actual" href="Productos.php"><i class="fa fa-shopping-bag"></i> PRODUCTOS</a></li>
                <li><a href="Contacto.php"><i class="fas fa-headset"></i> CONTACTO</a></li>
                <li><a href="Usuario.php"><i class="fas fa-user"></i> <?php echo $usuario; ?></a></li>
                <li><a href="salir.php"><i class="fas fa-sign-out-alt"></i> CERRAR SESIÓN</a></li>
                <li id="carrito" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <i class="fas fa-shopping-cart"></i><p id="contadorCarrito"></p>
                </li>
            </ul>
        </nav>
        <div id="menu-toggle" class="menu-toggle" onClick="cambiarClase()">
            <div class="hamburger"></div>
        </div>
    </header>
    
    <div class="encabezado">
        <h1><b>PRODUCTOS</b></h1>
        <p class="pMedio">FEATURED COLLECTION</p>

        <section>
            <!-- OFF CANVAS-->
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header mt-2">
                    <h5 class="offcanvas-title" id="offcanvasRightLabel">CARRITO DE COMPRAS</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body"></div>
            </div>
        </section>

        <div id="productos">
            <div class="area1">
                <img src="./img/productos/producto1.png" class="fotoProducto" alt="Producto1">
                <b class="titulo_productos">Hoodie Black</b><br>
                <b class="titulo_productos">$1000 MXN</b>
                <div class="comprar">
                    <button id="btn-abrir-popup1" class="ver_mas">VER MAS</button>
                </div>
            </div>
            <div class="area2">
                <img src="./img/productos/producto2.png" class="fotoProducto" alt="Producto2">
                <b class="titulo_productos">Hoodie White</b><br>
                <b class="titulo_productos">$1000 MXN</b>
                <div class="comprar">
                    <button id="btn-abrir-popup2" class="ver_mas">VER MAS</button>
                </div>
            </div>
            <div class="area3">
                <img src="./img/productos/producto3.png" class="fotoProducto" alt="Producto3">
                <b class="titulo_productos">Sudadera Black</b><br>
                <b class="titulo_productos">$950 MXN</b>
                <div class="comprar">
                    <button id="btn-abrir-popup3" class="ver_mas">VER MAS</button>
                </div>
            </div>
        
            <div class="area4">
                <img src="./img/productos/producto4.png" class="fotoProducto" alt="Producto4">
                <b class="titulo_productos">Sudadera Red</b><br>
                <b class="titulo_productos">$950 MXN</b>
                <div class="comprar">
                    <button id="btn-abrir-popup4" class="ver_mas">VER MAS</button>
                </div>
            </div>
            <div class="area5">
                <img src="./img/productos/producto8.png" class="fotoProducto" alt="Producto8">
                <b class="titulo_productos">Gorra Tan</b><br>
                <b class="titulo_productos">$550 MXN</b>
                <div class="comprar">
                    <button id="btn-abrir-popup8" class="ver_mas">VER MAS</button>
                </div>
            </div>
            <div class="area6">
                <img src="./img/productos/producto9.png" class="fotoProducto" alt="Producto9">
                <b class="titulo_productos">Gorro Red</b><br>
                <b class="titulo_productos">$550 MXN</b>
                <div class="comprar">
                    <button id="btn-abrir-popup9" class="ver_mas">VER MAS</button>
                </div>
            </div>
        
            <div class="area7">
                <img src="./img/productos/producto5.png" class="fotoProducto" alt="Producto5">
                <b class="titulo_productos">Playera Manga Larga White</b><br>
                <b class="titulo_productos">$950 MXN</b>
                <div class="comprar">
                    <button id="btn-abrir-popup5" class="ver_mas">VER MAS</button>
                </div>
            </div>
            <div class="aarea8">
                <img src="./img/productos/producto7.png" class="fotoProducto" alt="Producto7">
                <b class="titulo_productos">Playera Manga Corta Black</b><br>
                <b class="titulo_productos">$750 MXN</b>
                <div class="comprar">
                    <button id="btn-abrir-popup7" class="ver_mas">VER MAS</button>
                </div>
            </div>
            <div class="area9">
                <img src="./img/productos/producto6.png" class="fotoProducto" alt="Producto6">
                <b class="titulo_productos">Playera Manga Corta Tan</b><br>
                <b class="titulo_productos">$750 MXN</b>
                <div class="comprar">
                    <button id="btn-abrir-popup6" class="ver_mas">VER MAS</button>
                </div>
            </div>
        </div>

        <!-- Producto 1-->
        <div class="overlay" id="overlay1">
            <div class="popup" id="popup1">
                <a href="#" id="btn-cerrar-popup1" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
                <b class="titulo_productos_modal">Hoodie Black</b>
                
                    <div class="datos_ventana">
                        <div>
                            <img src="./img/productos/producto1.png" class="fotoProducto_ventana" alt="Producto1">
                        </div>
                        <div>
                            <p class="detalle_productos">Sudadera de manga larga color negro, con detalle de estampado, capucha, bolsillo delantero tipo canguro y de algodón.</p>
                            <p class="costo_producto">$1000 MXN</p>
                            <input type="submit" class="btn-submit" id="agregarCarrito1" value="AÑADIR AL CARRITO">
                        </div>
                    </div>
                
            </div>
        </div>
        <!-- Producto 2-->
        <div class="overlay" id="overlay2">
            <div class="popup" id="popup2">
                <a href="#" id="btn-cerrar-popup2" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
                <b class="titulo_productos_modal">Hoodie White</b>
                <div class="datos_ventana">
                    <div>
                        <img src="./img/productos/producto2.png" class="fotoProducto_ventana" alt="Producto2">
                    </div>
                    <div>
                        <p class="detalle_productos">Sudadera de manga larga color blanco, con detalle de estampado, capucha, bolsillo delantero tipo canguro y de algodón.</p>
                        <p class="costo_producto">$1000 MXN</p>
                        <input type="submit" class="btn-submit" id="agregarCarrito2" value="AÑADIR AL CARRITO">
                    </div>
                </div>
            </div>
        </div>
        <!-- Producto 3-->
        <div class="overlay" id="overlay3">
            <div class="popup" id="popup3">
                <a href="#" id="btn-cerrar-popup3" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
                <b class="titulo_productos_modal">Sudadera Black</b>
                
                    <div class="datos_ventana">
                        <div>
                            <img src="./img/productos/producto3.png" class="fotoProducto_ventana" alt="Producto3">
                        </div>
                        <div>
                            <p class="detalle_productos">Sudadera básica manga larga color negro, con detalle de estampado frontal y en las mangas, de algodón.</p>
                            <p class="costo_producto">$950 MXN</p>
                            <input type="submit" class="btn-submit" id="agregarCarrito3" value="AÑADIR AL CARRITO">
                        </div>
                    </div>
                
            </div>
        </div>
        <!-- Producto 4-->
        <div class="overlay" id="overlay4">
            <div class="popup" id="popup4">
                <a href="#" id="btn-cerrar-popup4" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
                <b class="titulo_productos_modal">Sudadera Red</b>
                
                    <div class="datos_ventana">
                        <div>
                            <img src="./img/productos/producto4.png" class="fotoProducto_ventana" alt="Producto4">
                        </div>
                        <div>
                            <p class="detalle_productos">Sudadera básica manga larga color rojo, con detalle de estampado frontal y en las mangas, de algodón.</p>
                            <p class="costo_producto">$950 MXN</p>
                            <input type="submit" class="btn-submit" id="agregarCarrito4" value="AÑADIR AL CARRITO">
                        </div>
                    </div>
                
            </div>
        </div>
        <!-- Producto 5-->
        <div class="overlay" id="overlay5">
            <div class="popup" id="popup5">
                <a href="#" id="btn-cerrar-popup5" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
                <b class="titulo_productos_modal">Playera Manga Larga White</b>
                
                    <div class="datos_ventana">
                        <div>
                            <img src="./img/productos/producto5.png" class="fotoProducto_ventana" alt="Producto5">
                        </div>
                        <div>
                            <p class="detalle_productos">Playera manga larga color blanco, con firma en las mangas y logo en la parte frontal, de algodón.</p>
                            <p class="costo_producto">$950 MXN</p>
                            <input type="submit" class="btn-submit" id="agregarCarrito5" value="AÑADIR AL CARRITO">
                        </div>
                    </div>
                
            </div>
        </div>
        <!-- Producto 6-->
        <div class="overlay" id="overlay6">
            <div class="popup" id="popup6">
                <a href="#" id="btn-cerrar-popup6" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
                <b class="titulo_productos_modal">Playera Manga Corta Tan</b>
                
                    <div class="datos_ventana">
                        <div>
                            <img src="./img/productos/producto6.png" class="fotoProducto_ventana" alt="Producto6">
                        </div>
                        <div>
                            <p class="detalle_productos">Playera manga corta color camel, con logo minimalista en la parte frontal, de algodón.</p>
                            <p class="costo_producto">$750 MXN</p>
                            <input type="submit" class="btn-submit" id="agregarCarrito6" value="AÑADIR AL CARRITO">
                        </div>
                    </div>
                
            </div>
        </div>
        <!-- Producto 7-->
        <div class="overlay" id="overlay7">
            <div class="popup" id="popup7">
                <a href="#" id="btn-cerrar-popup7" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
                <b class="titulo_productos_modal">Playera Manga Corta Black</b>
                
                    <div class="datos_ventana">
                        <div>
                            <img src="./img/productos/producto7.png" class="fotoProducto_ventana" alt="Producto7">
                        </div>
                        <div>
                            <p class="detalle_productos">Playera manga corta color negro, con diseño y logo en la parte frontal, de algodón.</p>
                            <p class="costo_producto">$750 MXN</p>
                            <input type="submit" class="btn-submit" id="agregarCarrito7" value="AÑADIR AL CARRITO">
                        </div>
                    </div>
                
            </div>
        </div>
        <!-- Producto 8-->
        <div class="overlay" id="overlay8">
            <div class="popup" id="popup8">
                <a href="#" id="btn-cerrar-popup8" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
                <b class="titulo_productos_modal">Gorra Tan</b>
                
                    <div class="datos_ventana">
                        <div>
                            <img src="./img/productos/producto8.png" class="fotoProducto_ventana" alt="Producto8">
                        </div>
                        <div>
                            <p class="detalle_productos">Gorra unisex de color camel con el logo bordado en tonos grises, ajustable, de algodón.</p>
                            <p class="costo_producto">$550 MXN</p>
                            <input type="submit" class="btn-submit" id="agregarCarrito8" value="AÑADIR AL CARRITO">
                        </div>
                    </div>
                
            </div>
        </div>
        <!-- Producto 9-->
        <div class="overlay" id="overlay9">
            <div class="popup" id="popup9">
                <a href="#" id="btn-cerrar-popup9" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
                <b class="titulo_productos_modal">Gorro Red</b>
                
                    <div class="datos_ventana">
                        <div>
                            <img src="./img/productos/producto9.png" class="fotoProducto_ventana" alt="Producto9">
                        </div>
                        <div>
                            <p class="detalle_productos">Gorro unisex de color rojo con el logo bordado en tonos grises, ajustable, de algodón.</p>
                            <p class="costo_producto">$550 MXN</p>
                            <input type="submit" class="btn-submit" id="9" value="AÑADIR AL CARRITO">
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
    <script src="./js/popup.js"></script>
    <div class="footer">
        <img class="logoFooter" src="./img/Logo.png" alt="Logo Footer">
        <h2>Copyright © Todos los derechos reservados.</h2>
    </div>
</body>
</html>