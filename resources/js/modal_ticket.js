// Función para abrir el modal y llenar el formulario
function openTicketModal(
    id = "",
    titulo = "",
    descripcion = "",
    prioridad = "Baja",
) {
    const form = document.getElementById("ticketForm");

    if (id) {
        // Configura el formulario para actualizar un ticket
        form.action = `/agenda/tickets/${id}`;
        form.querySelector('input[name="_method"]').value = "PUT"; // Añadimos el método PUT
    } else {
        // Configura el formulario para crear un nuevo ticket
        form.action = "/agenda/tickets";
        form.querySelector('input[name="_method"]').value = ""; // Eliminamos el método PUT
    }

    // Llena el formulario con los datos
    document.getElementById("titulo").value = titulo || "";
    document.getElementById("descripcion").value = descripcion || "";
    document.getElementById("prioridad").value = prioridad || "Baja";

    // Muestra el modal
    document.getElementById("ticketModal").classList.remove("hidden");
}

// Función para cerrar el modal
function closeTicketModal() {
    document.getElementById("ticketModal").classList.add("hidden");
}

// Usamos jQuery para manejar eventos
$(document).ready(function () {
    // Abre el modal para crear un nuevo ticket
    $("#openModalButtonTicket").click(function () {
        // Configura el formulario para crear un nuevo ticket
        const form = document.getElementById("ticketForm");
        form.action = "/agenda/tickets";
        form.querySelector('input[name="_method"]').value = ""; // Asegúrate de no usar PUT aquí
        openTicketModal(); // Abre el modal con los campos vacíos
    });

    // Abre el modal para editar un ticket
    $(document).on("click", ".edit-buttonTicket", function () {
        const id = $(this).data("id");
        const titulo = $(this).data("titulo");
        const descripcion = $(this).data("descripcion");
        const prioridad = $(this).data("prioridad");

        openTicketModal(id, titulo, descripcion, prioridad);
    });

    // Cierra el modal al hacer clic en "Cancelar"
    $("#cancelTicketModalButton").click(function () {
        closeTicketModal();
    });

    // Cierra el modal al hacer clic fuera del contenido del modal
    $("#ticketModal").click(function (event) {
        if (event.target === this) {
            closeTicketModal();
        }
    });
});
