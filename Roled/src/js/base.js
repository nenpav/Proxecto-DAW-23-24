 const $d4 = document, 
        $menuHamb = $d4.querySelector(".navbar-toggler"),
        $menuMovil = $d4.querySelector("#menuMovil")



    $menuHamb.addEventListener("click",e=>{
        e.preventDefault()
        $menuHamb.classList.toggle("abrirHamb")
        if($menuHamb.classList.contains("abrirHamb")){
            $menuMovil.classList.remove("d-none")
            $menuMovil.classList.add("d-block")
        }else{
            $menuMovil.classList.add("d-none")
            $menuMovil.classList.remove("d-block")
        }
    }) 


    