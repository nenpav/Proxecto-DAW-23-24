<?php

$session_name = "roled";
$conexionBBDD = new mysqli('localhost','root','','roled');

/* FUNCIONES DE SESIONES */

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
function renderMenu($sesion){
    global $conexionBBDD;
    $rutaBase = "./src/img/avatarGen.png";
    $rutaAvatar="..";
    if($sesion){
        echo '<button class="navbar-toggler" type="button" aria-label="Toggle navigation">';
            echo '<span class="navbar-toggler-icon"></span>';
        echo "</button>";
        echo "<ul id='menuConSesion'>";
            echo "<li><a href='#' aria-label='Enlace a index' class='activa'>Inicio<span></span></a></li>";
            echo "<li><a href='./documents/draw.php' aria-label='Enlace a dibujar'>Dibujar<span></span></a></li>";
            echo "<li><a href='./documents/comunity.php' aria-label='Enlace a Explorar'>Explorar<span></span></a></li>";
            echo "<li><a href='./documents/tienda.php' aria-label='Enlace a Tienda'>Tienda<span></span></a></li>";
            echo "<div class='dropdown'>
            <button class='dropbtn'><img id='avatar' src='".buscarRutaAvatar($sesion, $rutaBase,$rutaAvatar)."' alt=''></button>
            <div class='dropdown-content'>
              <a href='./documents/miPerfil.php' aria-label='Enlace a Mi Perfil'>Mi Perfil</a>
              <a href='./documents/design.php' aria-label='Enlace a mis diseños'>Mis Diseños</a>
              <a href='./backend/sesiones/cerrarSesion.php' aria-label='Cerrar sesión'>Cerrar Sesión</a>
            </div>
            </div>";
            echo "</ul>";
            echo "<ul id='menuMovil' class='navbar-nav d-none'>";
            echo '<li class="nav-item"><button class="cerrar-menuHam" type="button" aria-label="Cerrar menú">X</button></li>';
            echo "<li><a href='#' aria-label='Enlace a index'>Inicio<span></span></a></li>";
            echo "<li><a href='./documents/comunity' aria-label='Enlace a Explorar' class='activa'>Explorar<span></span></a></li>";
            echo "<li><a href='./documents/tienda.php' aria-label='Enlace a Tienda'>Tienda<span></span></a></li>";
            echo '<li><a href="./documents//miPerfil.php" aria-label="Enlace a Mi Perfil">Mi Perfil</a></li>';
            echo '<li><a href="./documents/design.php" aria-label="Enlace a mis diseños">Mis Diseños</a></li>';
            echo '<li><a href="../backend/sesiones/cerrarSesion.php" aria-label="Cerrar sesión">Cerrar Sesión</a></li>';
            echo "</ul>";
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
function isUserExits($nombre){
    global $conexionBBDD;
    $resultado = $conexionBBDD->query("SELECT * FROM usuarios WHERE username= '$nombre'");
     return $resultado->num_rows > 0;
}


/**
 * Comprueba si la contraseña es correcta dado un nombre de usuario
 */
function isCorrectPwd($usuario, $pwd){
    global $conexionBBDD;
    $resultado = $conexionBBDD->query("SELECT * FROM usuarios WHERE username='$usuario'");
    if(password_verify($pwd, $resultado->fetch_assoc()['pwdHash'])){
        return true;
    } 
    /* if($resultado->fetch_assoc()['pwdHash']===$pwd){
        
        return true;
    } */
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
  * Elimina la carpeta en caso de error durante el registro
  */
  function eliminarCarpetaUser($username) {
    $rutaBase = "../../docsUsuarios/".$username;
    if (is_dir($rutaBase)) {
        rmdir($rutaBase); 
    }
}

/**
 * Busca la ruta del avatar del usuario. Si no existe pone una foto genérica 
*/
function buscarRutaAvatar($user, $rutaBase, $rutaAvatar){
    global $conexionBBDD;
    $ruta = $rutaBase;
    if($resultado = $conexionBBDD->query("SELECT avatar FROM usuarios WHERE username='$user'")){
        $fila = $resultado->fetch_assoc();
        if($fila['avatar']!=NULL){
            return "$rutaAvatar/docsUsuarios/$user/avatar/".$fila['avatar'];
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
    $json = json_encode($array);
    file_put_contents($fichero, "");
    file_put_contents($fichero, $json);
}

/* FUNCIONES DE CONSULTAS */

function obtenerIdUsuario($username){
    global $conexionBBDD;
    $id_usuario=-1;
    if($resultado = $conexionBBDD->query("SELECT id_usuario FROM usuarios WHERE username='$username'")){
        $id_usuario = $resultado->fetch_assoc()['id_usuario'];
    }
    return $id_usuario;
}

?>