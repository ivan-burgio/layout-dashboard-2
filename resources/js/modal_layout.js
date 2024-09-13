// Función para abrir el modal y llenar el formulario
function openLayoutModal(
    id = "",
    nombre = "",
    descripcion = "",
    link = "",
    imagen = "",
    tipo = "webs" // Valor por defecto para tipo
) {
    const form = document.getElementById("layoutForm");
    const baseActionUrl = `/dashboard/layouts/${tipo}`;

    if (id) {
        // Configura el formulario para actualizar un layout
        form.action = `${baseActionUrl}/${id}`;
        form.querySelector('input[name="_method"]').value = "PUT"; // Añadimos el método PUT
    } else {
        // Configura el formulario para crear un nuevo layout
        form.action = baseActionUrl;
        form.querySelector('input[name="_method"]').value = ""; // Eliminamos el método PUT
    }

    // Llena el formulario con los datos
    document.getElementById("nombre").value = nombre || "";
    document.getElementById("descripcion").value = descripcion || "";
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
    document.getElementById("layoutModal").classList.remove("hidden");
}

// Función para cerrar el modal
function closeLayoutModal() {
    document.getElementById("layoutModal").classList.add("hidden");
}

// Usamos jQuery para manejar eventos
$(document).ready(function () {
    // Abre el modal para nuevo layout
    $("#openModalButtonLayout").click(function () {
        // Obtén el tipo desde el botón
        const tipo = $(this).data("tipo");
        // Configura el formulario para crear un nuevo layout
        const form = document.getElementById("layoutForm");
        form.action = `/dashboard/layouts/${tipo}`;
        form.querySelector('input[name="_method"]').value = ""; // Asegúrate de no usar PUT aquí
        openLayoutModal("", "", "", "", "", tipo); // Abre el modal con los campos vacíos
    });

    // Abre el modal para editar un layout
    $(document).on("click", ".edit-buttonLayout", function () {
        const id = $(this).data("id");
        const nombre = $(this).data("nombre");
        const descripcion = $(this).data("descripcion");
        const link = $(this).data("link");
        const imagen = $(this).data("imagen");
        const tipo = $(this).data("tipo");

        openLayoutModal(id, nombre, descripcion, link, imagen, tipo);
    });

    // Cierra el modal al hacer clic en "Cancelar"
    $("#cancelLayoutModalButton").click(function () {
        closeLayoutModal();
    });
});
