var data = "";

presidente();

function presidente() {
  let tasks = [
    {
      name: "luis",
      apellido: 450,
      Partido: 250,
      Foto:
        "https://ih1.redbubble.net/image.810020444.7449/sss,small,product_square,1000x1000.u1.jpg",
    },
    {
      name: "luis",
      apellido: 450,
      Partido: 250,
      Foto:
        "https://ih1.redbubble.net/image.810020444.7449/sss,small,product_square,1000x1000.u1.jpg",
    },
    {
      name: "luis",
      apellido: 450,
      Partido: 250,
      Foto:
        "https://ih1.redbubble.net/image.810020444.7449/sss,small,product_square,1000x1000.u1.jpg",
    },
    {
      name: "luis",
      apellido: 450,
      Partido: 250,
      Foto:
        "https://ih1.redbubble.net/image.810020444.7449/sss,small,product_square,1000x1000.u1.jpg",
    },
    {
      name: "luis",
      apellido: 450,
      Partido: 250,
      Foto:
        "https://ih1.redbubble.net/image.810020444.7449/sss,small,product_square,1000x1000.u1.jpg",
    },
  ];
  let taskview = document.getElementById("tasks");
  taskview.innerHTML = "";

  for (let i = 0; i < tasks.length; i++) {
    taskview.innerHTML += `
   
    

    <li class="Ticket">  <img
    src="${tasks[i].Foto}"
    style="width: 150px; height: 150px;"
  />
  
  <p> nombre  : ${tasks[i].name}   </p>
  <p> apellido : ${tasks[i].apellido} </p>
  
  <button class="btn btn-primary" onclick="selecionar('${tasks[i].name}')">
  selecionar
  </button>
  
  </li>
           
    `;
  }
}

function boto() {
  if (data.length > 0) {
    window.location.href = "../ProOnliPc10/home.html";
  } else {
    window.alert("tiene que votar");
  }
}

function selecionar(id) {
  data = id;
}
