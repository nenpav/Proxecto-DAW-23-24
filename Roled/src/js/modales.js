const $d1 = document
      $botonAbrirLogin = $d1.querySelector("#openModalSesion"),
      $modalSesion = $d1.querySelector("#modalSesion"),
      $cerrarModalSesion = $d1.querySelector("#cerrarModSesion"),
      $botonLogin = $d1.querySelector("#login"),
      $cerrarConfReg = $d1.querySelector("#cerrarConfReg"),
      $modalConfReg = $d1.querySelector("#confReg"),
      $cerrarConfSave = $d1.querySelector("#cerrarConfSave"),
      $modalConfSave = $d1.querySelector("#confSave"),
      $botonRegistro = $d1.querySelector("#registro"),
      $botonLoginDesdeRegistro = $d1.querySelector("#loginR"),
      $modalSubida = $d1.querySelector("#save"),
      $cerrarConfSubida = $d1.querySelector("#cerrarSave")

//console.log($botonLoginDesdeRegistro)

function openModal(el, idModal){
    if(el && idModal){
        el.addEventListener("click",e=>{
            idModal.showModal()
        })
    }
}


function closeModal(el, idModal){
    if(el && idModal){
        el.addEventListener("click",e=>{
            idModal.close()
        })
    }
}

openModal($botonAbrirLogin, $modalSesion)
closeModal($cerrarModalSesion, $modalSesion)
closeModal($cerrarConfReg, $modalConfReg)
closeModal($cerrarConfSave,$modalConfSave)
closeModal($cerrarConfSubida, $modalSubida)

if($botonRegistro != undefined){
    $botonRegistro.addEventListener("click",e=>{
        e.preventDefault()
        window.location.href = "./documents/registro.php"
    })
}

if($botonLoginDesdeRegistro != undefined){
    $botonLoginDesdeRegistro.addEventListener("click",e=>{
        e.preventDefault()
        window.location.href = "../index.php?index=ok"
    })
}