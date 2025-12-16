let localStream, peer;
navigator.mediaDevices.getUserMedia({video: true, audio: true})
  .then(stream => {
    localStream = stream;
    document.getElementById('localVideo').srcObject = stream;
  });
function startCall() {
    peer = new RTCPeerConnection();
    localStream.getTracks().forEach(track => peer.addTrack(track, 
localStream));
    peer.onicecandidate = e => {
        if (e.candidate) {
            // Événement ICE à transmettre via Laravel Echo
        }
    };
    peer.ontrack = e => {
        document.getElementById('remoteVideo').srcObject = e.streams[0];
    };
    peer.createOffer().then(offer => {
        peer.setLocalDescription(offer);
        axios.post('/signal-offer', {offer: offer});
    });
}
window.Echo.private('video-call')
    .listen('WebRTCOffer', (e) => {
        // Recevoir l'offre et y répondre
    });