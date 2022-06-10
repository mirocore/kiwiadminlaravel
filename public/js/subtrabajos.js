// BOTON
let btn_subtrabajo = document.getElementById('btn-add-subtrabajo');

btn_subtrabajo.addEventListener('click', function(){
    //UBICACION 
    let ubicacion = document.getElementById('contenedorSubtrabajos')
    
    //NUMEROS
    let num = parseInt(ubicacion.lastElementChild.title);
    let numSubtrabajo = num + 1;
    
    
    //CONTENEDOR
    let fila = document.createElement('div');
    fila.className = "form-row mb-2 border py-3 px-3";
    fila.title = numSubtrabajo;
    
    //TITULO
    let titulo = document.createElement('div');
    titulo.className = "col-12";
    let titulotxt= document.createElement('p');
    titulotxt.innerHTML = "Subtrabajo " + numSubtrabajo;
    titulotxt.className = "font-weight-bold";
    titulo.appendChild(titulotxt);
    fila.appendChild(titulo);
    
    //NOMBRE SUBTRABAJO
    let contNombre = document.createElement('div');
    contNombre.className = 'col-sm-6 mb-1';
        //LABEL
        let labelNombre = document.createElement('label');
        labelNombre.htmlFor = "nombre_subtrabajo";
        labelNombre.innerHTML = "Subtrabajo";
        contNombre.appendChild(labelNombre);
        //INPUT
        let inputNombre = document.createElement('input');
        inputNombre.type = 'text';
        inputNombre.className = 'form-control';
        inputNombre.id = "nombre_subtrabajo";
        inputNombre.name = "subtrabajo[" + num + "]['nombre_subtrabajo']"
        contNombre.appendChild(inputNombre);
    fila.appendChild(contNombre)
    
    // IMPORTE SUBTRABAJO
    let contImporte = document.createElement('div');
    contImporte.className = "col-sm-6 mb-1";
        // LABEL
        let labelImporte = document.createElement('label');
        labelImporte.htmlFor = "importe_subtrabajo";
        labelImporte.innerHTML = "Importe";
        contImporte.appendChild(labelImporte);
        // INPUT
        let inputImporte = document.createElement('input');
        inputImporte.type = "text";
        inputImporte.className = "form-control";
        inputImporte.id = "importe_subtrabajo";
        inputImporte.name = "subtrabajo[" + num + "]['importe_subtrabajo']";
        contImporte.appendChild(inputImporte);
    fila.appendChild(contImporte)
    
    // BOTON DE CERRAR
    let cerrar = document.createElement('i');
    cerrar.className = "fas fa-times btnCerrarSub";
    cerrar.onclick = borrarSubtrabajo;
    fila.appendChild(cerrar);
    
    
    
    //INGRESO FILA
    ubicacion.appendChild(fila)
})


let borrarSubtrabajo = function(){
    let hijo = this.parentNode;
    let padre = this.parentNode.parentNode;
    padre.removeChild(hijo);
}

let borrarSubtrabajo2 = function(elem){
    let hijo = elem.parentNode;
    let padre = elem.parentNode.parentNode;
    padre.removeChild(hijo);
}