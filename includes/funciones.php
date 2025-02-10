<?php

function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}
//Valida la pagina en la que estamos
function pagina_actual($path) : bool{
    return str_contains($_SERVER['PATH_INFO'] ?? '/', $path) ? true : false;
}

// Función que revisa que el usuario este autenticado
function isAuth() : bool {
    if (!isset($_SESSION)) {
        session_start();
    }
    return isset($_SESSION['nombre']) && !empty($_SESSION);
}

// Función que revisa si el usuario es admin
function isAdmin() : bool {
    if (!isset($_SESSION)) {
        session_start();
    }
    return isset($_SESSION['admin']) && !empty($_SESSION['admin']);
}

// Retornar una animación aleatoria
function aos_animation() : void {
    $efectos = ['fade-up', 'fade-down', 'flip-left', 'flip-right' ,'zoom-in-up', 'zoom-in-down', 'zoom-out'];

    $efecto = array_rand($efectos, 1); //Devuelve una posicion aleatoria del arreglo

    echo $efectos[$efecto]; // Mostrar el valor 

}