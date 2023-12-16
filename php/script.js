var monedaEl_one = document.getElementById('moneda-uno');
var monedaEl_two = document.getElementById('moneda-dos');
var cantidadEl_one = document.getElementById('cantidad-uno');
var cantidadEl_two = document.getElementById('cantidad-dos');
var cambioEl = document.getElementById('cambio');
var tazaEl = document.getElementById('taza');


// Fetch Exchange Rate and Update the DOM
function calculate(){
    var moneda_one = monedaEl_one.value;
    var moneda_two = monedaEl_two.value;

   fetch(`https://api.exchangerate-api.com/v4/latest/${moneda_one}`)
   .then(res => res.json() )
   .then(data => {
       var taza = data.rates[moneda_two];
       
       cambioEl.innerText = `1 ${moneda_one} = ${taza} ${moneda_two}`;
       var impuesto= (cantidadEl_one.value * taza).toFixed(2)*0.16;
       switch(moneda_two){
        default:
            cantidadEl_two.value = (cantidadEl_one.value * taza).toFixed(2);
            break;
        case "VES":
            cantidadEl_two.value= (cantidadEl_one.value * taza + impuesto).toFixed(2) ;
            break;
       }

    } );



    
}

//Event listeners
monedaEl_one.addEventListener('change', calculate);
cantidadEl_one.addEventListener('input', calculate);
monedaEl_two.addEventListener('change', calculate);
cantidadEl_two.addEventListener('input', calculate);

taza.addEventListener('click', () =>{
    var temp = monedaEl_one.value;
    monedaEl_one.value = monedaEl_two.value;
    monedaEl_two.value = temp;
    

    calculate();
} );


calculate();