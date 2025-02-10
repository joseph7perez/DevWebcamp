<h2 class="dashboard-heading"><?php echo $titulo; ?></h2>

<div class="dashboard-contenedor-boton">
    <a class="dashboard-boton" href="/admin/ponentes/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Ponente
    </a>
</div>

<div class="dashboard-contenedor">
    <?php if(!empty($ponentes)) { ?>

        <table class="table">
            <thead class="table-thead">
                <tr>
                    <th scope="col" class="table-th">Nombre</th>
                    <th scope="col" class="table-th">Ubicación</th>
                    <th scope="col" class="table-th"></th>
                </tr>
            </thead>

            <tbody class="table-tbody">
                <?php foreach($ponentes as $ponente) { ?>
                    <tr class="table-tr">
                        <td class="table-td">
                            <?php echo $ponente->nombre . ' ' . $ponente->apellido; ?>
                        </td>
                        <td class="table-td">
                            <?php echo $ponente->ciudad . ', ' . $ponente->pais; ?>
                        </td>
                        
                        <td class="table-td-acciones">
                            <a class="table-accion table-accion-editar" href="/admin/ponentes/editar?id=<?php echo $ponente->id ?>">
                                <i class="fa-solid fa-user-pen"></i>
                                Editar
                            </a>

                            <form action="/admin/ponentes/eliminar" class="table-formulario" method="post">
                                <input type="hidden" name="id" value="<?php echo $ponente->id; ?>"> <!--Eliminar el ponente -->
                                <button class="table-accion table-accion-eliminar" type="submit">
                                    <i class="fa-solid fa-circle-xmark"></i>
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>

    <?php } else { ?>
        <p class="text-center">No hay Ponentes Aún</p>
    <?php } ?>
</div>

<?php 
    echo $paginacion;
?>