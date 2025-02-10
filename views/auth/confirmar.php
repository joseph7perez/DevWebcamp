<main class="auth">

    <h2 class="auth-heading"><?php echo $titulo; ?></h2>
    <p class="auth-texto">Cuenta confirmada en DevWebcamp</p>

    <?php require_once __DIR__ . '/../templates/alertas.php'; ?>

    <?php if (isset($alertas['exito'])) { ?>
        <div class="acciones acciones-centrar">
           <a href="/login" class="acciones-enlace">Iniciar Sesión</a>
        </div>
    <?php  } ?>
  
</main>