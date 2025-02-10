<?php

namespace Controllers;

use Classes\Email;
use Classes\Paginacion;
use Intervention\Image\Point;
use Model\Categoria;
use Model\Dia;
use Model\Evento;
use Model\Hora;
use Model\Ponente;
use Model\Usuario;
use MVC\Router;

class EventosController {

    public static function index(Router $router){
        if(!isAdmin()){
            header('Location: /login');
        }

        $pagina_actual  = $_GET['page']; //Pagina en la que estamos
        $pagina_actual  = filter_var($pagina_actual, FILTER_VALIDATE_INT); //Validar que sea un int

        if (!$pagina_actual || $pagina_actual < 1) {
            header('Location: /admin/eventos?page=1'); //Redireccion si la pagina no esta o es menor a 1
        }

        $total_registros = Evento::total();
        $registros_por_pagina = 10;
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total_registros);

      //  debuguear($total_registros);

        $eventos = Evento::paginar($registros_por_pagina, $paginacion->offset());

        //Traer la informacion de las demas tablas
        foreach ($eventos as $evento) {
            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = Dia::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->ponente = Ponente::find($evento->ponente_id);
          //  debuguear($evento);
        }

        // Render a la vista 
        $router->render('admin/eventos/index', [
            'titulo' => 'Conferencias y Workshops',
            //   'alertas' => $alertas
            'eventos' => $eventos,
            'paginacion' => $paginacion->paginacion()

        ]);
    }

    public static function crear(Router $router){
        if(!isAdmin()){
            header('Location: /login');
        }

        $alertas = [];

        $categorias = Categoria::all('ASC');
        $dias = Dia::all('ASC');
        $horas = Hora::all('ASC');

        //debuguear($horas);

        // debuguear($dias);

        // debuguear($categorias);

        $evento = new Evento;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!isAdmin()){
                header('Location: /login');
             }
            $evento->sincronizar($_POST);

            $alertas = $evento->validar();

            if (empty($alertas)) {
                
                $resultado = $evento->guardar();

                if ($resultado) {
                    header('Location: /admin/eventos');
                }
            }
        }

        // Render a la vista 
        $router->render('admin/eventos/crear', [
           'titulo' => 'Registrar evento',
           'alertas' => $alertas,
           'categorias' => $categorias,
           'dias' => $dias,
           'horas' => $horas,
           'evento' => $evento
       ]);
    }

    public static function editar(Router $router){
        if(!isAdmin()){
            header('Location: /login');
        }

        $alertas = [];

        //Validar el id
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        
        if (!$id) {
            header('Location: /admin/eventos');
        } 

        $categorias = Categoria::all('ASC');
        $dias = Dia::all('ASC');
        $horas = Hora::all('ASC');

        //Obtener el evento a editar 
        $evento = Evento::find($id);

        if (!$evento) {
            header('Location: /admin/eventos');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!isAdmin()){
                header('Location: /login');
            }
            $evento->sincronizar($_POST);

            $alertas = $evento->validar();

            if (empty($alertas)) {
                
                $resultado = $evento->guardar();

                if ($resultado) {
                    header('Location: /admin/eventos');
                }
            }
        }

        // Render a la vista 
        $router->render('admin/eventos/editar', [
        'titulo' => 'Editar Evento',
        'alertas' => $alertas,
        'evento' => $evento,
        'categorias' => $categorias,
        'dias' => $dias,
        'horas' => $horas
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
  
           //Obtener el evento a eliminar 
           $evento = Evento::find($id);
  
           // debuguear($evento);
  
           if (!isset($evento)) {
              header('Location: /admin/eventos' );
           }
  
           $resultado = $evento->eliminar();
  
           if ($resultado) {
              header('Location: /admin/eventos');
           }
  
        }
     }
}