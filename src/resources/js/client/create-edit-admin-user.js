$(document).ready(function () {
    $("#addEditDataUserAdmin").on("submit", function (e) {
        e.preventDefault();
        var formData = new FormData(this);

        var firstName = $("input[name='first_name']").val();
        var lastName = $("input[name='last_name']").val();

        var fullName = `${firstName} ${lastName}`.trim();

        formData.append("name", fullName);
        formData.append("roles", 46);

        $.ajax({
            url: client ? ApiClientEditAdminUser : ApiClientCreateAdminUser,
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log(response);
                Swal.fire({
                    title: window.translations.success_client,
                    text: client
                        ? window.translations.message_create_admin_succes
                        : window.translations.message_edit_admin_succes,
                    icon: "success",
                    confirmButtonText: window.translations.confirm,
                }).then((result) => {
                    if (result.isConfirmed) {
                        var url = "/clients";
                        location.href = url;
                    }
                });
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    var errorMessage = "";
                    $.each(errors, function (key, value) {
                        errorMessage += `${value[0]}<br/>`;
                    });

                    Swal.fire({
                        title: window.translations.title_erreur,
                        html: errorMessage,
                        icon: "error",
                        confirmButtonText: window.translations.button,
                    });
                } else {
                    Swal.fire({
                        title: window.translations.title_erreur,
                        text: window.translations.message_erreur,
                        icon: "error",
                        confirmButtonText: window.translations.button,
                    });
                }
            },
        });
    });
});
