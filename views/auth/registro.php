<main class="auth">
    <h2 class="auth-heading"><?php echo $titulo; ?></h2>
    <p class="auth-texto">Crear una cuenta en DevWebcamp</p>

    <?php require_once __DIR__ . '/../templates/alertas.php'; ?>

    <form action="/registro" class="formulario" method="post">
        <div class="formulario-campo">
            <label for="nombre" class="formulario-label">Nombre</label>
            <input type="text" class="formulario-input" id="nombre" placeholder="Tu nombre" name="nombre" value="<?php echo $usuario->nombre; ?>">
        </div>

        <div class="formulario-campo">
            <label for="apellido" class="formulario-label">Apellido</label>
            <input type="text" class="formulario-input" id="apellido" placeholder="Tu apellido" name="apellido" value="<?php echo $usuario->apellido; ?>">
        </div>

        <div class="formulario-campo">
            <label for="email" class="formulario-label">Email</label>
            <input type="text" class="formulario-input" id="email" placeholder="ejemplo@correo.com" name="email" value="<?php echo $usuario->email; ?>"> 
        </div>

        <div class="formulario-campo">
            <label for="password" class="formulario-label">Contraseña</label>
            <input type="password" class="formulario-input" id="password" placeholder="*******" name="password">
        </div>

        <div class="formulario-campo">
            <label for="password2" class="formulario-label">Confirmar Contraseña</label>
            <input type="password" class="formulario-input" id="password2" placeholder="*******" name="password2">
        </div>

        <input type="submit" value="Crear cuenta" class="formulario-submit">
    </form>

    <div class="acciones">
        <a href="/login" class="acciones-enlace">Ya tengo una cuenta</a>
    </div>
</main>