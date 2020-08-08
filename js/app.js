document.getElementById("formTask").addEventListener("submit", buscarcedula);
const visual = document.getElementById("lbltipAddedComment");

function buscarcedula(e) {
  let nombre = document.getElementById("nombre").value;

  /*
   **************       para hacer la comparacion desde la base de datos ponen lo datos en la variable cedula
   */
  cedula = ["402", "201", "506", "780"];

  for (var i = 0; i < cedula.length; i++) {
    if (nombre == cedula[i]) {
      window.location.href = "../ProOnliPc10/home.html";
    } else if (nombre != cedula[i]) {
      visual.innerHTML = "esta cedula fue usada para votar";
    }
  }

  e.preventDefault();
}
