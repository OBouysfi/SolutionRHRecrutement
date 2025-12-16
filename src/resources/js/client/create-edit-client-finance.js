$(document).ready(function () {

    $('#addClientFinanceData').on('submit', function (e) {
      e.preventDefault();
      var formData = new FormData(this);
      $.ajax({
        url: clientFinance ? ApiClientFinancesEditData :  ApiClientFinancesCreateData,
        type: "POST",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
          console.log(response);
          Swal.fire({
            title: window.translations.success_client,
            text: window.translations.ajoute_client,
            icon: 'success',
            confirmButtonText: window.translations.confirm
          }).then((result) => {
            if (result.isConfirmed) {
              $('#tax-info-tab').removeClass('active');
              $('#sites-tab').trigger('click');
            }
          });
        },
        error: function (xhr) {
          if (xhr.status === 422) {
            var errors = xhr.responseJSON.errors;
            var errorMessage = '';
            $.each(errors, function (key, value) {
              errorMessage += `${value[0]}<br/>`;
            });

            console.log(errorMessage);
            Swal.fire({
              title: window.translations.title_erreur,
              html: errorMessage,
              icon: 'error',
              confirmButtonText: window.translations.button
            });
          } else {
            Swal.fire({
              title: window.translations.title_erreur,
              text: window.translations.message_erreur,
              icon: 'error',
              confirmButtonText: window.translations.button
            });
          }
        }
      });
    });


  });
$(document).ready(function () {

    const $countrySelect = $("#filter-pays-finance");
    const $citySelect = $("#filter-ville-finance");

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


    function filterCitiesByCountry(countryId) {
        return cities.filter(city => city.region && city.region.country_id == countryId);
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
