// tomamos todos los formularios que posean la clase "ajax"
const forms_ajax = document.querySelectorAll(".ajax");

/**
 * Funcion encargada de enviar un formulario por medio de ajax
 * @param {object} e Evento por default
 */
function enviar_form_ajax(e) {
    // prevemos el evento por default que es redirigir la página a donde le indique el atributo action
    e.preventDefault();

    // pop-up para confirmar si se desea enviar
    let send = confirm("Enviar formulario?");

    // en caso de confirmarse
    if (send) {
        // creamos una instancia de nuevo formulario con los datos del mismo
        const data = new FormData(e.currentTarget); // Utiliza e.currentTarget en lugar de this
        // obtenemos el valor del atributo 'metodo' del formulario
        const method = e.currentTarget.getAttribute("method");
        // obtenemos el valor del artibuto 'action'
        const action = e.currentTarget.getAttribute("action");

        // generamos los encabezados necesarios para la API Fetch de js
        const heads = new Headers();

        // configuraciones del envío de datos para la API Fetch de js
        const config = {
            method: method,
            headers: heads,
            mode: "cors",
            cache: "no-cache",
            body: data,
        };

        // llamamos a la API Fetch y le pasamos todos los datos
        fetch(action, config)
            .then((res) => res.text())
            .then((res) => {
                let contenedor = document.querySelector(".form-res");
                // enviamos al contenedor los datos que deseamos sean insertados
                contenedor.innerHTML = res;
            });
    }
}

// por cada formulario vamos a escuchar cuando se ejecute el 'submit' para enviarlo
forms_ajax.forEach((form) => {
    form.addEventListener("submit", enviar_form_ajax);
});
