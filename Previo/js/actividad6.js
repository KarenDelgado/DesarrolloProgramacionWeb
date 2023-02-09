var n1 = parseInt(prompt("Ingresa el primer número: "));
var n2 = parseInt(prompt("Ingresa el segundo número: "));
var n3 = parseInt(prompt("Ingresa el tercer número: "));
function suma(a, b, c) {
    let total =  a + b + c;
    console.log("La suma es:", total);
}
suma(n1,n2,n3);


var n4 = parseInt(prompt("Ingresa un nuevo número: "));
var n5 = parseInt(prompt("Ingresa otro número: "));
function comparacion (d, e){ 
    if(d==e) {
        console.log("Los números son iguales");
    } else if(d<e) {
        console.log(`${d} es menor que ${e}`);
    } else {
        console.log(`${e} es menor que ${d}`);
    }
}
comparacion(n4,n5);


const suma2 = (a, b, c) => console.log(`La suma es: ${a+b+c} (x2)`);
suma2(n1,n2,n3);


const comparacion2 = (d, e) => {
    if(d==e) {
        console.log("Los números son iguales (x2)");
    } else if(d<e) {
        console.log(`${d} es menor que ${e} (x2)`);
    } else {
        console.log(`${e} es menor que ${d} (x2)`);
    }
}
comparacion2(n4,n5);


const empleado = {
    nombre: "Jesús",
    edad: 23,
    puesto: "Programador",
    turno: "Matutino",
    correo: "jesus@example.com",
    ciudad: "Puebla"
}
const datosEmpleado = ({nombre,puesto,correo}) => console.log("Los datos del empleado son:", nombre, puesto, correo);
datosEmpleado(empleado);


var mix = ["Pizza", 30, 170, ["pepperoni", "mexicana", "hawaiana", "ranchera", "queso"]];
const mixArray = () => { return mix; }
const [nombre, tamaño, precio, tipo] = mixArray();
console.log("Caracteristicas del producto:", nombre, precio, tipo);