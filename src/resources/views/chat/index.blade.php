@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <h3>Choisir un utilisateur pour discuter</h3>
        <select id="userSelect" class="form-control">
            <option value="">Sélectionnez un utilisateur</option>
        </select>
        <button id="startChat" class="btn btn-theme mt-2" disabled>Commencer le Chat</button>
    </div>

    <!-- Modal Chat -->
    <div class="modal fade" id="chatModal" tabindex="-1" aria-labelledby="chatModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="chatModalLabel">Chat en temps réel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="messages" style="height: 300px; overflow-y: auto; border: 1px solid #ccc; padding: 10px;">
                        <!-- Les messages seront chargés ici dynamiquement -->
                    </div>
                    <form id="chat-form">
                        <input type="text" id="message" class="form-select" placeholder="Écrire un message">
                        <input type="hidden" id="receiver_id">
                        <button type="submit" class="btn btn-theme mt-2">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Ajouter jQuery et Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            let selectedUserId = null;

            // Charger la liste des utilisateurs disponibles
            $.ajax({
                url: "{{ route('chat.users') }}",
                method: "GET",
                success: function(users) {
                    if (users.length === 0) {
                        $('#userSelect').append(
                            `<option value="">Aucun utilisateur disponible</option>`);
                    } else {
                        users.forEach(user => {
                            $('#userSelect').append(
                                `<option value="${user.id}">${user.name}</option>`);
                        });
                    }
                },
                error: function() {
                    console.log("Erreur lors du chargement des utilisateurs.");
                }
            });

            // Activer le bouton "Commencer le Chat" seulement si un utilisateur est sélectionné
            $('#userSelect').change(function() {
                selectedUserId = $(this).val();
                $('#startChat').prop('disabled', !selectedUserId);
            });

            // Charger l'historique des messages quand on ouvre le chat
            $('#startChat').click(function() {
                if (selectedUserId) {
                    $('#receiver_id').val(selectedUserId); // Mettre à jour l'ID du destinataire
                    $('#messages').html(''); // Vider les anciens messages

                    // Charger les anciens messages entre l'utilisateur connecté et le destinataire sélectionné
                    $.ajax({
                        url: "{{ url('/chat/messages') }}/" + selectedUserId,
                        method: "GET",
                        success: function(messages) {
                            messages.forEach(message => {
                                let senderName = (message.sender_id ==
                                    "{{ auth()->id() }}") ? "Moi" : (message
                                    .sender_name ?? "Utilisateur inconnu");
                                $('#messages').append(
                                    `<p><strong>${senderName}:</strong> ${message.message}</p>`
                                    );
                            });
                        },
                        error: function() {
                            console.log("Erreur lors du chargement des messages.");
                        }
                    });

                    $('#chatModal').modal('show'); // Ouvrir la modal de chat
                }
            });

            // Envoyer un message
            $('#chat-form').submit(function(e) {
                e.preventDefault();
                let message = $('#message').val();
                let receiver_id = $('#receiver_id').val();

                if (message.trim() === "") {
                    return;
                }

                $.post("{{ route('chat.send') }}", {
                    _token: "{{ csrf_token() }}",
                    message: message,
                    receiver_id: receiver_id
                }, function(data) {
                    $('#messages').append(`<p><strong>Moi:</strong> ${data.message}</p>`);
                    $('#message').val('');
                });
            });

            // Écouter les messages en temps réel avec Laravel Echo
            window.Echo.private('chat.{{ auth()->user()->company_id }}')
                .listen('MessageSent', (e) => {
                    console.log("🚀 Message reçu via Laravel Echo :", e); // 🔍 Vérification complète

                    // Vérifier si `sender_name` et `receiver_name` existent
                    let senderName = e.sender_name ? e.sender_name : "Utilisateur inconnu";

                    // Afficher le message reçu avec le bon nom
                    $('#messages').append(`<p><strong>${senderName}:</strong> ${e.message}</p>`);
                });
        });
    </script>
@endsection
