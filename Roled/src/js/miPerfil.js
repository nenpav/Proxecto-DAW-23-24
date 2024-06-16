const $d2=document,
      $botonVerMas = $d2.querySelector("#mas"),
      $avatar = $d2.querySelector(".img"),
      $cargar = $d2.querySelector("#cargar"),
      $cambiarPwd = $d2.querySelector("#cambioPwd"),
      $error = $d2.querySelector("#errorPwd"),
      $pwd =$d2.querySelector("#pwd"),
      $pwd2=$d2.querySelector("#pwd2"), 
      $form = $d2.querySelector("#formPwd")


      function pwd(){
        const regPwd = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[.@$!%*?&])[A-Za-z\d.@$!%*?&]{8,15}$/
        $error.innerHTML=""
        if(!regPwd.test($pwd.value)){
            $error.innerHTML="La contraseña no es válida"
            $pwd.classList.add("error")
            return false
        }
        $pwd.classList.remove("error")
        return true
    }  
    
    function pwd2(){
        $error.innerHTML=""
        if($pwd.value != $pwd2.value){
            $error.innerHTML="Las contraseñas no son iguales"
            $pwd2.classList.add("error")
            return false
        }
        $pwd2.classList.remove("error")
        return true
    }


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

     $cambiarPwd.addEventListener("click",e=>{
        e.preventDefault()
        if(pwd() && pwd2()){
        
            $form.submit()       
        }
     })