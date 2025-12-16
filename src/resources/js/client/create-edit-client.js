$(document).ready(function () {
    if (client) {
        $("#client-id-finance").val(client.id);
        $("#client-id-site").val(client.id);
        $("#client-id-filiale").val(client.id);
        $("#client-id-evaluator").val(client.id);
        $("#client-id-admin-user").val(client.id);
    }

    $("#addEditDataClient").on("submit", function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: client ? ApiClientEditData : ApiClientCreateData,
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                Swal.fire({
                    title: window.translations.success_client,
                    text: client
                        ? window.translations.modife_client
                        : window.translations.ajoute_client,
                    icon: "success",
                    confirmButtonText: window.translations.confirm,
                }).then((result) => {
                    if (result.isConfirmed) {
                        console.log(response);
                        $("#client-id-finance").val(response.data.id);
                        $("#client-id-site").val(response.data.id);
                        $("#client-id-filiale").val(response.data.id);
                        $("#client-id-evaluator").val(response.data.id);
                        $("#client-id-admin-user").val(response.data.id);
                        $("#general-info-tab").removeClass("active");
                        $("#tax-info-tab").trigger("click");
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

    $("#btn-logo").on("click", function () {
        $("#logo").click();
    });

    $(".clientLogolightinput").change(function (e) {
        e.preventDefault();

        let input = this;
        if (input.files && input.files[0]) {
            let file = input.files[0];

            // Check if the file is an image
            if (!file.type.startsWith("image/")) {
                alert("Veuillez sélectionner une image valide.");
                return;
            }

            let reader = new FileReader();

            reader.onload = function (e) {
                let imageUrl = e.target.result; // Get the image URL from FileReader

                // Update the image preview
                $('.logo-figure img.client-logo').attr('src', imageUrl);

                // Update the avatar figure background
                $('.logo-figure').css({
                    'background-image': `url(${imageUrl})`,
                    'background-size': 'cover',
                    'background-position': 'center',
                });
            };

            reader.readAsDataURL(file); // Read the image as a data URL
        } else {
            // If no file is selected, reset the image
            $('.logo-figure img.client-logo').attr('src', 'default-avatar.png');
            $('.logo-figure').css('background-image', 'none');
        }
    });


    $(".clientFilialeLogolightinput").change(function () {
        let input = this;
        console.log('input', input)
        if (input.files && input.files[0]) {
            let file = input.files[0];

            // Check if the file is an image
            if (!file.type.startsWith("image/")) {
                alert(window.translations.alert);
                return;
            }

            let reader = new FileReader();

            reader.onload = function (e) {
                let imageUrl = e.target.result; // Get the image URL from FileReader

                // Update the image preview
                $('.logo-filiale-figure img.client-filiale-logo').attr('src', imageUrl);

                // Update the avatar figure background
                $('.logo-filiale-figure').css({
                    'background-image': `url(${imageUrl})`,
                    'background-size': 'cover',
                    'background-position': 'center',
                });
            };

            reader.readAsDataURL(file); // Read the image as a data URL
        } else {
            // If no file is selected, reset the image
            $('.logo-filiale-figure img.client-filiale-logo').attr('src', 'default-avatar.png');
            $('.logo-filiale-figure').css('background-image', 'none');
        }
    });




});

$(document).ready(function () {

    function filterCitiesByCountry(countryId) {
        return cities.filter(city => city.region && city.region.country_id == countryId);
    }

    const $countrySelect = $("#filter-pays");
    const $citySelect = $("#filter-ville");


    $countrySelect.on("change", function () {
        const selectedCountryId = $(this).val();

        resetCitySelect();

        if (selectedCountryId === "Tous") {
            return;
        }

        const filteredCities = filterCitiesByCountry(selectedCountryId);

        if (filteredCities.length) {
            $.each(filteredCities, function (index, city) {
                $citySelect.append(
                    `<option value="${city.id}">${city.name}</option>`
                );
            });
        }

        $citySelect.trigger('chosen:updated');

    });


    function resetCitySelect() {
        $citySelect.empty();
    }





    function populateCitySelect(filteredCities) {
        if (filteredCities.length) {
            $.each(filteredCities, function (index, city) {
                $citySelect.append(
                    `<option value="${city.id}">${city.name}</option>`
                );
            });
        }
    }
});
