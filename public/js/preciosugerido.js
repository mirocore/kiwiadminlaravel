 $("#calcularPrecio").on("click", function () {
     let seleccionados = $('#listaServicios').val();
     let options = $('#listaServicios option');
     let precio = 0;
     for(let i = 0; i < options.length; i++){
         let pre = parseFloat(options[i].value);
         for(let o = 0; o < seleccionados.length; o++){
            if(pre == seleccionados[o]){
                precio += parseFloat(options[i].title);
            }
         }
     }
     let prec = document.createElement('p');
     let zona = document.getElementById('precioSugerido');
     zona.innerHTML = '$' + precio;
     if(precio == 0){
        zona.innerHTML = "Por favor ingrese un servicio para poder realizar el cálculo"
     }
     console.log(precio);
});