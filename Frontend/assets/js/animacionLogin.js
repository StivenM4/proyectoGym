const $btnIngreso = document.querySelector(".ingreso"),
  $btnRegistro = document.querySelector(".registarse"),
  $conRegistro = document.querySelector(".registro"),
  $conLogeo = document.querySelector(".login");

document.addEventListener("click", (e) => {
  if (e.target === $btnIngreso || e.target === $btnRegistro) {
    $conLogeo.classList.toggle("active");
    $conRegistro.classList.toggle("active");
  }
});
