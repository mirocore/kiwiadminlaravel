// BOTON PARA ACTIVAR EL NUEVO PAGO
let btnNuevoPago = document.getElementById('btnNuevoPago');
let btnNuevoCobro = document.getElementById('btnNuevoCobro');


btnNuevoPago.addEventListener('click', function(){
    console.log('AÑADIENDO PAGO NUEVO');
    
    // DONDE VA A IR UBICADO
    let ubicacion = document.getElementById('contenedorPagos');
    
    // OBTENGO EL NUMERO DEL ÚLTIMO ELEMENTO CREADO
    let num = parseInt(ubicacion.lastElementChild.title);
    let numPago = num + 1;

    
    // CREO EL CONTENEDOR
    let contenedor = document.createElement('div');
    contenedor.className="pagoIndividual border py-2 px-2 mb-2";
    contenedor.title = numPago;
    
        // CREO EL SPAN
            let span = document.createElement('span');
            span.innerHTML = "Pago " + numPago ;
            span.className = "d-block h6 mt-2 font-weight-bold mb-3";
            contenedor.appendChild(span);
    
        // PRIMER FORM ROW
            let formRow1 = document.createElement('div');
            formRow1.className = "form-row mb-2";
                // PRIMER FORM GROUP
                    let formGroup1 = document.createElement('div');
                    formGroup1.className = "col form-group mb-0";
                    // PRIMER INPUT
                        let label1 = document.createElement('label');
                        label1.innerHTML = "Importe";
                        label1.htmlFor = "importe_pago_" + numPago;
                        formGroup1.appendChild(label1);
                        let input1 = document.createElement('input');
                        input1.className = "form-control rounded-0";
                        input1.type = "text";
                        input1.id = "importe_pago_" + numPago;
                        input1.name = "pago[" + num  + "]['importe']";
                        formGroup1.appendChild(input1);
            formRow1.appendChild(formGroup1);
                // SEGUNDO FORM GROUP
                let formGroup2 = document.createElement('div');
                formGroup2.className = "col form-group mb-0";
                    //INPUT
                        let label2 = document.createElement('label');
                        label2.innerHTML = "Fecha";
                        label2.htmlFor = "fecha_pago_" + numPago;
                        formGroup2.appendChild(label2);
                        let input2 = document.createElement('input');
                        input2.type = 'date';
                        input2.id = "fecha_pago_" + numPago;
                        input2.className = 'form-control rounded-0';
                        input2.name = "pago[" + num  + "]['fecha']";
                        formGroup2.appendChild(input2);
                formRow1.appendChild(formGroup2);
            contenedor.appendChild(formRow1);
    
           //SEGUNDO FORM ROW
            let formRow2 = document.createElement('div');
            formRow2.className="form-row mb-4";
            let formGroup3 = document.createElement('div');
            formGroup3.className = "col form-group mb-0"
            let label3 = document.createElement('label');
            label3.innerHTML = "Notas";
            label3.htmlFor = "notas_pago_" + numPago;
            formGroup3.appendChild(label3);
            let textarea = document.createElement('textarea'); 
            textarea.name= "pago[" + num  + "]['notas_pago']";
            textarea.cols = "30";
            textarea.rows = "2";
            textarea.id="notas_pago_" + numPago;
            textarea.className="form-control rounded-0";
            formGroup3.appendChild(textarea);
            formRow2.appendChild(formGroup3);
            contenedor.appendChild(formRow2);
    
            //TERCER FORM ROW
            let formRow3 = document.createElement('div');
            formRow3.className = 'form-row'
            let formGroup4 = document.createElement('div');
            formGroup4.className = "col form-group mb-0";
            let label4 = document.createElement('label');
            label4.htmlFor = "pagado_pago_" + numPago;
            label4.innerHTML = "¿Está Pago?";
            let selectPagado = document.createElement("select");
            selectPagado.name = "pago[" + num + "]['pagado_pago']"
            selectPagado.id = "pagado_pago_" + numPago;
            selectPagado.className = "form-control rounded-0";
                let option1 = document.createElement('option');
                option1.innerHTML = 'No está pago';
                option1.value = "no";
                let option2 = document.createElement('option');
                option2.innerHTML = 'Pagado';
                option2.value = "si";
                selectPagado.appendChild(option1);
                selectPagado.appendChild(option2);
            
            formGroup4.appendChild(label4);
            formGroup4.appendChild(selectPagado);
            formRow3.appendChild(formGroup4);
            contenedor.appendChild(formRow3);
    
    
    // BOTON PARA BORRAR
    let btnBorrar = document.createElement('i');
    btnBorrar.className = "fas fa-times cerrarPagoCobro";
    btnBorrar.onclick = cerrarPagoCobro;
    contenedor.appendChild(btnBorrar);
    
    
    // AGREGO EL CONTENEDOR AL DOCUMENTO
    ubicacion.appendChild(contenedor)
    
})

btnNuevoCobro.addEventListener('click', function(){
    console.log('AÑADIENDO COBRO NUEVO');
    
    // DONDE VA A IR UBICADO
    let ubicacion = document.getElementById('contenedorCobros');
    
    // OBTENGO EL NUMERO DEL ÚLTIMO ELEMENTO CREADO
    let num = parseInt(ubicacion.lastElementChild.title);
    let numCobro = num + 1;

    
    // CREO EL CONTENEDOR
    let contenedor = document.createElement('div');
    contenedor.className="cobroIndividual border py-2 px-2 mb-2";
    contenedor.title = numCobro;
    
        // CREO EL SPAN
            let span = document.createElement('span');
            span.innerHTML = "Cobro " + numCobro ;
            span.className = "d-block h6 mt-2 font-weight-bold mb-3";
            contenedor.appendChild(span);
    
        // PRIMER FORM ROW
            let formRow1 = document.createElement('div');
            formRow1.className = "form-row mb-2";
                // PRIMER FORM GROUP
                    let formGroup1 = document.createElement('div');
                    formGroup1.className = "col form-group mb-0";
                    // PRIMER INPUT
                        let label1 = document.createElement('label');
                        label1.innerHTML = "Importe";
                        label1.htmlFor = "importe_cobro_" + numCobro;
                        formGroup1.appendChild(label1);
                        let input1 = document.createElement('input');
                        input1.className = "form-control rounded-0";
                        input1.type = "text";
                        input1.id = "importe_cobro_" + numCobro;
                        input1.name = "cobro[" + num  + "]['importe']";
                        formGroup1.appendChild(input1);
            formRow1.appendChild(formGroup1);
                // SEGUNDO FORM GROUP
                let formGroup2 = document.createElement('div');
                formGroup2.className = "col form-group mb-0";
                    //INPUT
                        let label2 = document.createElement('label');
                        label2.innerHTML = "Fecha";
                        label2.htmlFor = "fecha_cobro_" + numCobro;
                        formGroup2.appendChild(label2);
                        let input2 = document.createElement('input');
                        input2.type = 'date';
                        input2.id = "fecha_cobro_" + numCobro;
                        input2.className = 'form-control rounded-0';
                        input2.name = "cobro[" + num  + "]['fecha']";
                        formGroup2.appendChild(input2);
                formRow1.appendChild(formGroup2);
            contenedor.appendChild(formRow1);
    
           //SEGUNDO FORM ROW
            let formRow2 = document.createElement('div');
            formRow2.className="form-row mb-4";
            let formGroup3 = document.createElement('div');
            formGroup3.className = "col form-group mb-0"
            let label3 = document.createElement('label');
            label3.innerHTML = "Notas";
            label3.htmlFor = "notas_cobro_" + numCobro;
            formGroup3.appendChild(label3);
            let textarea = document.createElement('textarea'); 
            textarea.name= "cobro[" + num  + "]['notas_cobro']";
            textarea.cols = "30";
            textarea.rows = "2";
            textarea.id="notas_cobro_" + numCobro;
            textarea.className="form-control rounded-0";
            formGroup3.appendChild(textarea);
            formRow2.appendChild(formGroup3);
            contenedor.appendChild(formRow2);
    
            //TERCER FORM ROW
            let formRow3 = document.createElement('div');
            formRow3.className = 'form-row'
            let formGroup4 = document.createElement('div');
            formGroup4.className = "col form-group mb-0";
            let label4 = document.createElement('label');
            label4.htmlFor = "pagado_cobro_" + numCobro;
            label4.innerHTML = "¿Está Pago?";
            let selectPagado = document.createElement("select");
            selectPagado.name = "cobro[" + num + "]['pagado_cobro']"
            selectPagado.id = "pagado_cobro_" + numCobro;
            selectPagado.className = "form-control rounded-0";
                let option1 = document.createElement('option');
                option1.innerHTML = 'No está pago';
                option1.value = "no";
                let option2 = document.createElement('option');
                option2.innerHTML = 'Pagado';
                option2.value = "si";
                selectPagado.appendChild(option1);
                selectPagado.appendChild(option2);
            
            formGroup4.appendChild(label4);
            formGroup4.appendChild(selectPagado);
            formRow3.appendChild(formGroup4);
            contenedor.appendChild(formRow3);
    
    
    // BOTON PARA BORRAR
    let btnBorrar = document.createElement('i');
    btnBorrar.className = "fas fa-times cerrarPagoCobro";
    btnBorrar.onclick = cerrarPagoCobro;
    contenedor.appendChild(btnBorrar);
    
    
    // AGREGO EL CONTENEDOR AL DOCUMENTO
    ubicacion.appendChild(contenedor)
    
})

let cerrarPagoCobro = function(){
    // Selecciono el elemento
        let hijo = this.parentNode;
        let padre = this.parentNode.parentNode;
        padre.removeChild(hijo);
}

let cerrarPagoCobro2 = function(test){
    // Selecciono el elemento
        let hijo = test.parentNode;
        let padre = test.parentNode.parentNode;
        padre.removeChild(hijo);
}