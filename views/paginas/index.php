<?php 
    include_once __DIR__ . '/workshops-conferencias.php';

?>

<section class="resumen">
    <div class="resumen-grid">
        <div class="resumen-bloque" data-aos="<?php aos_animation(); ?>">
            <p class="resumen-texto resumen-texto-numero"><?php echo $ponentes_total; ?></p>
            <p class="resumen-texto">Speakers</p>
        </div>

        <div class="resumen-bloque" data-aos="<?php aos_animation(); ?>">
            <p class="resumen-texto resumen-texto-numero"><?php echo $conferencias_total; ?></p>
            <p class="resumen-texto">Conferencias</p>
        </div>

        <div class="resumen-bloque" data-aos="<?php aos_animation(); ?>">
            <p class="resumen-texto resumen-texto-numero"><?php echo $workshops_total; ?></p>
            <p class="resumen-texto">Workshops</p>
        </div>

        <div class="resumen-bloque" data-aos="<?php aos_animation(); ?>">
            <p class="resumen-texto resumen-texto-numero">100</p>
            <p class="resumen-texto">Asistentes</p>
        </div>
    </div>
</section>

<section class="speakers">
    <h2 class="speakers-heading">Speakers</h2>
    <p class="speakers-descripcion">Conoce a nuestros expertos</p>

    <div class="speakers-grid">
        <?php foreach ($ponentes as $ponente) { ?>
            <div class="speaker" data-aos="<?php aos_animation(); ?>">
                <picture>
                    <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen;  ?>.webp" type="image/webp">
                    <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen;  ?>.png" type="image/png">
                    <img class="speaker-imagen" src="<?php echo $_ENV['HOST'] . '/img/speakers/' . $evento->ponente->imagen;  ?>.png" alt="Imagen Ponente" loading="lazy" width="200" height="300">
                </picture>

                <div class="speaker-info">
                    <h4 class="speaker-nombre"><?php echo $ponente->nombre . ' ' . $ponente->apellido; ?></h4>
                    <p class="speaker-ubicacion"><?php echo $ponente->ciudad . ', ' . $ponente->pais; ?></p>
                    <ul class="speaker-listado-skills">
                        <?php 
                            $tags = explode(',', $ponente->tags); 
                            foreach($tags as $tag) {         
                        ?>
                            <li class="speaker-skill"><?php echo $tag;?></li>
                        <?php } ?>
                    </ul>

                    <nav class="speaker-redes">
                        <?php 
                            $redes = json_decode($ponente->redes); 
                            // debuguear($redes);                    
                        ?>
                        <?php if(!empty($redes->facebook)) {?>
                            <a class="speaker-redes__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->facebook; ?>">
                                <span class="speaker-redes__ocultar">Facebook</span>
                            </a> 
                        <?php } ?>

                        <?php if(!empty($redes->linkedin)) {?>
                            <a class="speaker-redes__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->linkedin; ?>">
                                <span class="speaker-redes__ocultar">Linkedin</span>
                            </a> 
                        <?php } ?>

                        <?php if(!empty($redes->instagram)) {?>
                            <a class="speaker-redes__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->instagram; ?>">
                                <span class="speaker-redes__ocultar">Instagram</span>
                            </a> 
                        <?php } ?>

                        <?php if(!empty($redes->github)) {?>
                            <a class="speaker-redes__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->github; ?>">
                                <span class="speaker-redes__ocultar">Github</span>
                            </a>
                        <?php } ?>

                        <?php if(!empty($redes->tiktok)) {?>
                            <a class="speaker-redes__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->tiktok; ?>">
                                <span class="speaker-redes__ocultar">Tiktok</span>
                            </a>
                        <?php } ?>

                        <?php if(!empty($redes->whatsapp)) {?>
                            <a class="speaker-redes__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->whatsapp; ?>">
                                <span class="speaker-redes__ocultar">Whatsapp</span>
                            </a>
                        <?php } ?>
                    </nav>
                </div>
            </div>
        <?php } ?>
    </div>
    
</section>

<div class="mapa" id="mapa">

</div>

<section class="boletos">
    <h2 class="boletos-heading">Boletos & Precios</h2>
    <p class="boletos-descripcion">Precios para DevWebcamp</p>

    <div class="boletos-grid">
        <div class="boleto boleto--presencial" data-aos="<?php aos_animation(); ?>">
            <h4 class="boleto-logo">&#60;DevWebCamp/></h4>
            <p class="boleto-plan">Presencial</p>
            <p class="boleto-precio">$199</p>
        </div>

        <div class="boleto boleto--virtual" data-aos="<?php aos_animation(); ?>">
            <h4 class="boleto-logo">&#60;DevWebCamp/></h4>
            <p class="boleto-plan">Virtual</p>
            <p class="boleto-precio">$49</p>
        </div>

        <div class="boleto boleto--gratis" data-aos="<?php aos_animation(); ?>">
            <h4 class="boleto-logo">&#60;DevWebCamp/></h4>
            <p class="boleto-plan">Gratis</p>
            <p class="boleto-precio">Gratis - 0</p>
        </div>
    </div>

    <div class="boleto-enlace-contenedor">
        <a href="/paquetes" class="boleto-enlace">Ver Paquetes</a>
    </div>
</section>