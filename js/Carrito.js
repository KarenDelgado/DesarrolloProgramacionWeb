const contenedorProductos = document.getElementById("productos");
const contadorCarrito = document.getElementById ("contadorCarrito"); 
const carritoOffcanvas = document.getElementById("carritoOffcanvas");
const contenedorContadorCarrito = document.getElementById("contenedorContar");
const precioTotalCarrito = document.getElementById("pTotalCarrito");
const terminarCompra = document.getElementById ("terminarCompra");
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
  }
];

const carritoDeCompras = [];

merch.forEach (prod => {
  const div = document.createElement("div");
    div.innerHTML += 
  `
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
  `
  contenedorProductos.appendChild(div);

  const botonAgregar = document.getElementById(`merch${prod.id}`);
  botonAgregar.addEventListener ("click", ()=> {
      agregarProductos(prod.id, carritoDeCompras);
      contarProductos();
      mostrarCarrito();
  })
})

const agregarProductos = (Seleccionado, carrito)=> {
  const productoExiste = carritoDeCompras.some (merch => merch.id === Seleccionado);
  const productoElegido = merch.find (merch => merch.id === Seleccionado);
  if (productoExiste) {
      let precioInicial = productoElegido.precio;
      productoElegido.cantidad++;
      productoElegido.nuevoPrecio = productoElegido.cantidad * precioInicial;
  } else {
      carrito.push (productoElegido);
      console.log ("Se añadio al carrito");
      console.log (carrito);
  }
}

const contarProductos = ()=> {
  if (carritoDeCompras.length !== 0) {
      contenedorContadorCarrito.appendChild(contador);
      contador.textContent = carritoDeCompras.length;
  } else {
      contador.textContent ="";
  }
}

const mostrarCarrito = ()=>{
  carritoOffcanvas.innerHTML="";
  carritoDeCompras.forEach (producto => {
      tr = document.createElement ("tr");
      tr.innerHTML += 
      `
          <td>
              <img class="imgCarrito" src="${producto.img}" alt="${producto.nombre}">
          </td>
          <td class="prodEnCarrito">${producto.nombre}</td>
          <td class="prodEnCarrito">${producto.cantidad}</td>
          <td class="prodEnCarrito">${producto.precio}</td>
          <td class="prodEnCarrito eliminarProducto">
            <i class="fas fa-trash-alt" id="eliminar${producto.id}"></i>
          </td>
      `
      carritoOffcanvas.appendChild(tr)

      const botonEliminar = document.getElementById(`eliminar${producto.id}`);
      botonEliminar.addEventListener("click", ()=> {
          eliminarProducto(producto.id)
      })
  })
  const totalCarrito = carritoDeCompras.reduce ((acumulador,producto) => acumulador + producto.precio,0);
  precioTotalCarrito.innerText =`Precio total: $${totalCarrito}`;
}

const eliminarProducto = (prodSeleccionado) => {
  const productoEliminado = carritoDeCompras.find (merch =>merch.id === prodSeleccionado);
  const index = carritoDeCompras.indexOf (productoEliminado);
  carritoDeCompras.splice (index,1);
  agregarContadorCarrito();
  mostrarCarrito();
}

const vaciarCarrito = ()=> {
  carritoDeCompras.innerHTML =[];
  carritoOffcanvas.innerHTML =[];
  contador.textContent ="";
  precioTotalCarrito.textContent ="Precio Total: $0";
  contador.classList.remove ("contadorCarrito");
}

terminarCompra.addEventListener ("click", ()=> {
  vaciarCarrito();
  Swal.fire({
    title: 'COMPRA REALIZADA',
    html: 'Muchas gracias por tu compra',
    confirmButtonText: 'Aceptar',
    confirmButtonColor: 'indigo',
    allowOutsideClick: false,
    imageUrl: 'img/cheems_con_pedido.png',
    imageWidth:'70%'
  });
})
