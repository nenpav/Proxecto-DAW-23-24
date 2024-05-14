const $d1 = document
      $botonAbrirLogin = $d1.querySelector("#openModalSesion"),
      $modalSesion = $d1.querySelector("#modalSesion"),
      $cerrarModalSesion = $d1.querySelector("#cerrarModSesion"),
      $botonLogin = $d1.querySelector("#login"),
      $cerrarConfReg = $d1.querySelector("#cerrarConfReg"),
      $modalConfReg = $d1.querySelector("#confReg")

//console.log($modalConfReg)

function openModal(el, idModal){
    el.addEventListener("click",e=>{
        idModal.showModal()
    })
}


function closeModal(el, idModal){
    el.addEventListener("click",e=>{
        idModal.close()
    })
}



openModal($botonAbrirLogin, $modalSesion)
closeModal($cerrarModalSesion, $modalSesion)
closeModal($cerrarConfReg, $modalConfReg)