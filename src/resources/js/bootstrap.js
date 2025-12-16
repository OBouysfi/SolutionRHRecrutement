import axios from 'axios';
import Pusher from 'pusher-js';

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Pusher Setup (without Echo)
window.Pusher = Pusher;

const pusher = new Pusher(process.env.MIX_PUSHER_APP_KEY || 'local', {
    wsHost: window.location.hostname,
    wsPort: 6001,
    wssPort: 6001,
    forceTLS: false,
    authEndpoint: "{{ url('/broadcasting/auth') }}",
        auth: {
            headers: {
                'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').content
            }
        },
    enabledTransports: ['ws', 'wss'],
    disableStats: true,
});