<?php

/**
 * Este archivo debe set incluido en todos los archivos del sitio 
 * y será el primero en cargarse siempre.
 * 
 *
 * En este archivo:
 *  - Creamos o reanudamos la cookie de sesión
 *  - Incluimos el archivo de utilidades
 *  - Definimos las constantes necesarias
 *  - Verificamos si existe una sesión activa o si la sesión ya ha caducado.
 */

/**
 * Crear o reanudar una sesión PHP
 * session_start()  crea una sesión o reanuda la actual basada en un 
 *                  identificador de sesión pasado mediante una petición GET o 
 *                  POST, o pasado mediante una cookie.
 *                  http://php.net/manual/es/function.session-start.php   
 */
session_start();

// Definimos las constantes que nos pueden ser útiles en todo el sitio.
define('DOCUMENT_ROOT_RELATIVA', '/anp/sesiones/sesion7/s7/sesionesN/');
define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);

// incluimos las utilidades
require_once( 'utils.php' );




// Si no hay una sesión creada, redireccionar al index para que inicie sesión.
// print_r($_SERVER['REQUEST_URI']);
// echo '/' . urlencode(DOCUMENT_ROOT_RELATIVA) . 'index.php[\?\w*]?/';
if( !preg_match( "/" . urlencode(DOCUMENT_ROOT_RELATIVA) . 'index.php[\?\w*]?/', urlencode($_SERVER['REQUEST_URI']))  &&
 $_SERVER['REQUEST_URI'] != DOCUMENT_ROOT_RELATIVA . 'registro.php' ){
  if( !isset( $_SESSION['email'] ) ) {
    http_redirect( 'index.php' );
  }
}