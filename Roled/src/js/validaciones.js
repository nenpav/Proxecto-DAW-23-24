 const $d=document,
        $formRegistro = $d.querySelector("#formR"),
        $email = $formRegistro.email,
        $username = $formRegistro.user,
        $pwd =$formRegistro.pwd,
        $pwd2=$formRegistro.pwd2,
        $date=$formRegistro.fnac,
        $error = $d.querySelector("#error"),
        $inputs = $d.querySelectorAll("input")
    
//console.log($pwd.value)

function datosObligatorios(){
    $error.innerHTML=""
    $inputs.forEach(el => {
        if(el.value==""){
            $error.innerHTML="Faltan datos obligatorios"
            return false
        }
    })
    return true
}

 function email(){
    const regEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
    $error.innerHTML=""
    if(!regEmail.test($email.value)){
        $error.innerHTML="El email no es válido"
        $email.classList.add("error")
        return false
    }
    $email.classList.remove("error")
    return true
} 


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

 function userName(){
    const regUser = /^[a-zA-Z0-9-_]{3,10}$/
    if(!regUser.test($username.value)){
        $error.innerHTML="El nombre de usuario no es válido"
        $username.classList.add("error")
        return false
    }
    $username.classList.remove("error")
    return true
}

function fechaNac(){
    const hoy = new Date()
    const fechaNac = new Date($date.value)
    const edad = hoy.getFullYear() - fechaNac.getFullYear()
    //console.log(edad)
    if(edad<=10){
        $date.classList.add("error")
        $error.innerHTML="La edad mínima es de 10 años"
        return false
    }
    $date.classList.remove("error")
    return true
}

$formRegistro.addEventListener("submit",e=>{
    e.preventDefault() 
    $error.innerHTML = ""
   switch (true) {
    case !email():
        break;
    case !userName():
        break;
    case !pwd():
        break; 
    case !pwd2():
        break;
    case !fechaNac():
        break;
    default:
        $formRegistro.submit()  
        break;
   }
}) 

