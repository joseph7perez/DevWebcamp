<aside class="dashboard-sidebar">
    <nav class="dashboard-menu">
        <a href="/admin/dashboard" class="dashboard-enlace <?php echo pagina_actual('/dashboard') ? 'dashboard-enlace-actual' : '' ?>">
            <i class="fa-solid fa-house dashboard-icono"></i>
            <span class="dashboard-menu-texto">Inicio</span>
        </a>

        <a href="/admin/ponentes" class="dashboard-enlace <?php echo pagina_actual('/ponentes') ? 'dashboard-enlace-actual' : '' ?>">
            <i class="fa-solid fa-microphone dashboard-icono"></i>           
            <span class="dashboard-menu-texto">Ponentes</span>
        </a>

        <a href="/admin/eventos" class="dashboard-enlace <?php echo pagina_actual('/eventos') ? 'dashboard-enlace-actual' : '' ?>">
            <i class="fa-regular fa-calendar dashboard-icono"></i>      
            <span class="dashboard-menu-texto">Eventos</span>
        </a>

        <a href="/admin/registrados" class="dashboard-enlace <?php echo pagina_actual('/registrados') ? 'dashboard-enlace-actual' : '' ?>">
            <i class="fa-solid fa-users dashboard-icono"></i>
            <span class="dashboard-menu-texto">Registrados</span>
        </a>

        <a href="/admin/regalos" class="dashboard-enlace <?php echo pagina_actual('/regalos') ? 'dashboard-enlace-actual' : '' ?>">
            <i class="fa-solid fa-gift dashboard-icono"></i>
            <span class="dashboard-menu-texto">Regalos</span>
        </a>
    </nav>
</aside>