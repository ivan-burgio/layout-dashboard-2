$(document).ready(function () {
    // Agregar evento de clic a cada opción principal con desplegable
    $(".opcion-con-desplegable").on("click", function () {
        // Alternar la clase "hidden" para mostrar u ocultar el desplegable
        $(this).find(".desplegable").toggleClass("hidden");
        $(this).find("i.fa-chevron-down").toggleClass("hidden");
    });

    // Alternar la visibilidad del sidebar y sus contenidos
    $("#toggle-sidebar").on("click", function () {
        const $sidebar = $("#sidebar");
        const $menuText = $("#menu .flex > span");
        const $chevrons = $("#menu .flex > i.fa-chevron-down");
        const $icons = $("#menu .flex > i");
        const $desplegables = $(".desplegable"); // Selecciona todos los <ul> con la clase "desplegable"

        // Alternar la clase del sidebar para expandir o contraer
        const isSidebarCollapsed = $sidebar.hasClass("max-w-14");
        $sidebar.toggleClass("max-w-14 w-64");

        // Ocultar/mostrar los textos de los ítems del menú
        $menuText.toggleClass("hidden");

        // Alternar visibilidad de las flechitas
        $chevrons.each(function () {
            $(this).css({
                visibility: isSidebarCollapsed ? "visible" : "hidden",
                opacity: isSidebarCollapsed ? "1" : "0",
            });
        });

        // Alternar las clases de los íconos
        $icons.each(function () {
            $(this).toggleClass("mx-1", !isSidebarCollapsed); // Aplica 'mx-1' si el sidebar ESTÁ colapsado
            $(this).toggleClass("mr-2", isSidebarCollapsed); // Aplica 'mr-2' si el sidebar NO está colapsado
        });

        // Si el sidebar está oculto, cerrar todos los submenús y aplicar la clase 'hidden'
        if (isSidebarCollapsed) {
            $desplegables.addClass("hidden");
            $(".opcion-con-desplegable i.fa-chevron-down").addClass("hidden");
        }
    });

    // Mostrar el sidebar al hacer clic en los ítems del menú si está oculto
    $(".opcion-con-desplegable").on("click", function () {
        const $sidebar = $("#sidebar");
        if ($sidebar.hasClass("max-w-14")) {
            $sidebar.removeClass("max-w-14").addClass("w-64");
            $("#menu .flex > span").removeClass("hidden");
            $("#menu .flex > i.fa-chevron-down").css({
                visibility: "visible",
                opacity: "1",
            });
        }
    });
});
