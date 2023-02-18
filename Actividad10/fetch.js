const contenedor = document.querySelector(".contenedor");

fetch('search.json')
    .then((res) => res.json())
    .then((data => {
        data.forEach (prod => {
            const div = document.createElement("div");
                div.innerHTML += 
                `
                <div>
                    <img src="${prod.url}" alt="Producto${prod.id}">
                </div>
                `
                contenedor.appendChild(div);
            })
    }));