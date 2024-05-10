const $d = document
      $botonLogin = $d.querySelector("#openModalSesion"),
      $modalSesion = $d.querySelector("#modalSesion"),
      $cerrarModalSesion = $d.querySelector("#cerrarModSesion"),
      $botonRegistro = $d.querySelector("#openModalRegistro"),
      $modalRegistro = $d.querySelector("#modalRegistro"),
      $cerrarModalRegistro = $d.querySelector("#cerrarModRegistro"),
      $botonRegistro = $d.querySelector("#registro"),
      $botonLogin = $d.querySelector("#login")

//console.log($botonLogin)
//console.log($modalSesion)
//console.log($botonRegistro)

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

$botonRegistro.addEventListener("click",e=>{
    e.preventDefault()
    openModal($botonRegistro, $modalRegistro)
})

$botonLogin.addEventListener("click",e=>{
    e.preventDefault()
    openModal($botonLogin, $modalSesion)
})


openModal($botonLogin, $modalSesion)
closeModal($cerrarModalSesion, $modalSesion)
openModal($botonRegistro, $modalRegistro)
closeModal($cerrarModalRegistro, $modalRegistro)