(function () { //Para proteger todo lo que este dentro del archivo y nada salga de este archivo 
    const tagsInput = document.querySelector('#tags_input');

    if (tagsInput) {

        const tagsDiv = document.querySelector('#tags');
        const tagsInputHidden = document.querySelector('[name="tags"]');

        let tags = [];

        //Recuperar valores del input oculto y mostrarlos
        if (tagsInputHidden.value !== '') {
            tags = tagsInputHidden.value.split(','); //Pasar el string a arreglo
            mostrarTags(); //funcion para mostrarlos
            
        }

        //Escuchar los cambios en el input text
        tagsInput.addEventListener('keypress', guardarTag); //keypress, cada que se oprima una tecla

        function guardarTag(e) {
            if (e.keyCode === 44) { //keyCode, Para saber el codigo de la tecla oprimida

                if (e.target.value.trim() === '' || e.target.value < 1) {
                    return;
                }

                e.preventDefault(); //Para que no se muestre la coma ","

                tags = [...tags, e.target.value.trim()]; //trim, para eliminar espacios en blanco

                //Limpiar el input
                tagsInput.value = '';

                //console.log(tags);

                mostrarTags();                
            }
        }

        // Mostrar lo escrito por el usuario
        function mostrarTags() {
            tagsDiv.textContent = '';
            tags.forEach(tag => {
                const etiqueta = document.createElement('LI');
                etiqueta.classList.add('formulario-tag');
                etiqueta.textContent = tag; 
                etiqueta.ondblclick = eliminarTag;
                tagsDiv.appendChild(etiqueta);
            })

            actualizarInputHidden();
        }

        function eliminarTag(e) {
            e.target.remove(); //Eliminarlo de la vista
            tags = tags.filter(tag => tag !== e.target.textContent); //Eliminarlo del arreglo tags
            actualizarInputHidden();            
        }

        //Actualizar el input hidden cada vez que se agrega o elimina alguna aptitud
        function actualizarInputHidden() {
            tagsInputHidden.value = tags.toString();
        }
    }
}) ()


