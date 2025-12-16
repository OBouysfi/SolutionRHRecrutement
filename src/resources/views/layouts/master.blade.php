<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-mode" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable">
    {{-- <link rel="manifest" href="manifest.json" /> --}}

    <!-- Favicons -->
    {{-- <link rel="apple-touch-icon" href="{{ asset('assets/img/icon/HJ_icon_green_black.png') }}" sizes="180x180"> --}}
    <link rel="icon" href="{{ asset('assets/img/icon/icon_favicon.png') }}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{ asset('assets/img/icon/icon_favicon.png') }}" sizes="16x16" type="image/png">

    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- chosen css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/chosen_v1.8.7/chosen.min.css') }}">

    <!-- date range picker -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/daterangepicker/daterangepicker.css') }}">

    <!-- swiper carousel css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/swiper-7.3.1/swiper-bundle.min.css') }}">

    <!-- simple lightbox css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/simplelightbox/simple-lightbox.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendor/dropzone5-9-3/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/tagsinput/bootstrap-tagsinput.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

    <!-- app tour css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/Product-Tour-Plugin-jQuery/lib.css') }}">

    <!-- Footable table master css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fooTable/css/footable.bootstrap.min.css') }}">

    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom-style.css') }}" rel="stylesheet">

    {{-- <link href="{{ asset('assets/scss/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom-style.css') }}" rel="stylesheet"> --}}

    <!-- Include Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <style>
        @media (min-width: 1400px) {
        .container-xxl, .container-xl, 
        .container-lg, .container-md, 
        .container-sm, .container {
            max-width: 1625px;  }
        }
        .zoom-out {
            transform: scale(0.8);
            transform-origin: top left;
            width: 125%;
            height: 125%;
        }
        .select2-container--default .select2-selection--multiple {
            background-color: var(--adminux-theme-bg) !important;
            border: 0;
        }

        .modal-backdrop {
            display: none !important;
        }

        table.dataTable thead th,
        table.dataTable thead td {
            border-color: var(--adminux-theme-bg) !important;
        }

        table.dataTable.no-footer {
            border: none !important;
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            filter: brightness(0) saturate(100%) invert(22%) sepia(94%) saturate(2234%) hue-rotate(199deg) brightness(91%) contrast(101%);
        }

        input[type="date"] {
            padding-right: 1.5rem;
            font-size: 1rem;
            height: 2.5rem;
        }
        .daterangepicker select{
            background-image: none !important;
        }
        .main{
            overflow-x: scroll !important;
            height: calc(100% - 68px) !important;
        }
    </style>
    @yield('css_header')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="d-flex flex-column h-100 sidebar-pushcontent sidebar-filled menu-close"
    data-sidebarstyle="sidebar-pushcontent">
    @include('partials.rightbar')
    <div class="zoom-out position-fixed">
    <!-- page loader -->
    @include('partials.loader')
    <!-- page loader ends -->

    <!-- Header -->
    @include('chatboot.popup')
    @include('partials.header')
    <!-- Header ends -->

    <!-- Sidebar -->
    @include('partials.sidebar')

    <!-- Sidebar ends -->

    <!-- Begin page content -->
        @yield('content')
    <!-- footer -->
    <!-- footer ends -->

    <!-- Rightbar -->
    <!-- Rightbar ends -->

    <!-- chat window -->
    @include('partials.chatWindow')
    <!-- chat window ends -->


    <!-- Required jquery and libraries -->
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-5/dist/js/bootstrap.bundle.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Customized jquery file  -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/color-scheme.js') }}"></script>

    <!-- PWA app service registration and works -->
    <script src="{{ asset('assets/js/pwa-services.js') }}"></script>

    <!-- date range picker -->
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="{{ asset('assets/vendor/daterangepicker/daterangepicker.js') }}"></script>

    <!-- chosen script -->
    <script src="{{ asset('assets/vendor/chosen_v1.8.7/chosen.jquery.min.js') }}"></script>

    <!-- Chart js script -->
    <script src="{{ asset('assets/vendor/chart-js-3.3.1/chart.min.js') }}"></script>

    <!-- Progress circle js script -->
    <script src="{{ asset('assets/vendor/progressbar-js/progressbar.min.js') }}"></script>

    <!-- swiper js script -->
    <script src="{{ asset('assets/vendor/swiper-7.3.1/swiper-bundle.min.js') }}"></script>

    <!-- Simple lightbox script -->
    <script src="{{ asset('assets/vendor/simplelightbox/simple-lightbox.jquery.min.js') }}"></script>

    <!-- app tour script-->
    <script src="{{ asset('assets/vendor/Product-Tour-Plugin-jQuery/lib.js') }}"></script>
    <!-- tags input -->
    <script src="{{ asset('assets/vendor/tagsinput/bootstrap-tagsinput.min.js') }}"></script>

    <!-- ckeditor input -->
    <script src="{{ asset('assets/vendor/ckeditor5-build-classic/ckeditor.js') }}"></script>
    <!-- Footable table master script-->
    <script src="{{ asset('assets/vendor/fooTable/js/footable.min.js') }}"></script>

    <script src="{{ asset('assets/vendor/dropzone5-9-3/dropzone.min.js') }}"></script>

    <!-- page level script here -->
    <script src="{{ asset('assets/js/header-title.js') }}"></script>
    <!-- <script src="assets/js/dashboard-custom.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <!-- Include Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Add in the <head> section -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js">
    </script>

    <script>
        $(document).ready(function() {
            $('.chosenoptgroup').chosen({
                width: '100%',
                no_results_text: "{{ __('generated.Aucun résultat trouvé') }}",
                placeholder_text_single: "{{ __('generated.Sélectionnez un choix') }}",
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Initialize Select2 on the select element
            $('.select2-elem').select2({
                placeholder: "{{ __('generated.Select options') }}", // This sets a placeholder for the dropdown
                allowClear: true, // This allows the user to clear the selected options
                minimumResultsForSearch: Infinity
            });
            // To make select multiple add attribute multiple to select element
            // 1. Searchable single select
            $('.chosen-searchable').chosen({
                allow_single_deselect: false, // Pas de désélection
                placeholder_text_single: '', // Pas de placeholder
                no_results_text: "{{ __('generated.Aucun résultat trouvé') }}", // Message personnalisé
                disable_search_threshold: 0, // Always show search
            });
            // 2. Non-searchable, single select
            $('.chosen-no-search').chosen({
                allow_single_deselect: false, // Pas de désélection
                placeholder_text_single: '', // Pas de placeholder
                disable_search: true, // Désactiver la recherche
                no_results_text: "{{ __('generated.Aucun résultat trouvé') }}", // Message personnalisé
            });
        });
    </script>



    @yield('js_footer')

    <!-- Scipt pour chat -->
    {{-- <script>
        $(document).ready(function() {
            let selectedUserId = null;
            let selectedUserName = "";
            const $userList = $("#userList");
            const $messages = $("#messages");
            const $messagesContainer = $("#messagesContainer");
            const $chatForm = $("#chat-form");
            const $messageInput = $("#message");
            const $chatUserName = $("#chatUserName");
            const $chatWindow = $("#chatwindow");

            // ✅ Charger les utilisateurs au démarrage
            loadUsers();

            // ✅ Charger les utilisateurs dynamiquement
            function loadUsers() {
                $.ajax({
                    url: "{{ route('chat.users') }}",
                    method: "GET",
                    success: function(users) {
                        console.log("📌 Utilisateurs récupérés :", users);
                        $userList.empty();

                        if (users.length === 0) {
                            $userList.html(
                                '<li class="list-group-item text-center text-muted">Aucun utilisateur disponible</li>'
                            );
                            return;
                        }

                        users.forEach(user => {
                            $.ajax({
                                url: `{{ url('/chat/last-message') }}/${user.id}`,
                                method: "GET",
                                success: function(lastMessage) {
                                    let messageText = lastMessage ? lastMessage
                                        .message : "Aucun message";
                                    let messageTime = lastMessage ? lastMessage
                                        .created_at : "Pas encore de message";

                                    let userItem = `
                                        <li class="list-group-item user-item d-flex align-items-center" data-id="${user.id}" data-name="${user.name}">
                                            <div class="col-auto me-2">
                                                <figure class="avatar avatar-44 coverimg rounded-circle">
                                                    <img src="{{ asset('assets/img/user/user.jpg') }}" alt="Avatar">
                                                </figure>
                                            </div>
                                            <div class="col-9 align-self-center ps-0">
                                                <div class="row g-0">
                                                    <div class="col-8">
                                                        <p class="text-truncate mb-0">${user.name}</p>
                                                    </div>
                                                    <div class="col-4 text-end">
                                                        <small class="text-muted fs-10 mb-1"><i class="bi bi-clock"></i> ${messageTime}</small>
                                                    </div>
                                                </div>
                                                <p class="text-secondary small text-truncate">${messageText}</p>
                                            </div>
                                        </li>
                                    `;

                                    $userList.append(userItem);
                                },
                                error: function() {
                                    console.error(
                                        "❌ Erreur lors de la récupération du dernier message."
                                    );
                                }
                            });
                        });
                    },
                    error: function() {
                        console.error("❌ Erreur lors du chargement des utilisateurs.");
                    }
                });
            }

            // ✅ Gérer le clic sur un utilisateur
            $userList.on("click", ".user-item", function() {
                selectedUserId = $(this).data("id");
                selectedUserName = $(this).data("name");

                $chatUserName.text(selectedUserName);
                $messages.empty();
                loadMessages(selectedUserId);

                // Afficher chat
                $chatWindow.removeClass("d-none");
            });

            // ✅ Charger les messages d'un utilisateur sélectionné
            function loadMessages(userId) {
                $.get("{{ url('/chat/messages') }}/" + userId, function(messages) {
                    $messages.empty();

                    const messageItems = messages.map(message => {
                        const senderName = message.sender_id == "{{ auth()->id() }}" ? "Moi" :
                            message.sender_name;
                        const senderClass = message.sender_id == "{{ auth()->id() }}" ?
                            "right-chat" : "left-chat";

                        return `
                            <li class="list-group-item ${senderClass}">
                                <div class="chat-block text-white">
                                    <p class="mb-1"><strong>${senderName}:</strong> ${message.message}</p>
                                    <small class="text-muted">${message.created_at}</small>
                                </div>
                            </li>
                        `;
                    }).join("");

                    $messages.html(messageItems);
                    $messagesContainer.scrollTop($messagesContainer[0].scrollHeight);
                }).fail(function() {
                    console.error("❌ Erreur lors du chargement des messages.");
                });
            }

            // ✅ Envoi d'un message
            $chatForm.submit(function(e) {
                e.preventDefault();
                const message = $messageInput.val().trim();

                if (!message) return;

                $.post("{{ route('chat.send') }}", {
                    _token: "{{ csrf_token() }}",
                    message: message,
                    receiver_id: selectedUserId
                }).done(function(data) {
                    $messages.append(`
                        <li class="list-group-item right-chat">
                            <div class="chat-block">
                                <p class="mb-1 text-black"><strong>Moi:</strong> ${data.message}</p>
                                <small class="text-muted">Maintenant</small>
                            </div>
                        </li>
                    `);

                    $messageInput.val("");
                    $messagesContainer.scrollTop($messagesContainer[0].scrollHeight);
                }).fail(function() {
                    console.error("❌ Erreur lors de l'envoi du message.");
                });
            });

            // ✅ Écouter les messages en temps réel avec Laravel Echo
            window.Echo.private('chat.{{ auth()->user()->company_id }}')
                .listen('MessageSent', (e) => {
                    if (e.sender_id == selectedUserId || e.receiver_id == selectedUserId) {
                        const senderName = e.sender_id == "{{ auth()->id() }}" ? "Moi" : e.sender_name;
                        const senderClass = e.sender_id == "{{ auth()->id() }}" ? "right-chat" : "left-chat";

                        $messages.append(`
                            <li class="list-group-item ${senderClass}">
                                <div class="chat-block">
                                    <p class="mb-1"><strong>${senderName}:</strong> ${e.message}</p>
                                    <small class="text-muted">Maintenant</small>
                                </div>
                            </li>
                        `);
                        $messagesContainer.scrollTop($messagesContainer[0].scrollHeight);
                    }
                });
        });

        // ✅ Fermer chat
        function closeChatWindow() {
            $("#chatwindow").addClass("d-none");
        }
    </script>

</body>

</html> --}}

<!-- Flatpickr JS -->
<!-- <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Replace all <input type="date"> with Flatpickr
        flatpickr("input[type='date']", {
            dateFormat: "d/m/Y" // dd/mm/yyyy format
        });
    });
</script> -->
<script>
    const t = window.translations || {};

    const now = new Date();
    const endDate = now.toLocaleDateString('fr-FR');

    const oneYearAgo = new Date();
    oneYearAgo.setFullYear(now.getFullYear() - 1);
    const startDate = oneYearAgo.toLocaleDateString('fr-FR');

    // Add a custom class to your target inputs first
    $("input[type='date']").addClass('custom-datepicker');
    $("input[type='date']").attr('type', 'text');

    $("input.custom-datepicker").each(function() {
        const val = $(this).val(); // get the value pre-filled by Laravel (from DB)
        
        $(this).daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1989,
            maxYear: 2100,
            locale: {
                format: "YYYY-MM-DD",
                applyLabel: "Appliquer",
                cancelLabel: "Annuler",
                fromLabel: "De",
                toLabel: "À",
                customRangeLabel: "Personnalisé",
                weekLabel: "Sem",
                daysOfWeek: ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam"],
                monthNames: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
                firstDay: 1
            },
            startDate: val ? moment(val, 'YYYY-MM-DD') : moment(),
            endDate: val ? moment(val, 'YYYY-MM-DD') : moment(),
            opens: "left",
            drops: "down",
            applyButtonClasses: "btn-theme",
            cancelClass: "btn-outline-secondary border",
        }).on('apply.daterangepicker', function(ev, picker) {
            $('#single_hidden_date').val(picker.startDate.format('YYYY-MM-DD'));
            $('#single-date-form').submit();
        });
    });

// // Handle Refresh button click
// $(document).on('click', '#refresh-single-date', function() {
//     // Reset the field
//     $('#single_hidden_date').val('');
    
//     // Optionally submit the form again
//     $('#single-date-form').submit();
// });

</script>
    <script>
        $(document).ready(function() {
            let selectedUserId = null;
            let selectedUserName = "";
            const $userList = $("#userList");
            const $messages = $("#messages");
            const $messagesContainer = $("#messagesContainer");
            const $chatForm = $("#chat-form");
            const $messageInput = $("#message");
            const $fileInput = $("#file-input");
            const $chatUserName = $("#chatUserName");
            const $chatWindow = $("#chatwindow");
            const $fileBtn = $("#file-btn");

            // Load users at startup
            loadUsers();

            function loadUsers() {
                $.ajax({
                    url: "{{ route('chat.users') }}",
                    method: "GET",
                    success: function(users) {
                        $userList.empty();

                        if (users.length === 0) {
                            $userList.html(
                                '<li class="list-group-item text-center text-muted">Aucun utilisateur disponible</li>'
                            );
                            return;
                        }

                        users.forEach(user => {
                            $.ajax({
                                url: `{{ url('/chat/last-message') }}/${user.id}`,
                                method: "GET",
                                success: function(lastMessage) {
                                    const messageText = lastMessage?.message ??
                                        "Aucun message";
                                    const messageTime = lastMessage?.created_at ??
                                        "Pas de message";

                                    let userItem = `
                            <li class="list-group-item user-item d-flex align-items-center" data-id="${user.id}" data-name="${user.name}">
                                <div class="col-auto me-2">
                                    <figure class="avatar avatar-44 coverimg rounded-circle">
                                        <img src="{{ asset('assets/img/user/user.jpg') }}" alt="Avatar">
                                    </figure>
                                </div>
                                <div class="col-9 align-self-center ps-0">
                                    <div class="row g-0">
                                        <div class="col-8">
                                            <p class="text-truncate mb-0">${user.name}</p>
                                        </div>
                                        <div class="col-4 text-end">
                                            <small class="text-muted fs-10 mb-1"><i class="bi bi-clock"></i> ${messageTime}</small>
                                        </div>
                                    </div>
                                    <p class="text-secondary small text-truncate">${messageText}</p>
                                </div>
                            </li>
                        `;
                                    $userList.append(userItem);
                                },
                                error: function() {
                                    console.error(
                                        "❌ Erreur lors de la récupération du dernier message."
                                    );
                                }
                            });
                        });
                    },
                    error: function() {
                        console.error("❌ Erreur lors du chargement des utilisateurs.");
                    }
                });
            }

            $userList.on("click", ".user-item", function() {
                selectedUserId = $(this).data("id");
                selectedUserName = $(this).data("name");

                $chatUserName.text(selectedUserName);
                $messages.empty();
                loadMessages(selectedUserId);

                // Show chat window
                $chatWindow.removeClass("d-none");
            });

            function loadMessages(userId) {
                $.get("{{ url('/chat/messages') }}/" + userId, function(messages) {
                    $messages.empty();

                    const messageItems = messages.map(message => {
                        const senderName = message.sender_id == "{{ auth()->id() }}" ? "Moi" :
                            message.sender_name;
                        const senderClass = message.sender_id == "{{ auth()->id() }}" ?
                            "right-chat" : "left-chat";

                        return `
                <li class="list-group-item ${senderClass}">
                    <div class="chat-block">
                        <p class="mb-1"><strong>${senderName}:</strong> ${message.message}</p>
                        ${message.file ? `<a href="/uploads/${message.file}" class="text-muted" target="_blank">View File</a>` : ''}
                        <small class="text-muted">${message.created_at}</small>
                    </div>
                </li>
            `;
                    }).join("");

                    $messages.html(messageItems);
                    $messagesContainer.scrollTop($messagesContainer[0].scrollHeight);
                }).fail(function() {
                    console.error("❌ Erreur lors du chargement des messages.");
                });
            }
            $chatForm.submit(function(e) {
                e.preventDefault();
                const message = $messageInput.val().trim();
                const file = $fileInput[0].files[0]; // Get the first file (if any)

                // Debugging logs to check if file and message are correctly detected
                console.log("Message:", message);
                console.log("File:", file);

                // If no message and no file, do nothing
                if (!message && !file) return;

                // Prepare FormData to send both the message and file (if any)
                const formData = new FormData();
                formData.append("_token", "{{ csrf_token() }}");
                formData.append("message", message);
                formData.append("receiver_id", selectedUserId);
                if (file) {
                    formData.append("file", file); // Append file if available
                }

                // Make the AJAX request
                $.ajax({
                    url: "{{ route('chat.send') }}",
                    method: "POST",
                    data: formData,
                    processData: false, // Prevent jQuery from processing the data
                    contentType: false, // Let the browser handle the content type
                    success: function(data) {
                        // Log the response data for debugging
                        console.log("Response:", data);

                        const senderName =
                            "Moi"; // Sender name (You can dynamically set it as needed)
                        let messageHtml = `
            <li class="list-group-item right-chat">
                <div class="chat-block text-white">
                    <p class="mb-1"><strong>${senderName}:</strong> ${data.message}</p>
        `;

                        // If the message contains a file, add a link to it
                        if (data.file) {
                            messageHtml +=
                                `<a href="${data.file}" class="text-muted" target="_blank">View File</a>`;
                        }

                        messageHtml += `
                    <small class="text-muted">Maintenant</small>
                </div>
            </li>
        `;

                        $messages.append(messageHtml);
                        $messageInput.val(""); // Clear the message input
                        $fileInput.val(""); // Clear the file input
                        $messagesContainer.scrollTop($messagesContainer[0].scrollHeight);
                    },
                    fail: function() {
                        console.error("❌ Erreur lors de l'envoi du message.");
                    }
                });
            });

            // File upload button logic
            $fileBtn.click(function() {
                $fileInput.click();
            });

            // Listen for real-time messages using Laravel Echo
            window.Echo.private('chat.{{ auth()?->user()?->company_id }}')
                .listen('MessageSent', (e) => {
                    if (e.sender_id == selectedUserId || e.receiver_id == selectedUserId) {
                        const senderName = e.sender_id == "{{ auth()->id() }}" ? "Moi" : e.sender_name;
                        const senderClass = e.sender_id == "{{ auth()->id() }}" ? "right-chat" : "left-chat";

                        $messages.append(`
                <li class="list-group-item ${senderClass}">
                    <div class="chat-block">
                        <p class="mb-1"><strong>${senderName}:</strong> ${e.message}</p>
                        ${e.file ? `<a href="/uploads/${e.file}" class="text-muted" target="_blank">View File</a>` : ''}
                        <small class="text-muted">Maintenant</small>
                    </div>
                </li>
            `);
                        $messagesContainer.scrollTop($messagesContainer[0].scrollHeight);
                    }
                });
        });

        // Close chat window function
        function closeChatWindow() {
            $("#chatwindow").addClass("d-none");
        }
    </script>
    </div>
</body>

</html>
