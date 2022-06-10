// BOTON
let btnAdd = document.getElementById('btnAdd');

btnAdd.addEventListener('click', function(){

    // CONTENEDOR
    let contenedor = document.getElementById('listaCobros');
    
    // NUMERO DE COBRO
    let num = parseInt(contenedor.lastElementChild.title);
    let numCobro = num + 1;

    // PAGO
    let cobro = document.createElement('div');
    cobro.className = "card bg-light rounded-0 px-2 py-4 px-lg-4 cobroIndividual mb-4";
    cobro.title = numCobro; 
        
        
        // FILA 1
        let fila1 = document.createElement('div');
        fila1.className = "form-row mb-3";
            //IMPORTE
            let col1 = document.createElement('div');
            col1.className = "col";
                //LABEL
                let label1 = document.createElement('label');
                label1.htmlFor = "importe_cobro" + numCobro;
                label1.innerHTML = "Importe"
                col1.appendChild(label1);
                //INPUT
                let inputImporte = document.createElement('input');
                inputImporte.type = "text";
                inputImporte.name = "cobro[" + numCobro + "][importe_cobro]";
                inputImporte.className = "form-control";
                inputImporte.id = "importe_cobro" + numCobro;
                col1.appendChild(inputImporte);
                fila1.appendChild(col1)
            //FECHA
            let col2 = document.createElement('div');
            col2.className = "col";
                //LABEL
                let label2 = document.createElement('label');
                label2.htmlFor = "fecha_cobro" + numCobro;
                label2.innerHTML = "Fecha"
                col2.appendChild(label2);
                //INPUT
                let inputFecha = document.createElement('input');
                inputFecha.type = "date";
                inputFecha.name = "cobro[" + numCobro + "][fecha_cobro]";
                inputFecha.className = "form-control";
                inputFecha.id = "fecha_cobro" + numCobro;
                col2.appendChild(inputFecha);
                fila1.appendChild(col2);
        // FILA 2
        let fila2 = document.createElement('div');
        fila2.className= "form-row mb-3";
            // NOTAS
            let col3 = document.createElement('div');
            col3.className = "col";
                // LABEL
                let label3 = document.createElement('label');
                label3.htmlFor = "notas_cobro" + numCobro;
                label3.innerHTML = "Notas";
                col3.appendChild(label3)
                // TEXTAREA
                let textarea = document.createElement('textarea');
                textarea.name = "cobro[" + numCobro + "][notas_cobro]";
                textarea.id = "notas_cobro" + numCobro;
                textarea.cols = "30";
                textarea.rows = "2";
                textarea.className = "form-control";
                col3.appendChild(textarea)
            fila2.appendChild(col3);
    

    
        cobro.appendChild(fila1);
        cobro.appendChild(fila2);

 
    // BOTON DE CERRAR
    let btnElim = document.createElement('i');
    btnElim.className = 'fas fa-times btnEliminar';
    btnElim.onclick = borrarCobro;
    cobro.appendChild(btnElim);    
    
    // LO INGRESO AL BODY
    contenedor.appendChild(cobro);


})

let borrarCobro = function(){
    let hijo = this.parentNode;
    let padre = this.parentNode.parentNode;
    padre.removeChild(hijo);
}

let borrarCobro2 = function(elem){
    let padre = elem.parentNode.parentNode;
    let hijo = elem.parentNode;
    padre.removeChild(hijo);
}