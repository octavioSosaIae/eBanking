window.onload=()=>{
    agregarEventos();
}

function agregarEventos(){
    let botonsecion = document.querySelector("#botonlogin")
    let botonregistro= document.querySelector("#botonregistrarse")
    let panelvista= document.querySelector("#contenedorformulario");
    botonsecion.onclick = ()=>{
        panelvista.style.left ="0px";
    }
    botonregistro.onclick = ()=>{
        panelvista.style.left ="-400px";
    }
}
