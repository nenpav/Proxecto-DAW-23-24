 const $d4 = document, 
        $menuHamb = $d4.querySelector(".navbar-toggler"),
        $menuMovil = $d4.querySelector("#menuMovil")



    $menuHamb.addEventListener("click",e=>{
        e.preventDefault()
        console.log("Hamburguesa clickeada");
        e.target.classList.toggle("collapsed")
        $menuMovil.classList.toggle("show")
    }) 

    