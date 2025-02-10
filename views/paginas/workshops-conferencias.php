
<main class="agenda">
    <h2 class="agenda-heading"><?php echo $titulo; ?></h2>
    <p class="agenda-descripcion">Talleres dictados por expertos en desarrollo de software</p>

    <div class="eventos">
        <h3 class="eventos-heading">Conferencias</h3>
        <p class="eventos-fecha">Viernes 7 de febrero</p>

        <div class="eventos-listado slider swiper">
            <div class="swiper-wrapper">
                <?php foreach($eventos['conferencias_v'] as $evento) { ?>
                    <?php include __DIR__ . '/../templates/evento.php'; ?>
                <?php } ?>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        <p class="eventos-fecha">Sábado 8 de febrero</p>

        <div class="eventos-listado slider swiper">
            <div class="swiper-wrapper">
                <?php foreach($eventos['conferencias_s'] as $evento) { ?>
                    <?php include __DIR__ . '/../templates/evento.php'; ?>
                <?php } ?>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>

    <div class="eventos eventos-workshops">
        <h3 class="eventos-heading">Workshops</h3>
        <p class="eventos-fecha">Viernes 7 de febrero</p>

        <div class="eventos-listado slider swiper">
            <div class="swiper-wrapper">
                <?php foreach($eventos['workshops_v'] as $evento) { ?>
                    <?php include __DIR__ . '/../templates/evento.php'; ?>
                <?php } ?>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        <p class="eventos-fecha">Sábado 8 de febrero</p>

        <div class="eventos-listado slider swiper">
            <div class="swiper-wrapper">
                <?php foreach($eventos['workshops_s'] as $evento) { ?>
                    <?php include __DIR__ . '/../templates/evento.php'; ?>
                <?php } ?>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>

</main>