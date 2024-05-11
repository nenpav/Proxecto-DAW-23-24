const $d = document
      $botonAbrirLogin = $d.querySelector("#openModalSesion"),
      $modalSesion = $d.querySelector("#modalSesion"),
      $cerrarModalSesion = $d.querySelector("#cerrarModSesion"),
      $botonLogin = $d.querySelector("#login")


console.log($modalSesion)
console.log($botonRegistro)

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
    $modalRegistro.showModal()
    $modalSesion.close()
    console.log("Se pulsó el botón")
}) 

openModal($botonAbrirLogin, $modalSesion)
closeModal($cerrarModalSesion, $modalSesion)
