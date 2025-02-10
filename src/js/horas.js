(function () {
    const horas = document.querySelector('#horas');

    if (horas) {

        const dias = document.querySelectorAll('[name="dia"]');
        const categoria = document.querySelector('#categoria');
        const inputHiddenDia = document.querySelector('[name="dia_id"]');
        const inputHiddenHora = document.querySelector('[name="hora_id"]');
      
        dias.forEach(dias => dias.addEventListener('change', terminoBusqueda));
        categoria.addEventListener('change', terminoBusqueda);

        let busqueda = {
            categoria_id: +categoria.value || '', //El "+" es para convertilo a numero
            dia: +inputHiddenDia.value || ''
        }

        if (!busqueda.categoria_id == '' || !busqueda.dia == '') { //otra forma es con Object.values(busqueda).includes(''), si el objeto contiene un string vacio
            
            (async () => {
                await buscarEventos();
            
                //Resaltar la hora del evento seleccionado
                const id = inputHiddenHora.value;
                const horaSeleccionada = document.querySelector(`[data-hora-id="${id}"]`);
    
                horaSeleccionada.classList.remove('horas-hora-deshabilitado')
                horaSeleccionada.classList.add('horas-hora-seleccionado')

                horaSeleccionada.onclick = seleccionarHora;
                
            })() //crear una funcion ifi y llamar la funcion
        }
        
        function terminoBusqueda(e) {
            busqueda[e.target.name] = e.target.value; //guardar el valor del id en el objeto del la seleccion por el usuario
            
            // Reiniciar los campos ocultos y el selector de horas
            inputHiddenHora.value = '';
            inputHiddenDia.value = '';

            //Deshabilitar la hora previa seleccionada, si hay una nueva hora seleccionada
            const horaPrevia = document.querySelector('.horas-hora-seleccionado');
            if (horaPrevia) {
                horaPrevia.classList.remove('horas-hora-seleccionado');           
            }

            if (busqueda.categoria_id == '' || busqueda.dia == '') { //otra forma es con Object.values(busqueda).includes(''), si el objeto contiene un string vacio
                return;
            }
            buscarEventos();
        }

        async function buscarEventos() {
            const { dia, categoria_id} = busqueda; //Aplicamos destructuring
            const url = `/api/eventos-horario?dia_id=${dia}&categoria_id=${categoria_id}`;

            const resultado = await fetch(url);
            const eventos = await resultado.json();

            // console.log(eventos);          

            obtenerHorasDisponibles(eventos);          
        }

        function obtenerHorasDisponibles(eventos) {
            //Reiniciar las horas para que vuelva a mostrar la hora deshabilitada
            const listadoHoras = document.querySelectorAll('#horas li')
            listadoHoras.forEach(li => li.classList.add('horas-hora-deshabilitado'));

            //Comprobar eventos ya tomados y eliminar la clase de deshabilitado
            const horasTomadas = eventos.map(evento => evento.hora_id)
            const listadoHorasArray = Array.from(listadoHoras); //Convertir el nodelist en un arreglo
            
            const resultado = listadoHorasArray.filter(li => !horasTomadas.includes(li.dataset.horaId)); //Filtrar a la hora seleccionada o los diferentes a la hora seleccionada

            resultado.forEach(li => li.classList.remove('horas-hora-deshabilitado'))  

            const horasDisponibles = document.querySelectorAll('#horas li:not(.horas-hora-deshabilitado)'); //Seleccionar todos lo li

            horasDisponibles.forEach(hora => hora.addEventListener('click', seleccionarHora));
           
        }

        function seleccionarHora(e) {
           // console.log(e.target.dataset.horaId);
            inputHiddenHora.value = e.target.dataset.horaId;

            //Deshabilitar la hora previa seleccionada, si hay una nueva hora seleccionada
            const horaPrevia = document.querySelector('.horas-hora-seleccionado');
            if (horaPrevia) {
                horaPrevia.classList.remove('horas-hora-seleccionado');           
            }

            //Agregar una clase cuando el usuario seleccione una hora
            e.target.classList.add('horas-hora-seleccionado');

            //Llenar el campo oculto de dia
            inputHiddenDia.value = document.querySelector('[name="dia"]:checked').value;      
        }   
    } 
})();