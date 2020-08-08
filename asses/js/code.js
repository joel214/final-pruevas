var palabras = ["manzana", "auto", "carne", "dulces", "muerte","manidad","humano","persona","gente","hombre","mujer","bebé",
"niño", "niña","adolescente","adulto", "adulta","anciano", "anciana","don", "doña","señor", "señora","caballero","dama",
"cuerpo","pierna","pie","talón","espinilla","rodilla","muslo","cabeza","cara","boca","labio","diente","ojo","nariz","barba",
"bigote","cabello","oreja","cerebro","estómago","brazo","codo","hombro","mano","muñeca","palma"];

var respuesta = [];



var sam=-1;

var j = document.createElement("TABLE");
var y = document.createElement("TR");
var listo = 0;
var fail = -1;
var ima;
var s = 0; 
var aho = 0;
var i = 1;
var salec;
var con;

s = Math.floor(Math.random() * 50);
var reset = false;
 salec = palabras[s];
 
 con = salec.length;


 function myfuncion(){

    for(i; i <= con; i++)
{
    j.setAttribute("id", "myTable");
    document.body.appendChild(j);
  
  
    y.setAttribute("id", "myTr");
    document.getElementById("myTable").appendChild(y);
  
    var z = document.createElement("TD");
    var t = document.createTextNode("_");
    z.appendChild(t);
    document.getElementById("myTr").appendChild(z);
  document.getElementById("adivina").appendChild(j);
    
} 
     
 }
 




function jugar(x) {
   
    reset = false;

    for(i; i <= con; i++)
    {
        j.setAttribute("id", "myTable");
        document.body.appendChild(j);
      
        y.setAttribute("id", "myTr");
        document.getElementById("myTable").appendChild(y);
      
        var z = document.createElement("TD");
        var t = document.createTextNode("_");
        z.appendChild(t);
        document.getElementById("myTr").appendChild(z);
      document.getElementById("adivina").appendChild(j);
        
    } 
   
sam = -1;

    for( var a = 0; a <= con ; a++){
        
sam++;

    

  if (  salec.charAt(a) == x){

  

respuesta[sam] =x; 
var ret = document.getElementById("myTable").rows[0].cells;
ret[sam].innerHTML = x;


if ( salec.toString() == respuesta.join('')){

    
    var intento = document.getElementById("perder")

    var perdiste = document.createTextNode("eres un ganador. ¿quiere volver a intentar?");
intento.appendChild(perdiste);
document.appendChild(intento);

 }

}else{

        fail++
       
    }

 }
 


 if (fail == con){
     fail = -1;
       aho++;
       switch(aho){
        case 1:
        document.getElementById("imagenes").src ="imagen/fail1.jpg";
         break;
        case 2:
            document.getElementById("imagenes").src ="imagen/fail2.jpg";
        break;
        case 3:
            document.getElementById("imagenes").src ="imagen/fail3.jpg";
        break;
        case 4:
            document.getElementById("imagenes").src ="imagen/fail4.jpg";
        break;
        case 5:
            document.getElementById("imagenes").src ="imagen/fail5.jpg";

            var intento = document.getElementById("perder")

            var perdiste = document.createTextNode("buen intento, ¿quiere volver a intentar?");
  intento.appendChild(perdiste);
  document.appendChild(intento);


        break;
        
         }
    

}else{
    fail = -1;
}
 a = 0;


}

 
function res()
{

    location.reload();
}




//50 0-49