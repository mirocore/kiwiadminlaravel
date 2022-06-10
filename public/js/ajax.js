let app = {};

/**
 * Realiza una petición de Ajax.
 *
 * @param {{}} options   Objeto de opciones.
 */

app.ajaxRequest = function(options){

//XHR
    const xhr = new XMLHttpRequest();
    
//PETICION
    xhr.open(options.method, options.url);
    
//EVENTO
    xhr.addEventListener('readystatechange', function(){
        if(xhr.readyState == 4){
            if(xhr.status == 200){
                options.successCallback(xhr.responseText);
            }
        }
    });
    
//SI ES POST...
    if(options.method.toUpperCase() == "POST"){
       xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); 
    }

//ENVIAR
    xhr.send(options.data);

}//FIN DE AJAX REQUEST

