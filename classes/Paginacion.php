<?php

namespace Classes;

class Paginacion {
    public $pagina_actual;
    public $registros_por_pagina;
    public $total_registros;
    
    public function __construct($pagina_actual = 1, $registros_por_pagina = 10, $total_registros = 0)
    {
        $this->pagina_actual = (int) $pagina_actual; //Parsear el valor a int
        $this->registros_por_pagina = (int) $registros_por_pagina;
        $this->total_registros = (int) $total_registros;
    }

    public function offset(){
        return $this->registros_por_pagina * ($this->pagina_actual - 1);
    }

    public function total_paginas(){
        return ceil($this->total_registros / $this->registros_por_pagina); //ceil, redondea al numero mayor - siguiente
    }

    public function pagina_anterior(){
        $anterior = $this->pagina_actual - 1;
        return ($anterior > 0) ? $anterior : false;
    }

    public function pagina_siguiente(){
        $siguiente = $this->pagina_actual + 1;
        return ($siguiente <= $this->total_paginas()) ? $siguiente : false;
    }

    public function enlace_anterior() {
        $html = '';
        //Generar el enlace si hay una pagina anterior
        if ($this->pagina_anterior()) { 
            $html .= "<a class=\"paginacion-enlace paginacion-enlace-texto\" href=\"?page={$this->pagina_anterior()}\">&laquo Anterior </a>"; //Con "\" se escapan las comillas
        }

        return $html;
    }

    public function enlace_siguiente() {
        $html = '';
        //Generar el enlace si hay una pagina siguiente
        if ($this->pagina_siguiente()) { 
            $html .= "<a class=\"paginacion-enlace paginacion-enlace-texto\" href=\"?page={$this->pagina_siguiente()}\">Siguiente &raquo</a>"; //Con "\" se escapan las comillas
        }

        return $html;
    }

    public function numeros_pagina() {
        $html = '';
        for ($i=1; $i <= $this->total_paginas() ; $i++) { 
            if ($i === $this->pagina_actual) {
                $html .= "<p class=\"paginacion-actual\">$i</p>"; //Con "\" se escapan las comillas
            } else {
                $html .= "<a class=\"paginacion-enlace paginacion-enlace-numero\" href=\"?page=$i\">$i</a>"; //Con "\" se escapan las comillas
            }
        }

        return $html;
    }

    public function paginacion() {
        $html = '';

        if ($this->total_registros > 1) {
            $html .= '<div class="paginacion">';    
            $html .= $this->enlace_anterior();
            $html .= $this->numeros_pagina();
            $html .= $this->enlace_siguiente();
            $html .= '</div>';
        }

        return $html;
    }
}