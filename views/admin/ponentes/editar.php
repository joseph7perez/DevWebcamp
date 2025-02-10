<h2 class="dashboard-heading"><?php echo $titulo; ?></h2>

<div class="dashboard-contenedor-boton">
    <a class="dashboard-boton" href="/admin/ponentes">
        <i class="fa-solid fa-circle-arrow-left"></i>
        Volver
    </a>
</div>

<div class="dashboard-formulario">
    <?php require_once __DIR__ . '/../../templates/alertas.php'; ?>

    <form class="formulario" method="post" enctype="multipart/form-data"> <!--enctype="multipart/form-data" para la subida de archivos-->
        <?php require_once __DIR__ . '/formulario.php'; ?>

        <input class="formulario-submit" type="submit" name="" id="" value="Actualizar Ponente">
    </form>
</div>
