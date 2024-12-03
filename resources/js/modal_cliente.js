// Función para abrir el modal y llenar el formulario
function openClienteModal(
    id = "",
    nombre = "",
    email = "",
    telefono = "",
    numeroCuentaBancaria = ""
) {
    const form = document.getElementById("clienteForm");

    if (id) {
        // Configura el formulario para actualizar un cliente
        form.action = `/cuentas/clientes/${id}`;
        form.querySelector('input[name="_method"]').value = "PUT"; // Añadimos el método PUT
    } else {
        // Configura el formulario para crear un nuevo cliente
        form.action = "/cuentas/clientes";
        form.querySelector('input[name="_method"]').value = ""; // Eliminamos el método PUT
    }

    // Llena el formulario con los datos
    document.getElementById("nombre").value = nombre || "";
    document.getElementById("email").value = email || "";
    document.getElementById("telefono").value = telefono || "";
    document.getElementById("numero_cuenta_bancaria").value =
        numeroCuentaBancaria || "";

    // Muestra el modal
    document.getElementById("clienteModal").classList.remove("hidden");
}

// Función para cerrar el modal
function closeClienteModal() {
    document.getElementById("clienteModal").classList.add("hidden");
}

// Usamos jQuery para manejar eventos
$(document).ready(function () {
    // Abre el modal para nuevo cliente
    $("#openModalButtonCliente").click(function () {
        // Configura el formulario para crear un nuevo cliente
        const form = document.getElementById("clienteForm");
        form.action = "/cuentas/clientes";
        form.querySelector('input[name="_method"]').value = ""; // Asegúrate de no usar PUT aquí
        openClienteModal(); // Abre el modal con los campos vacíos
    });

    // Abre el modal para editar un cliente
    $(document).on("click", ".edit-buttonCliente", function () {
        const id = $(this).data("id");
        const nombre = $(this).data("nombre");
        const email = $(this).data("email");
        const telefono = $(this).data("telefono");
        const numeroCuentaBancaria = $(this).data("numero_cuenta_bancaria");

        openClienteModal(id, nombre, email, telefono, numeroCuentaBancaria);
    });

    // Cierra el modal al hacer clic en "Cancelar"
    $("#cancelClienteModalButton").click(function () {
        closeClienteModal();
    });
});
