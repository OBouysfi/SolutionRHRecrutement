document.addEventListener("DOMContentLoaded", function () {

    // if (selectedMembers) {
    //     let destinatairesIds = selectedMembers.map(dest => dest.id);

    //     let destinatairesMeta = selectedMembers.reduce((acc, dest) => {
    //         acc[dest.id] = dest.type;
    //         return acc;
    //     }, {});

    //     document.getElementById('destinataires_meta').value = JSON.stringify(destinatairesMeta);
    //     setTimeout(() => {
    //         $("#destinataires").val(destinatairesIds).trigger("chosen:updated");
    //     }, 100);
    //     $('#createEventModal').modal('show');
    // }
    //Js for changes on the client select


    // Inside DOMContentLoaded function
    function setupEventTypeToggling(modalId) {
        $(`#${modalId} input[name="event_type"]`).on('change', function() {
            // Remove active class from all labels in this modal
            $(`#${modalId} .btn.action-check`).removeClass('active');
            
            // Add active class to current label
            $(this).next('label').addClass('active');
        });
    }

    // Initialize for both modals
    setupEventTypeToggling('createEventModal');
    setupEventTypeToggling('editEventModal');

    // Also add this in editEvent function after setting radio button
    // $(`#edit_event_${response.event_type}`)
    //     .prop('checked', true)
    //     .trigger('change')  // This will trigger the new handler
    //     .next('label')
    //     .addClass('active'); // Force active state
        
    $('#client_id').on('change', function () {
        var selectedClientId = $(this).val();
        $('#job_offer_id').val('');

        if (selectedClientId === '') {

            $('#job_offer_id option').show();
        } else {

            $('#job_offer_id option').hide();
            $('#job_offer_id option[value=""]').show();
            $('#job_offer_id option[data-client-id="' + selectedClientId + '"]').show();
        }
        $('#job_offer_id').trigger("chosen:updated");
    });

    // let descriptionEditor;
    let descriptionEditor;

    ClassicEditor
        .create(document.querySelector('textarea[name="description"]'), {
            language: 'fr',
            toolbar: { items: ['bold', 'italic', 'link', 'undo', 'redo', 'bulletedList', 'numberedList', 'blockQuote'] }
        })
        .then(editor => {
            descriptionEditor = editor;
            setupFormListeners();
            initializeForEditMode(); // Initialize for edit mode
        })
        .catch(error => console.error('CKEditor init error:', error));

    function setupFormListeners() {
        $('input[name="event_type"], #client_id, #job_offer_id, input[name="date"], input[name="start_time"], input[name="location"], input[name="event_url"], #destinataires')
            .on('change', updateDescription);
    }

    function initializeForEditMode() {
        const eventType = $('input[name="event_type"]:checked').val();
        const jobOfferId = $('#job_offer_id').val();
        const eventDate = $('input[name="date"]').val();
        const startTime = $('input[name="start_time"]').val();
        
        if (eventType && jobOfferId && eventDate && startTime) {
            setTimeout(() => {
                updateDescription();
            }, 100);
        }
    }

    async function updateDescription() {
        const eventType = $('input[name="event_type"]:checked').val();
        const jobOfferId = $('#job_offer_id').val();
        const eventDate = $('input[name="date"]').val();
        const startTime = $('input[name="start_time"]').val();
        const location = $('input[name="location"]').val();
        const eventUrl = $('input[name="event_url"]').val();
        const professionName = $('#job_offer_id').find(':selected').data("profession");
        
        const selectedDestinataire = $('#destinataires').val()?.[0] || null;
        const selectedOption = $('#destinataires option:selected');
        const selectedDestinataireModel = selectedOption.data('type') || null;

        if (!eventType || !eventDate || !startTime) return;

        try {
            const destinatairData = await getDestinatairName(selectedDestinataire, selectedDestinataireModel);
            const destinatairName = {
                first_name: destinatairData.first_name || '{profiles => first_name}',
                last_name: destinatairData.last_name || '{profiles => last_name}'
            };

            let subject = '';
            let body = '';

            // Generate both subject and body using API
            if (eventType === 'presentiel') {
                const emailContent = await generateEmailContent('physique', {
                    destinatairName,
                    professionName,
                    eventDate,
                    startTime,
                    location
                });
                subject = emailContent.subject;
                body = emailContent.body;
            } else if (eventType === 'visioconference') {
                const emailContent = await generateEmailContent('distanciel', {
                    destinatairName,
                    professionName,
                    eventDate,
                    startTime,
                    eventUrl
                });
                subject = emailContent.subject;
                body = emailContent.body;
            } else if (eventType === 'telephonique') {
                const emailContent = await generateEmailContent('telephonique', {
                    destinatairName,
                    professionName,
                    eventDate,
                    startTime
                });
                subject = emailContent.subject;
                body = emailContent.body;
            }

            // Update subject and body
            $('#email_subject').val(subject);
            
            if (descriptionEditor && body) {
                descriptionEditor.setData(body);
            }
        } catch (error) {
            console.error('Error updating description:', error);
        }
    }

    async function generateEmailContent(eventType, eventData) {
        try {
            const response = await fetch('/api/client-portal/events/generate-email-content', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    event_type: eventType,
                    first_name: eventData.destinatairName.first_name,
                    last_name: eventData.destinatairName.last_name,
                    profession_name: eventData.professionName,
                    event_date: eventData.eventDate,
                    start_time: eventData.startTime,
                    location: eventData.location,
                    event_url: eventData.eventUrl
                })
            });

            const result = await response.json();
            
            if (result.success) {
                return {
                    subject: result.subject,
                    body: result.content
                };
            } else {
                throw new Error(result.message);
            }
        } catch (error) {
            console.error('Error generating email content:', error);
            return generateFallbackContent(eventType, eventData);
        }
    }

    function generateFallbackContent(eventType, eventData) {
        switch(eventType) {
            case 'physique':
                return {
                    subject: `${window.translations.onsite_subject} – ${eventData.destinatairName.first_name} ${eventData.destinatairName.last_name} - ${eventData.professionName}`,
                    body: generateOriginalOnSiteBody(eventData.eventDate, eventData.startTime, eventData.location, eventData.destinatairName, eventData.professionName)
                };
            case 'distanciel':
                return {
                    subject: `${window.translations.visio_subject} – ${eventData.destinatairName.first_name} ${eventData.destinatairName.last_name} - ${eventData.professionName}`,
                    body: generateOriginalVisioBody(eventData.eventDate, eventData.startTime, eventData.eventUrl, eventData.destinatairName, eventData.professionName)
                };
            case 'telephonique':
                return {
                    subject: `${window.translations.phone_subject} – ${eventData.destinatairName.first_name} ${eventData.destinatairName.last_name} - ${eventData.professionName}`,
                    body: generateOriginalPhoneBody(eventData.eventDate, eventData.startTime, eventData.destinatairName, eventData.professionName)
                };
            default:
                throw new Error('Unknown event type');
        }
    }

    function generateOriginalOnSiteBody(eventDate, startTime, location, destinatairName, professionName) {
        return `
            <p>${window.translations.greeting} ${destinatairName.first_name},</p>
            <p>${window.translations.invitation_text_one_site} ${professionName}.</p>
            <p></p>
            <p><strong>${window.translations.date} :</strong> ${formatDate(eventDate)}</p>
            <p><strong>${window.translations.houre} :</strong> ${formatTime(startTime)}</p>
            <p><strong>${window.translations.site} :</strong> ${location || '{location}'}</p>
            <p>${window.translations.confirm_message}</p>
            <p>${window.translations.contact_info}</p>
            <p></p>
            <p>${window.translations.regards}</p>
            <p>${window.translations.team}</p>
        `;
    }

    function generateOriginalVisioBody(eventDate, startTime, eventUrl, destinatairName, professionName) {
        return `
            <p>${window.translations.greeting} ${destinatairName.first_name},</p>
            <p>${window.translations.invitation_text_remote} ${professionName}.</p>
            <p></p>
            <p><strong>${window.translations.date} :</strong> ${formatDate(eventDate)}</p>
            <p><strong>${window.translations.houre} :</strong> ${formatTime(startTime)}</p>
            <p><strong>${window.translations.link} :</strong> ${eventUrl || '{event_url}'}</p>
            <p>${window.translations.confirm_message}</p>
            <p>${window.translations.contact_info}</p>
            <p></p>
            <p>${window.translations.regards}</p>
            <p>${window.translations.team}</p>
        `;
    }

    function generateOriginalPhoneBody(eventDate, startTime, destinatairName, professionName) {
        return `
            <p>${window.translations.greeting} ${destinatairName.first_name},</p>
            <p>${window.translations.invitation_text_phone} ${professionName}.</p>
            <p></p>
            <p><strong>${window.translations.date} :</strong> ${formatDate(eventDate)}</p>
            <p><strong>${window.translations.houre} :</strong> ${formatTime(startTime)}</p>
            <p>${window.translations.confirm_message}</p>
            <p>${window.translations.contact_info}</p>
            <p></p>
            <p>${window.translations.regards}</p>
            <p>${window.translations.team}</p>
        `;
    }

    // Helper function to handle async calls in synchronous contexts
    function handleAsyncEmailGeneration(asyncFunction, ...args) {
        return asyncFunction(...args).catch(error => {
            console.error('Email generation failed, using fallback:', error);
            // Return a default/fallback content
            return '<p>Error loading email template. Please contact support.</p>';
        });
    }
    function formatDate(dateString) {
        if (!dateString) return '{hj_rec_events => date}';
        const date = new Date(dateString);
        return date.toLocaleDateString('fr-FR', { year: 'numeric', month: 'long', day: 'numeric' });
    }

    function formatTime(timeString) {
        if (!timeString) return '{hj_rec_events => start_time}';
        const [hours, minutes] = timeString.split(':');
        return `${hours}h${minutes}`;
    }

    function getDestinatairName(participantIds, model) {
        if (!participantIds || participantIds.length === 0) {
            return Promise.resolve({ first_name: '{profiles => first_name}', last_name: '{profiles => last_name}' });
        }

        return $.ajax({
            url: '/api/events/get-participant',
            method: 'POST',
            data: {
                participant_ids: participantIds,
                model: model,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json'
        }).then(response => response.success && response.participant
            ? response.participant
            : { first_name: '{profiles => first_name}', last_name: '{profiles => last_name}' }
        ).catch(error => {
            console.error('Error fetching participant data:', error);
            return { first_name: '{profiles => first_name}', last_name: '{profiles => last_name}' };
        });
    }

    // Optional: Add a manual refresh function for debugging
    function refreshDescription() {
        if (descriptionEditor) {
            updateDescription();
        }
    }


    function setFocus(on) {
        var element = document.activeElement;
        if (on) {
            setTimeout(function () {
                element.parentNode.classList.add("focus");
            });
        } else {
            let box = document.querySelector(".input-box");
            box.classList.remove("focus");
            $("input").each(function () {
                var $input = $(this);
                var $parent = $input.closest(".input-box");
                if ($input.val()) $parent.addClass("focus");
                else $parent.removeClass("focus");
            });
        }
    }

    if (meetLink) {
        document.getElementById('meetingTitle').value = title;  // Corrected from meetingTitle
        document.getElementById('meetingDuration').value = meetingDuration;
        document.getElementById('meetingEndTime').value = endTime;
        document.getElementById('meetingStartTime').value = startTime;
        document.getElementById('meetingLink').value = meetLink;  // Corrected from meet_link

        $('#createEventModal').modal('show');
        setFocus();

    }

    var calendarEl = document.getElementById('calendar');
    let calendrierCount = 0;
    let presentielCount = 0;
    let telephoniqueCount = 0;
    let visioconferenceCount = 0;
    const searchInput = document.getElementById('searchInput');
    const resultsList = document.getElementById('resultsList');

    let eventsData = [];

    var calendar = new FullCalendar.Calendar(calendarEl);

    function getEvents() {
        const translations = {
            fr: {
                today: "Aujourd'hui",
                dayGridMonth: "Mois",
                timeGridWeek: "Semaine",
                timeGridDay: "Jour",
            },
            en: {
                today: "Today",
                dayGridMonth: "Month",
                timeGridWeek: "Week",
                timeGridDay: "Day",
            },
            es: {
                today: "Hoy",
                dayGridMonth: "Mes",
                timeGridWeek: "Semana",
                timeGridDay: "Día",
            },
            pt: {
                today: "Hoje",
                dayGridMonth: "Mês",
                timeGridWeek: "Semana",
                timeGridDay: "Dia",
            },
            ar: {
                today: "اليوم",
                dayGridMonth: "شهر",
                timeGridWeek: "أسبوع",
                timeGridDay: "يوم",
            },
            zh: {
                today: "今天",
                dayGridMonth: "月",
                timeGridWeek: "周",
                timeGridDay: "日",
            },
        };

        const locale = document.documentElement.lang || "fr";
        const t = translations[locale] || translations.fr;

        console.log(locale);
        console.log(t);
        console.log(t.today);

        calendar = new FullCalendar.Calendar(calendarEl, {
            // initialView: 'dayGridMonth',
            dayMaxEventRows: true,
            dayMaxEventRows: 2,
            contentHeight: "auto",
            eventLimit: 1,
            // views: {
            //     dayGridMonth: {
            //         dayMaxEventRows: 2,
            //     },
            //     timeGrid: {
            //         dayMaxEventRows: 1,
            //     }
            // },
            headerToolbar: {
                left: 'prev,next',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'

            },
            locale: locale,

            // events: function (info, successCallback, failureCallback) {
            //     $.ajax({
            //         url: '/api/events/listing',
            //         method: 'GET',
            //         success: function (data) {
            //             if (data && Array.isArray(data)) {
            //                 eventsData = data;
            //                 calendrierCount = data.length;
            //                 presentielCount = data.filter(event => event.event_type === "presentiel").length;
            //                 telephoniqueCount = data.filter(event => event.event_type === "telephonique").length;
            //                 visioconferenceCount = data.filter(event => event.event_type === "visioconference").length;

            //                 // Update the DOM with the new counts
            //                 document.getElementById('totalNumber').textContent = calendrierCount;
            //                 document.getElementById('presNumber').textContent = presentielCount;
            //                 document.getElementById('teleNumber').textContent = telephoniqueCount;
            //                 document.getElementById('visioNumber').textContent = visioconferenceCount;

            //                 successCallback(data);
            //             } else {
            //                 failureCallback("Invalid data format");
            //             }
            //         },
            //         error: function (xhr, status, error) {
            //             failureCallback(error);
            //         }
            //     });
            // },

            events: function (info, successCallback, failureCallback) {
                $.ajax({
                    url: '/api/events/listing',
                    method: 'GET',
                    success: function (data) {
                        if (data && Array.isArray(data)) {
                            // Récupération des filtres
                            const selectedType = $('.type-nav-item.active').data('event-type');
                            const selectedFavorites = $('#favoritesFilter').hasClass('active');
                            const selectedDrafts = $('#draftsFilter').hasClass('active');
                            // console.log("ppppppppppppppppppp");
                            // console.log(selectedType);
                            // Appliquer les filtres directement ici
                            let filteredEvents = data.filter(event => {
                                if (selectedType && event.event_type !== selectedType) return false;
                                if (selectedFavorites && !event.is_favorite) return false;
                                if (selectedDrafts && !event.is_draft) return false;
                                return true;
                            });

                            successCallback(filteredEvents);
                        } else {
                            failureCallback("Invalid data format");
                        }
                    },
                    error: function (xhr, status, error) {
                        failureCallback(error);
                    }
                });
            },

            // eventDidMount: function (info) {
            //     var eventType = info.event.extendedProps.event_type;
            //     var selectedType = $('.type-nav-item.active').data('event-type');
            //     var selectedFavorites = $('#favoritesFilter').hasClass('active');
            //     var selectedDrafts = $('#draftsFilter').hasClass('active');

            //     if (selectedType && eventType !== selectedType) {
            //         info.el.style.display = 'none';
            //     } else {
            //         info.el.style.display = '';
            //     }

            //     if (selectedFavorites && !info.event.extendedProps.is_favorite) {
            //         info.el.style.display = 'none';
            //     }

            //     if (selectedDrafts && !info.event.extendedProps.is_draft) {
            //         info.el.style.display = 'none';
            //     }
            // },

            eventContent: function (arg) {
                const image = arg.event.extendedProps.imageUrl;
                const imageCame = arg.event.extendedProps.imageUrlCame;
                const title = arg.event.extendedProps.destinataire?.name ? arg.event.extendedProps.destinataire.name : "Sans destinataire";
                const start = arg.event.start;
                const isImportant = arg.event.extendedProps.high_importance;
                const eventType = arg.event.extendedProps.event_type;
                const eventId = arg.event.extendedProps.ID;
                const isFavorite = arg.event.extendedProps.is_favorite;
                const eventHtml = document.createElement('div');

                // calendrierCount++;
                // if (arg.event.extendedProps.event_type === 'presentiel') {
                //     presentielCount++;
                // } else if (arg.event.extendedProps.event_type === 'telephonique') {
                //     telephoniqueCount++;
                // } else if (arg.event.extendedProps.event_type === 'visioconference') {
                //     visioconferenceCount++;
                // }

                const statusIcons = document.createElement('span');
                statusIcons.style.marginRight = "5px";

                const starIcon = document.createElement('span');
                if (isFavorite) {
                    starIcon.innerHTML = "⭐"; // Étoile dorée
                    starIcon.style.color = "gold";
                    starIcon.style.position = "absolute";
                    starIcon.style.bottom = "10px";
                    starIcon.style.right = "10px";
                    statusIcons.appendChild(starIcon);
                }
                const importantIcon = document.createElement('span');

                if (isImportant) {
                    importantIcon.innerHTML = "❗"; // Point d'exclamation rouge
                    importantIcon.style.color = "red";
                    importantIcon.style.position = "absolute";
                    importantIcon.style.bottom = "10px";
                    importantIcon.style.right = "10px";
                    statusIcons.appendChild(importantIcon);
                }

                if (isFavorite && isImportant) {
                    importantIcon.style.right = "5px";
                    starIcon.style.right = "20px";
                }

                eventHtml.appendChild(statusIcons);
                // Image part
                if (image) {
                    const img = document.createElement('img');
                    img.src = image;
                    img.style.width = '37px';
                    img.style.marginRight = '5px';
                    img.style.verticalAlign = 'middle';
                    eventHtml.appendChild(img);
                }

                eventHtml.append(title);

                // Image for "came"
                const eventHtml2 = document.createElement('div');
                eventHtml2.className = "div-came";
                eventHtml2.innerHTML = imageCame;

                // Time part (formatted)
                const eventHtml3 = document.createElement('div');
                eventHtml3.className = "div-time";
                eventHtml3.style.padding = "5px 0 0 20px";

                const formattedTime = new Date(start).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
                eventHtml3.append(formattedTime);

                // Dropdown button and menu
                const dropdownContainer = document.createElement('div');
                dropdownContainer.style.position = 'absolute';
                dropdownContainer.style.right = '0';
                dropdownContainer.style.top = '8px';

                const dropdownButton = document.createElement('button');
                dropdownButton.innerHTML = "⋮";
                dropdownButton.style.border = "none";
                dropdownButton.style.background = "transparent";
                dropdownButton.style.cursor = "pointer";
                dropdownButton.style.fontSize = "18px";
                dropdownButton.style.marginLeft = "10px";

                // Dropdown menu options
                const dropdownMenu = document.createElement('div');
                dropdownMenu.style.display = "none";
                dropdownMenu.style.position = "absolute";
                dropdownMenu.style.right = "5px";
                dropdownMenu.style.background = "var(--adminux-theme-bg-2)";
                dropdownMenu.style.border = "0px solid #ddd";
                dropdownMenu.style.borderRadius = "5px";
                dropdownMenu.style.boxShadow = "0px 2px 5px rgba(0,0,0,0.2)";
                // dropdownMenu.style.zIndex = "1000";
                dropdownMenu.style.zIndex = "9999";
                dropdownMenu.style.padding = "5px";
                dropdownMenu.style.width = "200px";

                // Menu options actions
                const actions = [
                    { label: "Modifier", action: () => editEvent(eventId) },
                    { label: "Supprimer", action: () => deleteEvent(eventId) },
                    { label: "Détails", action: () => viewEvent(eventId) }
                ];

                actions.forEach(action => {
                    const item = document.createElement('div');
                    item.textContent = action.label;
                    item.style.padding = "8px";
                    item.style.cursor = "pointer";
                    item.style.borderBottom = "1px solid #eee";
                    item.style.textAlign = "left";

                    item.addEventListener("click", () => {
                        action.action();
                        dropdownMenu.style.display = "none";
                    });

                    dropdownMenu.appendChild(item);
                });

                // Bouton Ajouter/Retirer des favoris
                const favoriteItem = document.createElement('div');
                favoriteItem.textContent = isFavorite ? "Retirer des favoris" : "Ajouter aux favoris";
                favoriteItem.style.padding = "8px";
                favoriteItem.style.cursor = "pointer";
                favoriteItem.style.textAlign = "left";
                favoriteItem.style.color = isFavorite ? "red" : "green";

                dropdownButton.addEventListener("click", (e) => {
                    e.stopPropagation();

                    // Placer le menu dans le body pour qu'il ne soit pas sous les autres événements
                    document.body.appendChild(dropdownMenu);
                    dropdownMenu.style.position = "absolute";
                    dropdownMenu.style.zIndex = "9999"; // S'assurer qu'il est bien au-dessus des événements
                    dropdownMenu.style.display = "block";

                    // Récupérer la position du bouton dans la page
                    const rect = dropdownButton.getBoundingClientRect();
                    const menuHeight = dropdownMenu.offsetHeight;

                    // Vérifier si le menu dépasse en bas de la fenêtre
                    let topPosition = rect.top + window.scrollY + dropdownButton.offsetHeight;
                    if (topPosition + menuHeight > window.innerHeight) {
                        topPosition = rect.top + window.scrollY - menuHeight; // Déplacer vers le haut si nécessaire
                    }

                    dropdownMenu.style.top = `${topPosition}px`;
                    dropdownMenu.style.left = `${rect.left + window.scrollX}px`;
                });

                // Fermer le menu lorsqu'on clique ailleurs
                document.addEventListener("click", (event) => {
                    if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                        dropdownMenu.style.display = "none";
                    }
                });

                favoriteItem.addEventListener("click", () => {
                    toggleFavorite(eventId, isFavorite);
                    dropdownMenu.style.display = "none";
                });

                dropdownMenu.appendChild(favoriteItem);

                // Toggle the dropdown menu visibility
                // dropdownButton.addEventListener("click", (e) => {
                //     e.stopPropagation();
                //     dropdownMenu.style.display = dropdownMenu.style.display === "block" ? "none" : "block";
                // });

                // Close the dropdown menu when clicking elsewhere
                document.addEventListener("click", () => {
                    dropdownMenu.style.display = "none";
                });

                dropdownContainer.appendChild(dropdownButton);
                dropdownContainer.appendChild(dropdownMenu);

                eventHtml.appendChild(dropdownContainer);

                return { domNodes: [eventHtml, eventHtml2, eventHtml3, dropdownContainer] };
            },

            windowResize: function (view) {
                if (window.innerWidth < 1500) {
                    calendar.changeView('listWeek');  // Affiche sous forme de liste pour les petits écrans
                } else {
                    calendar.changeView('dayGridMonth');  // Affiche en grille pour les écrans plus larges
                }
            }
        });
        calendar.render();

    }
    getEvents();

    function displayResults(filteredEvents) {
        resultsList.innerHTML = '';

        if (filteredEvents.length === 0) {
            resultsList.classList.add('d-none');
            return;
        }

        filteredEvents.forEach(event => {
            const li = document.createElement('li');
            li.classList.add('list-group-item', 'list-group-item-action', 'd-flex', 'justify-content-between', 'align-items-center');
            li.style.cursor = 'pointer';
            li.style.border = '1px solid #dee2e6';
            li.style.borderRadius = '5px';
            li.style.marginBottom = '5px';

            li.innerHTML = `
                <div>
                    <strong class="text-primary translated_text">${event.destinataire ? event.destinataire.name : "Sans destinataire"}</strong>
                    <br>
                    <small class="text-muted"><i class="bi bi-calendar-event me-1"></i>${new Date(event.start).toLocaleDateString('fr-FR', { weekday: 'short', year: 'numeric', month: 'short', day: 'numeric' })}</small>
                </div>
                <div>
                    <i class="bi bi-chevron-right text-secondary"></i>
                </div>
            `;

            li.addEventListener('click', () => {
                viewEvent(event.ID);
            });

            resultsList.appendChild(li);
        });
        resultsList.classList.remove('d-none');
    }

    // Fonction pour filtrer les événements par nom de destinataire
    function searchEvents(query) {
        const filteredEvents = eventsData.filter(event => {
            const name = event.destinataire?.name || '';
            return name.toLowerCase().includes(query.toLowerCase());
        });
        displayResults(filteredEvents);
    }



    // Détecter la saisie dans le champ de recherche
    searchInput.addEventListener('input', function () {
        const query = this.value.trim();
        if (query.length > 0) {
            searchEvents(query);
        } else {
            resultsList.classList.add('d-none');
        }
    });

    // Fermer la liste si on clique en dehors
    document.addEventListener('click', function (event) {
        if (!searchInput.contains(event.target) && !resultsList.contains(event.target)) {
            resultsList.classList.add('d-none');
        }
    });


    $('.type-nav-item').on('click', function () {
        var selectedType = $(this).data('event-type');
        $('.type-nav-item').removeClass('active');
        $(this).addClass('active');
        calendar.refetchEvents();
    });

    $('#showAll').on('click', function () {
        $('li').removeClass('active');
        $(this).toggleClass('active');
        calendar.refetchEvents();
    });

    $('#favoritesFilter').on('click', function () {
        $('li').removeClass('active');
        $(this).toggleClass('active');
        calendar.refetchEvents();
    });

    $('#draftsFilter').on('click', function () {
        $('li').removeClass('active');
        $(this).toggleClass('active');
        calendar.refetchEvents();
    });

    $('#eventSearch').on('input', function () {
        calendar.refetchEvents();
    });

    window.toggleFavorite = function (id, isFavorite) {
        if (!id) {
            Swal.fire({
                icon: 'warning',
                title: 'Avertissement',
                text: 'Aucun événement sélectionné.',
            });
            return;
        }

        // Déterminer l'action en fonction de isFavorite
        const actionText = isFavorite ? "retirer des favoris" : "ajouter aux favoris";
        const successText = isFavorite ? "L'événement a été retiré des favoris." : "L'événement a été ajouté aux favoris.";

        Swal.fire({
            title: `Voulez-vous ${actionText} ?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui',
            cancelButtonText: 'Annuler',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/api/events/${id}/toggle-favorite`,
                    type: 'GET',
                    success: function (response) {
                        getEvents();
                        Swal.fire({
                            icon: 'success',
                            title: 'Succès!',
                            text: successText,
                        });
                    },
                    error: function (xhr) {
                        const errorResponse = xhr.responseJSON;
                        Swal.fire({
                            icon: 'error',
                            title: 'Erreur',
                            text: errorResponse.error || 'Une erreur inattendue est survenue.',
                        });
                    },
                });
            }
        });
    };


    window.deleteEvent = function (id) {
        if (!id) {
            Swal.fire({
                icon: 'warning',
                title: 'Avertissement',
                text: 'Aucun élément sélectionné pour suppression.',
            });
            return;
        }

        Swal.fire({
            title: 'Êtes-vous sûr?',
            text: "Cette action supprimera définitivement l'élément.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, supprimer!',
            cancelButtonText: 'Annuler',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/api/events/${id}/delete `,
                    type: 'GET',
                    success: function (response) {
                        getEvents();
                        Swal.fire({
                            icon: 'success',
                            title: 'Supprimé!',
                            text: 'L\'élément a été supprimé avec succès.',
                        });
                    },
                    error: function (xhr) {
                        const errorResponse = xhr.responseJSON;
                        Swal.fire({
                            icon: 'error',
                            title: 'Erreur',
                            text: errorResponse.error || 'Une erreur inattendue est survenue.',
                        });
                    },
                });
            }
        });
    };

window.saveEvent = function (type) {
    // Gather participants meta data
    const participantsMeta = {};
    const participants = document.querySelectorAll('#participants option:checked');
    participants.forEach(option => {
        participantsMeta[option.value] = option.getAttribute('data-type');
    });

    // Gather destinataires meta data
    const destinatairesMeta = {};
    const destinataires = document.querySelectorAll('#destinataires option:checked');
    destinataires.forEach(option => {
        destinatairesMeta[option.value] = option.getAttribute('data-type');
    });

    // Set the meta data to the hidden input fields
    document.getElementById('participants_meta').value = JSON.stringify(participantsMeta);
    document.getElementById('destinataires_meta').value = JSON.stringify(destinatairesMeta);

    // 🔍 Sync CKEditor data to textarea
    document.querySelector('textarea[name="description"]').value = descriptionEditor.getData();

    const formElement = document.querySelector(`#store-event-form`);
    const formData = new FormData(formElement);
    formData.append('type', type);

    $.ajax({
        url: storeEventRoute, // Backend endpoint
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            getEvents();
            $('#createEventModal').modal('hide');
            Swal.fire({
                icon: 'success',
                title: 'Succès',
                text: 'Le formulaire a été sauvegardé avec succès.',
            });

        },
        error: function (xhr) {
            if (xhr.status === 422) {
                const errors = xhr.responseJSON.errors;
                let errorMessages = '';
                for (let field in errors) {
                    if (errors.hasOwnProperty(field)) {
                        errorMessages += `- ${errors[field].join(', ')}<br>`;
                    }
                }
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur de validation',
                    html: errorMessages,
                });

            } else {
                const errorResponse = xhr.responseJSON;
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: errorResponse.error || 'Une erreur inattendue est survenue.',
                });
            }
        },
    });
};


    window.updateEvent = function (type) {
        const participantsMeta = {};
        const participants = document.querySelectorAll('#edit_participants option:checked');
        participants.forEach(option => {
            participantsMeta[option.value] = option.getAttribute('data-type');
        });

        // Gather destinataires meta data
        const destinatairesMeta = {};
        const destinataires = document.querySelectorAll('#edit_destinataires option:checked');
        destinataires.forEach(option => {
            destinatairesMeta[option.value] = option.getAttribute('data-type');
        });

        // Set the meta data to the hidden input fields
        document.getElementById('edit_participants_meta').value = JSON.stringify(participantsMeta);
        document.getElementById('edit_destinataires_meta').value = JSON.stringify(destinatairesMeta);

        const formElement = document.querySelector(`#update-event-form`);
        const formData = new FormData(formElement);
        formData.append('type', type);
        $.ajax({
            url: updateEventRoute, // Backend endpoint
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                getEvents();
                $('#editEventModal').modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: 'Succès',
                    text: 'Le formulaire a été sauvegardé avec succès.',
                });
            },
            error: function (xhr) {
                // Handle validation errors
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    let errorMessages = '';
                    for (let field in errors) {
                        if (errors.hasOwnProperty(field)) {
                            errorMessages += `- ${errors[field].join(', ')}<br>`;
                        }
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Erreur de validation',
                        html: errorMessages,
                    });

                } else {
                    // Handle unexpected errors
                    const errorResponse = xhr.responseJSON;
                    Swal.fire({
                        icon: 'error',
                        title: 'Erreur',
                        text: errorResponse.error || 'Une erreur inattendue est survenue.',
                    });
                }
            },
        });
    };

function editEvent(eventId) {
    // Initialiser l'objet global s'il n'existe pas
    if (typeof window.descriptionEditors === 'undefined') {
        window.descriptionEditors = {};
    }

    // Détruire l'éditeur existant s'il existe
    if (window.descriptionEditors['edit_description']) {
        window.descriptionEditors['edit_description'].destroy()
            .then(() => {
                delete window.descriptionEditors['edit_description'];
                createEditorAndLoadData(eventId);
            })
            .catch(error => {
                console.error('Erreur lors de la destruction de l\'éditeur:', error);
                createEditorAndLoadData(eventId);
            });
    } else {
        createEditorAndLoadData(eventId);
    }

    function createEditorAndLoadData(eventId) {
        // Wait for DOM ready
        $(document).ready(function () {
            ClassicEditor
                .create(document.querySelector('#edit_description'))
                .then(editor => {
                    window.descriptionEditors['edit_description'] = editor;
                    
                    // Maintenant que l'éditeur est créé, charger les données
                    loadEventData(eventId, editor);
                })
                .catch(error => {
                    console.error('CKEditor init error:', error);
                });
        });
    }

    function loadEventData(eventId, editor) {
        // Fetch event data via AJAX
        $.ajax({
            url: `/api/events/${eventId}/edit`,
            type: 'GET',
            success: function (response) {
                $('#edit_event_id').val(response.id);
                $('#edit_title').val(response.title);
                $('#edit_date').val(response.date);
                $('#edit_start_time').val(response.start_time);
                $('#edit_end_time').val(response.end_time);
                $('#edit_location').val(response.location);
                $('#edit_description').val(response.description);
                
                // Maintenant l'éditeur est garanti d'exister
                editor.setData(response.description);
                
                $('#edit_url').val(response.event_url);
                $('#edit_high_importance').prop('checked', response.high_importance == 1);
                $('#edit_reminder').val(response.reminder);
                $("#edit_client_id").val(response.client_id).trigger("chosen:updated");
                $("#edit_job_offer_id").val(response.job_offer_id).trigger("chosen:updated");

                // Set event type
                $(`#edit_event_${response.event_type}`).prop('checked', true).trigger('change');

                // Populate recipients and participants (using meta data from the response)
                let destinatairesIds = response.destinataires.map(dest => dest.id);
                let participantsIds = response.participants.map(part => part.id);

                let destinatairesMeta = response.destinataires.reduce((acc, dest) => {
                    acc[dest.id] = dest.type;
                    return acc;
                }, {});

                let participantsMeta = response.participants.reduce((acc, part) => {
                    acc[part.id] = part.type;
                    return acc;
                }, {});

                // Update hidden inputs for meta data
                $('#destinataires_meta').val(JSON.stringify(destinatairesMeta));
                $('#participants_meta').val(JSON.stringify(participantsMeta));

                setTimeout(() => {
                    $("#edit_destinataires").val(destinatairesIds).trigger("chosen:updated");
                    $("#edit_participants").val(participantsIds).trigger("chosen:updated");
                }, 100);

                // Display uploaded attachments
                displayAttachments(response.attachments);

                // Show modal
                $('#editEventModal').modal('show');
                setFocus();
            },
            error: function (error) {
                console.log("Erreur lors de la récupération de l'événement :", error);
            }
        });
    }
}

// Version alternative avec async/await (plus moderne et plus lisible)
async function editEventAsync(eventId) {
    try {
        // Initialiser l'objet global s'il n'existe pas
        if (typeof window.descriptionEditors === 'undefined') {
            window.descriptionEditors = {};
        }

        // Détruire l'éditeur existant s'il existe
        if (window.descriptionEditors['edit_description']) {
            await window.descriptionEditors['edit_description'].destroy();
            delete window.descriptionEditors['edit_description'];
        }

        // Attendre que le DOM soit prêt
        await new Promise(resolve => $(document).ready(resolve));

        // Créer le nouvel éditeur
        const editor = await ClassicEditor.create(document.querySelector('#edit_description'));
        window.descriptionEditors['edit_description'] = editor;

        // Charger les données de l'événement
        const response = await $.ajax({
            url: `/api/events/${eventId}/edit`,
            type: 'GET'
        });

        // Remplir tous les champs
        $('#edit_event_id').val(response.id);
        $('#edit_title').val(response.title);
        $('#edit_date').val(response.date);
        $('#edit_start_time').val(response.start_time);
        $('#edit_end_time').val(response.end_time);
        $('#edit_location').val(response.location);
        $('#edit_description').val(response.description);
        
        // Maintenant l'éditeur est garanti d'exister
        editor.setData(response.description);
        
        $('#edit_url').val(response.event_url);
        $('#edit_high_importance').prop('checked', response.high_importance == 1);
        $('#edit_reminder').val(response.reminder);
        $("#edit_client_id").val(response.client_id).trigger("chosen:updated");
        $("#edit_job_offer_id").val(response.job_offer_id).trigger("chosen:updated");

        // Set event type
        // $(`#edit_event_${response.event_type}`).prop('checked', true).trigger('change');
        // $(`#edit_event_${response.event_type}`)
        //     .prop('checked', true)
        //     .trigger('change')
        //     .next('label')
        //     .addClass('active'); 

        // Populate recipients and participants
        let destinatairesIds = response.destinataires.map(dest => dest.id);
        let participantsIds = response.participants.map(part => part.id);

        let destinatairesMeta = response.destinataires.reduce((acc, dest) => {
            acc[dest.id] = dest.type;
            return acc;
        }, {});

        let participantsMeta = response.participants.reduce((acc, part) => {
            acc[part.id] = part.type;
            return acc;
        }, {});

        // Update hidden inputs for meta data
        $('#destinataires_meta').val(JSON.stringify(destinatairesMeta));
        $('#participants_meta').val(JSON.stringify(participantsMeta));

        setTimeout(() => {
            $("#edit_destinataires").val(destinatairesIds).trigger("chosen:updated");
            $("#edit_participants").val(participantsIds).trigger("chosen:updated");
        }, 100);

        // Display uploaded attachments
        displayAttachments(response.attachments);

        // Show modal
        $('#editEventModal').modal('show');
        setFocus();

    } catch (error) {
        console.error("Erreur lors de l'édition de l'événement :", error);
    }
}
    // Function to display attachments with download and delete options
    function displayAttachments(attachments) {
        const previewContainers = document.querySelectorAll('.attachments-container');
        previewContainers.forEach((previewContainer) => {
            previewContainer.innerHTML = ''; // Clear previous previews
            var fileNumber = 0;
            if (attachments && attachments.length > 0) {
                attachments.forEach((attachment) => {
                    fileNumber++;
                    const previewElement = document.createElement('div');
                    previewElement.classList.add('attachment-item');
                    previewElement.classList.add('mb-2'); // Add spacing between items

                    // Check if the attachment has a type property and handle accordingly
                    const fileType = attachment.type || 'pdf';  // Default to an empty string if type is undefined

                    // Create an element to display the attachment preview
                    const previewContent = document.createElement('div');
                    previewContent.classList.add('attachment-preview');

                    // If it's an image, display an image, otherwise show the file name
                    if (fileType.startsWith('image')) {
                        const img = document.createElement('img');
                        img.src = attachment.file_path || '';
                        img.classList.add('preview-image');
                        previewContent.appendChild(img);
                    } else {
                        const fileName = document.createElement('span');
                        fileName.textContent = "file_" + fileNumber;
                        previewContent.appendChild(fileName);
                    }

                    previewElement.appendChild(previewContent);

                    // Create a download button
                    const downloadButton = document.createElement('button');
                    downloadButton.textContent = 'Télécharger';
                    downloadButton.classList.add('btn', 'btn-theme', 'download-btn');
                    downloadButton.onclick = function () {
                        downloadAttachment(attachment.file_path); // Replace with actual attachment URL
                    };

                    previewElement.appendChild(downloadButton);

                    previewContainer.appendChild(previewElement);
                });
            } else {
                // previewContainer.innerHTML = '<p class="translated_text">No attachments available.</p>';
            }
        });
    }

    function downloadAttachment(url, filename = 'downloaded_file') {
        event.preventDefault();
        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok.');
                }
                return response.blob();
            })
            .then(blob => {
                const blobUrl = window.URL.createObjectURL(blob);

                const link = document.createElement('a');
                link.href = blobUrl;
                link.download = filename;
                document.body.appendChild(link);
                link.click();

                document.body.removeChild(link);
                window.URL.revokeObjectURL(blobUrl);
            })
            .catch(error => {
                console.error('Download failed:', error);
                alert('Échec du téléchargement du fichier.');
            });
    }

    function viewEvent(eventId) {
    // Initialiser l'objet global s'il n'existe pas
    if (typeof window.descriptionEditors === 'undefined') {
        window.descriptionEditors = {};
    }

    // Détruire l'éditeur existant s'il existe
    if (window.descriptionEditors['show_description']) {
        window.descriptionEditors['show_description'].destroy()
            .then(() => {
                delete window.descriptionEditors['show_description'];
                createEditorAndLoadData(eventId);
            })
            .catch(error => {
                console.error('Erreur lors de la destruction de l\'éditeur:', error);
                createEditorAndLoadData(eventId);
            });
    } else {
        createEditorAndLoadData(eventId);
    }

    function createEditorAndLoadData(eventId) {
        // Wait for DOM ready
        $(document).ready(function () {
            ClassicEditor
                .create(document.querySelector('#show_description'))
                .then(editor => {
                    window.descriptionEditors['show_description'] = editor;
                    
                    // Maintenant que l'éditeur est créé, charger les données
                    loadEventData(eventId, editor);
                })
                .catch(error => {
                    console.error('CKEditor init error:', error);
                });
        });
    }

    function loadEventData(eventId, editor) {
        $.ajax({
            url: `/api/events/${eventId}/edit`,
            type: 'GET',
            success: function (response) {
                $('#show_event_id').val(response.id);
                $('#show_title').val(response.title);
                $('#show_date').val(response.date);
                $('#show_start_time').val(response.start_time);
                $('#show_end_time').val(response.end_time);
                $('#show_location').val(response.location);
                $('#show_description').val(response.description); // Corrigé: était #how_description
                // Set event type
                // Maintenant l'éditeur est garanti d'exister
                editor.setData(response.description);
                
                $('#show_url').val(response.event_url);
                $('#show_high_importance').prop('checked', response.high_importance == 1);
                // $(`#show_event_${response.event_type}`).prop('checked', true).trigger('change');

                $(`#show_event_${response.event_type}`)
                    .prop('checked', true)
                    .trigger('change')
                    .next('label')
                    .addClass('active');

                $('#show_reminder').val(response.reminder);
                let destinatairesIds = response.destinataires.map(dest => dest.id);
                let participantsIds = response.participants.map(part => part.id);

                setTimeout(() => {
                    $("#show_destinataires").val(destinatairesIds).trigger("chosen:updated");
                    $("#show_participants").val(participantsIds).trigger("chosen:updated");
                }, 100);

                displayAttachments(response.attachments);

                $('#detailEventModal').modal('show');
                setFocus();
            },
            error: function (error) {
                console.log("Erreur lors de la récupération de l'événement :", error);
            }
        });
    }
}

    // Version alternative avec async/await (plus moderne et plus lisible)
    async function viewEventAsync(eventId) {
        try {
            // Initialiser l'objet global s'il n'existe pas
            if (typeof window.descriptionEditors === 'undefined') {
                window.descriptionEditors = {};
            }

            // Détruire l'éditeur existant s'il existe
            if (window.descriptionEditors['show_description']) {
                await window.descriptionEditors['show_description'].destroy();
                delete window.descriptionEditors['show_description'];
            }

            // Attendre que le DOM soit prêt
            await new Promise(resolve => $(document).ready(resolve));

            // Créer le nouvel éditeur
            const editor = await ClassicEditor.create(document.querySelector('#show_description'));
            window.descriptionEditors['show_description'] = editor;

            // Charger les données de l'événement
            const response = await $.ajax({
                url: `/api/events/${eventId}/edit`,
                type: 'GET'
            });

            // Remplir tous les champs
            $('#show_event_id').val(response.id);
            $('#show_title').val(response.title);
            $('#show_date').val(response.date);
            $('#show_start_time').val(response.start_time);
            $('#show_end_time').val(response.end_time);
            $('#show_location').val(response.location);
            $('#show_description').val(response.description);
            
            // Maintenant l'éditeur est garanti d'exister
            editor.setData(response.description);
            
            $('#show_url').val(response.event_url);
            $('#show_high_importance').prop('checked', response.high_importance == 1);
            $('#show_reminder').val(response.reminder);

            $(`#edit_event_${response.event_type}`).prop('checked', true);

            let destinatairesIds = response.destinataires.map(dest => dest.id);
            let participantsIds = response.participants.map(part => part.id);

            setTimeout(() => {
                $("#show_destinataires").val(destinatairesIds).trigger("chosen:updated");
                $("#show_participants").val(participantsIds).trigger("chosen:updated");
            }, 100);

            displayAttachments(response.attachments);

            $('#detailEventModal').modal('show');
            setFocus();

        } catch (error) {
            console.error("Erreur lors de l'affichage de l'événement :", error);
        }
    }

    // BONUS: Fonction utilitaire pour gérer les deux éditeurs si nécessaire
    function destroyAllEditors() {
        if (typeof window.descriptionEditors !== 'undefined') {
            Object.keys(window.descriptionEditors).forEach(async (key) => {
                try {
                    await window.descriptionEditors[key].destroy();
                    delete window.descriptionEditors[key];
                } catch (error) {
                    console.error(`Erreur lors de la destruction de l'éditeur ${key}:`, error);
                }
            });
        }
    }

    // Optionnel: Nettoyer les éditeurs quand les modals se ferment
    $('#editEventModal').on('hidden.bs.modal', function () {
        if (window.descriptionEditors && window.descriptionEditors['edit_description']) {
            window.descriptionEditors['edit_description'].destroy()
                .then(() => {
                    delete window.descriptionEditors['edit_description'];
                })
                .catch(error => {
                    console.error('Erreur lors de la destruction:', error);
                });
        }
    });

    $('#detailEventModal').on('hidden.bs.modal', function () {
        if (window.descriptionEditors && window.descriptionEditors['show_description']) {
            window.descriptionEditors['show_description'].destroy()
                .then(() => {
                    delete window.descriptionEditors['show_description'];
                })
                .catch(error => {
                    console.error('Erreur lors de la destruction:', error);
                });
        }
    });
    // Function to safely set CKEditor content
    function setCKEditorContent(editorId, content) {
        const editor = descriptionEditor[editorId];
        if (editor) {
            editor.setData(content || '');
        } else {
            // If editor not ready yet, wait and try again
            setTimeout(() => setCKEditorContent(editorId, content), 100);
        }
    }

    document.querySelectorAll('.sidebar-filters .filter').forEach(function (filterElement) {
        filterElement.addEventListener('click', function () {
            document.querySelectorAll('.sidebar-filters .filter').forEach(function (f) {
                f.classList.remove('active');
            });
            filterElement.classList.add('active');

            // Trigger a re-fetch of events with the new filter
            calendar.refetchEvents();
        });
    });

    const startTimeInput = document.querySelector("input[name='start_time']");
    const endTimeInput = document.querySelector("input[name='end_time']");
    const durationLabel = document.getElementById("eventTime");

    function calculateDuration() {
        const startTime = startTimeInput.value;
        const endTime = endTimeInput.value;

        if (startTime && endTime) {
            const start = new Date(`1970-01-01T${startTime}:00`);
            const end = new Date(`1970-01-01T${endTime}:00`);

            let diff = (end - start) / 60000; // Convertir la différence en minutes

            if (diff > 0) {
                durationLabel.textContent = `${diff} Minutes`;
            } else {
                durationLabel.textContent = "0 Minute"; // Éviter les valeurs négatives
            }
        }
    }

    startTimeInput.addEventListener("change", calculateDuration);
    endTimeInput.addEventListener("change", calculateDuration);

    const eventTypeRadios = document.querySelectorAll("input[name='event_type']");
    const urlInputContainer = document.querySelector(".visio-part");
    const locationInputContainer = document.querySelector(".location-part");

    function toggleUrlInput() {
        const selectedType = document.querySelector("input[name='event_type']:checked")?.value;
        if (selectedType === "visioconference") {
            urlInputContainer.style.display = "flex";
            locationInputContainer.style.display = "none";

        } else if (selectedType === "presentiel") {
            locationInputContainer.style.display = "flex";
            urlInputContainer.style.display = "none";

        } else {
            urlInputContainer.style.display = "none";
            locationInputContainer.style.display = "none";

        }
    }
    eventTypeRadios.forEach(radio => {
        radio.addEventListener("change", toggleUrlInput);
    });

    toggleUrlInput();


    $('#event-type').change(function () {
        if ($(this).val() === 'online') {
            $('#url-container').removeClass('d-none');
        } else {
            $('#url-container').addClass('d-none');
        }
    });

    $('.meet-action').on('click', function () {
        var value = $(this).html();
        $('#meet-result').html(value);

        if (value == 'URL manuel') {
            $('.to-change-meet .input-box').removeClass('hidden');
            $('.to-change-meet .message-div').addClass('hidden');
        } else {
            $('.to-change-meet .input-box').addClass('hidden');
            $('.to-change-meet .message-div').removeClass('hidden');
        }

        if (value == 'Google Meet') {
            $('.to-change-meet .message-div').html(`
                <div class="alert alert-warning">
                    <div class="row">
                        <div class="col-auto"><i class="bi bi-info-circle"></i></div>
                        <div class="col-10">
                            <p class="translated_text">Connectez votre agenda Google pour générer un lien de réunion Google Meet.&nbsp;&nbsp;
                            <span style="color: blue; cursor: pointer;" class="connect-google translated_text">Se connecter</span></p>
                        </div>
                    </div>
                </div>
            `);
        }

        if (value == 'Microsoft Teams') {
            $('.to-change-meet .message-div').html(`
                <div class="alert alert-warning">
                    <div class="row">
                        <div class="col-auto"><i class="bi bi-info-circle"></i></div>
                        <div class="col-10">
                            <p class="translated_text">Connectez votre agenda Office 365 pour générer un lien de réunion Microsoft Teams.&nbsp;&nbsp;
                            <span style="color: blue; cursor: pointer;" class="connect-teams translated_text">Se connecter</span></p>
                        </div>
                    </div>
                </div>
            `);
        }

        if (value == 'Zoom') {
            $('.to-change-meet .message-div').html(`
                <div class="alert alert-warning">
                    <div class="row">
                        <div class="col-auto"><i class="bi bi-info-circle"></i></div>
                        <div class="col-10">
                            <p class="translated_text">Connectez votre agenda Zoom pour générer un lien de réunion Zoom.&nbsp;&nbsp;
                            <span style="color: blue; cursor: pointer;" class="connect-zoom translated_text">Se connecter</span></p>
                        </div>
                    </div>
                </div>
            `);
        }
    });

    function setMeetingPlatform(platform, meetingUrl) {
        $('#meet-result').html(platform);

        if (platform === 'URL manuel') {
            $('.to-change-meet .input-box').removeClass('hidden');
            $('.to-change-meet .message-div').addClass('hidden');
            $('input[name="event_url"]').val(meetingUrl || '');
        } else {
            $('.to-change-meet .input-box').addClass('hidden');
            $('.to-change-meet .message-div').removeClass('hidden');

            let message = '';
            if (platform === 'Google Meet') {
                message = 'Connectez votre agenda Google pour générer un lien de réunion Google Meet.&nbsp;&nbsp;<span style="color: blue; cursor: pointer;" onclick="createGoogleMeet()">Se connecter</span>';
            } else if (platform === 'Microsoft Teams') {
                message = 'Connectez votre agenda Office 365 pour générer un lien de réunion Microsoft Teams.&nbsp;&nbsp;<br><span style="color: blue; cursor: pointer;" onclick="connectTeams()">Se connecter</span>';
            } else if (platform === 'Zoom') {
                message = 'Connectez votre agenda Zoom pour générer un lien de réunion Zoom.&nbsp;&nbsp;<span style="color: blue; cursor: pointer;" onclick="connectZoom()">Se connecter</span>';
            }

            // Show the message to the user (for example, inside an HTML element with id `messageContainer`)
            // document.getElementById('messageContainer').innerHTML = message;


            $('.to-change-meet .message-div').html(`<div class="alert alert-warning"><div class="row"><div class="col-auto"><i class="bi bi-info-circle"></i></div><div class="col-10"><p>${message}</p></div></div></div>`);

            if (meetingUrl) {
                $('.to-change-meet .message-div').append(`<div class="alert alert-success mt-2">Lien de la réunion : <a href="${meetingUrl}" target="_blank">${meetingUrl}</a></div>`);
            }
        }
    }

    // Convert duration (in minutes) to HH:mm format
    function formatDuration(minutes) {
        let hours = Math.floor(minutes / 60);
        let mins = minutes % 60;
        return `${String(hours).padStart(2, '0')}:${String(mins).padStart(2, '0')}`;
    }

    function formatDateTime(isoString) {
        let date = new Date(isoString);
        return date.toISOString().slice(0, 16); // Removes seconds and milliseconds
    }
    // Function to fill form fields after successful authentication
    window.fillMeetingDetails = function (data) {
        console.log(data);
        document.getElementById('meetingTitle').value = data.meetingTopic;
        document.getElementById('meetingDuration').value = formatDuration(data.meetingDuration);
        // document.getElementById('meetingStartTime').value = formatDateTime(data.meetingStartTime);
        // document.getElementById('meetingEndTime').value = formatDateTime(data.meetingEndTime);
        document.getElementById('meetingLink').value = data.meetLink;
        // document.getElementById('meetingEndTime').value = data.meetingEndTime;
        // document.getElementById('meetingStartTime').value = data.meetingStartTime;

        $('.to-change-meet .input-box').removeClass('hidden');
        $('.to-change-meet .message-div').addClass('hidden');
        $('input[name="event_url"]').val(data.meetLink || '');
        setFocus();
        // $('#createEventModal').modal('show');
    }

    window.createGoogleMeet = function () {
        var meetingTopic = $('#meetingTitle').val();
        var meetingStartTime = $('#meetingStartTime').val();
        var meetingDuration = $('#meetingDuration').val();

        // if (!meetingTopic || !meetingStartTime || !meetingDuration) {
        //     alert('Veuillez remplir tous les champs pour créer la réunion.');
        //     return;
        // }

        // window.location.href = '/redirect-google';

        var authUrl = "/redirect-google";

        var width = 500, height = 600;
        var left = (screen.width - width) / 2;
        var top = (screen.height - height) / 2;

        var authWindow = window.open(
            authUrl,
            "GoogleAuth",
            `width=${width},height=${height},top=${top},left=${left}`
        );

        var interval = setInterval(function () {
            if (authWindow && authWindow.closed) {
                clearInterval(interval);
            }
        }, 1000);

        // setTimeout(function () {
        //     $.ajax({
        //         url: '/create-google-meet',
        //         method: 'POST',
        //         data: {
        //             _token: $('meta[name="csrf-token"]').attr('content'),
        //             topic: meetingTopic,
        //             start_time: meetingStartTime,
        //             duration: meetingDuration
        //         },
        //         success: function (response) {
        //             if (response.meet_link) {
        //                 $('.to-change-meet .input-box').removeClass('hidden');
        //                 $('.to-change-meet .message-div').addClass('hidden');
        //                 $('input[name="event_url"]').val(response.meet_link);
        //             } else {
        //                 alert('Erreur: Aucun lien Google Meet reçu.');
        //             }
        //         },
        //         error: function (xhr, status, error) {
        //             console.error('Erreur AJAX:', error);
        //             console.log('Réponse serveur:', xhr.responseText);
        //             alert('Une erreur est survenue lors de la création de la réunion Google Meet.');
        //         }
        //     });
        // }, 3000); // Attendre 3 secondes pour permettre la connexion Google
    };



    // window.connectGoogle = function () {
    //     window.location.href = '/redirect-google';

    //     var meetingTopic = $('#meetingTitle').val();
    //     var meetingStartTime = $('#meetingStartTime').val();
    //     var meetingDuration = $('#meetingDuration').val();

    //     $.ajax({
    //         url: '/redirect-google', // Your route to handle the request
    //         method: 'GET', // Use GET for requesting the auth URL
    //         data: {
    //             _token: '{{ csrf_token() }}', // CSRF token for security
    //             topic: meetingTopic,
    //             start_time: meetingStartTime,
    //             duration: meetingDuration
    //         },
    //         success: function (response) {
    //             if (response.auth_url) {
    //                 // Redirect the user to Google OAuth
    //                 window.location.href = response.auth_url;
    //             } else {
    //                 alert('Error: Could not retrieve Google OAuth URL.');
    //             }
    //         },
    //         error: function (xhr, status, error) {
    //             console.error('Error:', error);
    //             alert(error);
    //         }
    //     });
    // }



    // // Function to handle Google Meet link retrieval after OAuth authentication
    // function fetchGoogleMeetLink() {
    //     // Make an AJAX request to the callback route where the Meet link is returned
    //     fetch('/auth/google/callback?code=' + getUrlParameter('code')) // Assuming the code is passed in the URL
    //         .then(response => response.json())
    //         .then(data => {
    //             const meetLink = data.meet_link;
    //             if (meetLink) {
    //                 // Display the Meet link on the web page (you can modify this part)
    //                 const meetLinkElement = document.getElementById('meetLink');
    //                 meetLinkElement.innerHTML = `<a href="${meetLink}" target="_blank">Join Google Meet</a>`;
    //             }
    //         })
    //         .catch(error => {
    //             console.error('Error fetching Google Meet link:', error);
    //         });
    // }

    // // You can call the function after the page has loaded or after the user completes the OAuth flow
    // document.addEventListener('DOMContentLoaded', function () {
    //     fetchGoogleMeetLink();
    // });

    // // Helper function to get URL parameter
    // function getUrlParameter(name) {
    //     const urlParams = new URLSearchParams(window.location.search);
    //     return urlParams.get(name);
    // }

    window.connectTeams = function () {
        // window.location.href = '/create-ms-meet';

        var authUrl = "/create-ms-meet";

        var width = 500, height = 600;
        var left = (screen.width - width) / 2;
        var top = (screen.height - height) / 2;

        var authWindow = window.open(
            authUrl,
            "Microsoft auth",
            `width=${width},height=${height},top=${top},left=${left}`
        );

        var interval = setInterval(function () {
            if (authWindow && authWindow.closed) {
                clearInterval(interval);
            }
        }, 1000);

        // fetch('/create-teams-meeting')
        //     .then(response => response.json())
        //     .then(data => {
        //         $('#meet-result').html(`<a href="${data.url}" target="_blank">${data.url}</a>`);
        //         $('input[name="event_url"]').val(data.url);
        //     })
        //     .catch(error => console.error('Erreur Microsoft Teams:', error));
    }

    window.connectZoom = function () {

        // Grab input values
        var meetingTopic = $('#meetingTitle').val();
        var meetingStartTime = $('#meetingStartTime').val();
        var meetingDuration = $('#meetingDuration').val();

        // Send AJAX request
        $.ajax({
            url: '/create-zoom-meet', // Your route to handle the request
            method: 'GET',
            data: {
                _token: '{{ csrf_token() }}', // Add CSRF token for security
                topic: meetingTopic,
                start_time: meetingStartTime,
                duration: meetingDuration
            },
            success: function (response) {
                $('.to-change-meet .input-box').removeClass('hidden');
                $('.to-change-meet .message-div').addClass('hidden');
                $('input[name="event_url"]').val(response.meeting_link);
            },
            error: function (xhr, status, error) {
                alert('Something went wrong!');
            }

        });
    }

    // Lors du clic sur une option de la dropdown
    $('.meet-action').on('click', function () {
        const platform = $(this).html();
        setMeetingPlatform(platform, '');
    });

});