document.addEventListener("DOMContentLoaded", function () {
    // Mostrar el loader
    document.getElementById("loader").style.transition = "opacity 1s";
    document.getElementById("loader").style.opacity = 1;

    // Tiempo mínimo de visualización del loader en milisegundos (ej. 3000 ms = 3 segundos)
    const tiempoMinimo = 3000;

    // Ocultar el loader después del tiempo mínimo
    setTimeout(function () {
        document.getElementById("loader").style.opacity = 0;

        // Después de que se desvanece el loader, establecer el display en none
        setTimeout(function () {
            document.getElementById("loader").style.display = "none";
        }, 1000); // Puedes ajustar este tiempo según la duración de la transición (en milisegundos)
    }, tiempoMinimo);

    // Mostrar el contenido después de que el loader se haya desvanecido
    // setTimeout(function () {
    //     document.getElementById("content").style.opacity = 1;
    //     document.getElementById("content").style.transition = "opacity 1s";
    // }, tiempoMinimo + 1000); // Se añade un segundo para asegurar que el contenido aparezca después del desvanecimiento del loader
});
