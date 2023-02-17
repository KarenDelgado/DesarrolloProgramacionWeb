const merch = [
  {
    id: 1,
    nombre: "Hoodie Black",
    precio: 1000,
    cantidad: 1,
    img: "./img/productos/producto1.png",
  },
  {
    id: 2,
    nombre: "Hoodie White",
    precio: 1000,
    cantidad: 1,
    img: "./img/productos/producto2.png",
  },
  {
    id: 3,
    nombre: "Sudadera Black",
    precio: 950,
    cantidad: 1,
    img: "./img/productos/producto3.png",
  },
  {
    id: 4,
    nombre: "Sudadera Red",
    precio: 950,
    cantidad: 1,
    img: "./img/productos/producto4.png",
  },
  {
    id: 5,
    nombre: "Playera Manga Larga White",
    precio: 950,
    cantidad: 1,
    img: "./img/productos/producto5.png",
  },
  {
    id: 6,
    nombre: "Playera Manga Corta Tan",
    precio: 750,
    cantidad: 1,
    img: "./img/productos/producto6.png",
  },
  {
    id: 7,
    nombre: "Playera Manga Corta Black",
    precio: 750,
    cantidad: 1,
    img: "./img/productos/producto7.png",
  },
  {
    id: 8,
    nombre: "Gorra Tan",
    precio: 550,
    cantidad: 1,
    img: "./img/productos/producto8.png",
  },
  {
    id: 9,
    nombre: "Gorro Red",
    precio: 550,
    cantidad: 1,
    img: "./img/productos/producto9.png",
  },
];

const carrito = [];

const contadorCarrito = document.getElementById("ContadorCarrito");

const agregarAlCarrito = (pSeleccionado, carrito) => {
  const productoElegido = merch.find(
    item => item.id_producto === pSeleccionado
  );
  carrito.push(productoElegido);
  console.log("Se agrego con exito el producto!", carrito);
};

const agregarContadorCarrito = () => {
  if (carrito.length !== 0) {
    contadorCarrito.classList.add("contadorCarrito");
    contadorCarrito.textContent = carrito.length;
  }
};

/**/

const contenedorProductos = document.getElementById("productos");

merch.forEach((prod) => {
  const div = document.createElement("div");
  div.innerHTML += `
    <div class="area${prod.id}">
      <img src="${prod.img}" class="fotoProducto" alt="Producto${prod.id}">
      <b class="titulo_productos">${prod.nombre}</b><br>
      <b class="titulo_productos">$${prod.precio}</b>
        <div class="comprar">
          <button class="ver_mas">VER MAS</button>
        </div>
    </div>
    `
  contenedorProductos.appendChild(div);
  const botonAgregarCarrito = document.getElementById(
    `agregarCarrito${prod.id_producto}`
  );
  botonAgregarCarrito.addEventListener("click", () => {
    agregarAlCarrito(prod.id_producto, carrito);
    agregarContadorCarrito();
  });
});



