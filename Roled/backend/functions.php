<?php

/* FUNCIONES DE SESIONES */

$session_name = "roled";

/**
 * Inicia una sesión de usuario
 */
function initSession(){
    global $session_name;
    if(!isset($_SESSION)){
        session_name($session_name);
        session_start();
    }
}

/**
 * Finaliza una sesión de usuario
 */
function endSession(){
    global $session_name;
    session_name($session_name);
    session_start();
    $_SESSION = array();
    if(ini_get("session.use_cookies")){ //Mirar bien que hacía esto que ya no recuerdo
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
}


/* FUNCIONES DE UTILIDADES */

/**
 * Función que renderiza el menú en base a si existe una sesión activa
 */
function renderMenu($sesion){

    if($sesion){
        echo "<ul id='menuConSesion'>";
            echo "<li><a href='#' aria-label='Enlace a index' class='activa'>Inicio<span></span></a></li>";
            echo "<li><a href='' aria-label='Enlace a dibujar'>Dibujar<span></span></a></li>";
            echo "<li><a href='' aria-label='Enlace a Explorar'>Explorar<span></span></a></li>";
            echo "<li><a href='Tienda' aria-label='Enlace a Tienda'>Tienda<span></span></a></li>";
            echo "<div class='dropdown'>
                    <button class='btn btn-default dropdown-toggle' type='button' id='dropdownMenu1' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>
                        <img id='avatar' src='' alt='menu desplegable de usuario'>
                        <span class='caret'></span>
                    </button>
                    <ul class='dropdown-menu' aria-labelledby='dropdownMenu1'>
                        <li><a href='#'>Action</a></li>
                        <li><a href='#'>Another action</a></li>
                        <li><a href='#'>Something else here</a></li>
                        <li role='separator' class='divider'></li>
                        <li><a href='#'>Separated link</a></li>
                    </ul>
                </div>";
    }else{
        echo "<ul id='menuSinSesion'>";
            echo "<li><a href='#' aria-label='Enlace a index' class='activa'>Inicio<span></span></a></li>";
            echo "<li><button id='openModalSesion'>Login<span></span></button></li>";
            echo "<li><a href='./documents/registro.html' aria-label='Enlace a registro'>Sign up<span></span></a></li>";
    
    echo "</ul>";
    }   
}

/* FUNCIONES DE GESTIÓN DE USUARIOS */

/**
 * comprueba si el usuario existe en base a su nombre
 */
function isUserExits($nombre, $conexion){
    $resultado = $conexion->query("SELECT * FROM usuarios WHERE username= '$nombre'");
     return $resultado->num_rows > 0;
}


/**
 * Comprueba si la contraseña es correcta dado un nombre de usuario
 */
function isCorrectPwd($usuario, $pwd, $conexion){
    $resultado = $conexionBBDD->query("SELECT * FROM usuarios WHERE nombre='$user'");
    /* if(!password_verify($pwd, $fila['pwd'])){
        return false;
    } */
    if(!$resultado){
        echo "Error en la consulta: ".$conexionBBDD->error;
        return false;
    }   
    if($resultado->fetch_assoc()['pwd']===$pwd){
        return true;
    }
    return false;
}


//Función que tranforma una contraseña a un hash
function formatoHash($pwd){
    return password_hash($pwd, PASSWORD_DEFAULT);
}


/* FUNCIONES DE BBDD */

/**
 * Consulta genérica de tipo select
 */
function select($query, $conexion){
    $resultArr = array();
    if(!$resultado = $conexion->query($query)){
        throw new Exception("Error en la búsqueda de diseños");
    }
    while($fila = $resultadoQuery->fetch_assoc()){
        $resultArr = $fila;
    }

    return $resultArr;
}



/* FUNCIONES DE VALIDACIÓN */

/**
 * Valida que los datos no estén vacíos
 */
function obligatorios($array){
    foreach($array as $a){
        if(empty($a)){
            return false;
        }
    }
    return true;
}


/* FUNCIONES DE JSON */

/**
 * Convierte un array en un JSON y lo guarda en el
 * fichero indicado por param
 */
function convertirJson($array, $fichero){
    $json = json_enconde($array);
    file_put_contents($fichero, "");
    file_put_contents($fichero, $json);
}


?>