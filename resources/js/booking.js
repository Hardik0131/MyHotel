$(document).ready(function () {
    $(".close").on("click", function () {
        $(this)
            .closest(".alert")
            .fadeOut(200, function () {
                $(this).remove();
            });
    });
});
