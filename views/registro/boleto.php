<main class="pagina">
    <h2 class="pagina-heading"><?php echo $titulo; ?></h2>
    <p class="pagina-descripcion">Tu Boleto - Puedes guardarlo y compartirlo en tus redes</p>

    <div class="boleto-virtual">
        <div class="boleto boleto--<?php echo strtolower($registro->paquete->nombre);?> boleto--acceso">
            <div class="boleto-contenido">
                <h4 class="boleto-logo">&#60;DevWebCamp/></h4>
                <p class="boleto-plan"><?php echo $registro->paquete->nombre; ?></p>
                <p class="boleto-nombre"><?php echo $registro->usuario->nombre . ' ' . $registro->usuario->apellido; ?></p>
            </div>
            
            <p class="boleto-token"><?php echo '#' . $registro->token; ?></p>

        </div>
    </div>
</main>