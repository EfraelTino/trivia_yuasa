let preguntas_aleatorias = true;
let mostrar_pantalla_juego_términado = true;
let reiniciar_puntos_al_reiniciar_el_juego = true;
var documento=0;
var puntaje=0;
var iniciar=false;
var numeroMax=4;
var pre = document.getElementById("contenedor");
var dato="";

window.onload = function () {
  base_preguntas = readText("base-preguntas.json");
  interprete_bp = JSON.parse(base_preguntas);
  escogerPreguntaAleatoria();
  mostrarCedula();
};
function mostrarCedula(){  
  documento = document.getElementById("id").value;
  dato = document.getElementById("dato").value;
  iniciar=true;
  iniciar=true;  
}
let pregunta;
let posibles_respuestas;
btn_correspondiente = [
  select_id("btn1"),
  select_id("btn2"),
  select_id("btn3"),
  select_id("btn4")
];
let npreguntas = [];

let preguntas_hechas = 0;
let preguntas_correctas = 0;

function escogerPreguntaAleatoria() {
  let n;
  if (preguntas_aleatorias) {
    n = Math.floor(Math.random() * interprete_bp.length);
  } else {
    n = 0;
  }
  while (npreguntas.includes(n)) {
    n++;
    if (n >= interprete_bp.length) {//interprete_bp.length
      n = 0;
    }

    if (npreguntas.length == interprete_bp.length) {
      if (mostrar_pantalla_juego_términado) {
        pre.style.display = "none";
        iniciar=false;
          swal.fire({
            title: "Juego finalizado",
            text:
              "Puntuación: " + preguntas_correctas + "/" + (numeroMax)+" Tiempo:"+puntaje,
            icon: "success"
          }).then((value) => {
            finEnviarBD();
          });


        }
      if (reiniciar_puntos_al_reiniciar_el_juego) {
      }
      npreguntas = [];
    }
  }
  if(npreguntas.length==numeroMax){
    termiarJuego();
  }else{
    valPRe++;
  }
  npreguntas.push(n);
  preguntas_hechas++;
  escogerPregunta(n);
}
function termiarJuego(){
  pre.style.display = "none";
  if (mostrar_pantalla_juego_términado) {
    iniciar=false;
    swal.fire({
      title: "Juego finalizado",
      text:
        "Puntuación: " + preguntas_correctas + "/" + (numeroMax)+" Tiempo:"+puntaje,
      icon: "success"
    }).then((value) => {
      
      finEnviarBD();
    });;
  }

}
let valPRe=0;
function escogerPregunta(n) {
 
  pregunta = interprete_bp[n];
  select_id("categoria").innerHTML = pregunta.categoria;
  select_id("pregunta").innerHTML = pregunta.pregunta;
  select_id("numero").innerHTML = valPRe;
  moverTexto();
  let pc = preguntas_correctas;
  if (preguntas_hechas > 1) {
    select_id("puntaje").innerHTML = pc + "/" + (numeroMax);
  } else {
    select_id("puntaje").innerHTML = "";
  }
  
  
  style("imagen").objectFit = pregunta.objectFit;
  desordenarRespuestas(pregunta);
  if (pregunta.imagen) {
    select_id("imagen").setAttribute("src", pregunta.imagen);
    style("imagen").height = "200px";
    style("imagen").width = "100%";
  } else {
    style("imagen").height = "0px";
    style("imagen").width = "0px";
    setTimeout(() => {
      select_id("imagen").setAttribute("src", "");
    }, 500);
  }
  
}




function reaparecer(){
  select_id("btn1").style.display="flex";
  select_id("btn2").style.display="flex";
  select_id("btn3").style.display="flex";
  select_id("btn4").style.display="flex";
  
}
function desordenarRespuestas(pregunta) {
  
  posibles_respuestas = [
    pregunta.respuesta,
    pregunta.incorrecta1,
    pregunta.incorrecta2,
    pregunta.incorrecta3,
  ];
  posibles_respuestas.sort(() => Math.random() - 0.5);
  reaparecer();
  
 if(posibles_respuestas[0]=="nop"){
    select_id("btn1").style.display="none";
 }
 if(posibles_respuestas[1]=="nop"){
  select_id("btn2").style.display="none";
}
if(posibles_respuestas[2]=="nop"){
  select_id("btn3").style.display="none";
}
if(posibles_respuestas[3]=="nop"){
  select_id("btn4").style.display="none";
}


  select_id("btn1").innerHTML = posibles_respuestas[0];
  select_id("btn2").innerHTML = posibles_respuestas[1];
  select_id("btn3").innerHTML = posibles_respuestas[2];
  select_id("btn4").innerHTML = posibles_respuestas[3];
}

let suspender_botones = false;

function oprimir_btn(i) {
  if (suspender_botones) {
    return;
  }
  suspender_botones = true;
  if (posibles_respuestas[i] == pregunta.respuesta) {
    preguntas_correctas++;
    btn_correspondiente[i].style.background = "#F1C92E";
  } else {
    btn_correspondiente[i].style.background = "red";
  }
  for (let j = 0; j < 4; j++) {
    if (posibles_respuestas[j] == pregunta.respuesta) {    
      btn_correspondiente[j].style.background = "#F1C92E";
      break;
    }
  }
  setTimeout(() => {
    reiniciar();
    suspender_botones = false;
  }, 3000);
}
var timeleft = 0;
var segundos = 00;


var myfunc = setInterval(function () {
  if(iniciar){
    timeleft = timeleft + 1;
    document.getElementById("reloj").innerHTML =segundos+":"+timeleft;
    if (timeleft > 59) {
      timeleft=0;
      segundos++;
      
    }
    puntaje=segundos+":"+timeleft;
  }
   
  
}, 18)
function finEnviarBD() {
 let score=0;
  if(preguntas_correctas!=0){
    score=(preguntas_correctas*1000)-(segundos+timeleft);
  }
  window.location.href = "6.php?id=" + documento + "&puntos=" + score+ "&preguntas=" + preguntas_correctas + "&dato=" + dato;

}

function reiniciar() {
  for (const btn of btn_correspondiente) {
    btn.style.background = "none";
  }
  escogerPreguntaAleatoria();
}

function select_id(id) {
  return document.getElementById(id);
}

function style(id) {
  return select_id(id).style;
}

function readText(ruta_local) {
  var texto = null;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET", ruta_local, false);
  xmlhttp.send();
  if (xmlhttp.status == 200) {
    texto = xmlhttp.responseText;
  }
  return texto;
}


