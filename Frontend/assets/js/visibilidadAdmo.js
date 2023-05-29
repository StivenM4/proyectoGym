 // Ocultar todos los formularios al cargar la página
 document.addEventListener("DOMContentLoaded", function() {
    var formularios = document.querySelectorAll(".contenedor");
    var mensaje = document.getElementById("mensaje");


    for (var i = 0; i < formularios.length; i++) {
      formularios[i].style.display = "none";
    }
    mensaje.style.display = "block";
  });

function divVisibility(divId) {
    var div = document.getElementById(divId);
    var divs = document.getElementsByClassName('contenedor');
    var mensaje = document.getElementById("mensaje");
    mensaje.style.display = "none";
  
    for (var i = 0; i < divs.length; i++) {
      if (divs[i].id === divId) {
        divs[i].style.display = 'block';
      } else {
        divs[i].style.display = 'none';
      }
    }
  }
  
 