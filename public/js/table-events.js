(function () {
    deleteButtonEvent();
})();

function deleteButtonEvent() {
    $(".btn-delete").click(function () {
        console.log("Clicked");
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "ajaxRequest/delete/" + id,
                    type: "DELETE",
                    data: {
                        id: id,
                        _token: token,
                    },
                    success: function (response) {
                        if (data.code == 200) {
                            Swal.fire(
                                "Deleted!",
                                "Your data has been deleted.",
                                "success"
                            );
                        } else {
                            Swal.fire(
                                "Your data has not been deleted",
                                "",
                                "info"
                            );
                        }
                    },
                });
            }
        });
    });
}
