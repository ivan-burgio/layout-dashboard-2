document.addEventListener("DOMContentLoaded", function () {
    var calendarEl = document.getElementById("calendar");
    var modal = document.getElementById("editEventModal");
    var closeModalBtn = document.getElementById("closeModalBtn");
    var deleteEventBtn = document.getElementById("deleteEventBtn");
    var form = document.getElementById("editEventForm");

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: "dayGridMonth",
        editable: true,
        selectable: true,
        events: "/dashboard/agenda/calendario/events",
        locale: 'es',

        dateClick: function (info) {
            // Abre el modal para crear un nuevo evento
            document.getElementById("eventId").value = ""; // Limpia el ID del evento
            document.getElementById("eventTitle").value = "";
            document.getElementById("eventColor").value = "#378006"; // Color predeterminado
            document.getElementById("eventStart").value = info.dateStr;
            document.getElementById("eventEnd").value = info.dateStr;

            modal.classList.remove("hidden");
        },

        eventClick: function (info) {
            var event = info.event;
            document.getElementById("eventId").value = event.id;
            document.getElementById("eventTitle").value = event.title;
            document.getElementById("eventColor").value = event.backgroundColor;
            document.getElementById("eventStart").value = event.start
                .toISOString()
                .substring(0, 10);
            document.getElementById("eventEnd").value = event.end
                ? event.end.toISOString().substring(0, 10)
                : "";

            modal.classList.remove("hidden");
        },
    });

    calendar.render();

    // Acción para cerrar el modal
    closeModalBtn.addEventListener("click", function () {
        modal.classList.add("hidden");
    });

    // Acción para eliminar el evento
    deleteEventBtn.addEventListener("click", function () {
        var eventId = document.getElementById("eventId").value;

        fetch(`/dashboard/agenda/calendario/events/${eventId}`, {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    var event = calendar.getEventById(eventId);
                    event.remove();
                    modal.classList.add("hidden");
                    alert("Evento eliminado con éxito.");
                } else {
                    alert("Error al eliminar el evento.");
                }
            })
            .catch((error) => {
                alert("Error al eliminar el evento.");
            });
    });

    // Acción para guardar o actualizar el evento
    form.addEventListener("submit", function (event) {
        event.preventDefault();

        var eventId = document.getElementById("eventId").value;
        var title = document.getElementById("eventTitle").value;
        var color = document.getElementById("eventColor").value;
        var start = document.getElementById("eventStart").value;
        var end = document.getElementById("eventEnd").value;

        var method = eventId ? "PUT" : "POST";
        var url = eventId
            ? `/dashboard/agenda/calendario/events/${eventId}`
            : "/dashboard/agenda/calendario/events";

        var body = {
            title: title,
            color: color,
            start: start,
            end: end,
        };

        fetch(url, {
            method: method,
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
            body: JSON.stringify(body),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    if (method === "POST") {
                        calendar.addEvent({
                            id: data.event.id,
                            title: data.event.title,
                            start: data.event.start,
                            end: data.event.end,
                            backgroundColor: data.event.color || "#378006",
                            borderColor: data.event.color || "#378006",
                        });
                    } else {
                        var event = calendar.getEventById(eventId);
                        event.setProp("title", title);
                        event.setProp("backgroundColor", color);
                        event.setProp("borderColor", color);
                        event.setStart(start);
                        event.setEnd(end);
                    }
                    modal.classList.add("hidden");
                    alert("Evento guardado con éxito");
                } else {
                    alert("Error al guardar el evento.");
                }
            })
            .catch((error) => {
                alert("Error al guardar el evento.");
            });
    });
});
