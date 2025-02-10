<?php

namespace Controllers;

use Intervention\Image\Point;
use Model\Dia;
use Model\Hora;
use MVC\Router;
use Model\Evento;
use Model\Ponente;
use Model\Categoria;
use Model\EventoHorario;

class PaginasController {

    public static function index(Router $router) {

        $eventos = Evento::ordenar('hora_id', 'ASC');

        $eventos_formateados = [];
        foreach ($eventos as $evento) {
            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = Dia::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->ponente = Ponente::find($evento->ponente_id);
            
            if ($evento->dia_id === "1" && $evento->categoria_id === "1") { //Si es viernes(1) y conferencias(1)
                $eventos_formateados['conferencias_v'][] = $evento; //Conferencias dia viernes
            }    

            if ($evento->dia_id === "2" && $evento->categoria_id === "1") { 
                $eventos_formateados['conferencias_s'][] = $evento; //Conferencias dia sabado
            } 

            if ($evento->dia_id === "1" && $evento->categoria_id === "2") { 
                $eventos_formateados['workshops_v'][] = $evento; //Workshops dia viernes
            } 

            if ($evento->dia_id === "2" && $evento->categoria_id === "2") { 
                $eventos_formateados['workshops_s'][] = $evento; //Workshops dia sabado
            } 
        };

        //Obtener el total de cada bloque
        $ponentes_total = Ponente::total();
        $conferencias_total = Evento::total('categoria_id', 1);
        $workshops_total = Evento::total('categoria_id', 2);

        // Traer todos los ponenetes
        $ponentes = Ponente::all();


         // Render a la vista 
         $router->render('paginas/index', [
            'titulo' => 'Inicio',
         //   'alertas' => $alertas
            'eventos' => $eventos_formateados,
            'ponentes_total' => $ponentes_total,
            'conferencias_total' => $conferencias_total,
            'workshops_total' => $workshops_total,
            'ponentes' => $ponentes
        ]);   
    }

    public static function evento(Router $router) {

        // Render a la vista 
        $router->render('paginas/devwebcamp', [
           'titulo' => 'Sobre DevWebcam'
        //   'alertas' => $alertas
       ]);   
    }

    public static function paquetes(Router $router) {

        // Render a la vista 
        $router->render('paginas/paquetes', [
        'titulo' => 'Paquetes DevWebcam'
        //   'alertas' => $alertas
        ]);   
    }

    public static function conferencias(Router $router) {

        $eventos = Evento::ordenar('hora_id', 'ASC');

        $eventos_formateados = [];
        foreach ($eventos as $evento) {
            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = Dia::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->ponente = Ponente::find($evento->ponente_id);
            
            if ($evento->dia_id === "1" && $evento->categoria_id === "1") { //Si es viernes(1) y conferencias(1)
                $eventos_formateados['conferencias_v'][] = $evento; //Conferencias dia viernes
            }    

            if ($evento->dia_id === "2" && $evento->categoria_id === "1") { 
                $eventos_formateados['conferencias_s'][] = $evento; //Conferencias dia sabado
            } 

            if ($evento->dia_id === "1" && $evento->categoria_id === "2") { 
                $eventos_formateados['workshops_v'][] = $evento; //Workshops dia viernes
            } 

            if ($evento->dia_id === "2" && $evento->categoria_id === "2") { 
                $eventos_formateados['workshops_s'][] = $evento; //Workshops dia sabado
            } 
        };

        // debuguear($eventos_formateados);

        // Render a la vista 
        $router->render('paginas/workshops-conferencias', [
            'titulo' => 'Conferencias & Workshops',
            //   'alertas' => $alertas
            'eventos' => $eventos_formateados
        ]);   
    }

    public static function error(Router $router){

          // Render a la vista 
          $router->render('paginas/error', [
            'titulo' => 'Pagina no encontrada',
            //   'alertas' => $alertas
        ]);  

    }
}