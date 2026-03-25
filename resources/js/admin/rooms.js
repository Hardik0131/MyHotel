$(document).ready(function () {
    function roomsShowAlert(type, message) {
        const alertClass =
            type === "success" ? "alert-success" : "alert-warning";

        $(".rooms-delete-alert")
            .html(
                `
                    <div class="alert ${alertClass}">
                        <div class="${alertClass}-message">
                            <strong>${
                                type === "success" ? "Success!" : "Error!"
                            }</strong> ${message}
                        </div>
                        <button class="close"><i class="bx bx-x"></i></button>
                    </div>
                `
            )
            .fadeIn(200);
    }

    $(document).on("click", ".close i.bx-x", function () {
        $(this).closest(".alert").fadeOut(200);
    });

    $(document).on("click", ".rooms-delete-btn", function () {
        let roomsId = $(this).data("id");
        let row = $(this).closest("tr");

        if (!confirm("Are you sure to delete this rooms Item ?")) return;

        $.ajax({
            url: "room/delete/" + roomsId,
            type: "DELETE",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                if (response.status === "success") {
                    row.fadeOut(400, function () {
                        $(this).remove();
                    });
                    roomsShowAlert("success", response.message);
                } else {
                    roomsShowAlert("error", response.message);
                }
            },
            error: function () {
                roomsShowAlert("error", "Something went wrong!");
            },
        });
    });
});
