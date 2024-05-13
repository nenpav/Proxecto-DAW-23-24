const $d=document,
        $formRegistro = $d.querySelector("#formRegistro"),
        $email = $formRegistro.email,
        $username = $formRegistro.user,
        $pwd =$formRegistro.pwd,
        $pwd2=$formRegistro.pwd2,
        $date=$formRegistro.fnac,
        $error = $d.querySelector("#error"),
        $inputs = $d.querySelectorAll("input"),
        $boton = $d.querySelector("#registroForm")

function datosObligatorios(){
    $error.innerHTML=""
    $inputs.forEach(el => {
        if(el.value==""){
            $error.innerHTML="Faltan datos obligatorios"
            return false
        }
    });
    return true
}

function pwd(){
    const regPwd = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/
    $error.innerHTML=""
    if(!regPwd.test($pwd)){
        $error.innerHTML="La contraseña no es válida"
        return false
    }
    return true
}

function pwd2(){
    $error.innerHTML=""
    if($pwd.value != $pwd2.value){
        $error.innerHTML="Las contraseñas no son iguales"
        return false
    }
    return true
}

function userName(){
    const regUser = /^[a-zA-Z0-9-_]{3,10}$/
    if(!regUser.test($username)){
        $error.innerHTML="El nombre de usuario no es válido"
        return false
    }
    return true
}



$username.addEventListener("change",e=>{
    if(!userName()){
        $username.focus()
    }
})

$pwd.addEventListener("change",e=>{
    if(!pwd()){
        $pwd.focus()
    }
})

$pwd2.addEventListener("change",e=>{
    if(!pwd2()){
        $pwd2.focus()
    }
})

$d.addEventListener("DOMContentLoaded",e=>{
    $boton.disabled=true
})

if(datosObligatorios()){
    $boton.disabled=true
}