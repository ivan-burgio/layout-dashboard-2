document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".estado-button").forEach((button) => {
        button.addEventListener("click", function () {
            const id = this.dataset.id;
            const estado = this.dataset.estado;

            if (estado === "email") {
                document.getElementById("email_id").value = id;
                document.getElementById(
                    "emailEstadoForm"
                ).action = `/dashboard/buzon/emails/estado/${id}`;
                document
                    .getElementById("emailEstadoModal")
                    .classList.remove("hidden");
            } else if (estado === "web") {
                document.getElementById("web_id").value = id;
                document.getElementById(
                    "webEstadoForm"
                ).action = `/dashboard/buzon/webs/estado/${id}`;
                document
                    .getElementById("webEstadoModal")
                    .classList.remove("hidden");
            } else if (estado === "whatsapp") {
                document.getElementById("whatsapp_id").value = id;
                document.getElementById(
                    "whatsappEstadoForm"
                ).action = `/dashboard/buzon/whatsapps/estado/${id}`;
                document
                    .getElementById("whatsappEstadoModal")
                    .classList.remove("hidden");
            }
        });
    });

    document
        .querySelectorAll("#cancelEmailModalButton, #cancelWebModalButton")
        .forEach((button) => {
            button.addEventListener("click", function () {
                this.closest(".fixed").classList.add("hidden");
            });
        });
});
