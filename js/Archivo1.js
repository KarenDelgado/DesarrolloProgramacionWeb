function openNav() {
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
  if (screen.width < 760) {
    document.getElementById("myOffcanvas").style.width = "100%";
  } else if (screen.width < 1024) {
    document.getElementById("myOffcanvas").style.width = "70%";
  } else {
    document.getElementById("myOffcanvas").style.width = "40%";
  }
}

function closeNav() {
  document.getElementById("myOffcanvas").style.width = "0";
  document.body.style.backgroundColor = "white";
}

const contenedor = document.querySelector(".contenedorFetch");

fetch("./js/tour.json")
  .then((res) => res.json())
  .then((data) => {
    data.forEach((prod) => {
      const div = document.createElement("div");
      div.innerHTML += `
                <div>
                  <p class="pMedio"><span>${prod.descripcion}<span></p>
                  <img class="tour" src="${prod.img}" alt="Img${prod.id}">
                </div>
                `;
      contenedor.appendChild(div);
    });
  });
