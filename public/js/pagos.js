


// BOTON

let btnAdd = document.getElementById('btnAdd');

btnAdd.addEventListener('click', function(){
    // CONSULTA
    fetch('traerUsuarios', {
        credentials: 'include'
    })
    .then(rta => rta.json())
    .then(users=> {
        var usuarios = users;
        console.log(usuarios)

    // CONTENEDOR
    let contenedor = document.getElementById('listaPagos');
    
    // NUMERO DE PAGO
    let num = parseInt(contenedor.lastElementChild.title);
    let numPago = num + 1;

    
    // PAGO
    let pago = document.createElement('div');
    pago.className = "card bg-light rounded-0 px-2 py-4 px-lg-4 pagoIndividual mb-4";
    pago.title = numPago; 
        
        // FILA 0
        let fila0 = document.createElement('div');
        fila0.className="form-row mb-3";
        let col0 = document.createElement('div');
        col0.className = "col";
        let label0 = document.createElement('label');
        label0.htmlFor = "id_usuario" + numPago;
        label0.innerHTML = "Empleado Asignado";
        col0.appendChild(label0);
        let select0 = document.createElement('select');
        select0.name = "pago[" + numPago + "][id_usuario]";
        select0.id = "id_usuario" + numPago;
        select0.className = "form-control";
        for(let ind = 0; ind < usuarios.length; ind++){
            let optionUser = document.createElement('option');
            optionUser.value = usuarios[ind]['id_usuario'];
            optionUser.innerHTML = usuarios[ind]['nombre'] + " " + usuarios[ind]['apellido'];
            select0.appendChild(optionUser);
        }
        col0.appendChild(select0);
        fila0.appendChild(col0);
        
        // FILA 1
        let fila1 = document.createElement('div');
        fila1.className = "form-row mb-3";
            //IMPORTE
            let col1 = document.createElement('div');
            col1.className = "col";
                //LABEL
                let label1 = document.createElement('label');
                label1.htmlFor = "importe_pago" + numPago;
                label1.innerHTML = "Importe"
                col1.appendChild(label1);
                //INPUT
                let inputImporte = document.createElement('input');
                inputImporte.type = "text";
                inputImporte.name = "pago[" + numPago + "][importe_pago]";
                inputImporte.className = "form-control";
                inputImporte.id = "importe_pago" + numPago;
                col1.appendChild(inputImporte);
                fila1.appendChild(col1)
            //FECHA
            let col2 = document.createElement('div');
            col2.className = "col";
                //LABEL
                let label2 = document.createElement('label');
                label2.htmlFor = "fecha_pago" + numPago;
                label2.innerHTML = "Fecha"
                col2.appendChild(label2);
                //INPUT
                let inputFecha = document.createElement('input');
                inputFecha.type = "date";
                inputFecha.name = "pago[" + numPago + "][fecha_pago]";
                inputFecha.className = "form-control";
                inputFecha.id = "fecha_pago" + numPago;
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
                label3.htmlFor = "notas_pago" + numPago;
                label3.innerHTML = "Notas";
                col3.appendChild(label3)
                // TEXTAREA
                let textarea = document.createElement('textarea');
                textarea.name = "pago[" + numPago + "][notas_pago]";
                textarea.id = "notas_pago" + numPago;
                textarea.cols = "30";
                textarea.rows = "2";
                textarea.className = "form-control";
                col3.appendChild(textarea)
            fila2.appendChild(col3);
    
    // FILA 3
    let fila3 = document.createElement('div');
    fila3.className="form-row mb-3";
    let col4 = document.createElement('div');
    col4.className = "col";
    let label4 = document.createElement('label');
    label4.htmlFor = "estado_pago" + numPago;
    label4.innerHTML = "Estado";
    col4.appendChild(label4);
    let selectEstado = document.createElement('select');
    selectEstado.name = "pago[" + numPago + "][estado_pago]";
    selectEstado.id = "estado_pago" + numPago;
    selectEstado.className="form-control";
    let optionNo = document.createElement('option');
    optionNo.value = 'no';
    optionNo.innerHTML = "No pago";    
    let optionSi = document.createElement('option');
    optionSi.value = 'si';
    optionSi.innerHTML = "Pagado";
    selectEstado.appendChild(optionNo);
    selectEstado.appendChild(optionSi);
    col4.appendChild(selectEstado);
    fila3.appendChild(col4);
    
        pago.appendChild(fila0);
        pago.appendChild(fila1);
        pago.appendChild(fila2);
        pago.appendChild(fila3);
 
    // BOTON DE CERRAR
    let btnElim = document.createElement('i');
    btnElim.className = 'fas fa-times btnEliminar';
    btnElim.onclick = borrarPago;
    pago.appendChild(btnElim);    
    
    // LO INGRESO AL BODY
    contenedor.appendChild(pago);
    })

})

let borrarPago = function(){
    let hijo = this.parentNode;
    let padre = this.parentNode.parentNode;
    padre.removeChild(hijo);
}

let borrarPago2 = function(elem){
    let padre = elem.parentNode.parentNode;
    let hijo = elem.parentNode;
    padre.removeChild(hijo);
}