const $d2=document,
      $botonVerMas = $d2.querySelector("#mas"),
      $avatar = $d2.querySelector(".img"),
      $cargar = $d2.querySelector("#cargar")

      $botonVerMas.addEventListener("click",e=>{
        e.preventDefault()
        window.location.href = "./design.php"
     })

     $cargar.addEventListener("change",e=>{
        e.preventDefault()
        const nuevaImg = e.target.files[0]
        if(nuevaImg){
                const objectURL = URL.createObjectURL(nuevaImg)
                $avatar.style.backgroundImage = `url(${objectURL})`
        }
     })