$(document).ready(function () {
    function bookingShowAlert(type, message) {
        const alertClass =
            type === "success" ? "alert-success" : "alert-warning";

        $(".booking-delete-alert")
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

    $(document).on("click", ".booking-delete-btn", function () {
        let bookingId = $(this).data("id");
        let row = $(this).closest("tr");

        if (!confirm("Are you sure to delete this booking Item ?")) return;

        $.ajax({
            url: "booking/delete/" + bookingId,
            type: "DELETE",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                console.log("Bhaliya");
                if (response.status === "success") {
                    row.fadeOut(400, function () {
                        $(this).remove();
                    });
                    bookingShowAlert("success", response.message);
                } else {
                    bookingShowAlert("error", response.message);
                }
            },
            error: function () {
                console.log("Hardik");
                console.log(bookingId);
                bookingShowAlert("error", "Something went wrong!");
            },
        });
    });
});
