const $d = document
      $botonAbrirLogin = $d.querySelector("#openModalSesion"),
      $modalSesion = $d.querySelector("#modalSesion"),
      $cerrarModalSesion = $d.querySelector("#cerrarModSesion"),
      $botonLogin = $d.querySelector("#login")


console.log($modalSesion)

function openModal(el, idModal){
    el.addEventListener("click",el=>{
        
        idModal.showModal()
    })
}


function closeModal(el, idModal){
    el.addEventListener("click",el=>{
        idModal.close()
    })
}



openModal($botonAbrirLogin, $modalSesion)
closeModal($cerrarModalSesion, $modalSesion)
