var mensaje = "Hola mundo!";
console.log(mensaje);

let numero = 17;
console.log(numero);

let verdadero = true;
console.log(verdadero);

let indefinido = undefined;
console.log(indefinido);

let vacio = null;
console.log(vacio);


var nombre = prompt("Ingresa tu nombre: ");
var ciudad = prompt("Ingresa la ciudad en donde vives: ");
console.log(`Hola ${nombre}, te deseo felices fiestas hasta ${ciudad} c:`);


let num1 = parseInt(prompt("Ingresa el primer numero: "));
let num2 = parseInt(prompt("Ingresa el segundo numero: "));;
window.alert(`La suma de ${num1} más ${num2} es igual a ${num1 + num2}`);
if(num1 == num2){
    window.alert(`Los números son iguales`);
} else {
    window.alert(`Los números no son iguales`);
}
window.alert(`${num1} equivale ahora (=) a ${num2}, por lo que ${num1 = num2} más igual (+=) a ${num2} resulta en ${num1 += num2}`);