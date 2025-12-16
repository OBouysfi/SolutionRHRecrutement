$(document).ready(function () {
    $(document).on("click", ".edit-btn", function () {
        var companieId = $(this).data("id");

        $.get("/entreprises/" + companieId + "/edit", function (data) {
            $("#companyEditModal").modal("show");
            $("#edit_id").val(data.id);
            $("#business_name").val(data.business_name);
            $("#address").val(data.address);
            $("#postal_code").val(data.postal_code);
            $("#edit_city_name").val(data.city_id).trigger("chosen:updated");

            var logoPath = data.path_logo ? "/storage/" + data.path_logo : "/storage/companies/img/recession.png";
            $("#path_logo_preview").attr("src", logoPath);
        });
    });

    $("#save_edit").click(function (e) {
        e.preventDefault();

        var companieId = $("#edit_id").val();
        var updateUrl = "/api/entreprises/update/" + companieId;

        var formData = new FormData();
        formData.append("_method", "PUT");
        formData.append("business_name", $("#business_name").val());
        formData.append("address", $("#address").val());
        formData.append("postal_code", $("#postal_code").val());
        formData.append("city_id", $("#edit_city_name").val());
        
        var fileInput = document.getElementById("edit_path_logo");
        
        if (fileInput.files.length > 0) {
            var file = fileInput.files[0];
            formData.append("path_logo", file);
        }
        
        console.log("FormData Entries:");
        for (var pair of formData.entries()) {
            console.log(pair[0] + ": " + pair[1]);
        }
        

        $.ajax({
            url: updateUrl,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content"),
            },
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: window.translations.success,
                    text: window.translations.company_edit,
                    confirmButtonText: window.translations.confirm
                });
                $("#companyEditModal").modal("hide");
                $("#companiesTable").DataTable().ajax.reload();
            },
            error: function (xhr) {
                var errorMessage = window.translations.error_add_company;

                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    errorMessage = Object.values(xhr.responseJSON.errors)
                        .map(function (error) {
                            return error.join(" ");
                        })
                        .join("\n");
                }

                Swal.fire({
                    icon: "error",
                    title: window.translations.error,
                    text: errorMessage,
                    confirmButtonText: window.translations.confirm
                });
            },
        });
    });

    $("#edit_path_logo").on("change", function (event) {
        var file = event.target.files[0];

        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#path_logo_preview").attr("src", e.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
});




/**
 * Js For Select Search
 */ $(document).ready(function() {
    $('#city_name_edit').chosen({
        dropdownParent: $('#companyEditModal'),
    disable_search_threshold: 10, 
    no_results_text:  window.translations.no_results
     });
});