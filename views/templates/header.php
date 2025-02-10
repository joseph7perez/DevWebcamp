<header class="header">
    <div class="header-contenedor">
        <nav class="header-navegacion">

            <?php if(isAuth()) { ?>
                <a href="<?php echo isAdmin() ? '/admin/dashboard' : '/finalizar-registro'; ?>" class="header-enlace">Administrar</a>
                <form action="/logout" method="post" class="header-form">
                    <input type="submit" class="header-submit-logout" value="Cerrar Sesión">
                </form>
            <?php } else { ?>
                <a href="/registro" class="header-enlace">Registro</a>
                <a href="/login" class="header-enlace">Iniciar Sesión</a>
            <?php } ?>
        </nav>

        <div class="header-contenido">
            <a href="/">
                <h1 class="header-logo"> &#60;DevWebCamp/></h1>
            </a>
            <p class="header-texto">Marzo 4-6, 2025</p>
            <p class="header-texto header-texto-modalidad">En línea - Presencial</p>

            <a href="/registro" class="header-boton">Comprar pase</a>
        </div>
    </div>
</header>

<div class="barra">
    <div class="barra-contenido">
        <a href="/">
            <h2 class="barra-logo">&#60;DevWebCamp/></h2>       
        </a>
        <nav class="navegacion">
            <a href="/devwebcamp" class="navegacion-enlace <?php echo pagina_actual("/devwebcamp") ? 'navegacion-enlace-actual' : ''; ?> ">Evento</a>
            <a href="/paquetes" class="navegacion-enlace <?php echo pagina_actual("/paquetes") ? 'navegacion-enlace-actual' : ''; ?>">Paquetes</a>
            <a href="/workshops-conferencias" class="navegacion-enlace <?php echo pagina_actual("/workshops-conferencias") ? 'navegacion-enlace-actual' : ''; ?>">Workshops - Conferencias</a>
            <a href="/registro" class="navegacion-enlace <?php echo pagina_actual("/registro") ? 'navegacion-enlace-actual' : ''; ?>">Comprar Pase</a>
        </nav>
    </div>
</div>