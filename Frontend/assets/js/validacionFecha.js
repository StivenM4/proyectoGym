function formatDate() {
// Obtén el valor del campo de fecha en formato AAAA-MM-DD
var fechaInput = document.getElementById('FechaPago').value;

// Convierte la fecha a formato YYYY-MM-DD
var fecha = new Date(fechaInput);
var fechaFormateada = fecha.toISOString().slice(0, 10);

// Actualiza el valor del campo de fecha con el formato deseado
document.getElementById('FechaPago').value = fechaFormateada;
}