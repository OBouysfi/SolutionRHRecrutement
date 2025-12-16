$(document).ready(function () {
    $('#addDataRecruitment').on('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            url: recruitmentCostAddgData,  // Ton URL définie côté JS
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
                    title: 'Succès!',
                    text: "Le coût de recrutement a été   ajouté avec succès !",
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = routeToListing;
                });
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    let errorMessage = '';

                    $.each(errors, function (key, value) {
                        errorMessage += `${value[0]}<br/>`;
                    });

                    console.warn("Validation errors :", errors);

                    Swal.fire({
                        title: 'Erreur de validation',
                        html: errorMessage,
                        icon: 'error',
                        confirmButtonText: 'Fermer'
                    });

                } else {
                    console.error("Erreur serveur :", xhr.responseText);

                    Swal.fire({
                        title: 'Erreur!',
                        text: "Une erreur est survenue lors de l'ajout du rapport.",
                        icon: 'error',
                        confirmButtonText: 'Fermer'
                    });
                }
            }
        });
    });
    $('#invoice').on('change', function () {
        var file = this.files[0];
        var allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];

        if (file && !allowedTypes.includes(file.type)) {
            Swal.fire({
                title: 'Type de fichier invalide',
                text: 'Seuls les fichiers PDF, DOC, DOCX sont autorisés.',
                icon: 'error',
                confirmButtonText: 'Fermer'
            });
            $(this).val(''); // reset input
        }
    });
    document.querySelectorAll('.doc-file-input').forEach((input) => {
        input.addEventListener('change', function (event) {
            const file = event.target.files[0];

            const preview = input.closest('.file-upload').querySelector('.file-preview');
            const exportButton = input.closest('.file-upload').parentElement.parentElement.querySelector('.export-button');

            if (file) {
                preview.innerHTML = '';
                const fileLink = document.createElement('span');
                fileLink.textContent = file.name;
                preview.appendChild(fileLink);

                preview.style.display = 'block';
                preview.style.width = '100%';
                preview.style.textAlign = 'center';
                preview.style.padding = '10px';
                preview.style.margin = '10px';

                const fileURL = URL.createObjectURL(file);
                if (exportButton) {
                    exportButton.setAttribute('data-file-url', fileURL);
                    exportButton.setAttribute('data-file-name', file.name);
                    exportButton.disabled = false;
                }
            } else {
                preview.innerHTML = '';
                preview.style.display = 'none';
                exportButton.removeAttribute('data-file-url');
                exportButton.removeAttribute('data-file-name');
                exportButton.disabled = true;
            }
        });
    });
});
$(document).ready(function () {

    $(document).on('click', '.edit-recruitment-btn', function () {
        var data = $(this).data();
        let RecruitmentId = data.id;
        let Action = data.urlAction; // corrected here

        $('#editRecruitmentId').val(data.id);
        $('#editPlatform').val(data.platform);
        // $('#editLogo').val('');
        $('#editBudget').val(data.budget);
        $('#editAmount').val(data.amount);
        // $('#editInvoice').val(data.invoice);
        $('#editDevise').val(data.devise);
        $('#recruitmentCostId').val(RecruitmentId);

        let updateUrl = recruitmentCostEdit.replace('__ID__', RecruitmentId);
        console.log('Action URL:', updateUrl);

        $("#ModalEditRecruitment  #EditDataRecruitment").attr('action', updateUrl);
    });


    $('#EditDataRecruitment').on('submit', function (e) {
        e.preventDefault();
        var form = $(this);
        var actionUrl = form.attr('action');
        let formData = new FormData(this);

        console.log(actionUrl);
        $.ajax({
            url: actionUrl,
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
                    title: 'Succès!',
                    text: "Le coût de recrutement a été modifié avec succès !",
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = routeToListing;
                });
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    let errorMessage = '';

                    $.each(errors, function (key, value) {
                        errorMessage += `${value[0]}<br/>`;
                    });

                    console.warn("Validation errors :", errors);

                    Swal.fire({
                        title: 'Erreur de validation',
                        html: errorMessage,
                        icon: 'error',
                        confirmButtonText: 'Fermer'
                    });

                } else {
                    console.error("Erreur serveur :", xhr.responseText);

                    Swal.fire({
                        title: 'Erreur!',
                        text: "Une erreur est survenue lors de l'ajout du rapport.",
                        icon: 'error',
                        confirmButtonText: 'Fermer'
                    });
                }
            }
        });
    });

});
