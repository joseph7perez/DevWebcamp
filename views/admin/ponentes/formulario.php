<fieldset class="formulario-fieldset">
    <legend class="formulario-legend">Información personal</legend>

    <div class="formulario-campo">
        <label for="nombre" class="formulario-label">Nombre</label>
        <input type="text" class="formulario-input" id="nombre" name="nombre" placeholder="Nombre Ponente" value="<?php echo $ponente->nombre ?? ''; ?>">
    </div>

    <div class="formulario-campo">
        <label for="apellido" class="formulario-label">Apellido</label>
        <input type="text" class="formulario-input" id="apellido" name="apellido" placeholder="Apellido Ponente" value="<?php echo $ponente->apellido ?? ''; ?>">
    </div>

    <div class="formulario-campo">
        <label for="ciudad" class="formulario-label">Ciudad</label>
        <input type="text" class="formulario-input" id="ciudad" name="ciudad" placeholder="Ciudad Ponente" value="<?php echo $ponente->ciudad ?? ''; ?>">
    </div>

    <div class="formulario-campo">
        <label for="pais" class="formulario-label">País</label>
        <input type="text" class="formulario-input" id="pais" name="pais" placeholder="País Ponente" value="<?php echo $ponente->pais ?? ''; ?>">
    </div>

    <div class="formulario-campo">
        <label for="imagen" class="formulario-label">Imagen</label>
        <input type="file" class="formulario-input formulario-input-file" id="imagen" name="imagen">
    </div>
</fieldset>

<fieldset class="formulario-fieldset">
    <legend class="formulario-legend">Información Extra</legend>

    <div class="formulario-campo">
        <label for="tags_input" class="formulario-label">Conocimientos - Aptitudes (separadas por comas)</label>
        <input type="text" class="formulario-input" id="tags_input" placeholder="Ej: HTML, CSS, SASS, JS, Java, Python, etc.">
   
        <div id="tags" class="formulario-listado">

        </div>

        <input type="hidden" name="tags" value="<?php echo $ponente->tags ?? ''; ?>">
    </div>

    <?php if(isset($ponente->imagen_actual)) {?>
        <p class="formulario-texto">Imagen Actual:</p>
        <div class="formulario-imagen">
            <picture>
                <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen;  ?>.webp" type="image/webp">
                <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen;  ?>.png" type="image/png">
                <img src="<?php echo $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen;  ?>.png" alt="Imagen Ponente">
            </picture>
        </div>

    <?php } ?>
   
</fieldset>

<fieldset class="formulario-fieldset">
    <legend class="formulario-legend">Redes Sociales</legend>

    <div class="formulario-campo">
        <div class="formulario-contenedor-icono">
             <div class="formulario-icono">
                <i class="fa-brands fa-facebook"></i>
             </div>
             <input type="text" class="formulario-input-sociales" name="redes[facebook]" placeholder="Facebook" value="<?php echo $redes->facebook ?? ''; ?>">
        </div>
    </div>

    <div class="formulario-campo">
        <div class="formulario-contenedor-icono">
             <div class="formulario-icono">
                <i class="fa-brands fa-twitter"></i>
             </div>
             <input type="text" class="formulario-input-sociales" name="redes[twitter]" placeholder="Twitter" value="<?php echo $redes->twitter ?? ''; ?>">
        </div>
    </div>

    <div class="formulario-campo">
        <div class="formulario-contenedor-icono">
             <div class="formulario-icono">
                <i class="fa-brands fa-instagram"></i>
             </div>
             <input type="text" class="formulario-input-sociales" name="redes[instagram]" placeholder="Instagram" value="<?php echo $redes->instagram ?? ''; ?>">
        </div>
    </div>

    <div class="formulario-campo">
        <div class="formulario-contenedor-icono">
             <div class="formulario-icono">
                <i class="fa-brands fa-linkedin"></i>
             </div>
             <input type="text" class="formulario-input-sociales" name="redes[linkedin]" placeholder="Linkedin" value="<?php echo $redes->linkedin ?? ''; ?>">
        </div>
    </div>

    <div class="formulario-campo">
        <div class="formulario-contenedor-icono">
             <div class="formulario-icono">
                <i class="fa-brands fa-github"></i>
             </div>
             <input type="text" class="formulario-input-sociales" name="redes[github]" placeholder="Github" value="<?php echo $redes->github ?? ''; ?>">
        </div>
    </div>

    <div class="formulario-campo">
        <div class="formulario-contenedor-icono">
             <div class="formulario-icono">
                <i class="fa-brands fa-whatsapp"></i>
             </div>
             <input type="text" class="formulario-input-sociales" name="redes[whatsapp]" placeholder="Whatsapp" value="<?php echo $redes->whatsapp ?? ''; ?>">
        </div>
    </div>

    
    <div class="formulario-campo">
        <div class="formulario-contenedor-icono">
             <div class="formulario-icono">
                <i class="fa-brands fa-tiktok"></i>
             </div>
             <input type="text" class="formulario-input-sociales" name="redes[tiktok]" placeholder="Tiktok" value="<?php echo $redes->tiktok ?? ''; ?>">
        </div>
    </div>

</fieldset>