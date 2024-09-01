// Función para abrir el modal y llenar el formulario
function openModal(id = "", nombre = "", email = "", mensaje = "") {
    const form = document.getElementById("emailForm");

    if (id) {
        // Configura el formulario para actualizar un email
        form.action = `/dashboard/buzon/emails/${id}`;
        form.querySelector('input[name="_method"]').value = "PUT"; // Añadimos el método PUT
    } else {
        // Configura el formulario para crear un nuevo email
        form.action = "/dashboard/buzon/emails";
        form.querySelector('input[name="_method"]').value = ""; // Eliminamos el método PUT
    }

    // Llena el formulario con los datos
    document.getElementById("nombre").value = nombre || "";
    document.getElementById("email").value = email || "";
    document.getElementById("mensaje").value = mensaje || "";

    // Muestra el modal
    document.getElementById("emailModal").classList.remove("hidden");
}

// Función para cerrar el modal
function closeModal() {
    document.getElementById("emailModal").classList.add("hidden");
}

// Usamos jQuery para manejar eventos
$(document).ready(function () {
    // Abre el modal para nuevo email
    $("#openModalButtonEmail").click(function () {
        // Configura el formulario para crear un nuevo email
        const form = document.getElementById("emailForm");
        form.action = "/dashboard/buzon/emails";
        form.querySelector('input[name="_method"]').value = ""; // Asegúrate de no usar PUT aquí
        openModal(); // Abre el modal con los campos vacíos
    });

    // Abre el modal para editar un email
    $(document).on("click", ".edit-buttonEmail", function () {
        const id = $(this).data("id");
        const nombre = $(this).data("nombre");
        const email = $(this).data("email");
        const mensaje = $(this).data("mensaje");
        openModal(id, nombre, email, mensaje);
    });

    // Cierra el modal
    $("#cancelModalButton").click(function () {
        closeModal();
    });
});
