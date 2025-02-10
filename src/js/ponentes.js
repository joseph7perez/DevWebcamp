(function () {
   const inputPonentes = document.querySelector('#ponentes');

   if (inputPonentes) {
        let ponentes = [];
        let ponentesFiltrados = [];

        const listadoPonentes = document.querySelector('#listado-ponentes');
        const ponenteHidden = document.querySelector('[name="ponente_id"]')

        obtenerPonentes();

        inputPonentes.addEventListener('input', buscarPonentes);

        const id = ponenteHidden.value;

        if (id) {
            (async () => {
                const ponente = await obtenerPonente(id);
                const {nombre, apellido} = ponente;

                //Insertar en el HTML
                const ponenteDOM = document.createElement('LI');
                ponenteDOM.classList.add('listado-ponentes-ponente', 'listado-ponentes-ponente-seleccionado');
                ponenteDOM.textContent = `${nombre} ${apellido}`;  
                
                listadoPonentes.appendChild(ponenteDOM);
            })()
        }

        async function obtenerPonentes() {
            const url = `/api/ponentes`;
            const respuesta = await fetch(url);
            const resultado = await respuesta.json();

            formatearPonentes(resultado);
        }

        async function obtenerPonente(id) {
            const url = `/api/ponente?id=${id}`;
            const respuesta = await fetch(url);
            const resultado = await respuesta.json();

            return resultado;
        }

        // Formatear ponentes para solo traer nombre, apellido e id
        function formatearPonentes(arrayPonentes = []) {
            ponentes = arrayPonentes.map( ponente => {
                return {
                    nombre: `${ponente.nombre.trim()} ${ponente.apellido.trim()}`,
                    id: ponente.id
                }
            });
           // console.log(ponentes);   
        }

        function buscarPonentes(e) {
            const busqueda = e.target.value;

            if (busqueda.length > 2) {
                const expresion = new RegExp(busqueda, "i"); //no importa si esta en mayusculas o minusculas
                ponentesFiltrados = ponentes.filter(ponente => {
                    if (ponente.nombre.toLowerCase().search(expresion) != -1) { //-1 no lo encontro, 0 si lo encontro
                        return ponente;
                    }
                }) 
            } else {
                ponentesFiltrados = [];
            }
            
            mostrarPonentes();
        }

        function mostrarPonentes() {

            //Limpiar el HTML para que no aparezcan las busquedas anteriores
            while (listadoPonentes.firstChild) {
                listadoPonentes.removeChild(listadoPonentes.firstChild);
            }

            if (ponentesFiltrados.length > 0) {
                ponentesFiltrados.forEach(ponente => {
                    const ponenteHTML = document.createElement('LI');
                    ponenteHTML.classList.add('listado-ponentes-ponente');
                    ponenteHTML.textContent = ponente.nombre;
                    ponenteHTML.dataset.ponenteId = ponente.id;
                    ponenteHTML.onclick = seleccionarPonente;
    
                    //Añadir al DOM
                    listadoPonentes.appendChild(ponenteHTML);
                })
            } else {
                //Crear alerta de que no hay resultados
                const noResultados = document.createElement('P');
                noResultados.classList.add('listado-ponentes-no-resultado');
                noResultados.textContent = 'No se encontraron ponentes con ese nombre';

                listadoPonentes.appendChild(noResultados);
            }     
        }

        function seleccionarPonente(e) {
            const ponente = e.target;

            //Remover la clase previa
            const ponentePrevio = document.querySelector('.listado-ponentes-ponente-seleccionado');
            if (ponentePrevio) {
                ponentePrevio.classList.remove('listado-ponentes-ponente-seleccionado');           
            }

            ponente.classList.add('listado-ponentes-ponente-seleccionado')

            ponenteHidden.value = ponente.dataset.ponenteId;
        }
    }
})();