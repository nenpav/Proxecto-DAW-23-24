const $d=document,
      $galeria= $d.querySelector("#galeria"),
      $galeriaUser = $d.querySelector(".disenhos"),
      $galeriaComun = $d.querySelector(".disenhosCom"),
      $botonBorrar = $d.querySelector(".borrar")

    
      //console.log($galeriaComun)
let disenos = []

async function ajax(options){
    let {url,method,fExito,fError,data} = options
    try{
        let resp = await fetch(url,{
            method: method || "GET",
            headers: {'Content-type':'application/json; charset=utf-8'},
            body: JSON.stringify(data)
        }),
        json = await resp.json()

        if(!resp.ok){
            throw new Error({
                status:resp.status,
                statusText:resp.statusText
            })
        }
        fExito(json)
    }catch(error){
        fError(error)
    }
}



/* ajax({
    url: "http://localhost/Proxecto-DAW-23-24/Roled/src/json/roled.json",
    fExito:json=>console.log(json),
    fError: error=>console.log(error)
}) */

function renderDisenos(disenos, element, addBorrar){
    element.innerHTML=""
    //console.log(addBorrar)
    if(disenos){
        element.innerHTML = disenos.map(el=>
            `
            <article>
                <figure class="disenos">
                    <img src="../../docsUsuarios/${el.id_usuario}/${el.nombre}" alt="">
                </figure>
                <button class="boton ${addBorrar ? 'btn2' : ''}" data-id="${el.id_design}">Proyectar</button>
                ${addBorrar ? `<button class="boton btn2 borrar" data-id="${el.id_design}">Borrar</button>` : ''}
            </article>
            `
        ).join('')
    }else{
        element.innerHTML = "<h4>No hay diseños disponibles</h4>"
    }
}


 function getDisenos(element, url, addBorrar){
    disenos= []
    ajax({
        url: url,
        fExito: json => {
            
            if (Array.isArray(json)) {
                disenos = json;
               
            } 
            if (typeof json === 'object' && json !== null) {
                disenos = [...json]
                
            } 
            renderDisenos(disenos, element, addBorrar)
        },
        fError: error=>console.log(error)
    })
} 

async function deleteDisenho(id) {
    try {
        const resp = await fetch(`../backend/borrarDis.php?id=${id}`, {
            method: 'DELETE',
        })
        if (!resp.ok) {
            throw new Error({
                status:resp.status,
                statusText:resp.statusText
            })
        }
        const respuesta = await resp.text();
       
        location.reload(); 
    }catch (error) {
        console.error('Error:', error.message);
    }
    
}

if($galeriaUser!=null){
    $galeriaUser.addEventListener("click",e=>{
        e.preventDefault()
        if(e.target.dataset.id && e.target.classList.contains("borrar")){
            deleteDisenho(e.target.dataset.id)
    
        }
    })
}


 $d.addEventListener("DOMContentLoaded", e=>{
    e.preventDefault()
    if($galeriaUser != null){
        getDisenos($galeriaUser, 'http://localhost/Proxecto-DAW-23-24/Roled/src/json/roled.json', true)
        
    }
    if($galeriaComun != null){
        getDisenos($galeriaComun, 'http://localhost/Proxecto-DAW-23-24/Roled/src/json/comunidad.json',false)
    }
}) 