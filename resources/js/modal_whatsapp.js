// Función para abrir el modal y llenar el formulario
function openWhatsappModal(id = "", nombre = "", telefono = "", mensaje = "") {
    const form = document.getElementById("whatsappForm");

    if (id) {
        // Configura el formulario para actualizar un WhatsApp
        form.action = `/buzon/whatsapps/${id}`;
        form.querySelector('input[name="_method"]').value = "PUT"; // Añadimos el método PUT
    } else {
        // Configura el formulario para crear un nuevo WhatsApp
        form.action = "/buzon/whatsapps";
        form.querySelector('input[name="_method"]').value = ""; // Eliminamos el método PUT
    }

    // Llena el formulario con los datos
    document.getElementById("nombre_whatsapp").value = nombre || "";
    document.getElementById("telefono").value = telefono || "";
    document.getElementById("mensaje_whatsapp").value = mensaje || "";

    // Muestra el modal
    document.getElementById("whatsappModal").classList.remove("hidden");
}

// Función para cerrar el modal
function closeWhatsappModal() {
    document.getElementById("whatsappModal").classList.add("hidden");
}

// Usamos jQuery para manejar eventos
$(document).ready(function () {
    // Abre el modal para nuevo WhatsApp
    $("#openModalButtonWhatsapp").click(function () {
        // Configura el formulario para crear un nuevo WhatsApp
        const form = document.getElementById("whatsappForm");
        form.action = "/buzon/whatsapps";
        form.querySelector('input[name="_method"]').value = ""; // Asegúrate de no usar PUT aquí
        openWhatsappModal(); // Abre el modal con los campos vacíos
    });

    // Abre el modal para editar un WhatsApp
    $(document).on("click", ".edit-buttonWhatsapp", function () {
        const id = $(this).data("id");
        const nombre = $(this).data("nombre");
        const telefono = $(this).data("telefono");
        const mensaje = $(this).data("mensaje");
        openWhatsappModal(id, nombre, telefono, mensaje);
    });

    // Cierra el modal
    $("#cancelWhatsappModalButton").click(function () {
        closeWhatsappModal();
    });
});
