@extends('layouts.app')

@section('head')
<!-- Load Pusher directly -->
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.0/axios.min.js" integrity="sha512-WrdC3CE9vf1nBf58JHepuWT4x24uTacky9fuzw2g/3L9JkihgwZ6Cfv+JGTtNyosOhEmttMtEZ6H3qJWfI7gIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Load Bootstrap JS for modal functionality -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

@vite(['resources/js/app.js'])

<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<div class="video-call-app">
    <div class="container-fluid">
        <div class="row">
            <!-- Enhanced Users List -->
            <div class="col-md-3">
                <div class="users-panel">
                    <div class="panel-header">
                        <div class="header-content">
                            <i class="fas fa-users"></i>
                            <h5>Online Users</h5>
                            <div class="connection-indicator" id="connection-status">
                                <div class="pulse-dot"></div>
                                <span>Connecting...</span>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="search-users">
                            <input type="text" class="search-input" placeholder="Search users..." id="user-search">
                            <i class="fas fa-search"></i>
                        </div>
                        <div class="users-list" id="users-list">
                            @foreach($users as $user)
                            <div class="user-item" data-user-id="{{ $user->id }}" data-user-name="{{ $user->name }}" 
                                 onclick="initiateCall({{ $user->id }}, '{{ $user->name }}')">
                                <div class="user-avatar">
                                    <i class="fas fa-user"></i>
                                    <div class="status-dot online"></div>
                                </div>
                                <div class="user-info">
                                    <div class="user-name">{{ $user->name }}</div>
                                    <div class="user-status">Available</div>
                                </div>
                                <div class="call-action">
                                    <i class="fas fa-video"></i>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Video Call Area -->
            <div class="col-md-9">
                <div class="video-panel">
                    <div class="panel-header">
                        <div class="call-info">
                            <h5>Video Call</h5>
                            <div class="call-details">
                                <span id="call-status" class="status-badge ready">Ready</span>
                                <span id="current-call-with" class="call-participant"></span>
                                <span id="call-duration" class="call-timer">00:00</span>
                            </div>
                        </div>
                        <div class="panel-actions">
                            <button class="panel-btn" onclick="toggleFullscreen()">
                                <i class="fas fa-expand"></i>
                            </button>
                            <button class="panel-btn" onclick="toggleSettings()">
                                <i class="fas fa-cog"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="panel-body">
                        <!-- Enhanced Video Container -->
                        <div class="video-grid" id="video-grid">
                            <div class="video-item local-video">
                                <video id="localVideo" autoplay muted playsinline></video>
                                <div class="video-overlay">
                                    <div class="video-label">
                                        <i class="fas fa-user"></i>
                                        You ({{ auth()->user()->name }})
                                    </div>
                                    <div class="video-controls">
                                        <button class="video-control-btn" onclick="toggleLocalVideo()">
                                            <i class="fas fa-video"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="video-status" id="local-video-status">
                                    <i class="fas fa-video-slash"></i>
                                    <span>Camera Off</span>
                                </div>
                            </div>
                            
                            <div class="video-item remote-video">
                                <video id="remoteVideo" autoplay playsinline></video>
                                <div class="video-overlay">
                                    <div class="video-label" id="remote-user-label">
                                        <i class="fas fa-user"></i>
                                        Waiting for participant...
                                    </div>
                                </div>
                                <div class="video-status" id="remote-video-status">
                                    <i class="fas fa-user-slash"></i>
                                    <span>No participant</span>
                                </div>
                            </div>
                        </div>

                        <!-- Enhanced Call Controls -->
                        <div class="call-controls">
                            <div class="controls-group">
                                <button id="start-camera-btn" class="control-btn primary" onclick="startCamera()">
                                    <i class="fas fa-video"></i>
                                    <span>Start Camera</span>
                                </button>
                                
                                <button id="answer-call-btn" class="control-btn success d-none" onclick="answerCall()">
                                    <i class="fas fa-phone"></i>
                                    <span>Answer</span>
                                </button>
                                
                                <button id="reject-call-btn" class="control-btn warning d-none" onclick="rejectCall()">
                                    <i class="fas fa-phone-slash"></i>
                                    <span>Reject</span>
                                </button>
                                
                                <button id="end-call-btn" class="control-btn danger d-none" onclick="endCall()">
                                    <i class="fas fa-phone-slash"></i>
                                    <span>End Call</span>
                                </button>
                                
                                <button id="toggle-audio-btn" class="control-btn secondary d-none" onclick="toggleAudio()">
                                    <i class="fas fa-microphone"></i>
                                    <span>Mute</span>
                                </button>
                                
                                <button id="toggle-video-btn" class="control-btn secondary d-none" onclick="toggleVideo()">
                                    <i class="fas fa-video"></i>
                                    <span>Camera</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Incoming Call Modal -->
    <div class="modal fade" id="incomingCallModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content call-modal">
                <div class="modal-body">
                    <div class="incoming-call-content">
                        <div class="caller-avatar">
                            <i class="fas fa-user"></i>
                            <div class="pulse-ring"></div>
                        </div>
                        <div class="call-info">
                            <h4 id="caller-name">Unknown</h4>
                            <p>is calling you...</p>
                            <div class="call-type">
                                <i class="fas fa-video"></i>
                                Video Call
                            </div>
                        </div>
                        <div class="call-actions">
                            <button type="button" class="call-action-btn reject" onclick="rejectCall()">
                                <i class="fas fa-phone-slash"></i>
                            </button>
                            <button type="button" class="call-action-btn answer" onclick="answerCall()">
                                <i class="fas fa-phone"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Error/Success Notifications -->
    <div id="notification-container"></div>
</div>

<style>
/* Enhanced Styles */
.video-call-app {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    height: 100%;
    padding: 100px 0 20px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* Users Panel */
.users-panel {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 20px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(10px);
    overflow: hidden;
    height: calc(100vh - 40px);
    display: flex;
    flex-direction: column;
}

.panel-header {
    background: linear-gradient(135deg, #6c5ce7, #a29bfe);
    color: white;
    padding: 20px;
    position: relative;
}

.header-content h5 {
    margin: 0;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 10px;
}

.connection-indicator {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 12px;
    margin-top: 8px;
    opacity: 0.9;
}

.pulse-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #00ff88;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(0, 255, 136, 0.7); }
    70% { transform: scale(1); box-shadow: 0 0 0 10px rgba(0, 255, 136, 0); }
    100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(0, 255, 136, 0); }
}

.panel-body {
    flex: 1;
    padding: 20px;
    overflow-y: auto;
}

.search-users {
    position: relative;
    margin-bottom: 20px;
}

.search-input {
    width: 100%;
    padding: 12px 40px 12px 16px;
    border: 2px solid #e9ecef;
    border-radius: 25px;
    font-size: 14px;
    transition: all 0.3s ease;
    background: #f8f9fa;
}

.search-input:focus {
    outline: none;
    border-color: #6c5ce7;
    background: white;
    box-shadow: 0 0 0 3px rgba(108, 92, 231, 0.1);
}

.search-users i {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #6c757d;
}

/* User Items */
.user-item {
    display: flex;
    align-items: center;
    padding: 15px;
    margin-bottom: 10px;
    border-radius: 15px;
    cursor: pointer;
    transition: all 0.3s ease;
    background: #f8f9fa;
    border: 2px solid transparent;
}

.user-item:hover {
    background: white;
    border-color: #6c5ce7;
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(108, 92, 231, 0.15);
}

.user-avatar {
    position: relative;
    width: 45px;
    height: 45px;
    background: linear-gradient(135deg, #6c5ce7, #a29bfe);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    margin-right: 15px;
}

.status-dot {
    position: absolute;
    bottom: 2px;
    right: 2px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 2px solid white;
}

.status-dot.online { background: #00ff88; }
.status-dot.busy { background: #ff6b6b; }
.status-dot.away { background: #ffa726; }

.user-info {
    flex: 1;
}

.user-name {
    font-weight: 600;
    color: #2d3436;
    margin-bottom: 2px;
}

.user-status {
    font-size: 12px;
    color: #636e72;
}

.call-action {
    opacity: 0;
    transition: opacity 0.3s ease;
    color: #6c5ce7;
}

.user-item:hover .call-action {
    opacity: 1;
}

/* Video Panel */
.video-panel {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 20px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(10px);
    overflow: hidden;
    height: calc(100vh - 40px);
    display: flex;
    flex-direction: column;
}

.call-info {
    display: flex;
    align-items: center;
    gap: 20px;
}

.call-info h5 {
    margin: 0;
    font-weight: 600;
}

.call-details {
    display: flex;
    align-items: center;
    gap: 15px;
}

.status-badge {
    padding: 6px 12px;
    border-radius: 15px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.status-badge.ready { background: #ddd; color: #666; }
.status-badge.calling { background: #ffeaa7; color: #d63031; }
.status-badge.connected { background: #00cec9; color: white; }
.status-badge.incoming { background: #fd79a8; color: white; }

.call-timer {
    font-family: 'Courier New', monospace;
    font-weight: bold;
    color: #2d3436;
}

.panel-actions {
    display: flex;
    gap: 10px;
}

.panel-btn {
    width: 40px;
    height: 40px;
    border: none;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.2);
    color: white;
    cursor: pointer;
    transition: all 0.3s ease;
}

.panel-btn:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: scale(1.1);
}

/* Video Grid */
.video-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    padding: 20px;
    flex: 1;
    min-height: 0;
}

.video-item {
    position: relative;
    background: #000;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
}

.video-item video {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 20px;
}

.video-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to bottom, 
        rgba(0,0,0,0.6) 0%,
        transparent 30%,
        transparent 70%,
        rgba(0,0,0,0.6) 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 15px;
}

.video-item:hover .video-overlay {
    opacity: 1;
}

.video-label {
    color: white;
    font-size: 14px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
}

.video-controls {
    display: flex;
    justify-content: center;
    gap: 10px;
}

.video-control-btn {
    width: 40px;
    height: 40px;
    border: none;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.2);
    color: white;
    cursor: pointer;
    transition: all 0.3s ease;
}

.video-control-btn:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: scale(1.1);
}

.video-status {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: rgba(255, 255, 255, 0.8);
    text-align: center;
    font-size: 16px;
}

.video-status i {
    font-size: 48px;
    margin-bottom: 10px;
    display: block;
}

/* Call Controls */
.call-controls {
    padding: 20px;
    background: rgba(248, 249, 250, 0.8);
    border-top: 1px solid rgba(0, 0, 0, 0.05);
}

.controls-group {
    display: flex;
    justify-content: center;
    gap: 15px;
    flex-wrap: wrap;
}

.control-btn {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    padding: 15px 20px;
    border: none;
    border-radius: 15px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    min-width: 100px;
}

.control-btn i {
    font-size: 18px;
}

.control-btn.primary {
    background: linear-gradient(135deg, #6c5ce7, #a29bfe);
    color: white;
}

.control-btn.success {
    background: linear-gradient(135deg, #00b894, #00cec9);
    color: white;
}

.control-btn.warning {
    background: linear-gradient(135deg, #fdcb6e, #e17055);
    color: white;
}

.control-btn.danger {
    background: linear-gradient(135deg, #d63031, #e84393);
    color: white;
}

.control-btn.secondary {
    background: #e9ecef;
    color: #495057;
}

.control-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
}

.control-btn:active {
    transform: translateY(-1px);
}

.control-btn.muted {
    background: linear-gradient(135deg, #d63031, #e84393);
    color: white;
}

/* Incoming Call Modal */
.call-modal {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    border-radius: 25px;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
}

.incoming-call-content {
    text-align: center;
    padding: 40px 20px;
}

.caller-avatar {
    position: relative;
    width: 120px;
    height: 120px;
    margin: 0 auto 30px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 48px;
}

.pulse-ring {
    position: absolute;
    width: 100%;
    height: 100%;
    border: 3px solid rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    animation: pulse-ring 2s infinite;
}

@keyframes pulse-ring {
    0% { transform: scale(0.8); opacity: 1; }
    100% { transform: scale(1.4); opacity: 0; }
}

.call-info h4 {
    font-size: 28px;
    margin-bottom: 10px;
    font-weight: 700;
}

.call-info p {
    font-size: 16px;
    opacity: 0.9;
    margin-bottom: 20px;
}

.call-type {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    font-size: 14px;
    opacity: 0.8;
    margin-bottom: 40px;
}

.call-actions {
    display: flex;
    justify-content: center;
    gap: 40px;
}

.call-action-btn {
    width: 70px;
    height: 70px;
    border: none;
    border-radius: 50%;
    font-size: 24px;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.call-action-btn.answer {
    background: #00b894;
    color: white;
}

.call-action-btn.reject {
    background: #d63031;
    color: white;
}

.call-action-btn:hover {
    transform: scale(1.1);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
}

/* Notifications */
#notification-container {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 9999;
}

.notification {
    background: white;
    border-radius: 15px;
    padding: 15px 20px;
    margin-bottom: 10px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    border-left: 4px solid;
    display: flex;
    align-items: center;
    gap: 12px;
    min-width: 300px;
    animation: slideIn 0.3s ease;
}

.notification.success { border-left-color: #00b894; }
.notification.error { border-left-color: #d63031; }
.notification.warning { border-left-color: #fdcb6e; }
.notification.info { border-left-color: #74b9ff; }

@keyframes slideIn {
    from { transform: translateX(100%); opacity: 0; }
    to { transform: translateX(0); opacity: 1; }
}

@keyframes slideOut {
    from { transform: translateX(0); opacity: 1; }
    to { transform: translateX(100%); opacity: 0; }
}

/* Responsive Design */
@media (max-width: 768px) {
    .video-grid {
        grid-template-columns: 1fr;
        grid-template-rows: 1fr 200px;
    }
    
    .controls-group {
        gap: 10px;
    }
    
    .control-btn {
        min-width: 80px;
        padding: 12px 15px;
        font-size: 12px;
    }
    
    .call-actions {
        gap: 30px;
    }
    
    .call-action-btn {
        width: 60px;
        height: 60px;
        font-size: 20px;
    }
}

/* Utility Classes */
.d-none { display: none !important; }
.d-flex { display: flex !important; }
</style>

<script>
// Enhanced JavaScript with Direct Pusher Implementation

// Global variables
let localStream = null;
let peer = null;
let currentCallWith = null;
let currentCallWithName = '';
let pendingOffer = null;
let isAudioEnabled = true;
let isVideoEnabled = true;
let callStartTime = null;
let callTimer = null;
let pusherInstance = null;
let channel = null;
let incomingCallModal = null;

// Enhanced logging system
const Logger = {
    debug: (message, data = null) => {
        console.log(`[DEBUG] ${new Date().toISOString()}: ${message}`, data || '');
    },
    info: (message, data = null) => {
        console.info(`[INFO] ${new Date().toISOString()}: ${message}`, data || '');
    },
    warn: (message, data = null) => {
        console.warn(`[WARN] ${new Date().toISOString()}: ${message}`, data || '');
    },
    error: (message, error = null) => {
        console.error(`[ERROR] ${new Date().toISOString()}: ${message}`, error || '');
    }
};

// Enhanced notification system
const NotificationManager = {
    show: (message, type = 'info', duration = 5000) => {
        const container = document.getElementById('notification-container');
        const notification = document.createElement('div');
        notification.className = `notification ${type}`;
        
        const icon = {
            success: 'fas fa-check-circle',
            error: 'fas fa-exclamation-circle',
            warning: 'fas fa-exclamation-triangle',
            info: 'fas fa-info-circle'
        }[type];
        
        notification.innerHTML = `
            <i class="${icon}"></i>
            <div>
                <div style="font-weight: 600;">${message}</div>
            </div>
        `;
        
        container.appendChild(notification);
        
        setTimeout(() => {
            notification.style.animation = 'slideOut 0.3s ease forwards';
            setTimeout(() => {
                if (container.contains(notification)) {
                    container.removeChild(notification);
                }
            }, 300);
        }, duration);
    }
};

// Initialize when page loads
document.addEventListener('DOMContentLoaded', function() {
    Logger.info('Application initializing...');
    
    try {
        // Configure Axios
        configureAxios();
        
        // Initialize UI
        updateCallStatus('Ready');
        updateConnectionStatus('Connecting...');
        
        // Initialize Bootstrap modal
        initializeModal();
        
        // Setup Pusher
        setupPusher();
        
        // Setup search functionality
        setupUserSearch();
        
        Logger.info('Application initialized successfully');
    } catch (error) {
        Logger.error('Failed to initialize application', error);
        NotificationManager.show('Failed to initialize application', 'error');
    }
});

function configureAxios() {
    try {
        axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
        axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        // Add response interceptor for error handling
        axios.interceptors.response.use(
            response => response,
            error => {
                Logger.error('Axios request failed', error);
                
                if (error.response) {
                    // Server responded with error status
                    const message = error.response.data.message || `Server Error (${error.response.status})`;
                    NotificationManager.show(message, 'error');
                } else if (error.request) {
                    // Request was made but no response received
                    NotificationManager.show('Network error - please check your connection', 'error');
                } else {
                    // Something else happened
                    NotificationManager.show('Request failed - please try again', 'error');
                }
                
                return Promise.reject(error);
            }
        );
        
        Logger.info('Axios configured successfully');
    } catch (error) {
        Logger.error('Failed to configure Axios', error);
    }
}

function initializeModal() {
    try {
        const modalElement = document.getElementById('incomingCallModal');
        if (modalElement && typeof bootstrap !== 'undefined') {
            incomingCallModal = new bootstrap.Modal(modalElement, {
                backdrop: 'static',
                keyboard: false
            });
            Logger.info('Bootstrap modal initialized');
        } else {
            Logger.warn('Bootstrap not available, using fallback modal methods');
        }
    } catch (error) {
        Logger.error('Failed to initialize modal', error);
    }
}

function setupUserSearch() {
    const searchInput = document.getElementById('user-search');
    const usersList = document.getElementById('users-list');
    const userItems = usersList.querySelectorAll('.user-item');
    
    searchInput.addEventListener('input', (e) => {
        const searchTerm = e.target.value.toLowerCase();
        
        userItems.forEach(item => {
            const userName = item.dataset.userName.toLowerCase();
            if (userName.includes(searchTerm)) {
                item.style.display = 'flex';
            } else {
                item.style.display = 'none';
            }
        });
    });
}

function updateConnectionStatus(status) {
    const statusElement = document.getElementById('connection-status');
    const dot = statusElement.querySelector('.pulse-dot');
    const text = statusElement.querySelector('span');
    
    text.textContent = status;
    
    switch(status) {
        case 'Connected':
            dot.style.background = '#00ff88';
            break;
        case 'Connecting...':
            dot.style.background = '#ffa726';
            break;
        case 'Connection Failed':
            dot.style.background = '#ff6b6b';
            break;
        default:
            dot.style.background = '#6c757d';
    }
}

// Direct Pusher setup
function setupPusher() {
    try {
        Logger.info('Setting up Pusher...');
        
        const userId = {{ auth()->id() }};
        if (!userId) throw new Error('User ID not found');

        // Initialize Pusher with Laravel configuration
        pusherInstance = new Pusher('{{ config("broadcasting.connections.pusher.key") }}', {
            cluster: '{{ config("broadcasting.connections.pusher.options.cluster") }}',
            forceTLS: {{ config("broadcasting.connections.pusher.options.encrypted") ? 'true' : 'false' }},
            authEndpoint: '/broadcasting/auth',
            auth: {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
            },
        });

        // Subscribe to private channel
        const channelName = `private-video-call.${userId}`;
        Logger.debug('Subscribing to channel:', channelName);
        
        channel = pusherInstance.subscribe(channelName);

        // Connection event handlers
        pusherInstance.connection.bind('connected', () => {
            Logger.info('Pusher connected successfully');
            updateConnectionStatus('Connected');
            NotificationManager.show('Connected successfully', 'success');
        });

        pusherInstance.connection.bind('disconnected', () => {
            Logger.warn('Pusher disconnected');
            updateConnectionStatus('Disconnected');
            NotificationManager.show('Connection lost - attempting to reconnect', 'warning');
        });

        pusherInstance.connection.bind('error', (error) => {
            Logger.error('Pusher connection error', error);
            updateConnectionStatus('Connection Error');
            NotificationManager.show('Connection error', 'error');
        });

        pusherInstance.connection.bind('connecting', () => {
            Logger.info('Pusher connecting...');
            updateConnectionStatus('Connecting...');
        });

        pusherInstance.connection.bind('unavailable', () => {
            Logger.error('Pusher connection unavailable');
            updateConnectionStatus('Connection Unavailable');
            NotificationManager.show('Connection unavailable', 'error');
        });

        // Channel subscription handlers
        channel.bind('pusher:subscription_succeeded', () => {
            Logger.info('Channel subscription succeeded');
        });

        channel.bind('pusher:subscription_error', (status) => {
            Logger.error('Channel subscription error', status);
            updateConnectionStatus('Subscription Error');
            NotificationManager.show('Channel subscription failed', 'error');
        });

        // WebRTC event handlers
        channel.bind('App\\Events\\WebRTCOffer', (data) => {
            Logger.info('Received WebRTC offer', data);
            try {
                handleIncomingCall(data.from, data.offer, data.fromName || `User ${data.from}`);
            } catch (error) {
                Logger.error('Error handling incoming call', error);
                NotificationManager.show('Error handling incoming call', 'error');
            }
        });

        channel.bind('App\\Events\\WebRTCAnswer', (data) => {
            Logger.info('Received WebRTC answer', data);
            try {
                handleAnswer(data.answer);
            } catch (error) {
                Logger.error('Error handling answer', error);
                NotificationManager.show('Error processing call answer', 'error');
            }
        });

        channel.bind('App\\Events\\ICECandidate', (data) => {
            Logger.debug('Received ICE candidate', data);
            try {
                handleIceCandidate(data.candidate);
            } catch (error) {
                Logger.error('Error handling ICE candidate', error);
            }
        });

        channel.bind('App\\Events\\CallEnded', (data) => {
            Logger.info('Call ended by remote peer', data);
            try {
                handleCallEnded();
                NotificationManager.show('Call ended', 'info');
            } catch (error) {
                Logger.error('Error handling call end', error);
            }
        });

        channel.bind('App\\Events\\CallRejected', (data) => {
            Logger.info('Call rejected by remote peer', data);
            try {
                handleCallRejected();
                NotificationManager.show('Call rejected', 'warning');
            } catch (error) {
                Logger.error('Error handling call rejection', error);
            }
        });

        Logger.info('Pusher setup completed successfully');

    } catch (error) {
        Logger.error('Failed to setup Pusher', error);
        updateConnectionStatus('Setup Failed');
        NotificationManager.show('Failed to setup real-time connection', 'error');
    }
}

// Enhanced call status updates
function updateCallStatus(status, withUser = '') {
    try {
        const callStatus = document.getElementById('call-status');
        const currentCallSpan = document.getElementById('current-call-with');
        
        if (callStatus) {
            callStatus.textContent = status;
            callStatus.className = 'status-badge ';
            
            switch(status) {
                case 'Ready':
                    callStatus.className += 'ready';
                    break;
                case 'Calling':
                    callStatus.className += 'calling';
                    break;
                case 'In Call':
                    callStatus.className += 'connected';
                    startCallTimer();
                    break;
                case 'Incoming':
                    callStatus.className += 'incoming';
                    break;
                default:
                    callStatus.className += 'ready';
            }
        }
        
        if (currentCallSpan) {
            currentCallSpan.textContent = withUser ? `with ${withUser}` : '';
        }
        
        Logger.debug('Call status updated', { status, withUser });
        
    } catch (error) {
        Logger.error('Failed to update call status', error);
    }
}

// Enhanced camera startup with better error handling
async function startCamera() {
    try {
        Logger.info('Starting camera...');
        updateLocalVideoStatus('Starting camera...');
        
        // Check for media device support
        if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
            throw new Error('Media devices not supported by this browser');
        }
        
        const constraints = {
            video: {
                width: { ideal: 1280, max: 1920 },
                height: { ideal: 720, max: 1080 },
                frameRate: { ideal: 30, max: 60 }
            },
            audio: {
                echoCancellation: true,
                noiseSuppression: true,
                autoGainControl: true
            }
        };
        
        localStream = await navigator.mediaDevices.getUserMedia(constraints);
        
        const localVideo = document.getElementById('localVideo');
        if (localVideo) {
            localVideo.srcObject = localStream;
        }
        
        // Update UI
        document.getElementById('start-camera-btn').classList.add('d-none');
        document.getElementById('toggle-audio-btn').classList.remove('d-none');
        document.getElementById('toggle-video-btn').classList.remove('d-none');
        
        updateCallStatus('Camera Started');
        updateLocalVideoStatus('');
        
        Logger.info('Camera started successfully');
        NotificationManager.show('Camera started successfully', 'success');
        
    } catch (error) {
        Logger.error('Failed to start camera', error);
        updateLocalVideoStatus('Camera access denied');
        
        let errorMessage = 'Could not access camera and microphone. ';
        
        if (error.name === 'NotAllowedError') {
            errorMessage += 'Please allow camera and microphone permissions.';
        } else if (error.name === 'NotFoundError') {
            errorMessage += 'No camera or microphone found.';
        } else if (error.name === 'NotReadableError') {
            errorMessage += 'Camera or microphone is already in use.';
        } else {
            errorMessage += 'Please check your device settings.';
        }
        
        NotificationManager.show(errorMessage, 'error', 8000);
    }
}

// Enhanced call initiation with validation
async function initiateCall(userId, userName) {
    try {
        Logger.info('Initiating call', { userId, userName });
        
        // Validation checks
        if (!pusherInstance || pusherInstance.connection.state !== 'connected') {
            throw new Error('Not connected to server');
        }
        
        if (!localStream) {
            NotificationManager.show('Please start your camera first', 'warning');
            return;
        }
        
        if (currentCallWith) {
            NotificationManager.show('You are already in a call', 'warning');
            return;
        }
        
        if (userId === {{ auth()->id() }}) {
            NotificationManager.show('You cannot call yourself', 'warning');
            return;
        }
        
        currentCallWith = userId;
        currentCallWithName = userName;
        updateCallStatus('Calling', userName);
        
        // Create peer connection
        await createPeerConnection();
        
        // Create and send offer
        const offer = await peer.createOffer({
            offerToReceiveAudio: true,
            offerToReceiveVideo: true
        });
        
        await peer.setLocalDescription(offer);
        
        Logger.debug('Sending offer to server', { offer, userId });
        
        // Send offer via Laravel with enhanced data
        await axios.post('/signal-offer', {
            offer: offer,
            to: userId,
            fromName: '{{ auth()->user()->name }}'
        });
        
        // Update UI
        document.getElementById('end-call-btn').classList.remove('d-none');
        
        Logger.info('Call initiated successfully');
        NotificationManager.show(`Calling ${userName}...`, 'info');
        
        // Set timeout for unanswered calls
        setTimeout(() => {
            if (currentCallWith === userId && peer && peer.connectionState !== 'connected') {
                Logger.info('Call timeout - no answer');
                NotificationManager.show('No answer', 'warning');
                resetCall();
            }
        }, 30000); // 30 seconds timeout
        
    } catch (error) {
        Logger.error('Failed to initiate call', error);
        NotificationManager.show('Failed to initiate call', 'error');
        resetCall();
    }
}

// Enhanced incoming call handling
function handleIncomingCall(fromUserId, offer, fromUserName = null) {
    try {
        Logger.info('Handling incoming call', { fromUserId, fromUserName });
        
        if (currentCallWith) {
            Logger.warn('Already in a call, rejecting incoming call');
            // Send rejection automatically
            axios.post('/reject-call', { to: fromUserId }).catch(e => 
                Logger.error('Failed to send rejection', e)
            );
            return;
        }
        
        pendingOffer = offer;
        currentCallWith = fromUserId;
        
        // Find caller name
        const callerName = fromUserName || findUserNameById(fromUserId) || 'Unknown User';
        currentCallWithName = callerName;
        
        // Show incoming call modal
        const callerNameElement = document.getElementById('caller-name');
        if (callerNameElement) {
            callerNameElement.textContent = callerName;
        }
        
        showIncomingCallModal();
        
        updateCallStatus('Incoming', callerName);
        
        // Update UI
        document.getElementById('answer-call-btn').classList.remove('d-none');
        document.getElementById('reject-call-btn').classList.remove('d-none');
        
        // Play ringtone (if available)
        playRingtone();
        
        Logger.info('Incoming call UI updated');
        
        // Auto-reject after 30 seconds
        setTimeout(() => {
            if (pendingOffer && currentCallWith === fromUserId) {
                Logger.info('Auto-rejecting unanswered call');
                rejectCall();
            }
        }, 30000);
        
    } catch (error) {
        Logger.error('Failed to handle incoming call', error);
        NotificationManager.show('Error handling incoming call', 'error');
    }
}

// Modal helper functions
function showIncomingCallModal() {
    try {
        if (incomingCallModal) {
            incomingCallModal.show();
        } else {
            // Fallback for when Bootstrap is not available
            const modal = document.getElementById('incomingCallModal');
            modal.style.display = 'block';
            modal.classList.add('show');
            document.body.classList.add('modal-open');
        }
    } catch (error) {
        Logger.error('Failed to show modal', error);
    }
}

function hideIncomingCallModal() {
    try {
        if (incomingCallModal) {
            incomingCallModal.hide();
        } else {
            // Fallback for when Bootstrap is not available
            const modal = document.getElementById('incomingCallModal');
            modal.style.display = 'none';
            modal.classList.remove('show');
            document.body.classList.remove('modal-open');
        }
    } catch (error) {
        Logger.error('Failed to hide modal', error);
    }
}

// Enhanced call answering
async function answerCall() {
    try {
        Logger.info('Answering call...');
        
        if (!pendingOffer) {
            throw new Error('No pending call to answer');
        }
        
        // Start camera if not already started
        if (!localStream) {
            await startCamera();
            if (!localStream) {
                throw new Error('Failed to start camera');
            }
        }
        
        // Hide modal
        hideIncomingCallModal();
        stopRingtone();
        
        // Create peer connection
        await createPeerConnection();
        
        // Set remote description
        await peer.setRemoteDescription(new RTCSessionDescription(pendingOffer));
        
        // Create and send answer
        const answer = await peer.createAnswer();
        await peer.setLocalDescription(answer);
        
        await axios.post('/signal-answer', {
            answer: answer,
            to: currentCallWith
        });
        
        updateCallStatus('In Call', currentCallWithName);
        updateRemoteVideoStatus(currentCallWithName);
        
        // Update UI
        document.getElementById('answer-call-btn').classList.add('d-none');
        document.getElementById('reject-call-btn').classList.add('d-none');
        document.getElementById('end-call-btn').classList.remove('d-none');
        
        pendingOffer = null;
        
        Logger.info('Call answered successfully');
        NotificationManager.show('Call connected', 'success');
        
    } catch (error) {
        Logger.error('Failed to answer call', error);
        NotificationManager.show('Failed to answer call', 'error');
        resetCall();
    }
}

// Enhanced answer handling
async function handleAnswer(answer) {
    try {
        if (!peer) {
            throw new Error('No peer connection available');
        }
        
        Logger.info('Processing call answer...');
        
        await peer.setRemoteDescription(new RTCSessionDescription(answer));
        updateCallStatus('In Call', currentCallWithName);
        updateRemoteVideoStatus(currentCallWithName);
        
        Logger.info('Answer processed successfully');
        NotificationManager.show('Call connected', 'success');
        
    } catch (error) {
        Logger.error('Failed to handle answer', error);
        NotificationManager.show('Failed to establish connection', 'error');
        resetCall();
    }
}

// Enhanced ICE candidate handling
async function handleIceCandidate(candidate) {
    try {
        if (!peer) {
            Logger.warn('Received ICE candidate but no peer connection');
            return;
        }
        
        await peer.addIceCandidate(new RTCIceCandidate(candidate));
        Logger.debug('ICE candidate added successfully');
        
    } catch (error) {
        Logger.error('Failed to add ICE candidate', error);
        // Don't show user notification for ICE candidate errors as they're common
    }
}

// Enhanced peer connection creation
async function createPeerConnection() {
    try {
        Logger.info('Creating peer connection...');
        
        const configuration = {
            iceServers: [
                { urls: 'stun:stun.l.google.com:19302' },
                { urls: 'stun:stun1.l.google.com:19302' },
                { urls: 'stun:stun2.l.google.com:19302' },
                { urls: 'stun:stun3.l.google.com:19302' },
                { urls: 'stun:stun4.l.google.com:19302' }
            ],
            iceCandidatePoolSize: 10
        };
        
        peer = new RTCPeerConnection(configuration);
        
        // Add local stream tracks
        if (localStream) {
            localStream.getTracks().forEach(track => {
                peer.addTrack(track, localStream);
                Logger.debug('Added local track', track.kind);
            });
        }
        
        // Handle remote stream
        peer.ontrack = (event) => {
            Logger.info('Received remote stream');
            const remoteVideo = document.getElementById('remoteVideo');
            if (remoteVideo && event.streams[0]) {
                remoteVideo.srcObject = event.streams[0];
                updateRemoteVideoStatus('');
            }
        };
        
        // Handle ICE candidates
        peer.onicecandidate = (event) => {
            if (event.candidate && currentCallWith) {
                Logger.debug('Sending ICE candidate');
                axios.post('/signal-ice-candidate', {
                    candidate: event.candidate,
                    to: currentCallWith
                }).catch(error => {
                    Logger.error('Failed to send ICE candidate', error);
                });
            }
        };
        
        // Handle connection state changes
        peer.onconnectionstatechange = () => {
            Logger.info('Connection state changed:', peer.connectionState);
            
            switch (peer.connectionState) {
                case 'connected':
                    updateCallStatus('In Call', currentCallWithName);
                    NotificationManager.show('Connection established', 'success');
                    break;
                case 'disconnected':
                    Logger.warn('Peer connection disconnected');
                    NotificationManager.show('Connection lost', 'warning');
                    break;
                case 'failed':
                    Logger.error('Peer connection failed');
                    NotificationManager.show('Connection failed', 'error');
                    handleCallEnded();
                    break;
                case 'closed':
                    Logger.info('Peer connection closed');
                    break;
            }
        };
        
        // Handle ICE connection state changes
        peer.oniceconnectionstatechange = () => {
            Logger.debug('ICE connection state:', peer.iceConnectionState);
            
            switch (peer.iceConnectionState) {
                case 'failed':
                case 'disconnected':
                    Logger.warn('ICE connection issues');
                    // Try to restart ICE
                    if (peer.restartIce) {
                        peer.restartIce();
                    }
                    break;
            }
        };
        
        Logger.info('Peer connection created successfully');
        
    } catch (error) {
        Logger.error('Failed to create peer connection', error);
        throw error;
    }
}

// Enhanced call ending
async function endCall() {
    try {
        Logger.info('Ending call...');
        
        if (currentCallWith) {
            try {
                await axios.post('/end-call', {
                    to: currentCallWith
                });
                Logger.info('Call end notification sent');
            } catch (error) {
                Logger.error('Failed to notify call end', error);
            }
        }
        
        resetCall();
        NotificationManager.show('Call ended', 'info');
        
    } catch (error) {
        Logger.error('Error ending call', error);
        resetCall();
    }
}

// Enhanced call rejection
async function rejectCall() {
    try {
        Logger.info('Rejecting call...');
        
        if (currentCallWith) {
            try {
                await axios.post('/reject-call', {
                    to: currentCallWith
                });
                Logger.info('Call rejection sent');
            } catch (error) {
                Logger.error('Failed to send rejection', error);
            }
        }
        
        hideIncomingCallModal();
        stopRingtone();
        resetCall();
        NotificationManager.show('Call rejected', 'info');
        
    } catch (error) {
        Logger.error('Error rejecting call', error);
        resetCall();
    }
}

// Enhanced call end handling
function handleCallEnded() {
    try {
        Logger.info('Handling call end...');
        stopRingtone();
        hideIncomingCallModal();
        resetCall();
        
    } catch (error) {
        Logger.error('Error handling call end', error);
        resetCall();
    }
}

// Handle call rejection
function handleCallRejected() {
    try {
        Logger.info('Handling call rejection...');
        resetCall();
        
    } catch (error) {
        Logger.error('Error handling call rejection', error);
        resetCall();
    }
}

// Enhanced call reset
function resetCall() {
    try {
        Logger.info('Resetting call state...');
        
        // Stop call timer
        stopCallTimer();
        
        // Close peer connection
        if (peer) {
            peer.close();
            peer = null;
            Logger.debug('Peer connection closed');
        }
        
        // Clear remote video
        const remoteVideo = document.getElementById('remoteVideo');
        if (remoteVideo) {
            remoteVideo.srcObject = null;
        }
        
        // Reset variables
        currentCallWith = null;
        currentCallWithName = '';
        pendingOffer = null;
        
        // Update UI
        updateCallStatus('Ready');
        updateRemoteVideoStatus('No participant');
        
        // Hide call buttons
        document.getElementById('answer-call-btn').classList.add('d-none');
        document.getElementById('reject-call-btn').classList.add('d-none');
        document.getElementById('end-call-btn').classList.add('d-none');
        
        // Hide modal if open
        hideIncomingCallModal();
        
        Logger.info('Call state reset successfully');
        
    } catch (error) {
        Logger.error('Error resetting call', error);
    }
}

// Enhanced audio toggle
function toggleAudio() {
    try {
        if (!localStream) {
            NotificationManager.show('Camera not started', 'warning');
            return;
        }
        
        isAudioEnabled = !isAudioEnabled;
        localStream.getAudioTracks().forEach(track => {
            track.enabled = isAudioEnabled;
        });
        
        const btn = document.getElementById('toggle-audio-btn');
        const icon = btn.querySelector('i');
        const text = btn.querySelector('span');
        
        if (isAudioEnabled) {
            btn.classList.remove('muted');
            btn.classList.add('secondary');
            icon.className = 'fas fa-microphone';
            text.textContent = 'Mute';
        } else {
            btn.classList.remove('secondary');
            btn.classList.add('muted');
            icon.className = 'fas fa-microphone-slash';
            text.textContent = 'Unmute';
        }
        
        Logger.info('Audio toggled', { enabled: isAudioEnabled });
        NotificationManager.show(isAudioEnabled ? 'Microphone unmuted' : 'Microphone muted', 'info');
        
    } catch (error) {
        Logger.error('Failed to toggle audio', error);
        NotificationManager.show('Failed to toggle microphone', 'error');
    }
}

// Enhanced video toggle
function toggleVideo() {
    try {
        if (!localStream) {
            NotificationManager.show('Camera not started', 'warning');
            return;
        }
        
        isVideoEnabled = !isVideoEnabled;
        localStream.getVideoTracks().forEach(track => {
            track.enabled = isVideoEnabled;
        });
        
        const btn = document.getElementById('toggle-video-btn');
        const icon = btn.querySelector('i');
        const text = btn.querySelector('span');
        
        if (isVideoEnabled) {
            btn.classList.remove('muted');
            btn.classList.add('secondary');
            icon.className = 'fas fa-video';
            text.textContent = 'Camera';
            updateLocalVideoStatus('');
        } else {
            btn.classList.remove('secondary');
            btn.classList.add('muted');
            icon.className = 'fas fa-video-slash';
            text.textContent = 'Camera Off';
            updateLocalVideoStatus('Camera Off');
        }
        
        Logger.info('Video toggled', { enabled: isVideoEnabled });
        NotificationManager.show(isVideoEnabled ? 'Camera enabled' : 'Camera disabled', 'info');
        
    } catch (error) {
        Logger.error('Failed to toggle video', error);
        NotificationManager.show('Failed to toggle camera', 'error');
    }
}

// Video status updates
function updateLocalVideoStatus(status) {
    const statusElement = document.getElementById('local-video-status');
    if (statusElement) {
        if (status) {
            statusElement.style.display = 'block';
            statusElement.querySelector('span').textContent = status;
        } else {
            statusElement.style.display = 'none';
        }
    }
}

function updateRemoteVideoStatus(status) {
    const statusElement = document.getElementById('remote-video-status');
    const labelElement = document.getElementById('remote-user-label');
    
    if (statusElement) {
        if (status === 'No participant' || !status) {
            statusElement.style.display = 'block';
            statusElement.querySelector('span').textContent = status || 'No participant';
        } else {
            statusElement.style.display = 'none';
        }
    }
    
    if (labelElement && status && status !== 'No participant') {
        labelElement.innerHTML = `<i class="fas fa-user"></i> ${status}`;
    }
}

// Call timer functions
function startCallTimer() {
    if (callTimer) return; // Already running
    
    callStartTime = Date.now();
    callTimer = setInterval(updateCallTimer, 1000);
}

function stopCallTimer() {
    if (callTimer) {
        clearInterval(callTimer);
        callTimer = null;
        callStartTime = null;
        
        const timerElement = document.getElementById('call-duration');
        if (timerElement) {
            timerElement.textContent = '00:00';
        }
    }
}

function updateCallTimer() {
    if (!callStartTime) return;
    
    const elapsed = Math.floor((Date.now() - callStartTime) / 1000);
    const minutes = Math.floor(elapsed / 60);
    const seconds = elapsed % 60;
    
    const timerElement = document.getElementById('call-duration');
    if (timerElement) {
        timerElement.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
    }
}

// Ringtone functions (placeholder - you can implement actual audio)
function playRingtone() {
    try {
        // You can implement actual ringtone here
        Logger.debug('Playing ringtone');
    } catch (error) {
        Logger.error('Failed to play ringtone', error);
    }
}

function stopRingtone() {
    try {
        // You can implement ringtone stop here
        Logger.debug('Stopping ringtone');
    } catch (error) {
        Logger.error('Failed to stop ringtone', error);
    }
}

// Additional UI functions
function toggleFullscreen() {
    try {
        const videoPanel = document.querySelector('.video-panel');
        if (!document.fullscreenElement) {
            videoPanel.requestFullscreen();
        } else {
            document.exitFullscreen();
        }
    } catch (error) {
        Logger.error('Failed to toggle fullscreen', error);
    }
}

function toggleSettings() {
    NotificationManager.show('Settings panel coming soon', 'info');
}

function toggleLocalVideo() {
    toggleVideo();
}

// Helper function to find user name by ID
function findUserNameById(userId) {
    try {
        const userItems = document.querySelectorAll('.user-item');
        for (let item of userItems) {
            if (item.dataset.userId == userId) {
                return item.dataset.userName;
            }
        }
        return null;
    } catch (error) {
        Logger.error('Failed to find user name', error);
        return null;
    }
}