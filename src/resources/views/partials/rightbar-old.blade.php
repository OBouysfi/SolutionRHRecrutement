<div class="rightbar-wrap">
    <!-- Sidebar pour les utilisateurs disponibles (à droite) -->
    <div class="rightbar">
        <div class="card border-0 h-100">
            <div class="card-header">
                <h6 class="mb-0">Utilisateurs disponibles</h6>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush" id="userList">
                    <!-- Utilisateurs chargés dynamiquement ici -->
                </ul>
            </div>
        </div>
    </div>

    <!-- chat compacte (cachée par défaut) -->
    <div class="chat-window d-none" id="chatwindow">
        <div class="chat-header">
            <div class="d-flex align-items-center">
                <div class="flex-grow-1">
                    <h6 class="mb-0">Discussion avec <span id="chatUserName"></span></h6>
                </div>
                <button type="button" class="btn-close btn-white" aria-label="Fermer"
                    onclick="closeChatWindow()"></button>
            </div>
        </div>

        <div class="chat-body" id="messagesContainer">
            <ul class="list-group list-group-flush" id="messages">
                <!-- Messages chargés dynamiquement ici -->
            </ul>
        </div>

        <!-- Footer (input pour écrire un message) -->
        <div class="chat-footer">
            {{-- <form id="chat-form">
                <div class="input-group">
                    <input type="text" id="message" class="form-control" placeholder="Écrire un message...">
                    <button type="submit" class="btn btn-theme" style="background: #1b215a;">
                        <i class="bi bi-send"></i>
                    </button>
                </div>
            </form> --}}

            <form id="chat-form">
                <div class="input-group">
                    <input type="text" class="form-control" id="message" placeholder="Type a message">
                    <input type="file" class="form-control" id="file-input" style="display:none;">
                    <button type="button" class="btn btn-outline-secondary" id="file-btn">📎</button>
                    <button type="submit" class="btn btn-theme">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    /* Style pour la rightbar */
    .rightbar {
        width: 300px;
        background-color: #f8f9fa;
        border-left: 1px solid #dee2e6;
        height: 100vh;
    }

    .chat-window {
        position: fixed;
        right: 20px;
        bottom: 20px;
        width: 300px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        display: flex;
        flex-direction: column;
        max-height: 400px;
    }

    .chat-header {
        padding: 10px;
        background-color: #1b215a;
        color: #fff;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .chat-header h6 {
        margin: 0;
        font-size: 14px;
    }

    .chat-body {
        flex-grow: 1;
        overflow-y: auto;
        padding: 10px;
        background-color: #f8f9fa;
    }

    /* Style pour les messages */
    .left-chat {
        text-align: left;
        background-color: #1c431b;
        border-radius: 10px;
        margin: 5px 0;
        padding: 10px;
        max-width: 80%;
    }

    .right-chat {
        text-align: right;
        background-color: #1b215a;
        color: #fff;
        border-radius: 10px;
        margin: 5px 0;
        padding: 10px;
        max-width: 80%;
        margin-left: auto;
    }

    .chat-footer {
        padding: 10px;
        background-color: #fff;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        border-top: 1px solid #dee2e6;
    }

    .chat-footer .input-group {
        width: 100%;
    }

    .chat-footer .form-control {
        border-radius: 20px;
    }

    .chat-footer .btn {
        border-radius: 20px;
        margin-left: 5px;
    }
</style>
