<h2 class="dashboard-heading"><?php echo $titulo; ?></h2>

<div class="dashboard-contenedor-boton">
    <a class="dashboard-boton" href="/admin/eventos/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Evento
    </a>
</div>

<div class="dashboard-contenedor">
    <?php if(!empty($eventos)) { ?>

        <table class="table">
            <thead class="table-thead">
                <tr>
                    <th scope="col" class="table-th">Evento</th>
                    <th scope="col" class="table-th">Categoria</th>
                    <th scope="col" class="table-th">Día y hora</th>
                    <th scope="col" class="table-th">Ponente</th>
                    <th scope="col" class="table-th"></th>
                </tr>
            </thead>

            <tbody class="table-tbody">
                <?php foreach($eventos as $evento) { ?>
                    <tr class="table-tr">
                        <td class="table-td">
                            <?php echo $evento->nombre; ?>
                        </td>
                        <td class="table-td">
                            <?php echo $evento->categoria->nombre; ?>
                        </td>
                        <td class="table-td">
                            <?php echo $evento->dia->nombre . ', ' . $evento->hora->hora; ?>
                        </td>
                        <td class="table-td">
                            <?php echo $evento->ponente->nombre . ' ' . $evento->ponente->apellido; ?>
                        </td>
                        
                        <td class="table-td-acciones">
                            <a class="table-accion table-accion-editar" href="/admin/eventos/editar?id=<?php echo $evento->id ?>">
                                <i class="fa-solid fa-pencil"></i>
                                Editar
                            </a>

                            <form action="/admin/eventos/eliminar" class="table-formulario" method="post">
                                <input type="hidden" name="id" value="<?php echo $evento->id; ?>"> <!--Eliminar el evento -->
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
        <p class="text-center">No hay eventos Aún</p>
    <?php } ?>
</div>

<?php 
    echo $paginacion;
?>