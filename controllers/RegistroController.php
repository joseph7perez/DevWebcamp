<?php

namespace Controllers;

use Classes\Email;
use Model\Paquete;
use Model\Registro;
use Model\Usuario;
use MVC\Router;

class RegistroController {

    public static function crear(Router $router){

        if (!isAuth()) {
            header('Location: /');
        }

        // Verificar si el usuario ya esta registrado
        $registro = Registro::where('usuario_id', $_SESSION['id']);

        if (isset($registro) && $registro->paquete_id === '1') { //Si ya esta registrado con el plan gratis
            header('Location: /boleto?id=' . urlencode($registro->token)); // Ir al boleto
        }

        // Render a la vista 
        $router->render('registro/crear', [
            'titulo' => 'Finalizar Registro'
        //   'alertas' => $alertas
        ]);
    }

    public static function gratis(Router $router){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!isAuth()){
                header('Location: /login');
            }

            $token = substr(md5(uniqid(rand(), true)), 0, 8); //Que sea de solo 8 caracteres

            // Crear registro
            $datos = array (
                'paquete_id' => 3,
                'pago_id' => '',
                'token' => $token,
                'usuario_id' => $_SESSION['id']
            );

            $registro = new Registro($datos);

            $resultado = $registro->guardar();

            if ($resultado) {
                header('Location: /boleto?id=' . urlencode($registro->token));
            }
        }
    }
   
   public static function boleto(Router $router){

        // Validar la URL
        $id = $_GET['id'];

        if (!$id || !strlen($id) === 8) {
            header('Location: /');
        } 

        // Buscarlo en la BD
        $registro = Registro::where('token', $id);
        
        if (!$registro) {
            header('Location: /');
        }

        // Llenar y cruzar las tablas de referencia
        $registro->usuario = Usuario::find($registro->usuario_id);
        $registro->paquete = Paquete::find($registro->paquete_id);

    //    debuguear($registro);

        // Render a la vista 
        $router->render('registro/boleto', [
            'titulo' => 'Asistencia a DevWebcamp',
        //   'alertas' => $alertas
            'registro' => $registro
        ]);
    }
}