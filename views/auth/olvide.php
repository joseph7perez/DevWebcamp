<main class="auth">
    <h2 class="auth-heading"><?php echo $titulo; ?></h2>
    <p class="auth-texto">Recupera tu contraseña en DevWebcamp</p>

    <?php require_once __DIR__ . '/../templates/alertas.php'; ?>

    <form action="/olvide" class="formulario" method="post">
        <div class="formulario-campo">
            <label for="email" class="formulario-label">Email</label>
            <input type="text" class="formulario-input" id="email" placeholder="ejemplo@correo.com" name="email">
        </div>

        <input type="submit" value="Enviar" class="formulario-submit">
    </form>

    <div class="acciones">
        <a href="/login" class="acciones-enlace">Ya tengo una cuenta</a>
        <a href="/registro" class="acciones-enlace">Aún no tengo una cuenta</a>
    </div>
</main>