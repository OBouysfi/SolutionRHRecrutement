$(document).ready(function () {

    $("#addDataCandidate").on("submit", function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: ApiCandidateCreateEditData,
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                Swal.fire({
                    title: "Succès!",
                    text: "Candidat ajouté avec succès !",
                    icon: "success",
                    confirmButtonText: "OK",
                }).then((result) => {
                    if (result.isConfirmed) {
                        var url = '/test-technique/test';
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
                        title: "Erreur!",
                        html: errorMessage,
                        icon: "error",
                        confirmButtonText: "Fermer",
                    });
                } else {
                    Swal.fire({
                        title: "Erreur!",
                        text: "Une erreur est survenue lors de l'ajout du Candidat .",
                        icon: "error",
                        confirmButtonText: "Fermer",
                    });
                }
            },
        });
    });


    $("#editDataEvaluator").on("submit", function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: ApiClientEditEvaluator,
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                Swal.fire({
                    title: "Succès!",
                    text: "Evaluateur ajouté avec succès !",
                    icon: "success",
                    confirmButtonText: "OK",
                }).then((result) => {
                    if (result.isConfirmed) {
                        console.log(response);
                      
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
                        title: "Erreur!",
                        html: errorMessage,
                        icon: "error",
                        confirmButtonText: "Fermer",
                    });
                } else {
                    Swal.fire({
                        title: "Erreur!",
                        text: "Une erreur est survenue lors de l'ajout du Client .",
                        icon: "error",
                        confirmButtonText: "Fermer",
                    });
                }
            },
        });
    });

  

    $(".profileavatarlightinput").change(function () {
        let input = this;
        console.log('input', input)
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
                $('.avatar-figure img.profile-avatar').attr('src', imageUrl);
    
                // Update the avatar figure background
                $('.avatar-figure').css({
                    'background-image': `url(${imageUrl})`,
                    'background-size': 'cover',
                    'background-position': 'center',
                });
            };
    
            reader.readAsDataURL(file); // Read the image as a data URL
        } else {
            // If no file is selected, reset the image
            $('.avatar-figure img.profile-avatar').attr('src', 'default-avatar.png'); // Change to your default image
            $('.avatar-figure').css('background-image', 'none');
        }
    });


    $(".profilecoverlightinput").change(function () {
        let input = this;
        console.log('input', input)
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
                $('.cover-figure img.profile-cover').attr('src', imageUrl);
    
                // Update the avatar figure background
                $('.cover-figure').css({
                    'background-image': `url(${imageUrl})`,
                    'background-size': 'cover',
                    'background-position': 'center',
                });
            };
    
            reader.readAsDataURL(file); // Read the image as a data URL
        } else {
            // If no file is selected, reset the image
            $('.cover-figure img.profile-cover').attr('src', 'default-avatar.png'); // Change to your default image
            $('.cover-figure').css('background-image', 'none');
        }
    });

 
    

 


    



  

 
    
    

});