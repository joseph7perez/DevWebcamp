<main class="auth">
    <h2 class="auth-heading"><?php echo $titulo; ?></h2>
    <p class="auth-texto">Inicia Sesión en DevWebcamp</p>

    <?php require_once __DIR__ . '/../templates/alertas.php'; ?>

    <form action="/login" class="formulario" method="post">
        <div class="formulario-campo">
            <label for="email" class="formulario-label">Email</label>
            <input type="text" class="formulario-input" id="email" placeholder="ejemplo@correo.com" name="email">
        </div>
        <div class="formulario-campo">
            <label for="password" class="formulario-label">Contraseña</label>
            <input type="password" class="formulario-input" id="password" placeholder="*******" name="password">
        </div>

        <input type="submit" value="Iniciar Sesión" class="formulario-submit">
    </form>

    <div class="acciones">
        <a href="/registro" class="acciones-enlace">Aún no tengo una cuenta</a>
        <a href="/olvide" class="acciones-enlace">Olvidé mi contraseña</a>
    </div>
</main>