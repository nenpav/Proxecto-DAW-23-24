const $d = document
      $botonLogin = $d.querySelector("#openModalSesion"),
      $modalSesion = $d.querySelector("#modalSesion"),
      $cerrarModalSesion = $d.querySelector("#cerrar")

//console.log($botonLogin)
//console.log($modalSesion)

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

openModal($botonLogin, $modalSesion)
closeModal($cerrarModalSesion, $modalSesion)