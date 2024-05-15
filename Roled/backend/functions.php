<?php

/* FUNCIONES DE SESIONES */

$session_name = "roled";

/**
 * Inicia una sesión de usuario
 */
function initSession(){
    global $session_name;
    session_name($session_name);
    session_start();
    
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
 * Función que renderiza el menú en base a si existe una sesión activa. Solo para index
 */
function renderMenu($sesion,$conexion){
    $rutaBase = "./src/img/avatarGen.png";
    $rutaAvatar="..";
    if($sesion){
        echo "<ul id='menuConSesion'>";
            echo "<li><a href='#' aria-label='Enlace a index' class='activa'>Inicio<span></span></a></li>";
            echo "<li><a href='./documents/draw.php' aria-label='Enlace a dibujar'>Dibujar<span></span></a></li>";
            echo "<li><a href='' aria-label='Enlace a Explorar'>Explorar<span></span></a></li>";
            echo "<li><a href='./documents/tienda.php' aria-label='Enlace a Tienda'>Tienda<span></span></a></li>";
            echo "<div class='dropdown'>
            <button class='dropbtn'><img id='avatar' src='".buscarRutaAvatar($sesion,$conexion, $rutaBase,$rutaAvatar)."' alt=''></button>
            <div class='dropdown-content'>
              <a href='./miPerfil.html' aria-label='Enlace a Mi Perfil'>Mi Perfil</a>
              <a href='./documents/diseños.php' aria-label='Enlace a mis diseños'>Mis Diseños</a>
              <a href='./backend/sesiones/cerrarSesion.php' aria-label='Cerrar sesión'>Cerrar Sesión</a>
            </div>
        </div>";
    }else{
        echo "<ul id='menuSinSesion'>";
            echo "<li><a href='#' aria-label='Enlace a index' class='activa'>Inicio<span></span></a></li>";
            echo "<li><button id='openModalSesion'>Login<span></span></button></li>";
            echo "<li><a href='./documents/registro.php' aria-label='Enlace a registro'>Sign up<span></span></a></li>";
    
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
    $resultado = $conexion->query("SELECT * FROM usuarios WHERE username='$usuario'");
    /* if(!password_verify($pwd, $fila['pwd'])){
        return false;
    } */ 
    if($resultado->fetch_assoc()['pwd']===$pwd){
        
        return true;
    }
    return false;
}

/**
 * tranforma una contraseña a un hash
 * */ 
function formatoHash($pwd){
    return password_hash($pwd, PASSWORD_DEFAULT);
}

/**
 * Crea una carpeta con el nombre de usuario
 */
function crearCarpetaUser($username){
    $rutaBase = "../../docsUsuarios/".$username;

    if(!file_exists($rutaBase) && mkdir($rutaBase,0777,false)){
        return true;
    }
    return false;
} 


/**
 * Busca la ruta del avatar del usuario. Si no existe pone una foto genérica 
*/
function buscarRutaAvatar($user,$conexion, $rutaBase, $rutaAvatar){
    $ruta = $rutaBase;
    if($resultado = $conexion->query("SELECT avatar FROM usuarios WHERE username='$user'")){
        if($resultado->fetch_assoc()['avatar']!=NULL){
            return $ruta = "$rutaAvatar/docsUsuario/$user/".$resultado->fetch_assoc()['avatar'];
        }
    }
    return $ruta;
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