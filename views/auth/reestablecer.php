<main class="auth">
    <h2 class="auth-heading"><?php echo $titulo; ?></h2>
    <p class="auth-texto">Crea tu nueva contraseña</p>

    <?php require_once __DIR__ . '/../templates/alertas.php'; ?>

    <?php if($token_valido) {?>
        <form action="/olvide" class="formulario" method="post">
            <div class="formulario-campo">
                <label for="password" class="formulario-label">Nueva Contraseña</label>
                <input type="password" class="formulario-input" id="password" placeholder="*******" name="password">
            </div>


            <input type="submit" value="Cambiar" class="formulario-submit">
        </form>

    <?php } ?>

</main>