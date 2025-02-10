<?php

namespace Controllers;

use Classes\Email;
use Classes\Paginacion;
use Model\Ponente;
use Model\Usuario;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image; //Esta es la clase para subir imagenes

class PonentesController {

   public static function index(Router $router){

      $pagina_actual  = $_GET['page']; //Pagina en la que estamos
      $pagina_actual  = filter_var($pagina_actual, FILTER_VALIDATE_INT); //Validar que sea un int

      if (!$pagina_actual || $pagina_actual < 1) {
         header('Location: /admin/ponentes?page=1'); //Redireccion si la pagina no esta o es menor a 1
      }

      $total_registros = Ponente::total();
      $registros_por_pagina = 3;
      $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total_registros);

     // debuguear($paginacion->pagina_siguiente());

   //   debuguear($paginacion);

      if ($paginacion->total_paginas() < $pagina_actual) {
         header('Location: /admin/ponentes?page=1'); //Redireccion si la nos pasamos del maximo de paginas
      }

      $ponentes = Ponente::paginar($registros_por_pagina, $paginacion->offset());

      if(!isAdmin()){
         header('Location: /login');
      }
     // debuguear($ponentes);

      // Render a la vista 
      $router->render('admin/ponentes/index', [
         'titulo' => 'Ponenetes - Conferensistas',
      //   'alertas' => $alertas
         'ponentes' => $ponentes,
         'paginacion' => $paginacion->paginacion()
      ]);
   }

   public static function crear(Router $router){
      if(!isAdmin()){
         header('Location: /login');
      }
      $alertas = [];
      $ponente = new Ponente;
  
      if($_SERVER['REQUEST_METHOD'] === 'POST') {

         if(!isAdmin()){
            header('Location: /login');
         }
         
         //Leer imagen
         if (!empty($_FILES['imagen']['tmp_name'])) {
            
            $carpetaImagenes = '../public/img/speakers';

            //Crear la carpeta si no existe
            if (!is_dir($carpetaImagenes)) {
               mkdir($carpetaImagenes, 0755, true);
            }

            // Crear imagenes
            $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('png', 80);
            $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('webp', 80);

            //Generar nombre aleatorio
            $nombre_imagen = md5(uniqid(rand(), true));

            $_POST['imagen'] = $nombre_imagen;
         }

         //Pasar el arreglo de redes a un string
         $_POST['redes'] = json_encode( $_POST['redes'], JSON_UNESCAPED_SLASHES); //JSON_UNESCAPED_SLASHES, formatea bien la URL

         $ponente->sincronizar($_POST);

         //Validar
         $alertas = $ponente->validar();

         //Guardar el registro
         if (empty($alertas)) {
            //Guardar las imagenes
            $imagen_png->save($carpetaImagenes . '/' . $nombre_imagen . '.png');
            $imagen_webp->save($carpetaImagenes . '/' . $nombre_imagen . '.webp');

            //Guardar en la BD
            $resultado = $ponente->guardar();

            if ($resultado) {
               header('Location: /admin/ponentes');
            }
         }
      }

      $redes = json_decode($ponente->redes);

      // Render a la vista 
      $router->render('admin/ponentes/crear', [
         'titulo' => 'Registrar Ponentes',
         'alertas' => $alertas,
         'ponente' => $ponente,
         'redes' => $redes
      ]);
   }

   public static function editar(Router $router){
      if(!isAdmin()){
         header('Location: /login');
      }
      $alertas = [];
      $ponente = '';

      //Validar el id
      $id = $_GET['id'];
      $id = filter_var($id, FILTER_VALIDATE_INT);

      if (!$id) {
         header('Location: /admin/ponentes');
      } 

      //Obtener el ponente a editar 
      $ponente = Ponente::find($id);

      if (!$ponente) {
         header('Location: /admin/ponentes');
      }

      $ponente->imagen_actual = $ponente->imagen;

      if($_SERVER['REQUEST_METHOD'] === 'POST') {
         if(!isAdmin()){
            header('Location: /login');
         }

         //Leer imagen
         if (!empty($_FILES['imagen']['tmp_name'])) {
            
            $carpetaImagenes = '../public/img/speakers';

            //Crear la carpeta si no existe
            if (!is_dir($carpetaImagenes)) {
               mkdir($carpetaImagenes, 0755, true);
            }

            // Crear imagenes
            $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('png', 80);
            $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('webp', 80);

            //Generar nombre aleatorio
            $nombre_imagen = md5(uniqid(rand(), true));

            $_POST['imagen'] = $nombre_imagen;
         } else {
            $_POST['imagen'] = $ponente->imagen_actual;
         }

         //Pasar el arreglo de redes a un string
         $_POST['redes'] = json_encode( $_POST['redes'], JSON_UNESCAPED_SLASHES); //JSON_UNESCAPED_SLASHES, formatea bien la URL

         $ponente->sincronizar($_POST);

         //Validar
         $alertas = $ponente->validar();

         //Guardar el registro
         if (empty($alertas)) {
            //Si hay una nueva imagen
            if (isset($nombre_imagen)) {
               //Guardar las imagenes
               $imagen_png->save($carpetaImagenes . '/' . $nombre_imagen . '.png');
               $imagen_webp->save($carpetaImagenes . '/' . $nombre_imagen . '.webp');
            }  

            //Guardar en la BD
            $resultado = $ponente->guardar();

            if ($resultado) {
               header('Location: /admin/ponentes');
            }
         }
      }

      $redes = json_decode($ponente->redes);
     // debuguear($redes);

          // Render a la vista 
          $router->render('admin/ponentes/editar', [
            'titulo' => 'Editar Ponentes',
            'alertas' => $alertas,
            'ponente' => $ponente,
            'redes' => $redes
         ]);
   }

   public static function eliminar(){
      if(!isAdmin()){
         header('Location: /login');
      }
      if($_SERVER['REQUEST_METHOD'] === 'POST') {
         $id = $_POST['id'];

         if(!isAdmin()){
            header('Location: /login');
         }
         // debuguear($id);

         //Obtener el ponente a eliminar 
         $ponente = Ponente::find($id);

         // debuguear($ponente);

         if (!isset($ponente)) {
            header('Location: /admin/ponentes' );
         }

         $resultado = $ponente->eliminar();

         if ($resultado) {
            header('Location: /admin/ponentes');
         }

      }
   }
}