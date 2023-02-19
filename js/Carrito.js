const contenedorProductos = document.getElementById("productos");
const contadorCarrito = document.getElementById("contadorCarrito");
const carritoOffcanvas = document.getElementById("carritoOffcanvas");
const contenedorContadorCarrito = document.getElementById("contenedorContar");
const precioTotalCarrito = document.getElementById("pTotalCarrito");
const terminarCompra = document.getElementById("comprar");
const contador = document.createElement("p");

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

const carritoDeCompras = [];

// Función para ordenar los productos de menor a mayor según el precio
function ordenarMenorAMayor() {
  merch.sort((a, b) => a.precio - b.precio);
}

// Función para ordenar los productos de mayor a menor según el precio
function ordenarMayorAMenor() {
  merch.sort((a, b) => b.precio - a.precio);
}

// Función para imprimir los productos
function imprimirProductos() {
  contenedorProductos.innerHTML = "";
  merch.forEach((prod) => {
    const div = document.createElement("div");
    div.innerHTML += `
      <div>
        <img src="${prod.img}" class="fotoProducto" alt="Producto${prod.id}">
        <p class="titulo_productos">
          <b>${prod.nombre}</b>
        </p>
        <p class="titulo_productos">
          <b>$${prod.precio}</b>
        </p>
        <div class="comprar">
          <button id="merch${prod.id}" class="ver_mas">AGREGAR A CARRITO</button>
        </div>
      </div>
    `;
    contenedorProductos.appendChild(div);
    const botonAgregar = document.getElementById(`merch${prod.id}`);
    botonAgregar.addEventListener("click", () => {
      agregarProductos(prod.id, carritoDeCompras);
      agregarContadorCarrito();
      mostrarCarrito();
    });
  });
}

function ordenarProductos(mayorAMenor) {
  if (mayorAMenor) {
    merch.sort((a, b) => b.precio - a.precio);
  } else {
    merch.sort((a, b) => a.precio - b.precio);
  }
  imprimirProductos(merch);
}

// ordenar de mayor a menor por defecto
ordenarProductos(true);
const ordenamientoSelect = document.getElementById("ordenamiento");
ordenamientoSelect.addEventListener("change", (event) => {
  const mayorAMenor = event.target.value === "mayor";
  ordenarProductos(mayorAMenor);
});

// Imprime los productos por defecto
imprimirProductos();

const agregarProductos = (Seleccionado, carrito) => {
  const productoExiste = carritoDeCompras.some(
    (merch) => merch.id === Seleccionado
  );
  const productoElegido = merch.find((merch) => merch.id === Seleccionado);
  if (productoExiste) {
    let precioInicial = productoElegido.precio;
    productoElegido.cantidad++;
    productoElegido.nuevoPrecio = productoElegido.cantidad * precioInicial;
  } else {
    carrito.push(productoElegido);
    console.log("Se añadio al carrito");
    console.log(carrito);
  }
};

const agregarContadorCarrito = () => {
  let contador = document.getElementById("contador");
  if (!contador) {
    contador = document.createElement("p");
    contador.setAttribute("id", "contador");
    contenedorContadorCarrito.appendChild(contador);
  }
  contador.textContent = carritoDeCompras.length;
  if (carritoDeCompras.length === 0) {
    contador.textContent = "";
  }
};

const mostrarCarrito = () => {
  carritoOffcanvas.innerHTML = "";
  carritoDeCompras.forEach((producto) => {
    tr = document.createElement("tr");
    tr.innerHTML += `
          <td>
              <img class="imgCarrito" src="${producto.img}" alt="${producto.nombre}">
          </td>
          <td class="prodEnCarrito">${producto.nombre}</td>
          <td class="prodEnCarrito">${producto.cantidad}</td>
          <td class="prodEnCarrito">${producto.precio}</td>
          <td class="prodEnCarrito eliminarProducto">
            <i class="fas fa-trash-alt" id="eliminar${producto.id}"></i>
          </td>
      `;
    carritoOffcanvas.appendChild(tr);
    const botonEliminar = document.getElementById(`eliminar${producto.id}`);
    botonEliminar.addEventListener("click", () => {
      eliminarProducto(producto.id);
    });
  });
  const totalCarrito = carritoDeCompras.reduce(
    (acumulador, producto) => acumulador + producto.precio * producto.cantidad,
    0
  );
  precioTotalCarrito.innerText = `Precio total: $${totalCarrito}`;
};

const eliminarProducto = (prodSeleccionado) => {
  const productoEliminado = carritoDeCompras.find(
    (merch) => merch.id === prodSeleccionado
  );
  const index = carritoDeCompras.indexOf(productoEliminado);
  if (productoEliminado.cantidad > 1) {
    productoEliminado.cantidad--;
  } else {
    carritoDeCompras.splice(index, 1);
  }
  mostrarCarrito();
  agregarContadorCarrito();
};

const vaciarCarrito = () => {
  carritoDeCompras.splice(0, carritoDeCompras.length);
  carritoOffcanvas.innerHTML = [];
  agregarContadorCarrito();
  precioTotalCarrito.textContent = "Precio Total: $0";
};

terminarCompra.addEventListener("click", () => {
  if (carritoDeCompras.length !== 0) {
    vaciarCarrito();
    Swal.fire({
      title: "COMPRA REALIZADA",
      html: "Muchas gracias por tu compra",
      confirmButtonText: "Aceptar",
      confirmButtonColor: "indigo",
      allowOutsideClick: false,
      imageUrl: "img/cheems_con_pedido.png",
      imageWidth: "70%",
    });
  } else if (carritoDeCompras.length == 0) {
    Swal.fire({
      title: "Error",
      html: "Carrito vacio",
      confirmButtonText: "Aceptar",
      confirmButtonColor: "indigo",
      allowOutsideClick: false,
      imageUrl: "img/cheems_error.png",
      imageWidth: "70%",
    });
  }
});
