var subdireccion = document.querySelector('#subdireccion');
var hijo = document.querySelector('#hijo');
subdireccion.onchange = mandoCarrera;

function reciboMaterias(respuesta) {

  limpiar(); 
  
  var lines = respuesta.split('\n');
  for (var line = 0; line < lines.length; line++) {
    var opt = document.createElement('option');
    opt.innerHTML = lines[line];
    opt.value = lines[line];
    hijo.appendChild(opt);
  }

}

function mandoCarrera() {
  var ajax = new XMLHttpRequest();
  ajax.open('GET', subdireccion.value);
  ajax.onreadystatechange = function() {
    console.log(ajax.status, ajax.readyState, ajax.responseText);
    if (ajax.status === 200 && ajax.readyState === 4) {
      reciboMaterias(ajax.responseText);
    }
    else
      limpiar();
  }
  ajax.send();
}

function limpiar(){
while(hijo.options.length > 0){                
    hijo.remove(0);
  } 
}