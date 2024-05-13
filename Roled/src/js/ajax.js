const $d=document,
      $galeria= $d.querySelector("#galeria")

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

//Sin probar
function renderDisenos(disenos){
    $galeria.innerHTML=""
    if(disenos.length>0){
        $galeria.innerHTML = disenos.map((el,i)=>
            `
                <article>
                    <figure>
                        <img src="../../docsUsuario/${el.id}.png" alt="">
                    </figure>
                    <p>${el.usuario_id}</p>
                    <button data-id="${el.id}">Proyectar</button>
                </article>
            `
        )
    }else{
        $galeria.innerHTML = "No hay diseños disponibles"
    }
}



function getDisenos(){
    
}

