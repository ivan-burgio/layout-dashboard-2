document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".estado-button").forEach((button) => {
        button.addEventListener("click", function () {
            const id = this.dataset.id;
            const estado = this.dataset.estado;

            if (estado === "email") {
                document.getElementById("email_id").value = id;
                document.getElementById(
                    "emailEstadoForm"
                ).action = `/buzon/emails/estado/${id}`;
                document
                    .getElementById("emailEstadoModal")
                    .classList.remove("hidden");
            } else if (estado === "web") {
                document.getElementById("web_id").value = id;
                document.getElementById(
                    "webEstadoForm"
                ).action = `/buzon/messages_webs/estado/${id}`;
                document
                    .getElementById("webEstadoModal")
                    .classList.remove("hidden");
            } else if (estado === "whatsapp") {
                document.getElementById("whatsapp_id").value = id;
                document.getElementById(
                    "whatsappEstadoForm"
                ).action = `/buzon/whatsapps/estado/${id}`;
                document
                    .getElementById("whatsappEstadoModal")
                    .classList.remove("hidden");
            } else if (estado === "cliente") {
                document.getElementById("cliente_id").value = id;
                document.getElementById(
                    "estadoClienteForm"
                ).action = `/cuentas/clientes/estado/${id}`;
                document
                    .getElementById("clienteEstadoModal")
                    .classList.remove("hidden");
            } else if (estado === "ticket") {
                // Manejar el estado de los tickets
                document.getElementById("ticket_id").value = id;
                document.getElementById(
                    "cambiarEstadoTicketForm"
                ).action = `/agenda/tickets/estado/${id}`;
                document
                    .getElementById("cambiarEstadoTicket")
                    .classList.remove("hidden");
            }
        });
    });

    // Seleccionar correctamente los botones de cancelar
    document
        .querySelectorAll(
            "#cancelEmailModalButton, #cancelWebModalButton, #cancelClienteModalButton, #cancelTicketModalButton"
        )
        .forEach((button) => {
            button.addEventListener("click", function () {
                // Asegurarse de que el contenedor más cercano es el que se debe ocultar
                this.closest(".fixed").classList.add("hidden");
            });
        });
});
