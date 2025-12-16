@extends('layouts.app')

@section('head')
<!-- Make sure Echo is loaded -->
@vite(['resources/js/app.js'])

<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<br><br>
<br><br>
<br><br>
<div class="container-fluid">
    <div class="row">
        <!-- Users List -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h5>Online Users</h5>
                </div>
                <div class="card-body">
                    @foreach($users as $user)
                    <div class="user-item mb-2 p-2 border rounded" style="cursor: pointer;" 
                         onclick="initiateCall({{ $user->id }}, '{{ $user->name }}')">
                        <i class="fas fa-user"></i> {{ $user->name }}
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Video Call Area -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Video Call</h5>
                    <div>
                        <span id="call-status" class="badge badge-secondary">Ready</span>
                        <span id="current-call-with" class="text-muted"></span>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Video Elements -->
                    <div class="video-container mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="video-wrapper">
                                    <video id="localVideo" autoplay muted playsinline class="w-100" style="max-height: 300px; background: #000; border-radius: 8px;"></video>
                                    <div class="video-label">You ({{ auth()->user()->name }})</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="video-wrapper">
                                    <video id="remoteVideo" autoplay playsinline class="w-100" style="max-height: 300px; background: #000; border-radius: 8px;"></video>
                                    <div class="video-label" id="remote-user-label">Remote User</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Call Controls -->
                    <div class="call-controls text-center">
                        <button id="start-camera-btn" class="btn btn-primary" onclick="startCamera()">
                            <i class="fas fa-video"></i> Start Camera
                        </button>
                        <button id="answer-call-btn" class="btn btn-success d-none" onclick="answerCall()">
                            <i class="fas fa-phone"></i> Answer Call
                        </button>
                        <button id="reject-call-btn" class="btn btn-warning d-none" onclick="rejectCall()">
                            <i class="fas fa-phone-slash"></i> Reject
                        </button>
                        <button id="end-call-btn" class="btn btn-danger d-none" onclick="endCall()">
                            <i class="fas fa-phone-slash"></i> End Call
                        </button>
                        <button id="toggle-audio-btn" class="btn btn-secondary d-none" onclick="toggleAudio()">
                            <i class="fas fa-microphone"></i> 
                        </button>
                        <button id="toggle-video-btn" class="btn btn-secondary d-none" onclick="toggleVideo()">
                            <i class="fas fa-video"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Incoming Call Modal -->
<div class="modal fade" id="incomingCallModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Incoming Call</h5>
            </div>
            <div class="modal-body text-center">
                <i class="fas fa-phone-alt fa-3x text-success mb-3"></i>
                <h4 id="caller-name">Unknown</h4>
                <p>is calling you...</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-success" onclick="answerCall()">
                    <i class="fas fa-phone"></i> Answer
                </button>
                <button type="button" class="btn btn-danger" onclick="rejectCall()">
                    <i class="fas fa-phone-slash"></i> Reject
                </button>
            </div>
        </div>
    </div>
</div>

<style>
.video-wrapper {
    position: relative;
}

.video-label {
    position: absolute;
    top: 10px;
    left: 10px;
    background: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 5px 10px;
    border-radius: 5px;
    font-size: 12px;
}

.user-item:hover {
    background-color: #f8f9fa;
}

.call-controls button {
    margin: 5px;
}

</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.11.0/axios.min.js" integrity="sha512-h9644v03pHqrIHThkvXhB2PJ8zf5E9IyVnrSfZg8Yj8k4RsO4zldcQc4Bi9iVLUCCsqNY0b4WXVV4UB+wbWENA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
// Global variables
let localStream = null;
let peer = null;
let currentCallWith = null;
let currentCallWithName = '';
let pendingOffer = null;
let isAudioEnabled = true;
let isVideoEnabled = true;

// Initialize when page loads
document.addEventListener('DOMContentLoaded', function() {
    // First try to configure Axios immediately
    tryConfigureAxios();
    
    updateCallStatus('Ready');
    waitForDependencies();
});

function tryConfigureAxios() {
    try {
        if (typeof window.axios !== 'undefined') {
            window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
            window.axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            return true;
        }
        return false;
    } catch (e) {
        return false;
    }
}

function waitForDependencies() {
    if (tryConfigureAxios() && typeof window.Echo !== 'undefined') {
        // Both dependencies are loaded
        setupEcho();
        updateCallStatus('Ready - Connected');
    } else {
        // Check again in 100ms
        setTimeout(waitForDependencies, 100);
    }
}
// DOM elements
const localVideo = document.getElementById('localVideo');
const remoteVideo = document.getElementById('remoteVideo');
const callStatus = document.getElementById('call-status');
const currentCallSpan = document.getElementById('current-call-with');
const remoteUserLabel = document.getElementById('remote-user-label');

// Initialize when page loads
// document.addEventListener('DOMContentLoaded', function() {
//     updateCallStatus('Ready');
//     waitForEcho();
// });

// Wait for Echo to be available
function waitForEcho() {
    if (typeof window.Echo !== 'undefined' && window.Echo) {
        setupEcho();
        updateCallStatus('Ready - Echo Connected');
    } else {
        console.log('Waiting for Echo to load...');
        setTimeout(waitForEcho, 100);
    }
}

// Update call status
function updateCallStatus(status, withUser = '') {
    callStatus.textContent = status;
    currentCallSpan.textContent = withUser ? `with ${withUser}` : '';
    
    // Update status badge color
    callStatus.className = 'badge ';
    switch(status) {
        case 'Ready':
        case 'Ready - Echo Connected':
        case 'Camera Started':
            callStatus.className += 'badge-secondary';
            break;
        case 'Calling':
            callStatus.className += 'badge-warning';
            break;
        case 'In Call':
            callStatus.className += 'badge-success';
            break;
        case 'Incoming':
            callStatus.className += 'badge-info';
            break;
        default:
            callStatus.className += 'badge-secondary';
    }
}

// Start camera
async function startCamera() {
    try {
        localStream = await navigator.mediaDevices.getUserMedia({
            video: true,
            audio: true
        });
        
        localVideo.srcObject = localStream;
        
        // Update UI
        document.getElementById('start-camera-btn').classList.add('d-none');
        document.getElementById('toggle-audio-btn').classList.remove('d-none');
        document.getElementById('toggle-video-btn').classList.remove('d-none');
        
        updateCallStatus('Camera Started');
        
    } catch (error) {
        console.error('Error accessing camera:', error);
        alert('Could not access camera and microphone. Please check permissions.');
    }
}

// Setup Laravel Echo listeners
function setupEcho() {
    try {
        // Listen for WebRTC offers
        window.Echo.private(`video-call.{{ auth()->id() }}`)
            .listen('WebRTCOffer', (e) => {
                console.log('Received offer from:', e.from);
                handleIncomingCall(e.from, e.offer);
            })
            .listen('WebRTCAnswer', (e) => {
                console.log('Received answer from:', e.from);
                handleAnswer(e.answer);
            })
            .listen('ICECandidate', (e) => {
                console.log('Received ICE candidate from:', e.from);
                handleIceCandidate(e.candidate);
            })
            .listen('CallEnded', (e) => {
                console.log('Call ended by:', e.from);
                handleCallEnded();
            });
        
        console.log('Echo listeners setup successfully');
    } catch (error) {
        console.error('Error setting up Echo:', error);
        updateCallStatus('Echo Connection Failed');
    }
}

// Initiate call to user
async function initiateCall(userId, userName) {
    if (!localStream) {
        alert('Please start your camera first');
        return;
    }
    
    if (currentCallWith) {
        alert('You are already in a call');
        return;
    }
    
    try {
        currentCallWith = userId;
        currentCallWithName = userName;
        updateCallStatus('Calling', userName);
        
        // Create peer connection
        await createPeerConnection();
        
        // Create and send offer
        const offer = await peer.createOffer();
        await peer.setLocalDescription(offer);
        
        // Send offer via Laravel
        await axios.post('/signal-offer', {
            offer: offer,
            to: userId
        });
        
        // Update UI
        document.getElementById('end-call-btn').classList.remove('d-none');
        
    } catch (error) {
        console.error('Error initiating call:', error);
        alert('Failed to initiate call');
        resetCall();
    }
}

// Handle incoming call
function handleIncomingCall(fromUserId, offer) {
    if (currentCallWith) {
        // Already in a call, could implement call waiting here
        return;
    }
    
    pendingOffer = offer;
    currentCallWith = fromUserId;
    
    // Find caller name
    const callerName = findUserNameById(fromUserId) || 'Unknown User';
    currentCallWithName = callerName;
    
    // Show incoming call modal
    document.getElementById('caller-name').textContent = callerName;
    $('#incomingCallModal').modal('show');
    
    updateCallStatus('Incoming', callerName);
    
    // Update UI
    document.getElementById('answer-call-btn').classList.remove('d-none');
    document.getElementById('reject-call-btn').classList.remove('d-none');
}

// Answer incoming call
async function answerCall() {
    if (!localStream) {
        await startCamera();
    }
    
    if (!pendingOffer) {
        alert('No pending call to answer');
        return;
    }
    
    try {
        // Hide modal
        $('#incomingCallModal').modal('hide');
        
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
        remoteUserLabel.textContent = currentCallWithName;
        
        // Update UI
        document.getElementById('answer-call-btn').classList.add('d-none');
        document.getElementById('reject-call-btn').classList.add('d-none');
        document.getElementById('end-call-btn').classList.remove('d-none');
        
        pendingOffer = null;
        
    } catch (error) {
        console.error('Error answering call:', error);
        alert('Failed to answer call');
        resetCall();
    }
}

// Handle answer from remote peer
async function handleAnswer(answer) {
    if (peer) {
        try {
            await peer.setRemoteDescription(new RTCSessionDescription(answer));
            updateCallStatus('In Call', currentCallWithName);
            remoteUserLabel.textContent = currentCallWithName;
        } catch (error) {
            console.error('Error handling answer:', error);
        }
    }
}

// Handle ICE candidate
async function handleIceCandidate(candidate) {
    if (peer) {
        try {
            await peer.addIceCandidate(new RTCIceCandidate(candidate));
        } catch (error) {
            console.error('Error adding ICE candidate:', error);
        }
    }
}

// Create peer connection
async function createPeerConnection() {
    peer = new RTCPeerConnection({
        iceServers: [
            { urls: 'stun:stun.l.google.com:19302' },
            { urls: 'stun:stun1.l.google.com:19302' }
        ]
    });
    
    // Add local stream tracks
    localStream.getTracks().forEach(track => {
        peer.addTrack(track, localStream);
    });
    
    // Handle remote stream
    peer.ontrack = (event) => {
        console.log('Received remote stream');
        remoteVideo.srcObject = event.streams[0];
    };
    
    // Handle ICE candidates
    peer.onicecandidate = (event) => {
        if (event.candidate && currentCallWith) {
            axios.post('/signal-ice-candidate', {
                candidate: event.candidate,
                to: currentCallWith
            }).catch(error => {
                console.error('Error sending ICE candidate:', error);
            });
        }
    };
    
    // Handle connection state changes
    peer.onconnectionstatechange = () => {
        console.log('Connection state:', peer.connectionState);
        if (peer.connectionState === 'connected') {
            updateCallStatus('In Call', currentCallWithName);
        } else if (peer.connectionState === 'disconnected' || 
                   peer.connectionState === 'failed') {
            handleCallEnded();
        }
    };
}

// End call
async function endCall() {
    if (currentCallWith) {
        try {
            await axios.post('/end-call', {
                to: currentCallWith
            });
        } catch (error) {
            console.error('Error notifying call end:', error);
        }
    }
    
    resetCall();
}

// Reject call
function rejectCall() {
    $('#incomingCallModal').modal('hide');
    resetCall();
}

// Handle call ended by remote peer
function handleCallEnded() {
    resetCall();
}

// Reset call state
function resetCall() {
    // Close peer connection
    if (peer) {
        peer.close();
        peer = null;
    }
    
    // Clear remote video
    remoteVideo.srcObject = null;
    
    // Reset variables
    currentCallWith = null;
    currentCallWithName = '';
    pendingOffer = null;
    
    // Update UI
    updateCallStatus('Ready');
    remoteUserLabel.textContent = 'Remote User';
    
    // Hide call buttons
    document.getElementById('answer-call-btn').classList.add('d-none');
    document.getElementById('reject-call-btn').classList.add('d-none');
    document.getElementById('end-call-btn').classList.add('d-none');
    
    // Hide modal if open
    $('#incomingCallModal').modal('hide');
}

// Toggle audio
function toggleAudio() {
    if (localStream) {
        isAudioEnabled = !isAudioEnabled;
        localStream.getAudioTracks().forEach(track => {
            track.enabled = isAudioEnabled;
        });
        
        const btn = document.getElementById('toggle-audio-btn');
        const icon = btn.querySelector('i');
        
        if (isAudioEnabled) {
            btn.classList.remove('btn-danger');
            btn.classList.add('btn-secondary');
            icon.className = 'fas fa-microphone';
        } else {
            btn.classList.remove('btn-secondary');
            btn.classList.add('btn-danger');
            icon.className = 'fas fa-microphone-slash';
        }
    }
}

// Toggle video
function toggleVideo() {
    if (localStream) {
        isVideoEnabled = !isVideoEnabled;
        localStream.getVideoTracks().forEach(track => {
            track.enabled = isVideoEnabled;
        });
        
        const btn = document.getElementById('toggle-video-btn');
        const icon = btn.querySelector('i');
        
        if (isVideoEnabled) {
            btn.classList.remove('btn-danger');
            btn.classList.add('btn-secondary');
            icon.className = 'fas fa-video';
        } else {
            btn.classList.remove('btn-secondary');
            btn.classList.add('btn-danger');
            icon.className = 'fas fa-video-slash';
        }
    }
}

// Helper function to find user name by ID
function findUserNameById(userId) {
    // You might want to implement this based on your user data
    // For now, return a generic name
    return `User ${userId}`;
}
</script>
@endsection