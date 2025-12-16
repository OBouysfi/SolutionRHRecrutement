{{-- Chat Window HTML --}}
<div class="rightbar-wrap">
    <div class="rightbar">
        <!-- chat window -->
        <div class="chatwindow d-none" id="chatwindow">
            <div class="card border-0 h-100">
                <div class="input-group input-group-md">
                    <span class="input-group-text text-theme"><i class="bi bi-person-plus"></i></span>
                    <input type="text" class="form-control" id="searchUsers" placeholder="Rechercher des utilisateurs..." />
                    <div class="dropdown input-group-text rounded px-0">
                        <button class="btn btn-sm btn-link dd-arrow-none" type="button" id="statuschat" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="statuschat">
                            <li><a class="dropdown-item" href="javascript:void(0)"><span class="vm me-1 bg-success rounded-circle d-inline-block p-1"></span> Online</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0)"><span class="vm me-1 bg-warning rounded-circle d-inline-block p-1"></span> Away</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0)"><span class="vm me-1 bg-danger rounded-circle d-inline-block p-1"></span> Offline</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0)"><span class="vm me-1 bg-secondary rounded-circle d-inline-block p-1"></span> Disabled</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="card-body h-100 overflow-y-auto p-0">
                    <ul class="list-group list-group-flush bg-none rounded-0" id="usersList">
                        <!-- Users will be loaded here dynamically -->
                    </ul>
                </div>
            </div>
        </div>
        <!-- chat window ends -->

        <!-- Chat Modal Window -->
        <div class="modal fade" id="chatmodalwindow" tabindex="-1" aria-labelledby="chatmodalwindowLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-theme text-white">
                        <h5 class="modal-title" id="chatmodalwindowLabel">
                            <i class="bi bi-chat-dots me-2"></i>
                            <span id="chatUserName">Chat</span>
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="chat-messages" id="chatMessages" style="height: 400px; overflow-y: auto;">
                            <!-- Messages will be loaded here -->
                        </div>
                    </div>
                    <div class="modal-footer p-2">
                        <form id="messageForm" class="w-100" enctype="multipart/form-data">
                            <div class="input-group">
                                <input type="file" class="form-control d-none" id="fileInput" accept=".jpg,.jpeg,.png,.pdf,.docx,.txt">
                                <button type="button" class="btn btn-outline-secondary" id="attachFileBtn">
                                    <i class="bi bi-paperclip"></i>
                                </button>
                                <input type="text" class="form-control" id="messageInput" placeholder="Tapez votre message..." autocomplete="off">
                                <button type="submit" class="btn btn-theme">
                                    <i class="bi bi-send"></i>
                                </button>
                            </div>
                            <div id="filePreview" class="mt-2 d-none">
                                <div class="alert alert-info py-2">
                                    <i class="bi bi-file-earmark"></i>
                                    <span id="fileName"></span>
                                    <button type="button" class="btn-close btn-close-sm float-end" id="removeFile"></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Notification Window (keeping original) -->
        <div class="notificationwindow d-none h-100 overflow-y-auto" id="notificationwindow">
            <!-- Your existing notification content -->
        </div>
    </div>
</div>

{{-- Add these styles to your CSS --}}
<style>
.chat-messages {
    background-color: #f8f9fa;
    padding: 15px;
}

.message {
    margin-bottom: 15px;
    display: flex;
    align-items: flex-start;
}

.message.own {
    justify-content: flex-end;
}

.message-bubble {
    max-width: 70%;
    padding: 10px 15px;
    border-radius: 18px;
    position: relative;
}

.message.own .message-bubble {
    background-color: #007bff;
    color: white;
    border-bottom-right-radius: 5px;
}

.message:not(.own) .message-bubble {
    background-color: white;
    color: #333;
    border: 1px solid #e9ecef;
    border-bottom-left-radius: 5px;
}

.message-time {
    font-size: 0.75rem;
    opacity: 0.7;
    margin-top: 5px;
}

.message.own .message-time {
    text-align: right;
}

.message-sender {
    font-weight: bold;
    font-size: 0.8rem;
    margin-bottom: 3px;
}

.message.own .message-sender {
    display: none;
}

.file-attachment {
    display: inline-block;
    padding: 8px 12px;
    background-color: rgba(255,255,255,0.1);
    border-radius: 8px;
    margin-top: 5px;
    text-decoration: none;
    color: inherit;
}

.file-attachment:hover {
    background-color: rgba(255,255,255,0.2);
}

.last-message-time {
    font-size: 0.75rem;
}

.user-item {
    cursor: pointer;
    transition: background-color 0.2s;
}

.user-item:hover {
    background-color: #f8f9fa;
}

.user-online {
    position: relative;
}

.user-online::after {
    content: '';
    position: absolute;
    bottom: 2px;
    right: 2px;
    width: 12px;
    height: 12px;
    background-color: #28a745;
    border: 2px solid white;
    border-radius: 50%;
}
</style>

{{-- JavaScript Code --}}
<script>
$(document).ready(function() {
    let currentReceiverId = null;
    let messagePollingInterval = null;
    let lastMessageId = 0;

    // Initialize chat
    loadUsers();
    
    // Search functionality
    $('#searchUsers').on('input', function() {
        const searchTerm = $(this).val().toLowerCase();
        filterUsers(searchTerm);
    });

    // File attachment handling
    $('#attachFileBtn').click(function() {
        $('#fileInput').click();
    });

    $('#fileInput').change(function() {
        const file = this.files[0];
        if (file) {
            $('#fileName').text(file.name);
            $('#filePreview').removeClass('d-none');
        }
    });

    $('#removeFile').click(function() {
        $('#fileInput').val('');
        $('#filePreview').addClass('d-none');
    });

    // Message form submission
    $('#messageForm').submit(function(e) {
        e.preventDefault();
        sendMessage();
    });

    // Enter key to send message
    $('#messageInput').keypress(function(e) {
        if (e.which === 13 && !e.shiftKey) {
            e.preventDefault();
            sendMessage();
        }
    });

    // Modal events
    $('#chatmodalwindow').on('shown.bs.modal', function() {
        $('#messageInput').focus();
        startMessagePolling();
    });

    $('#chatmodalwindow').on('hidden.bs.modal', function() {
        stopMessagePolling();
        currentReceiverId = null;
        $('#chatMessages').empty();
    });

    // Load users from database
    function loadUsers() {
        $.ajax({
            url: '{{ route("chat.users") }}',
            method: 'GET',
            success: function(users) {
                displayUsers(users);
            },
            error: function(xhr, status, error) {
                console.error('Error loading users:', error);
            }
        });
    }

    // Display users in the list
    function displayUsers(users) {
        const usersList = $('#usersList');
        usersList.empty();

        users.forEach(function(user) {
            loadLastMessage(user.id, function(lastMessage) {
                const userItem = createUserItem(user, lastMessage);
                usersList.append(userItem);
            });
        });
    }

    // Create user item HTML
    function createUserItem(user, lastMessage) {
        const avatarInitials = user.name.split(' ').map(n => n[0]).join('').toUpperCase();
        const colors = ['bg-primary', 'bg-success', 'bg-warning', 'bg-danger', 'bg-info', 'bg-secondary'];
        const bgColor = colors[user.id % colors.length];
        
        let messageText = 'Aucun message';
        let messageTime = '';
        
        if (lastMessage) {
            messageText = lastMessage.message || 'Fichier joint';
            messageTime = lastMessage.created_at;
        }

        return `
            <li class="list-group-item user-item" data-user-id="${user.id}" data-user-name="${user.name}">
                <div class="row">
                    <div class="col-auto">
                        <figure class="avatar avatar-44 rounded-circle ${bgColor} text-white user-online">
                            <span class="h6 vm">${avatarInitials}</span>
                        </figure>
                    </div>
                    <div class="col-9 align-self-center ps-0">
                        <div class="row g-0">
                            <div class="col-8">
                                <p class="text-truncate mb-0">${user.name}</p>
                            </div>
                            <div class="col-4 text-end">
                                <small class="text-muted fs-10 mb-1 last-message-time">
                                    <i class="bi bi-check"></i> ${messageTime}
                                </small>
                            </div>
                        </div>
                        <p class="text-secondary small text-truncate">${messageText}</p>
                    </div>
                </div>
            </li>
        `;
    }

    // Load last message for a user
    function loadLastMessage(userId, callback) {
        $.ajax({
            url: `{{ url('/chat/last-message') }}/${userId}`,
            method: 'GET',
            success: function(lastMessage) {
                callback(lastMessage);
            },
            error: function() {
                callback(null);
            }
        });
    }

    // Filter users based on search term
    function filterUsers(searchTerm) {
        $('#usersList .user-item').each(function() {
            const userName = $(this).data('user-name').toLowerCase();
            if (userName.includes(searchTerm)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }

    // Handle user click to open chat
    $(document).on('click', '.user-item', function() {
        const userId = $(this).data('user-id');
        const userName = $(this).data('user-name');
        
        currentReceiverId = userId;
        $('#chatUserName').text(userName);
        $('#chatmodalwindow').modal('show');
        
        loadMessages(userId);
    });

    // Load messages for a conversation
    function loadMessages(receiverId) {
        $.ajax({
            url: `{{ url('/chat/messages') }}/${receiverId}`,
            method: 'GET',
            success: function(messages) {
                displayMessages(messages);
                scrollToBottom();
            },
            error: function(xhr, status, error) {
                console.error('Error loading messages:', error);
            }
        });
    }

    // Display messages in chat window
    function displayMessages(messages) {
        const chatMessages = $('#chatMessages');
        chatMessages.empty();

        messages.forEach(function(message) {
            const messageHtml = createMessageHtml(message);
            chatMessages.append(messageHtml);
        });

        if (messages.length > 0) {
            lastMessageId = messages[messages.length - 1].id;
        }
    }

    // Create message HTML
    function createMessageHtml(message) {
        const isOwnMessage = message.sender_id == {{ Auth::id() }};
        const messageClass = isOwnMessage ? 'message own' : 'message';
        
        let fileAttachment = '';
        if (message.file) {
            const fileName = message.file.split('/').pop();
            fileAttachment = `
                <div class="file-attachment">
                    <a href="${message.file}" target="_blank" class="text-decoration-none">
                        <i class="bi bi-file-earmark"></i> ${fileName}
                    </a>
                </div>
            `;
        }

        return `
            <div class="${messageClass}">
                <div class="message-bubble">
                    ${!isOwnMessage ? `<div class="message-sender">${message.sender_name}</div>` : ''}
                    ${message.message ? `<div class="message-text">${message.message}</div>` : ''}
                    ${fileAttachment}
                    <div class="message-time">${message.created_at}</div>
                </div>
            </div>
        `;
    }

    // Send message
    function sendMessage() {
        const messageText = $('#messageInput').val().trim();
        const fileInput = $('#fileInput')[0];
        const file = fileInput.files[0];

        if (!messageText && !file) {
            return;
        }

        if (!currentReceiverId) {
            alert('Veuillez sélectionner un utilisateur pour envoyer un message.');
            return;
        }

        const formData = new FormData();
        formData.append('message', messageText);
        formData.append('receiver_id', currentReceiverId);
        formData.append('_token', '{{ csrf_token() }}');
        
        if (file) {
            formData.append('file', file);
        }

        $.ajax({
            url: '{{ route("chat.send") }}',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // Clear form
                $('#messageInput').val('');
                $('#fileInput').val('');
                $('#filePreview').addClass('d-none');
                
                // Add message to chat
                const messageHtml = createMessageHtml({
                    id: response.id,
                    sender_id: {{ Auth::id() }},
                    sender_name: '{{ Auth::user()->name }}',
                    message: response.message,
                    file: response.file,
                    created_at: response.created_at
                });
                
                $('#chatMessages').append(messageHtml);
                scrollToBottom();
                
                // Update last message in users list
                updateUserLastMessage(currentReceiverId, response.message || 'Fichier joint', response.created_at);
            },
            error: function(xhr, status, error) {
                console.error('Error sending message:', error);
                alert('Erreur lors de l\'envoi du message. Veuillez réessayer.');
            }
        });
    }

    // Update last message in users list
    function updateUserLastMessage(userId, message, time) {
        const userItem = $(`.user-item[data-user-id="${userId}"]`);
        userItem.find('.text-secondary').text(message);
        userItem.find('.last-message-time').html(`<i class="bi bi-check"></i> ${time}`);
    }

    // Scroll to bottom of chat
    function scrollToBottom() {
        const chatMessages = $('#chatMessages');
        chatMessages.scrollTop(chatMessages[0].scrollHeight);
    }

    // Start polling for new messages
    function startMessagePolling() {
        if (messagePollingInterval) {
            clearInterval(messagePollingInterval);
        }
        
        messagePollingInterval = setInterval(function() {
            if (currentReceiverId) {
                checkForNewMessages();
            }
        }, 3000); // Check every 3 seconds
    }

    // Stop polling for new messages
    function stopMessagePolling() {
        if (messagePollingInterval) {
            clearInterval(messagePollingInterval);
            messagePollingInterval = null;
        }
    }

    // Check for new messages
    function checkForNewMessages() {
        $.ajax({
            url: `{{ url('/chat/messages') }}/${currentReceiverId}`,
            method: 'GET',
            success: function(messages) {
                // Filter new messages
                const newMessages = messages.filter(msg => msg.id > lastMessageId);
                
                if (newMessages.length > 0) {
                    newMessages.forEach(function(message) {
                        const messageHtml = createMessageHtml(message);
                        $('#chatMessages').append(messageHtml);
                    });
                    
                    scrollToBottom();
                    lastMessageId = messages[messages.length - 1].id;
                }
            },
            error: function(xhr, status, error) {
                console.error('Error checking for new messages:', error);
            }
        });
    }

    // Listen for broadcast events (if using Laravel Echo)
    if (typeof Echo !== 'undefined') {
        Echo.private('chat')
            .listen('MessageSent', (e) => {
                if (currentReceiverId && 
                    (e.message.sender_id == currentReceiverId || e.message.receiver_id == currentReceiverId)) {
                    const messageHtml = createMessageHtml({
                        id: e.message.id,
                        sender_id: e.message.sender_id,
                        sender_name: e.message.sender_name,
                        message: e.message.message,
                        file: e.message.file,
                        created_at: e.message.created_at
                    });
                    
                    $('#chatMessages').append(messageHtml);
                    scrollToBottom();
                }
            });
    }
});
</script>