<?php

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
            echo "<li><a href='' aria-label='Enlace a login'>Login<span></span></a></li>";
            echo "<li><a href='' aria-label='Enlace a registro'>Sign up<span></span></a></li>";
    }
    echo "</ul>";
}

/**
 * Comprueba si existe sesión de usuario
 */
function comprobarSesion(){

}
?>