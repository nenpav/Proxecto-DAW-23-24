const $d=document,
      $galeria= $d.querySelector("#galeria"),
      $galeriaUser = $d.querySelector(".disenhos"),
      $galeriaComun = $d.querySelector(".disenhosCom")

    
      console.log($galeriaComun)
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

function renderDisenos(disenos, element){
    element.innerHTML=""
    //console.log(disenos)
    if(disenos){
        element.innerHTML = disenos.map(el=>
            `
                <article>
                    <figure class="disenos">
                        <img src="../../docsUsuarios/${el.id_usuario}/${el.nombre}" alt="">
                    </figure>
                    <button class="boton" data-id="${el.id_design}">Proyectar</button>
                </article>
            `
        )
    }else{
        element.innerHTML = "<h4>No hay diseños disponibles</h4>"
    }
}


 function getDisenos(element, url){
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
            renderDisenos(disenos, element)
        },
        fError: error=>console.log(error)
    })
} 



 $d.addEventListener("DOMContentLoaded", e=>{
    e.preventDefault()
    if($galeriaUser != 'undefined'){
        getDisenos($galeriaUser, 'http://localhost/Proxecto-DAW-23-24/Roled/src/json/roled.json')
        
    }
    if($galeriaComun != 'undefined'){
        getDisenos($galeriaComun, 'http://localhost/Proxecto-DAW-23-24/Roled/src/json/comunidad.json')
    }
}) 