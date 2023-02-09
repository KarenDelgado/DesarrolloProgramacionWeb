let number = parseInt(prompt("Ingrese su edad: "));
if(number>=18){
    console.log("VÁLIDO");
} else {
    console.log("NO VÁLIDO");
}

const pizzas = [{Tipo: "Pepperoni", Precio: 150, Disponible: true}, {Tipo: "Mexicana", Precio: 180, Disponible: true},
            {Tipo: "Ranchera", Precio: 130, Disponible: false}, {Tipo: "Hawaiana", Precio: 160, Disponible: true}];
for (i = 0; i < pizzas.length; i++) {
    //console.log(pizzas[i]);
    console.log("Pizza No."+[i+1]+"\n Especialidad:"+pizzas[i].Tipo+"\n Precio: $"+pizzas[i].Precio+"\n Disponible:"+pizzas[i].Disponible);
}

let op = prompt("BIENVENIDO \nIngrese el numero de la pizza elegida: ");
switch(op){
    case '1':
        console.log("Pizza No. 1 Especialidad: "+pizzas[0].Tipo+"\n Promoción: Tiene un descuento del 20% \n Precio: $"+pizzas[0].Precio+"\n Precio con descuento: $"+pizzas[0].Precio*.80);
        break;
    case '2':
        console.log("Pizza No. 2 Especialidad: "+pizzas[1].Tipo+"\n Promoción: Tiene un descuento del 25% \n Precio: $"+pizzas[1].Precio+"\n Precio con descuento: $"+pizzas[1].Precio*.75);
        break;
    case '3':
        console.log("Pizza No. 3 Especialidad: "+pizzas[2].Tipo+"\n Promoción: Tiene un descuento del 30% \n Precio: $"+pizzas[2].Precio+"\n Precio con descuento: $"+pizzas[2].Precio*.70);
        break
    case '4':
        console.log("Pizza No. 4 Especialidad: "+pizzas[3].Tipo+"\n Promoción: Tiene un descuento del 15% \n Precio: $"+pizzas[3].Precio+"\n Precio con descuento: $"+pizzas[3].Precio*.85);
        break;
    default:
        console.log("No. de pizza inválido");
        break;
}