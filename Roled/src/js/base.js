 const $d4 = document, 
        $menuHamb = $d4.querySelector(".navbar-toggler"),
        $menuMovil = $d4.querySelector("#menuMovil"),
        $cerrarMenuHamb = $d4.querySelector(".cerrar-menuHam")



    $menuHamb.addEventListener("click",e=>{
        e.preventDefault()
        $menuHamb.classList.add("d-none")
        $menuMovil.classList.remove("d-none")
        $menuMovil.classList.add("d-block")
    }) 

    $cerrarMenuHamb.addEventListener("click",e=>{
        e.preventDefault()
        $menuHamb.classList.remove("d-none")
        $menuMovil.classList.add("d-none")
        $menuMovil.classList.remove("d-block")
    })

    