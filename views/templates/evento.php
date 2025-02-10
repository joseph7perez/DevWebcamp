<div class="evento swiper-slide">
    <p class="evento-hora"> <?php echo $evento->hora->hora; ?></p>
    <div class="evento-informacion">
        <h4 class="evento-nombre"><?php echo $evento->nombre; ?></h4>
        <p class="evento-info"><?php echo $evento->descripcion; ?></p>
        <div class="evento-autor-info">
            <picture>
                <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $evento->ponente->imagen;  ?>.webp" type="image/webp">
                <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $evento->ponente->imagen;  ?>.png" type="image/png">
                <img class="evento-imagen-autor" src="<?php echo $_ENV['HOST'] . '/img/speakers/' . $evento->ponente->imagen;  ?>.png" alt="Imagen Ponente" loading="lazy" width="200" height="300">
            </picture>
            <p class="evento-autor-nombre"><?php echo $evento->ponente->nombre . " " . $evento->ponente->apellido; ?></p>
        </div>
    </div>
</div>