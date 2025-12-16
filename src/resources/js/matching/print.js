$(document).ready(function () {
    var table = $('#match_Table').DataTable({
        processing: true,
        serverSide: true,
        lengthChange: false,
        searching: false,
        info: false,
        ajax: {
            url: matchingListingData,
            data: function (d) {
                if ($('#filter-client').val() !== 'Tous') {
                    d.clientId = $('#filter-client').val();
                }
                if ($('#filter-job-offer').val() !== 'Tous') {
                    d.jobOfferId = $('#filter-job-offer').val();
                }
                if ($('#filter-profession').val() !== 'Tous') {
                    d.professionId = $('#filter-profession').val();
                }

                // les valeurs du slider
                d.minRatio = $('#minSlider').val();
                d.maxRatio = $('#maxSlider').val();
            },
        },
        dom: '<"d-none"B>frtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'A4',
                title: 'Vivier des Talents',
                exportOptions: {
                    columns: ':not(:last-child)'
                },
                customize: function (doc) {
                    doc.styles.tableHeader = {
                        bold: true,
                        fontSize: 11,
                        color: 'white',
                        fillColor: '#4CAF50',
                        alignment: 'center',
                    };
                    doc.defaultStyle.fontSize = 10;
                }
            },
            {
                extend: 'excelHtml5',
                text: 'Exporter en Excel',
                exportOptions: {
                    columns: ':not(:last-child)'
                },
            },
            {
                extend: 'csvHtml5',
                text: 'Exporter en CSV',
                exportOptions: {
                    columns: ':not(:last-child)'
                },
            }
        ],
        responsive: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json',
           
            emptyTable: "Aucune donnée disponible dans le tableau",
            infoEmpty: "Affichage de 0 à 0 sur 0 entrée"
        },
        columns: [
            { data: 'picture', name: 'picture', orderable: false, searchable: false },
            { data: 'matricule', name: 'profiles.matricule', orderable: false },
            { data: 'first_name', name: 'profiles.first_name', orderable: false },
            { data: 'last_name', name: 'profiles.last_name', orderable: false },
            { data: 'diploma_label', name: 'diploma_label', orderable: false, searchable: false },
            { data: 'option', name: 'option', orderable: false },
            { data: 'total_experience', name: 'total_experience', orderable: false },
            { data: 'current_profession', name: 'current_profession', orderable: false },
            { data: 'desired_profession', name: 'desired_profession', orderable: false },
            { data: 'tab', name: 'tab', orderable: false },
            { data: 'created_at', name: 'profiles.created_at', orderable: false },
            { data: 'updated_at', name: 'profiles.updated_at', orderable: false },
            { data: 'match_score', name: 'matches.ratio', orderable: false},
           
            
        ],
        drawCallback: function (settings) {
            $('.circle-progress').each(function() {
                var $this = $(this);
                if (!$this.hasClass('initialized')) {
                    // var ratio = parseFloat($this.data('ratio')) / 100;
                    var ratio = parseFloat($this.data('ratio'));
                    var color = $this.data('color') || '#2e9c65';

                    var circle = new ProgressBar.Circle(this, {
                        color: color,
                        strokeWidth: 10,
                        trailWidth: 10,
                        easing: 'easeInOut',
                        trailColor: '#dcecf0',
                        duration: 1400,
                        text: {
                            autoStyleContainer: false
                        },
                        from: { color: color, width: 10 },
                        to: { color: color, width: 10 },
                        step: function(state, circle) {
                            circle.path.setAttribute('stroke', state.color);
                            circle.path.setAttribute('stroke-width', state.width);
                        
                            var rawValue = circle.value() * 100;
                            var value = Math.round(rawValue);
                            
                            // Afficher au moins 1% pour les valeurs non nulles mais très petites
                            if (rawValue > 0 && value === 0) {
                                value = 1; // Score minimum affiché
                            }
                            
                            if (value === 0) {
                                circle.setText('');
                            } else {
                                circle.setText(value + "<small>%</small>");
                            }
                        }
                    });

                    circle.animate(ratio);

                    $this.addClass('initialized');
                }
            });

            // updateCustomPagination(settings);
        },

    });
});
