<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Chat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
        .video-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }
        .video-wrapper {
            position: relative;
            background: #000;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }
        video {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 10px;
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
        .controls {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }
        button {
            padding: 12px 24px;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
        }
        .start-btn {
            background: linear-gradient(45deg, #4CAF50, #45a049);
            color: white;
        }
        .start-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.4);
        }
        .answer-btn {
            background: linear-gradient(45deg, #2196F3, #1976D2);
            color: white;
        }
        .answer-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(33, 150, 243, 0.4);
        }
        .end-btn {
            background: linear-gradient(45deg, #f44336, #d32f2f);
            color: white;
        }
        .end-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(244, 67, 54, 0.4);
        }
        .status {
            text-align: center;
            margin: 20px 0;
            padding: 10px;
            border-radius: 5px;
            background: #e3f2fd;
            color: #1976d2;
        }
        @media (max-width: 768px) {
            .video-container {
                grid-template-columns: 1fr;
            }
            .controls {
                flex-direction: column;
                align-items: center;
            }
            button {
                width: 200px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🎥 Video Chat</h1>
        
        <div class="video-container">
            <div class="video-wrapper">
                <video id="localVideo" autoplay muted playsinline></video>
                <div class="video-label">You</div>
            </div>
            <div class="video-wrapper">
                <video id="remoteVideo" autoplay playsinline></video>
                <div class="video-label">Remote</div>
            </div>
        </div>

        <div class="status" id="status">Click "Start Camera" to begin</div>

        <div class="controls">
            <button class="start-btn" onclick="initializeCamera()">Start Camera</button>
            <button class="start-btn" onclick="startCall()">Start Call</button>
            <button class="answer-btn" onclick="answerCall()">Answer Call</button>
            <button class="end-btn" onclick="endCall()">End Call</button>
        </div>
    </div>

    <!-- Include required dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.0/axios.min.js"></script>
    
    <script>
        let localStream, peer;
        let pendingOffer = null;
        let isCallActive = false;

        // Status update function
        function updateStatus(message) {
            document.getElementById('status').textContent = message;
        }

        // Initialize camera
        async function initializeCamera() {
            try {
                localStream = await navigator.mediaDevices.getUserMedia({
                    video: true, 
                    audio: true
                });
                document.getElementById('localVideo').srcObject = localStream;
                updateStatus("Camera initialized - Ready to start call");
            } catch (error) {
                console.error('Error accessing media devices:', error);
                updateStatus("Error: Could not access camera/microphone");
            }
        }

        // Start call (create offer)
        async function startCall() {
            if (!localStream) {
                updateStatus("Please start camera first");
                return;
            }

            try {
                peer = new RTCPeerConnection({
                    iceServers: [
                        { urls: 'stun:stun.l.google.com:19302' }
                    ]
                });

                // Add local stream tracks
                localStream.getTracks().forEach(track => {
                    peer.addTrack(track, localStream);
                });

                // Handle ICE candidates
                peer.onicecandidate = e => {
                    if (e.candidate) {
                        // In a real app, send this via your signaling server
                        console.log('ICE candidate:', e.candidate);
                        // Example: Send via Laravel Echo
                        // window.Echo.private('video-call').whisper('ice-candidate', {
                        //     candidate: e.candidate
                        // });
                    }
                };

                // Handle remote stream
                peer.ontrack = e => {
                    document.getElementById('remoteVideo').srcObject = e.streams[0];
                    updateStatus("Connected - Call in progress");
                    isCallActive = true;
                };

                // Create and send offer
                const offer = await peer.createOffer();
                await peer.setLocalDescription(offer);
                
                // In a real app, send this to your Laravel backend
                console.log('Offer created:', offer);
                updateStatus("Call initiated - Waiting for answer");
                
                // Simulate sending offer (replace with actual API call)
                // await axios.post('/signal-offer', { offer: offer });
                
            } catch (error) {
                console.error('Error starting call:', error);
                updateStatus("Error starting call");
            }
        }

        // Answer call (handle incoming offer)
        async function answerCall() {
            if (!localStream) {
                updateStatus("Please start camera first");
                return;
            }

            if (!pendingOffer) {
                updateStatus("No incoming call to answer");
                return;
            }

            try {
                peer = new RTCPeerConnection({
                    iceServers: [
                        { urls: 'stun:stun.l.google.com:19302' }
                    ]
                });

                // Add local stream tracks
                localStream.getTracks().forEach(track => {
                    peer.addTrack(track, localStream);
                });

                // Handle ICE candidates
                peer.onicecandidate = e => {
                    if (e.candidate) {
                        console.log('ICE candidate:', e.candidate);
                        // Send via your signaling mechanism
                    }
                };

                // Handle remote stream
                peer.ontrack = e => {
                    document.getElementById('remoteVideo').srcObject = e.streams[0];
                    updateStatus("Connected - Call in progress");
                    isCallActive = true;
                };

                // Set remote description and create answer
                await peer.setRemoteDescription(pendingOffer);
                const answer = await peer.createAnswer();
                await peer.setLocalDescription(answer);

                console.log('Answer created:', answer);
                updateStatus("Call answered");
                
                // Send answer back (replace with actual API call)
                // await axios.post('/signal-answer', { answer: answer });
                
                pendingOffer = null;
                
            } catch (error) {
                console.error('Error answering call:', error);
                updateStatus("Error answering call");
            }
        }

        // End call
        function endCall() {
            if (peer) {
                peer.close();
                peer = null;
            }
            
            // Clear remote video
            const remoteVideo = document.getElementById('remoteVideo');
            remoteVideo.srcObject = null;
            
            isCallActive = false;
            updateStatus("Call ended");
        }

        // Simulate receiving an offer (for testing)
        function simulateIncomingOffer() {
            // This would normally come from your Laravel Echo listener
            pendingOffer = {
                type: 'offer',
                sdp: 'simulated-offer-sdp'
            };
            updateStatus("Incoming call - Click 'Answer Call'");
        }

        // Laravel Echo integration (uncomment when you have Echo set up)
        /*
        // Make sure Laravel Echo is loaded before this script
        if (typeof window.Echo !== 'undefined') {
            window.Echo.private('video-call')
                .listen('WebRTCOffer', (e) => {
                    console.log('Received offer:', e.offer);
                    pendingOffer = e.offer;
                    updateStatus("Incoming call - Click 'Answer Call'");
                })
                .listen('WebRTCAnswer', (e) => {
                    console.log('Received answer:', e.answer);
                    if (peer) {
                        peer.setRemoteDescription(e.answer);
                    }
                })
                .listen('ICECandidate', (e) => {
                    console.log('Received ICE candidate:', e.candidate);
                    if (peer) {
                        peer.addIceCandidate(new RTCIceCandidate(e.candidate));
                    }
                });
        } else {
            console.warn('Laravel Echo not loaded');
            updateStatus("Warning: Real-time signaling not available");
        }
        */

        // For testing - simulate an incoming call after 3 seconds
        setTimeout(() => {
            console.log("Simulating incoming call...");
            simulateIncomingOffer();
        }, 3000);
    </script>
</body>
</html>