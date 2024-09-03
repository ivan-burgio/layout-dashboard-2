// Función para abrir el modal y llenar el formulario
function openPaginaModal(
    id = "",
    nombre = "",
    tipo = "",
    link = "",
    imagen = ""
) {
    const form = document.getElementById("paginaForm");

    if (id) {
        // Configura el formulario para actualizar una página
        form.action = `/dashboard/cuentas/paginas/${id}`;
        form.querySelector('input[name="_method"]').value = "PUT"; // Añadimos el método PUT
    } else {
        // Configura el formulario para crear una nueva página
        form.action = "/dashboard/cuentas/paginas";
        form.querySelector('input[name="_method"]').value = ""; // Eliminamos el método PUT
    }

    // Llena el formulario con los datos
    document.getElementById("nombre").value = nombre || "";
    document.getElementById("tipo").value = tipo || "";
    document.getElementById("link").value = link || "";
    document.getElementById("imagen").value = ""; // Resetea el campo de archivo, ya que no se puede establecer su valor programáticamente

    // Si hay una imagen, muestra la vista previa
    if (imagen) {
        document.getElementById("imagenPreview").src = imagen;
        document.getElementById("imagenPreview").style.display = "block";
    } else {
        document.getElementById("imagenPreview").style.display = "none";
    }

    // Muestra el modal
    document.getElementById("paginaModal").classList.remove("hidden");
}

// Función para cerrar el modal
function closePaginaModal() {
    document.getElementById("paginaModal").classList.add("hidden");
}

// Usamos jQuery para manejar eventos
$(document).ready(function () {
    // Abre el modal para nueva página
    $("#openModalButtonPagina").click(function () {
        // Configura el formulario para crear una nueva pagina
        const form = document.getElementById("paginaForm");
        form.action = "/dashboard/cuentas/paginas";
        form.querySelector('input[name="_method"]').value = ""; // Asegúrate de no usar PUT aquí
        openPaginaModal(); // Abre el modal con los campos vacíos
    });

    // Abre el modal para editar una página
    $(document).on("click", ".edit-buttonPagina", function () {
        const id = $(this).data("id");
        const nombre = $(this).data("nombre");
        const tipo = $(this).data("tipo");
        const link = $(this).data("link");
        const imagen = $(this).data("imagen");

        openPaginaModal(id, nombre, tipo, link, imagen);
    });

    // Cierra el modal al hacer clic en "Cancelar"
    $("#cancelPaginaModalButton").click(function () {
        closePaginaModal();
    });
});
