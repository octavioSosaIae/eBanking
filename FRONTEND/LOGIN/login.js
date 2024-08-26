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
    let formElement = document.querySelector("#panelformulario");
    formElement.onsubmit = async (e) => {
        e.preventDefault();
        let fromFormData = new FormData(formElement);
        //let  url='http://localhost/LOGIN/back/controlador/usuario_controlador.php?funcion=login'; 

        let config = {
            method: 'POST',
            body: fromFormData
        };
        let respuesta = await fetch(url, config);
        let datos = await respuesta.json();

        console.log(datos);

        if(datos.length>0){
            alert ('usuario correcto')
        }else(
            alert ('usuario o contraseña incorrecta')
        )
    }
}


}

