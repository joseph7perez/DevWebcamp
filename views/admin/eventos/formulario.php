<fieldset class="formulario-fieldset">
    <legend class="formulario-legend">Información Eventos</legend>

    <div class="formulario-campo">
        <label for="nombre" class="formulario-label">Nombre Evento</label>
        <input type="text" class="formulario-input" id="nombre" name="nombre" placeholder="Nombre Evento" value="<?php echo $evento->nombre ?? ''; ?>">
    </div>

    <div class="formulario-campo">
        <label for="descripcion" class="formulario-label">Descripción</label>
        <textarea class="formulario-input" id="descripcion" name="descripcion" placeholder="Descripcion del Evento" rows="5"><?php echo $evento->descripcion ?></textarea>
    </div>

    <div class="formulario-campo">
        <label for="ciudad" class="formulario-label">Categoria</label>
        <select name="categoria_id" id="categoria" class="formulario-select">
            <option value="" selected disabled>---Seleccionar---</option>
            <?php foreach($categorias as $categoria) { ?>
                <option <?php echo ($evento->categoria_id === $categoria->id) ? 'selected' : ''; ?> value="<?php echo $categoria->id; ?>"><?php echo $categoria->nombre; ?></option>
            <?php } ?>    
        </select>
    </div>

    <div class="formulario-campo">
        <label for="pais" class="formulario-label">Selecciona el día</label>
        <div class="formulario-radio">
            <?php foreach($dias as $dia) {?>
                <div>
                    <label for="<?php echo strtolower($dia->nombre); ?>"><?php echo $dia->nombre; ?></label>
                    <input 
                        type="radio" 
                        id="<?php echo strtolower($dia->nombre); ?>" 
                        name="dia" 
                        value="<?php echo $dia->id; ?>" 
                        <?php echo ($evento->dia_id === $dia->id) ? 'checked' : ''; ?>
                    >
                </div>
            <?php } ?>
        </div>

        <input type="hidden" name="dia_id" value="<?php echo $evento->dia_id; ?>">
    </div>

    <div class="formulario-campo">
        <label for="pais" class="formulario-label">Selecciona una hora</label>
        <ul class="horas" id="horas">
            <?php foreach($horas as $hora) { ?>
                <li data-hora-id="<?php echo $hora->id; ?>" class="horas-hora horas-hora-deshabilitado"><?php echo $hora->hora ?></li>
            <?php } ?>
        </ul>

        <input type="hidden" name="hora_id" value="<?php echo $evento->hora_id; ?>">
    </div>

</fieldset>

<fieldset class="formulario-fieldset">
    <legend class="formulario-legend">Información Extra</legend>

    <div class="formulario-campo">
        <label for="ponentes" class="formulario-label">Ponente</label>
        <input type="text" class="formulario-input" id="ponentes" placeholder="Buscar Ponenete" value="">
        <ul class="listado-ponentes" id="listado-ponentes"></ul>
        <input type="hidden" name="ponente_id" value="<?php echo $evento->ponente_id; ?>">
    </div>

    <div class="formulario-campo">
        <label for="disponibles" class="formulario-label">Lugares disponibles</label>
        <input type="number" min="1" class="formulario-input" id="disponibles" name="disponibles" placeholder="Ej. 5" value="<?php echo $evento->disponibles ?? ''; ?>">
    </div>

</fieldset>