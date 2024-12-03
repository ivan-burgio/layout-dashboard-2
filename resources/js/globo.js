$(document).ready(function () {
    $(".btn-close").on("click", function () {
        var $alert = $(this).closest(".alert");
        if ($alert.length) {
            $alert.fadeOut(300, function () {
                $(this).remove();
            });
        }
    });
});