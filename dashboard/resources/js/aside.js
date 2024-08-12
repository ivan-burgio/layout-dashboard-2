$(document).ready(function () {
    // Agregar evento de clic a cada opción principal con desplegable
    $(".opcion-con-desplegable").on("click", function () {
        // Alternar la clase "hidden" para mostrar u ocultar el desplegable
        $(this).find(".desplegable").toggleClass("hidden");
    });
});
